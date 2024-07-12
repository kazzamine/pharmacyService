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
        } else if (quantity === '') {
            const quantityBadge = selectedCard.find('.quantity-badge');
            quantityBadge.text('0');
            quantityBadge.addClass('d-none');
        }

        const modalElement = document.getElementById('qteModal');
        const modal = Modal.getInstance(modalElement) || new Modal(modalElement);
        modal.hide();
    });
});