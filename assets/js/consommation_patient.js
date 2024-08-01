import { Modal } from 'bootstrap/dist/js/bootstrap.bundle.js';

function hideAlert() {
    setTimeout(function () {
        $(".error-message").hide();
        $(".successMessage").hide();
        $(".errorMessage").hide();
    }, 7000);
}

$(document).ready(function () {
    let currentRequest = null;

    const modalElement = document.getElementById('infoPatient');
    if (modalElement) {
        const modal = Modal.getInstance(modalElement) || new Modal(modalElement);
        modal.show();
    }

    $('body').on('click', '.produit', (event) => {
        let articleId = $(event.currentTarget).data('id');
        let articleQuantity = $(event.currentTarget).data('quantity');

        $('#article_id').val(articleId);
        $('#quantityInput').val('');
    });

    $('body').on('click', '#confirmQuantity', () => {
        $('.loader').show();
        $('#confirmQuantity').hide();
        let articleId = $('#article_id').val();
        let quantity = $('#quantityInput').val();
        if (quantity > 0) {
            let $article = $('.produit[data-id="' + articleId + '"]');
            if (currentRequest !== null) {
                currentRequest.abort();
            }

            currentRequest = $.ajax({
                type: "POST",
                url: "/consommation_patient/addCart",
                data: {
                    articleID: articleId,
                    quantity: quantity
                },
                success: (result) => {
                    if (result.error == 'supQuantite') {
                        $('.error-message #errorText').html("la quantité que vous voulez est supérieur à la quantité en Stock!");
                        $('.error-message').show('');
                        hideAlert();
                        $('.loader').hide();
                        $('#confirmQuantity').show();
                    } else if (result.error == 'vendu') {
                        $('.error-message #errorText').html("ce produit est vendu!");
                        $('.error-message').show('');
                        hideAlert();
                        $('.loader').hide();
                        $('#confirmQuantity').show();
                    }
                    if (result.success == 'success') {
                        let $quantityBadge = $article.find('.quantity-badge');
                        $quantityBadge.text(quantity).removeClass('d-none');
                        const modal = Modal.getInstance($('#qteModal')) || new Modal($('#qteModal'));
                        modal.hide();
                        $('.loader').hide();
                        $('#confirmQuantity').show();
                        location.reload()
                    }
                }
            })
        } else {
            let $article = $('.produit[data-id="' + articleId + '"]');
            let $quantityBadge = $article.find('.quantity-badge');
            $quantityBadge.text('0').addClass('d-none');
            const modal = Modal.getInstance($('#qteModal')) || new Modal($('#qteModal'));
            modal.hide();
            $('.loader').hide();
            $('#confirmQuantity').show();
        }
    });

    //articles by selected categorie
    const getArticleByFam = (id) => {
        if (currentRequest !== null) {
            currentRequest.abort();
        }

        currentRequest = $.ajax({
            type: "POST",
            url: "/consommation_patient/byfam",
            data: {
                famId: id
            },
            success: (result) => {
                $(".row-produit").empty().append(result)
            }
        })
    }
    //on famille click
    $('body').on('click', '.cat-title', (event) => {
        let familleID = $(event.currentTarget).attr('id');
        getArticleByFam(familleID)
    })

    //search product by info
    const getArticleBySearch = (searchTerm) => {
        if (currentRequest !== null) {
            currentRequest.abort();
        }

        currentRequest = $.ajax({
            type: "POST",
            url: "/consommation_patient/bySearch",
            data: {
                search: searchTerm
            },
            success: (result) => {
                $(".row-produit").empty().append(result);
            }
        })
    }

    $('#articleSearch').on('keyup', () => {
        let searchTerm = $('#articleSearch').val();
        getArticleBySearch(searchTerm);
    })

    //update quantity
    const updateQte = (id, operation) => {

        $.ajax({
            method: 'POST',
            url: '/consommation_patient/updateQte',
            data: {
                articleID: id,
                operation: operation
            },
            success: (result) => {
                $('.successMessage .alert-message').html("la quantité est modifié !");
                $('.successMessage').show('');
                hideAlert();
                $('.qteDisplay').val(result.qte)
                location.reload()
            }
            
        })
    }

    $('body').on('click', '.updateQte', (event) => {
        let artID = $(event.currentTarget).attr('id');
        let op = $(event.currentTarget).attr('data');

        updateQte(artID, op)
        op = '';
    })

    let patientData={};
    $('#searchPatient').on('click', () => {
        let ipp = $('#ippSearch').val();
        $('.patientLoader').show();
        $('#searchPatient').hide();
        $('#validatePatient').hide();
        $.ajax({
            method: 'POST',
            url: '/consommation_patient/findPatient/'+ipp,
            data: {
                ipp: ipp,
            },
            success: (result) => {
                if (result.error == null) {
                    $('#ipp').text(result[0].ipp)
                    $('#nomPatient').text(result[0].patient)
                    $('#di').val(result[0].di)
                    patientData=result[0];
                    console.log(result)
                } else if (result.error) {
                    console.log(result)
                    $('.error-message #errorText').html("Ce patient n'existe pas!!");
                    $('.error-message').show('');
                    hideAlert();
                    $('.patientLoader').hide();
                    $('#searchPatient').show();
                    $('#validatePatient').show();
                }
                $('.patientLoader').hide();
                $('#searchPatient').show();
                $('#validatePatient').show();
            },
            error:()=>{
                $('.error-message #errorText').html("une erreur est survenu , réessayez!!");
                $('.error-message').show('');
                hideAlert();
                $('.patientLoader').hide();
                $('#searchPatient').show();
                $('#validatePatient').show();
            }
        })
    })

    $('#validatePatient').on('click', () => {
        $('.patientLoader').show();
        $('#searchPatient').hide();
        $('#validatePatient').hide();

        $.ajax({
            method: 'POST',
            url: '/consommation_patient/validatePatient',
            data: {
                patient: JSON.stringify(patientData),
            },
            success: (result) => {
                if (result.error == null) {
                  location.reload()
                }
                $('.patientLoader').hide();
                $('#searchPatient').show();
                $('#validatePatient').show();

            },
            error:()=>{
                $('.error-message #errorText').html("une erreur est survenu , réessayez!!");
                $('.error-message').show('');
                hideAlert();
                $('.patientLoader').hide();
                $('#searchPatient').show();
                $('#validatePatient').show();
            }
        })
    })

    $('#validateCommande').on('click', () => {
        $('.loader').show();
        $('#validateCommande').hide();
        $.ajax({
            method: 'POST',
            url: '/consommation_patient/addDemande',
            success: (result) => {
                
                if (result.success) {
                    console.log(result)
                  
                    $('.loader').hide();
                    $('#validateCommande').show();
                    location.reload()
                } 
                 if (result.failed) {
                    $('.errorMessage .alert-message').html("pas d'articles selectionner");
                    $('.errorMessage').show('');
                    hideAlert();
                    $('.loader').hide();
                    $('#validateCommande').show();
                }
            },
            error:()=>{
                $('.loader').hide();
                $('#validateCommande').show();
            }
        })
    })

    //load demandes data
    //search product by info
   const getDemandeBySearch=(searchTerm,date)=>{

        $('.loader').show();
        $('.demandes').hide();
        // Cancel previous request, if any
        if (currentRequest !== null) {
            currentRequest.abort();
        }

        currentRequest=$.ajax({
            type: "POST",
            url:"/suivi/commande/byfilter",
            data:{
                search:searchTerm,
                service:null,
                date:date,
                consomPatient:1
            },
            success:(result)=>{
                $("#demData").empty().append(result);
                $('.loader').hide();
                $('.demandes').show();
            }
        })
        }

        
    $('#demandes').on('click',()=>{
        let searchTerm= null;
        let date= null;
        getDemandeBySearch(searchTerm,date);
    })

    $('#date').on('change',()=>{
        let searchTerm= $('#demmande-search').val();
        let date= $('#date').val();
        getDemandeBySearch(searchTerm,date);
    })
    
});