$(document).ready(function() {
    $('.js-open-block-edit').each(function() {
        $(this).on('click', function (e) {
            e.preventDefault();
            $(this).next().show();
            console.log('lala');
        });
    });

    $('.js-close-block-edit').each(function() {
        $(this).on('click', function () {
            $(this).parent('.js-block-edit').hide();
        });
    });
});