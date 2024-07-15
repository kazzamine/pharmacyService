import { Modal } from 'bootstrap/dist/js/bootstrap.bundle.js';

 $(document).ready(function() {
    const modalElement = document.getElementById('servicesModal');
    const modal = Modal.getInstance(modalElement) || new Modal(modalElement);
    modal.show();
});