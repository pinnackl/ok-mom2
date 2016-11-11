// Export app module
var app = (function ($, document) {
    console.info("Our app is ready to rock!");
    var app = {};

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

    app.

    return app;
})($, document);

$(document).ready(function () {
    // Init the side nave, also do some A11y
    app.initSideNav();
});