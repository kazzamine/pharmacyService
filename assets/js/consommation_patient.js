 import { Modal } from 'bootstrap/dist/js/bootstrap.bundle.js';
 $(document).ready(function() {
    let currentRequest = null;

    const modalElement = document.getElementById('infoPatient');
    const modal = Modal.getInstance(modalElement) || new Modal(modalElement);
    modal.show();


   
    $('body').on('click', '.produit',(event)=> {
        let articleId =$(event.currentTarget).data('id');
        let articleQuantity = $(event.currentTarget).data('quantity');
        
        $('#article_id').val(articleId);
        $('#quantityInput').val('');
    });

   $('body').on('click','#confirmQuantity', () =>{
        let articleId = $('#article_id').val();
        let quantity = $('#quantityInput').val();
        if (quantity > 0) {
            let $article = $('.produit[data-id="' + articleId + '"]');
            let $quantityBadge = $article.find('.quantity-badge');
            $quantityBadge.text(quantity).removeClass('d-none');
           
        } else {
            let $article = $('.produit[data-id="' + articleId + '"]');
            let $quantityBadge = $article.find('.quantity-badge');            
            $quantityBadge.text('0').addClass('d-none');
        }
        const modal = Modal.getInstance($('#qteModal')) || new Modal($('#qteModal'));
        modal.hide();
    });

    //articles by selected categorie
    const getArticleByFam=(id)=>{
        if (currentRequest !== null) {
            currentRequest.abort();
        }

         currentRequest=$.ajax({
            type: "POST",
            url:"/consommation_patient/byfam",
            data:{
                famId:id
            },
            success:(result)=>{
                $(".row-produit").empty().append(result)
            }
        })

        }
    //on famille click
    $('body').on('click','.cat-title',(event)=>{
        let familleID=$(event.currentTarget).attr('id');
        getArticleByFam(familleID)
    })


    //search product by info
    const getArticleBySearch=(searchTerm)=>{
       if (currentRequest !== null) {
           currentRequest.abort();
       }

        currentRequest=$.ajax({
           type: "POST",
           url:"/consommation_patient/bySearch",
           data:{
               search:searchTerm
           },
           success:(result)=>{
               $(".row-produit").empty().append(result);
           }
       })
       }

       
    $('#articleSearch').on('keyup',()=>{
        let searchTerm= $('#articleSearch').val();
        getArticleBySearch(searchTerm);
    })

});