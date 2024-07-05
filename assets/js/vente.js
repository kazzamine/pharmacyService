import $ from 'jquery';
import { Modal } from 'bootstrap/dist/js/bootstrap.bundle.js';


$(document).ready(function() {
    let selectedCard;

    $('.produit').click(function() {
        selectedCard = $(this);
    });

    $('#confirmQuantity').click(function() {
        const quantity = $('#quantityInput').val();
        if (quantity && selectedCard) {
            const quantityBadge = selectedCard.find('.quantity-badge');
            quantityBadge.text(quantity);
            quantityBadge.removeClass('d-none');
            
           $('#qteModal').modal('hide')
            // let modal = new Modal($('#qteModal'));
            // console.log(modal)
            // modal.hide();
        }else if(quantity==''){
            const quantityBadge = selectedCard.find('.quantity-badge');
            quantityBadge.text(quantity);
            quantityBadge.addClass('d-none');

            const modal = new Modal(document.getElementById('qteModal'));
           
            modal.hide();
        }
    });
});