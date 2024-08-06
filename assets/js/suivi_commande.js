
$(document).ready(function() {
   let currentRequest = null;
   if (currentRequest !== null) {
    currentRequest.abort();
}

   //search product by info
   const getDemandeBySearch=(searchTerm,service,date)=>{

         $('#loader').show();
       
       // Cancel previous request, if any
      if (currentRequest !== null) {
          currentRequest.abort();
      }

       currentRequest=$.ajax({
          type: "POST",
          url:"/suivi/commande/byfilter",
          data:{
              search:searchTerm,
              service:service,
              date:date,
              consomPatient:0
          },
          success:(result)=>{
              $(".demandes").empty().append(result);
              $('#loader').hide();
           
          }
      })
      }

      $(document).on('click', '.consomCard, .custom-link', function() {
        let demandCabID = $(this).data('demand-id');
        let modalBody = $('#product-list-' + demandCabID);
        console.log(demandCabID);
    
        // Check if the products have already been loaded to avoid redundant requests
        $.ajax({
            type: "POST",
            url: "/suivi/commande/detail/" + demandCabID,
            success: function(result) {
                modalBody.html(result); // Append the product list HTML to the modal body
            },
            error: function() {
                alert('Failed to load details.');
            }
        });
    });
    
    
      
   $('#demmande-search').on('keyup',()=>{
       let searchTerm= $('#demmande-search').val();
       let service= $('#service').val();
       let date= $('#date').val();
       getDemandeBySearch(searchTerm,service,date);
   })

   $('#date').on('change',()=>{
    let searchTerm= $('#demmande-search').val();
    let service= $('#service').val();
    let date= $('#date').val();
    getDemandeBySearch(searchTerm,service,date);
})
$('#service').on('change',()=>{
    let searchTerm= $('#demmande-search').val();
    let service= $('#service').val();
    let date= $('#date').val();
    getDemandeBySearch(searchTerm,service,date);
})
  
});