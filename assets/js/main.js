$( document ).ready(function() {
    $('.header__trigger').on('click', function() {
        $(this).toggleClass('header__trigger--active');
        $('.menu-menu-container').toggleClass('menu-menu-container--active');
    });
})

$('img').on('dragstart', function(event) { event.preventDefault(); });