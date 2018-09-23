define([
    'jquery'
], function ($) {
    var avatar_act = false;

    $('.lb-header__avatar').on('click', function () {
        if(avatar_act || $(this).hasClass('active')) return;

        avatar_act = true;

        $('.mfp-bg').trigger('click');

        var $bg = $('<div>').addClass('mfp-bg mfp-with-zoom lb-avatar__bg');

        $(this).addClass('active');

        $('.lb-user').stop().fadeIn();

        $('body').append($bg);

        setTimeout(function () {
            $bg.addClass('mfp-ready');
            avatar_act = false;
        }, 0);
    });

    $(document).on('click', '.lb-user__close, .lb-avatar__bg', function () {
        if(avatar_act) return;

        avatar_act = true;

        $('.lb-user').stop().hide();

        $('.lb-avatar__bg').remove();

        $('.lb-header__avatar').removeClass('active');

        avatar_act = false;
    });

    $('.lb-header__btn-like, .lb-header__btn-comment, .lb-header__btn-notification').on('click', function (e) {
        $('.lb-header__avatar').trigger('click');

        e.preventDefault();
        return false;
    });
});
