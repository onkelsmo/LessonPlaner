(function( $ ) {

    $.fn.overlay = function( options ) {

        var overlay = "overlay";
        var overlaybackground = "overlaybg";

        /*
        var ie6 = false;
        if ($.browser.msie == true && $.browser.version == '6.0') {
            ie6 = true;
        }
        */

        function center_overlay_x() {
            var browser_width = document.documentElement.offsetWidth;
            if ((browser_width < $("#" + overlay).outerWidth() + 40) && !ie6) {
                $("#" + overlay).css({
                    'position': 'absolute',
                    'left': '10px',
                    'margin-left': '10px'
                })
            } else {
                $("#" + overlay).css({
                    'position': 'fixed',
                    'left': '50%',
                    'margin-left': - $("#" + overlay).outerWidth() / 2
                })
            }
        }

        function center_overlay_y() {
            var browser_height = document.documentElement.offsetHeight;

            if ((browser_height > $("#" + overlay).height() + 40) && !ie6) {
                $("#" + overlay).css({
                    'position': 'fixed',
                    'top': browser_height / 2 - $("#" + overlay).height() / 2
                })
            } else {
                $("#" + overlay).css({
                    'position': 'absolute',
                    'top': '20px'
                });
                $(window).scrollTop(0);
            }
        }

        function overlayposition() {
            center_overlay_x();
            center_overlay_y();
            /*
            if(ie6) {
                $("#" + overlaybackground).css({
                    'position': 'absolute',
                    'width': $("body").outerWidth(),
                    'height': document.documentElement.offsetHeight
                });
            }
            */
        }

        $(window).resize(function () {
            overlayposition();
        });

        function overlayclose() {
            $("#" + overlay + "," + "#" + overlaybackground).hide();
        }

        $(document).keydown(function (e) {
            if(e.keyCode == 27) {
                overlayclose();
            }
        });

        $("#" + overlaybackground).on("click", function(){
            overlayclose();
        });

        $("#" + overlay + " .closeoverlay").on("click", function(){
            overlayclose();
        });

        $("#" + overlay + "," + "#" + overlaybackground).show();
        overlayposition();

    };

})( jQuery );