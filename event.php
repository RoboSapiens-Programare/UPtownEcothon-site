
<!DOCTYPE html>
<html style="scroll-behavior: smooth">
    <head>
		<title></title>

        <link rel="stylesheet" type="text/css" href="css/sageata.css">
        <link rel="stylesheet" type="text/css" href="css/bottom.css">
        <link rel="stylesheet" type="text/css" href="css/slidingcontent.css">
		<link rel="stylesheet" type="text/css" href="css/basics.css">


        <link href="https://allfont.net/allfont.css?fonts=agency-fb-bold" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <script src="javascript/tween-functions.js"></script>
        <script src="javascript/transitions.js"></script>
    </head>
    
    <body style="margin: 0px; overflow-x: hidden; overflow-y: hidden;">
        <?php include "elements/sageata.html" ?>

        <div id="scroller" class="scroller">
            <div id="link1" class="link">
                <a href="#sect1" class="dot"></a>
            </div>
            <div id="link2" class="link">
                <a href="#sect2" class="dot"></a>
            </div>
            <div id="link3" class="link">
                <a href="#sect3" class="dot"></a>
            </div>
        </div>


        <div id="sect1" class="section" style="background-color: darkkhaki;">
            <div id="title1" class="title" style="opacity: 0;">Teme</div>
            <div id="titlebtn1" class="titlebtn" style="opacity: 0" onclick="readMore(this);">Read More</div>

            <div class="sliding" style="top: 0%; right: -50%; border-radius: 20px 0px 20px 20px;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="sliding" style="bottom: 0%; right: -50%; border-radius: 20px 20px 0px 20px;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="sliding" style="bottom: 0%; left: -50%; border-radius: 20px 20px 20px 0px;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
        </div>

        <div id="sect2" class="section" style="background-color: lightsalmon;">
            <div id="title2" class="title">Scop</div>

            <div id="titlebtn2" class="titlebtn" onclick="readMore(this);">Read More</div>

            <div class="sliding" style="top: 0%; right: -50%; border-radius: 20px 0px 20px 20px;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="sliding" style="bottom: 0%; right: -50%; border-radius: 20px 20px 0px 20px;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="sliding" style="bottom: 0%; left: -50%; border-radius: 20px 20px 20px 0px;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
        </div>

        <div id="sect3" class="section" style="background-color:#291942;">
            <div id="title3" class="title">Cerinte & Premii</div>

            <div id="titlebtn3" class="titlebtn" onclick="readMore(this);">Read More</div>

            <div class="sliding" style="top: 0%; right: -50%; border-radius: 20px 0px 20px 20px;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="sliding" style="bottom: 0%; right: -50%; border-radius: 20px 20px 0px 20px;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="sliding" style="bottom: 0%; left: -50%; border-radius: 20px 20px 20px 0px;">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
        </div>

        <!-- Optimize this shit -->
        <script>
            transitions.fadeIn(document.getElementById('title1'), tweenFunctions.easeOutQuad, 1500);
            transitions.fadeIn(document.getElementById('titlebtn1'), tweenFunctions.easeInSine, 1500);

            function readMore(x){
                var slidings = x.parentElement.getElementsByClassName("sliding");
                for(var a of slidings) {
                    if(a.style.left){
                        animShow(a, 2000, 1);
                    }
                    else{
                        animShow(a, 2000, -1);
                    }
                    a.style.display = "block";
                }
                slideElem2D(x.parentElement.getElementsByClassName("title")[0], 1000, -50, -170, -50, -170, false);
                slideElem2D(x, 1000, -50, -150, -50, -300, false);
                slideElem2D(document.getElementById("scroller"), 1000, 0, 120, -50, -50, false);
                x.innerHTML = "Read Less";
                x.setAttribute("onclick", "readLess(this);");
            }

            function readLess(x){
                var slidings = x.parentElement.getElementsByClassName("sliding");
                for(var a of slidings) {
                    if(a.style.left){
                        animFade(a, 2000, 1);
                    }
                    else{
                        animFade(a, 2000, -1);
                    }
                }
                slideElem2D(x.parentElement.getElementsByClassName("title")[0], 1000, -50, -170, -50, -170, true);
                slideElem2D(x, 1000, -50, -150, -50, -300, true);
                slideElem2D(document.getElementById("scroller"), 1000, 0, 120, -50, -50, true);
                x.innerHTML = "Read More";
                x.setAttribute("onclick", "readMore(this);");
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

                    //Fa-l in functie de viewport height

                    elem.style.transform = `translate(${valX}%, ${valY}%)`;

                    if (elapsed < duration) {
                        requestAnimationFrame(tick);
                    }
                }

                requestAnimationFrame(tick);
            }

            function slideElem2Dabsolute(elem, duration, fromX, toX, fromY, toY, reverse){
                let start = Date.now();

                if(reverse){
                    let auxX = fromX;
                    fromX = toX;
                    toX = auxX;

                    let auxY = fromY;
                    fromY = toY;
                    toY = auxY;
                }

                //alert(-17/100);

                fromX = fromX/100 * elem.clientWidth;
                fromY = fromY/100 * elem.clientHeight;

                toX = (toX/100) * elem.parentElement.clientWidth + fromX;
                toY = (toY/100) * elem.parentElement.clientHeight + fromX;
                
            

                function tick() {
                    let now = Date.now();
                    let elapsed = now - start;
                    let valX = tweenFunctions.easeInOutExpo(elapsed, fromX, toX, duration);
                    let valY = tweenFunctions.easeInOutExpo(elapsed, fromY, toY, duration);

                    //Fa-l in functie de viewport height


                    elem.style.transform = `translate(${valX}px, ${valY}px)`;

                    if (elapsed < duration) {
                        requestAnimationFrame(tick);
                    }
                }
                requestAnimationFrame(tick);
            }
        </script>
    </body>
</html>