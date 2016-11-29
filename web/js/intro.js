var app = (function ($, document, app) {
    var app = app || {};
    var helper = {};

    app.initIntroSlider = function () {
        $('.carousel.carousel-slider').carousel({full_width: true, no_wrap: true});
        $('.intro .next').on('click', function (e) {
            $('.carousel.carousel-slider').carousel('next');
        });
    }

    return app;
})($, document, app);

$(document).ready(function () {
    console.log(app.name);
    app.initIntroSlider();
});