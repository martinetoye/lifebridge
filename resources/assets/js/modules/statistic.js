define([
    'jquery'
], function () {
    var stat_act = false;

    $('.lb-section__btn-stat').on('click', function () {
        if(stat_act || $(this).hasClass('active')) return;

        stat_act = true;

        $('.mfp-bg').trigger('click');

        var $bg = $('<div>').addClass('mfp-bg mfp-with-zoom lb-statistic__bg');

        $(this).addClass('active');

        $('.lb-statistic, .lb-statistic__arrow').stop().fadeIn();

        $('body').append($bg);

        setTimeout(function () {
            $bg.addClass('mfp-ready');
            stat_act = false;
        }, 0);
    });

    $(document).on('click', '.lb-statistic__close, .lb-statistic__bg', function () {
        if(stat_act) return;

        stat_act = true;

        $('.lb-statistic, .lb-statistic__arrow').stop().hide();

        $('.lb-statistic__bg').remove();

        $('.lb-section__btn-stat').removeClass('active');

        stat_act = false;
    });
});
