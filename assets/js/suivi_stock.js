import { Modal } from 'bootstrap/dist/js/bootstrap.bundle.js';

$(document).ready(function() {
   let currentRequest = null;
   $('body').on('click', '.produit',(event)=> {
    let articleId =$(event.currentTarget).data('id');
    let articleQuantity = $(event.currentTarget).data('quantity');
    
    $('#article_id').val(articleId);
    $('#quantityInput').val('');
});
   //articles by selected categorie

   const getArticleByFam=(id)=>{
        // Cancel previous request, if any
       if (currentRequest !== null) {
           currentRequest.abort();
       }

        currentRequest=$.ajax({
           type: "POST",
           url:"/suivi_stock/byfam",
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
       // Cancel previous request, if any
      if (currentRequest !== null) {
          currentRequest.abort();
      }

       currentRequest=$.ajax({
          type: "POST",
          url:"/suivi_stock/bySearch",
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