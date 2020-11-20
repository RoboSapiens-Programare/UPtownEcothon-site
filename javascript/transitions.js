'use strict';

/**
 * Gets computed translate values
 * @param {HTMLElement} element
 * @returns {Object}
 */
function getTranslateValues (element) {
    const style = window.getComputedStyle(element)
    const matrix = style['transform'] || style.webkitTransform || style.mozTransform

    // No transform property. Simply return 0 values.
    if (matrix === 'none') {
        return {
            x: 0,
            y: 0,
            z: 0
        }
    }

    // Can either be 2d or 3d transform
    const matrixType = matrix.includes('3d') ? '3d' : '2d'
    const matrixValues = matrix.match(/matrix.*\((.+)\)/)[1].split(', ')

    // 2d matrices have 6 values
    // Last 2 values are X and Y.
    // 2d matrices does not have Z value.
    if (matrixType === '2d') {
        return {
            x: matrixValues[4],
            y: matrixValues[5],
            z: 0
        }
    }

    // 3d matrices have 16 values
    // The 13th, 14th, and 15th values are X, Y, and Z
    if (matrixType === '3d') {
        return {
            x: matrixValues[12],
            y: matrixValues[13],
            z: matrixValues[14]
        }
    }
}

//elem - element to modify; func - function to change by; duration - total duration of transition;
var transitions = {
    //toX/toY - final coordinates
    slide2D: function(elem, func, duration, toX, toY){
        let start = Date.now();
        var fromX = getTranslateValues(elem).x;
        var fromY = getTranslateValues(elem).y;

        toX = (toX/100) * elem.parentElement.clientWidth;
        toY = (toY/100) * elem.parentElement.clientHeight;

        function tick() {
            let now = Date.now();
            let elapsed = now - start;
            let valX = func(elapsed, fromX, toX, duration);
            let valY = func(elapsed, fromY, toY, duration);

            elem.style.transform = `translate(${valX}px, ${valY}px)`;

            if (elapsed < duration) {
                requestAnimationFrame(tick);
            }
        }

        requestAnimationFrame(tick);
    },

    fadeIn: function(elem, func, duration){
        let start = Date.now();

        var from = parseInt(elem.style.opacity);
        var to = 1.0;

        function tick() {
            let now = Date.now();
            let elapsed = now - start;
            let val = func(elapsed, from, to, duration);

            elem.style.opacity = val;

            if (elapsed < duration) {
                requestAnimationFrame(tick);
            }
        }

        requestAnimationFrame(tick);
    },

    fadeOut: function(elem, func, duration) {
        let start = Date.now();

        var from = parseInt(elem.style.opacity);
        var to = 0;

        function tick() {
            let now = Date.now();
            let elapsed = now - start;
            let val = func(elapsed, from, to, duration);

            elem.style.opacity = val;

            if (elapsed < duration) {
                requestAnimationFrame(tick);
            }
        }

        requestAnimationFrame(tick);
    }
  
};

module.exports = transitions;