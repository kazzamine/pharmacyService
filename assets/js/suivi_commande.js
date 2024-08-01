
$(document).ready(function() {
   let currentRequest = null;
   if (currentRequest !== null) {
    currentRequest.abort();
}

   //search product by info
   const getDemandeBySearch=(searchTerm,service,date)=>{

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
              service:service,
              date:date,
              consomPatient:0
          },
          success:(result)=>{
              $(".demandes").empty().append(result);
              $('.loader').hide();
            $('.demandes').show();
          }
      })
      }

      
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