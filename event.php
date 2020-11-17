<!DOCTYPE html>
<html>
    <head>
		<title></title>

        <link rel="stylesheet" type="text/css" href="css/sageata.css">
        <link rel="stylesheet" type="text/css" href="css/bottom.css">
        <link rel="stylesheet" type="text/css" href="css/slidingcontent.css">

        <link href="https://allfont.net/allfont.css?fonts=agency-fb-bold" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <script src="javascript/tween-functions.js"></script>
    </head>
    
    <body>
        <?php include "elements/sageata.html" ?>

        <div id="sect1" class="section" style="background-color: darkkhaki;">
            <div id="title1" class="title">Teme</div>
            <div id="titlebtn1" class="titlebtn" onclick="readMore(this);">Read More</div>

            <div class="sliding" style="top: 0%; right: -50%; border-radius: 20px 0px 20px 20px; display: inline">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="sliding" style="bottom: 0%; right: -50%; border-radius: 20px 20px 0px 20px; display: inline">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="sliding" style="bottom: 0%; left: -50%; border-radius: 20px 20px 20px 0px; display: inline">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
        </div>

        <script>
            var shown = false;
            function readMore(x){
                var slidings = x.parentElement.getElementsByClassName("sliding");
                for(var a of slidings) {
                    if (!shown) {
                        if(a.style.left){
                            animShow(a, 2000, 1);
                        }
                        else{
                            animShow(a, 2000, -1);
                        }
                        a.style.display = "block";
                    } else {
                        if(a.style.left){
                            animFade(a, 2000, 1);
                        }
                        else{
                            animFade(a, 2000, -1);
                        }
                        a.style.display = "inline";
                    }
                }
                slideElem2D(x.parentElement.getElementsByClassName("title")[0], 1000, -50, -170, -50, -170, shown ? true : false);
                slideElem2D(x, 1000, -50, -150, -50, -300, shown ? true: false);
                x.innerHTML = shown? "Read More" : "Read Less";

                shown = !shown;
            }

            function animShow(elem, duration, direction){
                let start = Date.now();
                let from = 0;
                let to = 102;
            
                function tick() {
                    let now = Date.now();
                    let elapsed = now - start;
                    let val = tweenFunctions.easeOutQuint(elapsed, from, to, duration);
                    elem.style.transform = `translateX(${val*direction}%)`;
                    if (elapsed < duration) {
                        requestAnimationFrame(tick);
                    }
                }
                requestAnimationFrame(tick);
            }

            function animFade(elem, duration, direction){
                let start = Date.now();
                let from = 102;
                let to = 0;
            
                function tick() {
                    let now = Date.now();
                    let elapsed = now - start;
                    let val = tweenFunctions.easeOutQuint(elapsed, from, to, duration);
                    elem.style.transform = `translateX(${val*direction}%)`;
                    if (elapsed < duration) {
                        requestAnimationFrame(tick);
                    }
                }
                requestAnimationFrame(tick);
            }

            function slideElem2D(elem, duration, fromX, toX, fromY, toY, reverse){
                let start = Date.now();

                if(reverse){
                    let auxX = fromX;
                    fromX = toX;
                    toX = auxX;

                    let auxY = fromY;
                    fromY = toY;
                    toY = auxY;
                }
            
                function tick() {
                    let now = Date.now();
                    let elapsed = now - start;
                    let valX = tweenFunctions.easeInOutExpo(elapsed, fromX, toX, duration);
                    let valY = tweenFunctions.easeInOutExpo(elapsed, fromY, toY, duration);
                    elem.style.transform = `translate(${valX}%, ${valY}%)`;
                    //elem.style.transform = `translateX(${val}%)`;
                    if (elapsed < duration) {
                        requestAnimationFrame(tick);
                    }
                }
                requestAnimationFrame(tick);
            }
        </script>
    </body>
</html>