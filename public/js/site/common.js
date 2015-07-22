var root;

$(function () {
    root = $('#root').attr('rel');
});

var wh;
$(document).ready(function () {
    wh = $(window).height();
    $("body").click(function (e) {
        $(".locations").hide();
        $(".search_content").hide();
        $(".appointment_modes .modes").hide();
    });
    $(".page_banner .filter,.page_banner .filter input,.page_banner .filter .appointment_modes .selected").click(function () {
        $(".page_banner .filter").animate({
            'top': '70px',
            'margin-top': '70px',
            'z-index': 15
        }, 200);
        $(".page_banner .filter").css('position', 'fixed')
        $(".popup").fadeIn();
    });
    $(".popup").click(function () {
        $(".page_banner .filter").animate({
            'top': '50%',
            'margin-top': '100px',
            'z-index': 0
        }, 200);
        $(".page_banner .filter").css('position', 'absolute')
        $(".popup").fadeOut();
    });
    $(".location_search input").click(function (e) {
        e.stopPropagation();
        $(this).next().animate({'opacity': 1}, 200);
        $(".locations").show();
        $(".search_content").hide();
        $(".appointment_modes .modes").hide();
    });
    $(".locations p").click(function () {
        var text = $(this).text();
        $(".location_search input").val(text);
    });
    $(".location_search input").blur(function () {
        $(this).next().animate({'opacity': 0.6}, 200);
    });
    $(".expert_search input").click(function (e) {
        e.stopPropagation();
        $(".search_content").show();
        $(".locations").hide();
        $(".appointment_modes .modes").hide();
    });
    $(".appointment_modes .selected").click(function (e) {
        e.stopPropagation();
        $(".appointment_modes .modes").toggle();
        $(".search_content").hide();
        $(".locations").hide();
    });
    $(".appointment_modes .modes p").click(function () {
        var text = $(this).html();
        $(".appointment_modes .selected p").html(text);
        $("input[name='mode']").val(text);
        $(".appointment_modes .modes").hide();
    });
    $(".search_content p").click(function () {
        var text = $(this).text();
        $(".expert_search input").val(text);
        $(".search_content").hide();
    });
    $(".how_it_works .close_hiw").click(function () {
        $(".how_it_works").slideUp();
    });
    $("a[rel='how_it_works']").click(function (e) {
        e.preventDefault();
        $(window).scrollTop(0);
        $(".how_it_works").slideDown();
    });

});
