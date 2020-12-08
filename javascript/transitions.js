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

        var style = window.getComputedStyle(elem);

        if (!isNaN(parseFloat(elem.style.left))) {
            fromX = parseFloat(elem.style.left);
        } else if(!isNaN(parseFloat(style.getPropertyValue('left')))){
            fromX = parseFloat(style.getPropertyValue('left'));
        } else {
            fromX = (elem.offsetLeft / elem.parentElement.clientWidth) * 100;
        }

        if (!isNaN(parseFloat(elem.style.top))) {
            fromY = parseFloat(elem.style.top);
        } else if(!isNaN(parseFloat(style.getPropertyValue('top')))) {
            fromY = parseFloat(style.getPropertyValue('top'));
        } else {
            fromY = (elem.offsetTop / elem.parentElement.clientHeight) * 100;
        }

        

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

        var style = window.getComputedStyle(elem);

        if (!isNaN(parseFloat(elem.style.left))) {
            fromX = parseFloat(elem.style.left);
        } else if(!isNaN(parseFloat(style.getPropertyValue('left')))){
            fromX = parseFloat(style.getPropertyValue('left'));
        } else {
            fromX = 0;
        }

        if (!isNaN(parseFloat(elem.style.top))) {
            fromY = parseFloat(elem.style.top);
        } else if(!isNaN(parseFloat(style.getPropertyValue('top')))) {
            fromY = parseFloat(style.getPropertyValue('top'));
        } else {
            fromY = 0;
        }

        toX = (toX / 100) * elem.parentElement.clientWidth - elem.offsetLeft;
        toY = (toY / 100) * elem.parentElement.clientHeight - elem.offsetTop;

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
        var style = window.getComputedStyle(elem);

        if (!isNaN(parseFloat(elem.style.opacity))) {
            from = parseFloat(elem.style.opacity);
        } else if(!isNaN(parseFloat(style.getPropertyValue('opacity')))){
            from = parseFloat(style.getPropertyValue('opacity'))
        } else {
            from = 1;
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
        var style = window.getComputedStyle(elem);

        if (!isNaN(parseFloat(elem.style.opacity))) {
            from = parseFloat(elem.style.opacity);
        } else if(!isNaN(parseFloat(style.getPropertyValue('opacity')))){
            from = parseFloat(style.getPropertyValue('opacity'))
        } else {
            from = 1;
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
        var style = window.getComputedStyle(elem);

        if (!isNaN(parseFloat(elem.style.scale))) {
            from = parseFloat(elem.style.scale);
        } else if(!isNaN(parseFloat(style.getPropertyValue('scale')))){
            from = parseFloat(style.getPropertyValue('scale'));
        } else {
            from = 1;
        }

        //Luam valorile initiale ale marginilor
        var from_margin_x, from_margin_y;
        if (!isNaN(parseFloat(elem.style.marginLeft))) {
            from_margin_x = parseFloat(elem.style.marginLeft);
        } else if(!isNaN(parseFloat(style.getPropertyValue('margin-left')))){
            from_margin_x = parseFloat(style.getPropertyValue('margin-left'));
        } else {
            from_margin_x = 0;
        }

        if (!isNaN(parseFloat(elem.style.marginTop))) {
            from_margin_y = parseFloat(elem.style.marginTop);
        } else if(!isNaN(parseFloat(style.getPropertyValue('margin-top')))){
            from_margin_y = parseFloat(style.getPropertyValue('margin-top'));
        } else {
            from_margin_y = 0;
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
            else{
                elem.style.scale = to;

                elem.style.marginTop = to_margin_y + 'px';
                elem.style.marginBottom = to_margin_y + 'px';

                elem.style.marginLeft = to_margin_x + 'px';
                elem.style.marginRight = to_margin_x + 'px';
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

            elem.style.transform = "scale(" + valX + ", " + valY + ")";

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
    },

    //resize numai cu viewport ca am nevoie pt un cerc si scaleUniform imi da scale numai la margini for some reason
    resize2DViewportWidth: function(elem, func, toWidth, toHeight, duration) {
        let start = Date.now();

        var style = window.getComputedStyle(elem);

        //HELP elementul meu are width si height dar mi le da cand dai refersh ca fiind NaN, dupa ce ai apasat odata pe el merge
        //alert("elem width: " + parseFloat(elem.style.width) + " , elem height: " + parseFloat(elem.style.height));
        var fromWidth, fromHeight;
        if (!isNaN(parseFloat(elem.style.width))) {
            fromWidth = parseFloat(elem.style.width);
        } else if(!isNaN(parseFloat(style.getPropertyValue('width')))){
            fromWidth = parseFloat(style.getPropertyValue('width'));
        } else {
            fromWidth = 0;
        }
        if (!isNaN(parseFloat(elem.style.height))) {
            fromHeight = parseFloat(elem.style.height);
        } else if(!isNaN(parseFloat(style.getPropertyValue('height')))){
            fromHeight = parseFloat(style.getPropertyValue('height'));
        } else {
            fromHeight = 0;
        }

        //alert("from width: " + fromWidth + " , from height: " + fromHeight);


        function tick() {
            let now = Date.now();
            let elapsed = now - start;
            let width = func(elapsed, fromWidth, toWidth, duration);
            let height = func(elapsed, fromHeight, toHeight, duration);

            elem.style.width = width + 'vw';
            elem.style.height = height + 'vw';

            if (elapsed < duration) {
                requestAnimationFrame(tick);
            } else {
                elem.style.width = toWidth + 'vw';
                elem.style.height = toHeight + 'vw';
            }
        }

        requestAnimationFrame(tick);
    }

};

//module.exports = transitions;