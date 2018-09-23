define([
    'jquery'
], function ($) {
    $(document).on('click', '.lb-video .lb-media__btn', function () {
        var $this = $(this),
            $media_wrap = $this.parents('.lb-video'),
            $media = $media_wrap.find('video'),
            media = $media.get(0);

        if(media.paused) {
            media.play();
            $media.attr('controls', 'controls');
            $this.fadeOut();
        }
    });

    $(document).on('click', '.lb-audio .lb-media__btn', function () {
        var $this = $(this),
            $media_wrap = $this.parents('.lb-audio'),
            $media = $media_wrap.find('audio'),
            media = $media.get(0);

        if(media.paused) {
            $media_wrap.addClass('playing');
            media.play();
        } else {
            $media_wrap.removeClass('playing');
            media.pause();
            media.currentTime = 0;
        }

    });
});
