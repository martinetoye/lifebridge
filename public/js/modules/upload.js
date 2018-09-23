define([
    'require',
    'jquery',
    'plugins/magnificPopup',
], function (require) {

    var $ = require('jquery'),
        magnificPopup = require('plugins/magnificPopup');

    $('.lb-header__btn-upload').on('click', function (e) {
        $.magnificPopup.open({
            mainClass: 'mfp-with-zoom',
            removalDelay: 300,
            closeMarkup: '<button title="%title%" type="button" class="mfp-close icon-Cancel"></button>',
            items: [
                {
                    src: '.lb-upload',
                    type: 'inline',
                }
            ]
        });

        e.preventDefault();
        return false;
    });
});
