define([
    'jquery',
    'plugins/datePicker'
], function ($) {
    var calend_act = false;

    $('.lb-content-head__btn-calendar > i').on('click', function () {
        var $this = $(this).parents('.lb-content-head__btn-calendar'),
            $calend = $('.lb-calendar__datepicker');

        if(calend_act) return;

        if($this.hasClass('active')) {
            $('.lb-calendar__close').trigger('click');
            return;
        }

        calend_act = true;

        $('.mfp-bg').trigger('click');

        var $bg = $('<div>').addClass('mfp-bg mfp-with-zoom lb-calend__bg');

        $this.addClass('active');

        $('.lb-calendar').stop().fadeIn();

        $calend.find('.datepicker').empty().remove();

        $calend.DatePicker({
            flat: true,
            date: ['2017-09-01'],
            current: '2017-09-01',
            mode: 'multiple'
        });

        $('body').append($bg);

        setTimeout(function () {
            $bg.addClass('mfp-ready');
            calend_act = false;
        }, 0);
    });

    $(document).on('click', '.lb-calendar__close, .lb-calend__bg', function () {
        if(calend_act) return;

        calend_act = true;

        $('.lb-calendar').stop().hide();

        $('.lb-calend__bg').remove();

        $('.lb-content-head__btn-calendar').removeClass('active');

        calend_act = false;
    });
});
