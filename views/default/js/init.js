// Semicolon (;) to ensure closing of earlier scripting
// Encapsulation
// $ is assigned to jQuery
;(function($) {

     // DOM Ready
    $(function() {

        // Binding a click event
        // From jQuery v.1.7.0 use .on() instead of .bind()
        $('#js-open-auth').bind('click', function(e) {

            // Prevents the default action to be triggered. 
            e.preventDefault();

            // Triggering bPopup when click event is fired
            $('#js-auth-modal').bPopup({
                closeClass: 'b-close',
                modalClose: false,
                easing: 'easeInOutCubic', //uses jQuery easing plugin
                speed: 600,
                transition: 'slideDown',
                transitionClose: 'slideDown',
                escClose: true
            });
        });
        $('.js-open-reg').bind('click', function(e) {
                // Prevents the default action to be triggered. 
                e.preventDefault();

                // Triggering bPopup when click event is fired
                $('#js-registration-modal').bPopup({
                    //closeClass: 'b-close',
                    modalClose: false,
                    easing: 'easeInOutCubic', //uses jQuery easing plugin
                    speed: 600,
                    transition: 'slideDown',
                    transitionClose: 'slideDown',
                    escClose: true
                });
        });

        $('.js-open-call-me').bind('click', function(e) {
                // Prevents the default action to be triggered. 
                e.preventDefault();

                // Triggering bPopup when click event is fired
                $('#js-callme-modal').bPopup({
                    //closeClass: 'b-close',
                    modalClose: false,
                    easing: 'easeInOutCubic', //uses jQuery easing plugin
                    speed: 600,
                    transition: 'slideDown',
                    transitionClose: 'slideDown',
                    escClose: true
                });
        });
        //phone mask
        $("#js-inputphone").mask("+380 (99) 999-99-99");
        $("#js-callme-phone").mask("+380 (99) 999-99-99");


    });

})(jQuery);