$(document).ready(function() {
    $('.js-open-block-edit').each(function() {
        $(this).on('click', function (e) {
            e.preventDefault();
            $(this).next().show();
        });
    });

    $('.js-close-block-edit').each(function() {
        $(this).on('click', function () {
            $(this).parent('.js-block-edit').hide();
        });
    });
});