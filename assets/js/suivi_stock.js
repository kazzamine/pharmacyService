import { Modal } from 'bootstrap/dist/js/bootstrap.bundle.js';

$(document).ready(function() {

   let currentRequest = null;
   $('body').on('click', '.produit',(event)=> {
    let articleId =$(event.currentTarget).data('id');
    
    $('#article_id').val(articleId);

    if (currentRequest !== null) {
        currentRequest.abort();
    }

     currentRequest=$.ajax({
        type: "POST",
        url:"/suivi_stock/articleDet",
        data:{
            articleID:articleId
        },
        success:(result)=>{
          $('#artTitre').text(result.titre)
          $('#artDesc').text(result.description)
          if(result.description=='null'){
            $('#artDesc').text('')
          }
          $('#artfamile').text(result.famille)
          
          $('#artCode').text(result.code_barre)
          if(result.description=='null'){
            $('#artCode').text('')
          }
        }
    })


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
   $('body').on('click', '.sideCat', (event) => {
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