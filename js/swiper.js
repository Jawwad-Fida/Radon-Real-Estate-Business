/*
Author       : Code-Theme
Template Name: Find Houses - HTML5 Template
Version      : 1.0
*/

(function ($) {
    "use strict";
    var Inland = {
        initialised: false,
        version: 1.0,
        mobile: false,
        init: function () {

            if (!this.initialised) {
                this.initialised = true;
            } else {
                return;
            }

            /*-------------- Inland Design Functions Calling ---------------------------------------------------
            ------------------------------------------------------------------------------------------------*/
            this.BannerSlider();

        },

        /*-------------- Inland Design Functions Calling ---------------------------------------------------
        ---------------------------------------------------------------------------------------------------*/

        // start swippper slider
        BannerSlider: function () {
            var swiper = new Swiper('.banner_box_wrapper .swiper-container', {
                speed: 1000,
                loop: true,
                autoplay: false,
                slidesPerView: 1,
                navigation: {
                    nextEl: '.banner_box_wrapper .swiper-button-next',
                    prevEl: '.banner_box_wrapper .swiper-button-prev',
                },

            });
        },
        // End Swipper Slider

    };
    Inland.init();

}(jQuery));
