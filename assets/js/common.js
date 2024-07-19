$(document).ready(function() {
    let currentRequest = null;
 //search famille by info
 const getFamilleBySearch=(searchTerm)=>{
    // Cancel previous request, if any
   if (currentRequest !== null) {
       currentRequest.abort();
   }

    currentRequest=$.ajax({
       type: "POST",
       url:"/famille/bySearch",
       data:{
           search:searchTerm
       },
       success:(result)=>{
           $("#famille-card").empty().append(result);
       }
   })
   }

   
$('#familleSearch').on('keyup',()=>{
    let searchTerm= $('#familleSearch').val();
    console.log(searchTerm)
    getFamilleBySearch(searchTerm);
})
});