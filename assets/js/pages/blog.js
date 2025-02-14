$(document).ready(function() {
    let current_page = 1;

    $('.blog__more').on('click', function () {
        let button = $(this);
        let data = {
            'action': 'load_more_posts',
            'page': current_page
        };

        button.attr('disabled', true).text('Carregando...');

        $.ajax({
            url: ajax_object.ajax_url,
            method: 'POST',
            data: data,
            success: function (response) {
                if (response.trim()) {
                    $('.blog__more').before(response);
                    current_page++;
                    button.attr('disabled', false).text('Carregar mais');
                } else {
                    button.text('Sem mais postagens').attr('disabled', true);
                }
            },
            error: function () {
                button.attr('disabled', false).text('Tente novamente');
            }
        });
    });
})
