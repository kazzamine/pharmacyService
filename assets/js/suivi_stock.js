import { Modal } from 'bootstrap/dist/js/bootstrap.bundle.js';

$(document).ready(function() {

    let currentRequest = null;

    const abortPreviousRequest = () => {
        if (currentRequest !== null) {
            currentRequest.abort();
            currentRequest = null;
        }
    };

    const handleArticleClick = (event) => {
        const articleId = $(event.currentTarget).data('id');
        $('#article_id').val(articleId);

        abortPreviousRequest();

        currentRequest = $.ajax({
            type: "POST",
            url: "/app/suivi_stock/articleDet",
            data: { articleID: articleId },
            success: (result) => {
                const { titre, description, famille, image, code_barre } = result;

                $('#artTitre').text(titre || '');
                $('#artDesc').text(description === 'null' ? '' : description);
                $('#artfamile').text(famille || '');

                if (image && image !== 'NULL') {
                    $('#artPic').html(`<img src="{{ asset('img/${image}') }}" class="img-fluid rounded" alt="Product Image" id="artImage">`);
                }

                $('#artCode').text(code_barre === 'null' ? '' : code_barre);
            }
        });
    };

    const getArticlesByFamily = (familleID) => {
        abortPreviousRequest();

        currentRequest = $.ajax({
            type: "POST",
            url: "/app/suivi_stock/byfam",
            data: { famId: familleID },
            success: (result) => {
                $(".row-produit").empty().append(result);
            }
        });
    };

    const getArticlesBySearch = (searchTerm) => {
        abortPreviousRequest();

        currentRequest = $.ajax({
            type: "POST",
            url: "/app/suivi_stock/bySearch",
            data: { search: searchTerm },
            success: (result) => {
                $(".row-produit").empty().append(result);
            }
        });
    };

    // Event Listeners
    $('body').on('click', '.produit', handleArticleClick);

    $('body').on('click', '.sideCat', (event) => {
        const familleID = $(event.currentTarget).attr('id');
        getArticlesByFamily(familleID);
    });

    $('#articleSearch').on('keyup', () => {
        const searchTerm = $('#articleSearch').val().trim();
        if (searchTerm.length > 0) {
            getArticlesBySearch(searchTerm);
        }
    });

});
