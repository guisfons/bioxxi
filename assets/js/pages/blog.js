$(document).ready(function() {
    loadMore()
    filtro()
})

function loadMore() {
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
}

function filtro() {
    $(".filtro__buscar").on("click", function (e) {
        e.preventDefault();

        let assunto = $("#assunto").val();
        let searchQuery = $("#search").val();

        $.ajax({
            url: ajax_object.ajax_url, // Defined via wp_localize_script
            type: "POST",
            data: {
                action: "filter_blog_posts",
                assunto: assunto,
                s: searchQuery,
            },
            beforeSend: function () {
                $(".filtro__buscar").text("Buscando...");
            },
            success: function (response) {
                $(".filtro__buscar").text("Buscar");
                $('.blog__container .blog__card').remove();
                $('.blog__more').before(response);
            },
            error: function () {
                $(".filtro__buscar").text("Buscar");
                alert("Erro ao buscar posts!");
            },
        });
    });
}