// Export app module
var app = (function ($, document, app) {
    console.info("Our app is ready to rock!");
    var app = app || {};
    var helper = {};

    app.name = "OK-Mom";

    app.initSideNav = function () {
        $('.button-collapse').sideNav({
                menuWidth: 300, // Default is 240
                edge: 'left', // Choose the horizontal origin
                closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
                draggable: true // Choose whether you can drag to open on touch screens
            }
        );

        $('.button-collapse').click(function () {
            $('.side-menu a').first().focus();
        });
    };

    app.initDaySlider = function () {
        var idx = $('.tasks .carousel .active').index();
        var $carousel = $('.tasks .carousel');
            $carousel.carousel({full_width: true});
            $carousel.carousel('set', idx);

        helper.addListener($('.pagination.datetime .prev'), 'click', function (e) {
            $carousel.carousel('prev');
        });
        helper.addListener($('.pagination.datetime .next'), 'click', function (e) {
            $carousel.carousel('next');
        });
    };

    helper.addListener = function ($item, event, callable) {
        var callable = typeof callable !== 'undefined' ? callable : function () {};
        if ($item.length == 0) {
            return;
        }

        $item.on(event, callable);
    };

    return app;
})($, document, app);

$(document).ready(function () {
    // Init the side nave, also do some A11y
    app.initSideNav();

    // Init the day slider
    app.initDaySlider();

    $('.datepicker').pickadate({
        format: 'yyyy-mm-dd',
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 15, // Creates a dropdown of 15 years to control year
    });

    $('.clockpicker').clockpicker();
    $('select').material_select();
});