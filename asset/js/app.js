$(document).ready(function () {
    var max_val = $('.slider-input').attr('max');
    var trigger = $('.hamburger'),
        overlay = $('.overlay'),
        isClosed = false;

    trigger.click(function () {
        hamburger_cross();
    });

    function hamburger_cross() {

        if (isClosed == true) {
            overlay.hide();
            trigger.removeClass('is-open');
            trigger.addClass('is-closed');
            isClosed = false;
        } else {
            overlay.show();
            trigger.removeClass('is-closed');
            trigger.addClass('is-open');
            isClosed = true;
        }
    }

    $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
    });
});


"use strict";

var volumeSlider = document.getElementById("volume");
var scrubberSlider = document.getElementById("scrubber");
var landSlider = document.getElementById("land");
var areaSlider = document.getElementById("area");
var sliders = [volumeSlider, scrubberSlider];
var other_sliders = [landSlider, areaSlider];

function Slider(slider) {
    this.slider = slider;
    slider.addEventListener(
        "input",
        function () {
            this.updateSliderOutput();
            this.updateSliderLevel();
        }.bind(this),
        false
    );

    this.level = function () {
        var level = this.slider.querySelector(".slider-input");
        return level.value;
    };

    this.levelString = function () {
        return parseInt(this.level());
    };

    this.remaining = function () {
        // return 99.5 - this.level();
        return 99999.5 - this.level();
    };

    this.remainingString = function () {
        return parseInt(this.remaining());
    };

    this.updateSliderOutput = function () {
        var output = this.slider.querySelector(".slider-output");
        var remaining = this.slider.querySelector(".slider-remaining");
        var thumb = this.slider.querySelector(".slider-thumb");
        output.value = '$' + parseInt(this.levelString()).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1,");
        output.style.left = this.levelString();
        var perc = this.levelString() * 100 / 100000;
        console.log(perc);
        thumb.style.left = perc + "%";
        if (remaining) {
            remaining.style.width = this.remainingString() + "%";
        }
    };

    this.updateSlider = function (num) {
        var input = this.slider.querySelector(".slider-input");
        input.value = num;
    };

    this.updateSliderLevel = function () {
        var level = this.slider.querySelector(".slider-level");
        var perc = this.levelString() * 100 / 100000;
        level.style.width = perc + "%";
    };
}

function otherSlider(slider) {
    this.slider = slider;
    slider.addEventListener(
        "input",
        function () {
            this.updateSliderOutput1();
            this.updateSliderLevel1();
        }.bind(this),
        false
    );

    this.level1 = function () {
        var level = this.slider.querySelector(".slider-input");
        return level.value;
    };

    this.levelString1 = function () {
        return parseInt(this.level1());
    };

    this.remaining1 = function () {
        // return 99.5 - this.level();
        return 9999.5 - this.level1();
    };

    this.remainingString1 = function () {
        return parseInt(this.remaining1());
    };

    this.updateSliderOutput1 = function () {
        var output = this.slider.querySelector(".slider-output");
        var remaining = this.slider.querySelector(".slider-remaining");
        var thumb = this.slider.querySelector(".slider-thumb");
        output.value = parseInt(this.levelString1()).toFixed(0).replace(/(\d)(?=(\d\d\d)+(?!\d))/g, "$1");
        var perc = this.levelString1() * 100 / 10000;
        thumb.style.left = perc + "%";
        if (remaining) {
            remaining.style.width = this.remainingString1() + "%";
        }
    };

    this.updateSlider1 = function (num) {
        var input = this.slider.querySelector(".slider-input");
        input.value = num;
    };

    this.updateSliderLevel1 = function () {
        var level = this.slider.querySelector(".slider-level");
        var perc = this.levelString1() * 100 / 10000;
        level.style.width = perc + "%";
    };
}

sliders.forEach(function (slider) {
    new Slider(slider);
});

other_sliders.forEach(function (slider) {
    new otherSlider(slider);
});
