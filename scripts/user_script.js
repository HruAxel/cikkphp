$(window).ready(function () {
    let width = $(window).width();
    if (width < 1024) {
        $("#main_text").off('click');
        $("#main_text").on('click', function () {
            $(".item").slideToggle(500);
        })
        
    }
});