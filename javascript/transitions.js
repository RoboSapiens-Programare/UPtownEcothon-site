'use strict';

/**
 * Gets computed translate values
 * @param {HTMLElement} element
 * @returns {Object}
 */
function getTranslateValues(element) {
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
    slide2DPercentageParent: function(elem, func, duration, toX, toY) {
        let start = Date.now();

        var fromX, fromY;

        if (isNaN(parseFloat(elem.style.left))) {
            fromX = (elem.offsetLeft / elem.parentElement.clientWidth) * 100;
        } else {
            fromX = parseFloat(elem.style.left);
        }

        if (isNaN(parseFloat(elem.style.top))) {
            fromY = (elem.offsetTop / elem.parentElement.clientHeight) * 100;
        } else {
            fromY = parseFloat(elem.style.top);
        }

        //alert(fromX + ", " + fromY);

        function tick() {
            let now = Date.now();
            let elapsed = now - start;
            let valX = func(elapsed, fromX, toX, duration);
            let valY = func(elapsed, fromY, toY, duration);

            elem.style.left = valX + "%";
            elem.style.top = valY + "%";

            if (elapsed < duration) {
                requestAnimationFrame(tick);
            } else {
                elem.style.left = toX + "%";
                elem.style.top = toY + "%";
            }

        }

        requestAnimationFrame(tick);
    },

    //toX/toY - final coordinates
    slide2DAbsoluteParent: function(elem, func, duration, toX, toY) {
        let start = Date.now();
        var fromX = parseFloat(getTranslateValues(elem).x) || 0;
        var fromY = parseFloat(getTranslateValues(elem).y) || 0;

        toX = (toX / 100) * elem.parentElement.clientWidth - elem.offsetLeft;
        toY = (toY / 100) * elem.parentElement.clientHeight - elem.offsetTop;


        //alert(toX + ", " + toY);
        //alert(fromX + ", " + fromY);

        function tick() {
            let now = Date.now();
            let elapsed = now - start;
            let valX = func(elapsed, fromX, toX, duration);
            let valY = func(elapsed, fromY, toY, duration);

            var translate = "translate(" + valX + "px, " + valY + "px)";
            //var translate = "aa";

            elem.style.transform = translate;
            //alert(elem.style.transform);
            if (elapsed < duration) {
                requestAnimationFrame(tick);
            }

        }

        requestAnimationFrame(tick);
    },

    fadeIn: function(elem, func, duration) {
        let start = Date.now();

        var from;
        if (isNaN(parseFloat(elem.style.opacity))) {
            from = 0;
        } else {
            from = parseFloat(elem.style.opacity);
        }
        var to = 1.0;

        function tick() {
            let now = Date.now();
            let elapsed = now - start;
            let val = func(elapsed, from, to, duration);

            elem.style.opacity = val;

            if (elapsed < duration) {
                requestAnimationFrame(tick);
            } else {
                elem.style.opacity = to;
            }
        }

        requestAnimationFrame(tick);
    },

    fadeOut: function(elem, func, duration) {
        let start = Date.now();

        var from;
        if (isNaN(parseFloat(elem.style.opacity))) {
            from = 1;
        } else {
            from = parseFloat(elem.style.opacity);
        }
        var to = 0;

        function tick() {
            let now = Date.now();
            let elapsed = now - start;
            let val = func(elapsed, from, to, duration);

            elem.style.opacity = val;

            if (elapsed < duration) {
                requestAnimationFrame(tick);
            } else {
                elem.style.opacity = to;
            }
        }

        requestAnimationFrame(tick);
    },

    scaleUniform: function(elem, func, to, duration) {
        let start = Date.now();

        var from;
        if (isNaN(parseFloat(elem.style.scale))) {
            from = 1;
        } else {
            from = parseFloat(elem.style.scale);
        }
    
        //Luam valorile initiale ale marginilor
        var from_margin_x, from_margin_y;
        if (isNaN(parseFloat(elem.style.marginLeft))) {
            from_margin_x = 0;
        } else {
            from_margin_x = parseFloat(elem.style.marginLeft);
        }
        if (isNaN(parseFloat(elem.style.marginTop))) {
            from_margin_y = 0;
        } else {
            from_margin_y = parseFloat(elem.style.marginTop);
        }

        var to_margin_x = (((elem.clientWidth * to) - elem.clientWidth) / 2);
        var to_margin_y = (((elem.clientHeight * to) - elem.clientHeight) / 2);

        function tick() {
            let now = Date.now();
            let elapsed = now - start;
            let val = func(elapsed, from, to, duration);
            let mx = func(elapsed, from_margin_x, to_margin_x, duration);
            let my = func(elapsed, from_margin_y, to_margin_y, duration);

            elem.style.scale = val;

            elem.style.marginTop = my + 'px';
            elem.style.marginBottom = my + 'px';

            elem.style.marginLeft = mx + 'px';
            elem.style.marginRight = mx + 'px';

            if (elapsed < duration) {
                requestAnimationFrame(tick);
            }
        }

        requestAnimationFrame(tick);
    },

    scale2D: function(elem, func, duration, fromX, fromY, toX, toY) {
        let start = Date.now();

        function tick() {
            let now = Date.now();
            let elapsed = now - start;
            let valX = func(elapsed, fromX, toX, duration);
            let valY = func(elapsed, fromY, toY, duration);
            
            elem.style.transform = "scale("+ valX + ", " + valY + ")";

            if (elapsed < duration) {
                requestAnimationFrame(tick);
            }
        }

        requestAnimationFrame(tick);
    },

    resize2DViewport: function(elem, func, toWidth, toHeight, duration) {
        let start = Date.now();

        var fromWidth = parseFloat(elem.style.width) || 0;
        var fromHeight = parseFloat(elem.style.height) || 0;

        function tick() {
            let now = Date.now();
            let elapsed = now - start;
            let width = func(elapsed, fromWidth, toWidth, duration);
            let height = func(elapsed, fromHeight, toHeight, duration);

            elem.style.width = width + 'vw';
            elem.style.height = height + 'vh';

            if (elapsed < duration) {
                requestAnimationFrame(tick);
            }
        }

        requestAnimationFrame(tick);
    }

};

//module.exports = transitions;