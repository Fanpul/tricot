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
                transitionClose: 'fadeOut',
                escClose: true,
                positionStyle: 'fixed'
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
                    transitionClose: 'fadeOut',
                    escClose: true,
                    positionStyle: 'fixed'
                });
        });

        $('.js-open-call-me').bind('click', function(e) {
                // Prevents the default action to be triggered. 
                e.preventDefault();

                // Triggering bPopup when click event is fired
                var callme = $('#js-callme-modal').bPopup({
                    //closeClass: 'b-close',
                    modalClose: false,
                    easing: 'easeInOutCubic', //uses jQuery easing plugin
                    speed: 600,
                    //transition: 'slideDown',
                    //transitionClose: 'slideDown',
                    escClose: true
                });
        });

        //Аякс отправка форм
        //Документация: http://api.jquery.com/jquery.ajax/
        $("#js-call-me-submit").submit(function() {
            $.ajax({
                type: "POST",
                url: "mail.php",
                data: $(this).serialize()
            }).done(function() {
            
            toastr.options = {
              "closeButton": true,
              "debug": false,
              "newestOnTop": false,
              "progressBar": false,
              "positionClass": "toast-bottom-center",
              "preventDuplicates": false,
              "onclick": null,
              "showDuration": "3000",
              "hideDuration": "5000",
              "timeOut": "5000",
              "extendedTimeOut": "5000",
              "showEasing": "swing",
              "hideEasing": "linear",
              "showMethod": "fadeIn",
              "hideMethod": "fadeOut"
            }
            toastr.info("Спасибо за заявку!", "Отправлено");
                setTimeout(function() {
                    $('#js-callme-modal').bPopup().close();
                }, 0);
            });
            return false;
        });

        //phone mask
        $("#js-inputphone").mask("+380 (99) 999-99-99");
        $("#js-callme-phone").mask("+380 (99) 999-99-99");

        // call me btn
        $('.call-me').delay( 1000 ).animate({"right": "0px"}, 500);

        // message auth ok
        var div = $('.message-container').is(':visible');
        if (div) {
            $('.message-container').delay( 2000 ).fadeOut();
        }
        console.log(div);
    });
})(jQuery);