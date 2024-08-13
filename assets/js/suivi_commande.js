$(document).ready(function() {
    let currentRequest = null;
    let currentPage = 1; 
    const limit = 28;

    if (currentRequest !== null) {
        currentRequest.abort();
    }

    $('#service').select2({
        placeholder: "Service",
        allowClear: true
    });

    const getDemandeBySearch = (searchTerm, service, date, page = 1) => {
       
        const offset = (page - 1) * limit;

        // Cancel previous request, if any
        if (currentRequest !== null) {
            currentRequest.abort();
        }
        $('#loader').show();
        currentRequest = $.ajax({
            type: "POST",
            url: "/app/suivi/commande/byfilter",
            data: {
                search: searchTerm,
                service: service,
                date: date,
                consomPatient: 0,
                limit: limit,
                offset: offset
            },
            success: (result) => {
                $(".demandes").empty().append(result);
                currentPage = page; 
                $('#loader').hide();
            }
        });
    };

    $(document).on('click', '#prevPage', function() {
        if (currentPage > 1) {
            getDemandeBySearch($('#demmande-search').val(), $('#service').val(), $('#date').val(), currentPage - 1);
        }
    });

    $(document).on('click', '#nextPage', function() {
        getDemandeBySearch($('#demmande-search').val(), $('#service').val(), $('#date').val(), currentPage + 1);
    });

    // Event listeners for search and filter changes
    $('#demmande-search').on('keyup', () => {
        getDemandeBySearch($('#demmande-search').val(), $('#service').val(), $('#date').val(), 1);
    });

    $('#date').on('change', () => {
        getDemandeBySearch($('#demmande-search').val(), $('#service').val(), $('#date').val(), 1); 
    });

    $('#service').on('change', () => {
        getDemandeBySearch($('#demmande-search').val(), $('#service').val(), $('#date').val(), 1); 
    });

    //demandes detail
    $(document).on('click', '.consomCard, .custom-link', function() {
        let demandCabID = $(this).data('demand-id');
        let modalBody = $('#product-list-' + demandCabID);

        $.ajax({
            type: "POST",
            url: "/app/suivi/commande/detail/" + demandCabID,
            success: function(result) {
                modalBody.html(result);
            },
            error: function() {
                alert('Failed to load details.');
            }
        });
    });
});