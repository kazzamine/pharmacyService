import { Modal } from 'bootstrap/dist/js/bootstrap.bundle.js';

function hideAlert() {
    setTimeout(function () {
        $(".error-message").hide();
        $(".successMessage").hide();
        $(".errorMessage").hide();
    }, 5000);
}



function showError(message, type = 'general') {
    if (type === 'general') {
        $('.error-message #errorText').html(message);
        $('.error-message').show();
    } else if (type === 'specific') {
        $('.errorMessage .alert-message').html(message);
        $('.errorMessage').show();
    }
    hideAlert();
}
function showSuccess(message) {
    $('.successMessage .alert-message').html(message);
    $('.successMessage').show();
    hideAlert();
}

function toggleLoader(isLoading, elementSelectors = []) {
    if (isLoading) {
        $('.loader').show();
        elementSelectors.forEach(selector => $(selector).hide());
    } else {
        $('.loader').hide();
        elementSelectors.forEach(selector => $(selector).show());
    }
}

$(document).ready(function () {
    let currentRequest = null;
    let patientData = {};
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

    $('body').on('click', '.product-sold', () => {
        showError("Le produit est épuisé",'specific');
    });

    $('body').on('click', '#confirmQuantity', function () {
        let articleId = $('#article_id').val();
        let quantity = $('#quantityInput').val();

        if (quantity > 0) {
            toggleLoader(true, ['#confirmQuantity']);

            $.ajax({
                type: "POST",
                url: "/app/consommation_patient/addCart",
                data: {
                    articleID: articleId,
                    quantity: quantity
                },
                success: function (result) {
                    if (result.success === 'success') {
                        let $badge = $('.produit[data-id="' + result.articleID + '"] .qte-produit');
                        $badge.text(result.updatedQuantity);
                        $badge.removeClass('d-none');
                        $('.scrollable-cart').html(result.cartHtml);
                        $('#priceTotal').text(result.totalPrice + ' dhs');
                        toggleLoader(false, ['#confirmQuantity']);
                        const modal = Modal.getInstance($('#qteModal')) || new Modal($('#qteModal'));
                        modal.hide();
                    } else if (result.error) {
                        handleQuantityError(result.error);
                    }
                },
                error: function () {
                    showError("Une erreur s'est produite. Veuillez réssayer.");
                    toggleLoader(false, ['#confirmQuantity']);
                }
            });
        } else {
            showError("Veuillez saisir une quantité supérieure à 0.");
            toggleLoader(false, ['#confirmQuantity']);
        }
    });

    function handleQuantityError(error) {
        let errorMessage = '';
        switch (error) {
            case 'supQuantite':
                errorMessage = 'La quantité est supérieure à celle disponible.';
                showError(errorMessage);
                break;
            case 'vendu':
                errorMessage = 'Ce produit est vendu.';
                showError(errorMessage, 'specific');
                break;
            default:
                errorMessage = "Erreur inconnue.";
                showError(errorMessage);
        }
        
        toggleLoader(false, ['#confirmQuantity']);
    }

    const getArticleByFam = (id) => {
        toggleLoader(true);
        if (currentRequest !== null) {
            currentRequest.abort();
        }

        currentRequest = $.ajax({
            type: "POST",
            url: "/app/consommation_patient/byfam",
            data: {
                famId: id
            },
            success: (result) => {
                $(".row-produit").empty().append(result);
                toggleLoader(false);
            }
        });
    };

    $('body').on('click', '.sideCat', (event) => {
        let familleID = $(event.currentTarget).attr('id');
        getArticleByFam(familleID);
    });

    const getArticleBySearch = (searchTerm) => {
        if (currentRequest !== null) {
            currentRequest.abort();
        }
        currentRequest = $.ajax({
            type: "POST",
            url: "/app/consommation_patient/bySearch",
            data: {
                search: searchTerm
            },
            success: (result) => {
                $(".row-produit").empty().append(result);
            }
        });
    };

    $('#articleSearch').on('keyup', () => {
        let searchTerm = $('#articleSearch').val();
        getArticleBySearch(searchTerm);
    });

    const updateQte = (id, operation) => {
        $.ajax({
            method: 'POST',
            url: '/app/consommation_patient/updateQte',
            data: {
                articleID: id,
                operation: operation
            },
            success: (result) => {
                showSuccess("La quantité est modifiée !");
                $('.qteDisplay').val(result.qte);
            },
            error: () => {
                location.reload();
            }
        });
    };

    $('body').on('click', '.updateQte', (event) => {
        let artID = $(event.currentTarget).attr('id');
        let op = $(event.currentTarget).attr('data');
        updateQte(artID, op);
    });

    $('#searchPatient').on('click', () => {
        let ipp = $('#ippSearch').val();
        if (!ipp) {
            showError("Vous n'avez pas précisé l'IPP ou le nom du patient");
            return;
        }
        toggleLoader(true, ['#searchPatient', '#validatePatient']);

        $.ajax({
            method: 'POST',
            url: '/app/consommation_patient/findPatient/' + ipp,
            success: (result) => {
                if (!result.error) {
                    $('#ipp').text(result[0].ipp);
                    $('#nomPatient').text(result[0].patient);
                    $('#di').val(result[0].di);
                    patientData = result[0];
                } else {
                    handleFindPatientError(result.error);
                }
                toggleLoader(false, ['#searchPatient', '#validatePatient']);
            },
            error: () => {
                showError("Une erreur est survenue, réessayez !");
                toggleLoader(false, ['#searchPatient', '#validatePatient']);
            }
        });
    });

    function handleFindPatientError(error) {
        let message;
        switch (error) {
            case '404':
                message = "Ce patient n'existe pas !";
                break;
            case '500':
                message = "Une erreur est survenue, réssayez !";
                break;
            default:
                message = "Erreur inconnue.";
        }
        showError(message);
    }

    $('#validatePatient').on('click', () => {
        let ipp = $('#ippSearch').val();
        if (!ipp) {
            showError("Vous n'avez pas précisé l'IPP ou le nom du patient");
            return;
        }
       

        if (patientData == {}) {
            showError("Vous n'avez pas ");
            return;
        } 
        toggleLoader(true, ['#searchPatient', '#validatePatient']);
        $.ajax({
            method: 'POST',
            url: '/app/consommation_patient/validatePatient',
            data: {
                patient: JSON.stringify(patientData),
            },
            success: (result) => {
                if (result.success === 'validated') {
                    //location.reload();
                    const modal = Modal.getInstance(modalElement) || new Modal(modalElement);

                    modal.hide();
                } else if (result.error === 'empty') {
                    console.log('empty');
                }
                toggleLoader(false, ['#searchPatient', '#validatePatient']);
            },
            error: () => {
                showError("Une erreur est survenue, réessayez !");
                toggleLoader(false, ['#searchPatient', '#validatePatient']);
            }
        });
    });

    $('#validateCommande').on('click', () => {
        toggleLoader(true, ['#validateCommande']);
        $.ajax({
            method: 'POST',
            url: '/app/consommation_patient/addDemande',
            success: (result) => {
                if (result.success) {
                    location.reload();
                } else if (result.failed) {
                    showError("Pas d'articles sélectionnés",'specific');
                    toggleLoader(false, ['#validateCommande']);
                }
            },
            error: () => {
                toggleLoader(false, ['#validateCommande']);
            }
        });
    });

    const getDemandeBySearch = (searchTerm, date) => {
        toggleLoader(true);
        $('.demandes').hide();
        if (currentRequest !== null) {
            currentRequest.abort();
        }
        currentRequest = $.ajax({
            type: "POST",
            url: "/app/suivi/commande/byfilter",
            data: {
                search: searchTerm,
                service: null,
                date: date,
                consomPatient: 1
            },
            success: (result) => {
                $("#demData").empty().append(result);
                toggleLoader(false);
                $('.demandes').show();
            }
        });
    };

    $('#demandes').on('click', () => {
        getDemandeBySearch(null, null);
    });

    $('#date').on('change', () => {
        let searchTerm = $('#demmande-search').val();
        let date = $('#date').val();
        getDemandeBySearch(searchTerm, date);
    });

    $('body').on('click', '.consomCard', (event) => {
        let demandId = $(event.currentTarget).data('demand-id');
        let card = $(event.currentTarget);
        $('#demandes-view').hide();
        $('#details-view').show();
        $('#detailDI').text(card.find('.text-center-custom-modal:eq(0)').text());
        $('#detailIPP').text(card.find('.text-center-custom-modal:eq(1)').text());
        $('#detailPatient').text(card.find('.text-center-custom-modal:eq(2)').text());
        $('#detailDate').text('Date d’hospitalisation: ' + card.find('.text-center-custom-modal:eq(3)').text());
        $('#detailTotal').text(card.find('.total-amount-custom-modal').text());
        $('#product-list').html('Chargement...');

        $.ajax({
            url: '/app/suivi/commande/detail/' + demandId,
            method: 'POST',
            data: {
                service: $('#service').val()
            },
            success: function (response) {
                $('#product-list').html(response);
            },
            error: function () {
                showError("Une erreur s'est produite lors du chargement des détails.");
            }
        });
    });

    $('#back-to-demandes').on('click', function () {
        $('#details-view').hide();
        $('#demandes-view').show();
    });

});
