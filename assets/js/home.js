import { Modal } from 'bootstrap/dist/js/bootstrap.bundle.js';
 $(document).ready(function() {

    $('#changeDossier').on('click',()=>{
        const modalElement = document.getElementById('serviceModal');
        const modal = Modal.getInstance(modalElement) || new Modal(modalElement);
        modal.show();
    })
    

    $('#serviceSelect').on('change',()=>{
        let serviceValue=$('#serviceSelect').val();
        if(serviceValue){
            $.ajax({
                type: "POST",
                url:  "/home/choseService/"+serviceValue,
                
                success: function (result) {   
                  
                    location.reload();
                },
                cache: false,
                contentType: false,
                processData: false
            }); 
            modal.hide();
            // console.log(serviceValue)
        }else{
            console.log('no data selected')
        }
        
    })
    const modalElement = document.getElementById('servicesModal');
    const modal = Modal.getInstance(modalElement) || new Modal(modalElement);
    modal.show();

   
   
});