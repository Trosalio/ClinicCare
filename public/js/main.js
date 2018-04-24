$(document).ready(function () {
    $('[data-toggle="tooltip"]').tooltip();

    !function (e) {
        "use strict";
        e('.navbar-sidenav [data-toggle="tooltip"]').tooltip({
            template: '<div class="tooltip navbar-sidenav-tooltip" role="tooltip" style="pointer-events: none;"><div class="arrow"></div><div class="tooltip-inner"></div></div>'
        }),
            e("#sidenavToggler").click(function (o) {
                o.preventDefault(),
                    e("body").toggleClass("sidenav-toggled"),
                    e(".navbar-sidenav .nav-link-collapse").addClass("collapsed"),
                    e(".navbar-sidenav .sidenav-second-level, .navbar-sidenav .sidenav-third-level").removeClass("show")
            }),
            e(".navbar-sidenav .nav-link-collapse").click(function (o) {
                o.preventDefault(),
                    e("body").removeClass("sidenav-toggled")
            }),
            e("body.fixed-nav .navbar-sidenav, body.fixed-nav .sidenav-toggler, body.fixed-nav .navbar-collapse").on("mousewheel DOMMouseScroll", function (e) {
                var o = e.originalEvent
                    , t = o.wheelDelta || -o.detail;
                this.scrollTop += 30 * (t < 0 ? 1 : -1),
                    e.preventDefault()
            })
    }(jQuery);
});