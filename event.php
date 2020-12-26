<!DOCTYPE html>
<html style="scroll-behavior: smooth">
    <head>
		<title>Event - UTE</title>

        <link rel="stylesheet" type="text/css" href="css/slidingcontent.css">
        <link rel="stylesheet" type="text/css" href="css/basics.css">
        <link rel="stylesheet" type="text/css" href="css/circlecontent.css">     
        <link rel='stylesheet' type='text/css' href='css/sageata.css'>
        
        <?php include "elements/header.php"; ?>
    </head>
    
    <body style="margin: 0px; overflow-x: hidden; overflow-y: hidden;">
        <?php 
			include "elements/sageata.html";
		?>

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


        <div style="display: flex; width: 300vw; height: 100vh">
            <div id="sect1" class="section" style="background-color: darkkhaki; overflow-y: hidden; overflow-x:hidden">
                <div id="title1" class="title" style="opacity: 0;">Teme</div>
                <div id="titlebtn1" class="titlebtn" style="opacity: 0" onclick="readMore(this);">Read More</div>

                <div class="sliding" style="top: 0%; right: -50%; border-radius: 20px 0px 20px 20px; overflow-y:auto">
                    <?php echo $content["Teme"][1]; ?>
                </div>
                <div class="sliding" style="bottom: 0%; right: -50%; border-radius: 20px 20px 0px 20px; background-color: darkkhaki; transform: scale(0.7)">
                    <div name="toFade" class="rectangle-content" style="top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 1">
                        <div class="circle-top-left" onclick="expand(this, 50, 50, 0.7);" style="overflow: hidden;">
                            <img src="pictures/pollution1.jpg" style="height: 100%; width: 100%">
                        </div>
                        <div class="circle-bottom-right" style="background-color: aliceblue;"></div>
                        
                        <img src="pictures/pollution2.jpg" style="height: 100%; width: 100%; border-radius: 20px 20px 0px 20px">
                    </div>
                </div>
                <div class="sliding" style="bottom: 0%; left: -50%; border-radius: 20px 20px 20px 0px; overflow-y: auto">
                    <?php echo $content["Teme"][2] ?>
                </div>
            </div>
            <div style="flex: 33%; height: 100vh; background-color:darkkhaki; position: relative">
                <div class="sliding" style=" width:60vw; height:75vh; right: 0; top: 12.5vh; margin-right: 2vw; overflow-y:auto; border-radius: 20px 20px 20px 20px">
                    <?php
                        echo $content["Teme"][3] . "<br>";
                    ?>
                </div>
                <div name="toFade" class="rectangle-content" style="top: 50%; left: 15%; transform: translate(-40%, -30%); z-index: 102">
                    <div class="circle-top-left" onclick="expand(this, 27, 60, 0.4);" style="overflow: hidden;">
                        <img src="pictures/pollution4.webp" style="height: 100%; width: 100%">
                    </div>
                    <div class="circle-bottom-right" style="background-color: aliceblue;"></div>
                    
                    <img src="pictures/pollution3.jpg" style="height: 100%; width: 100%; border-radius: 20px 20px 0px 20px">
                </div>
            </div>
            <div style="flex: 33%; height: 100vh; background-color:darkkhaki; position: relative">
                <div id="bigScrollableSliding" class="sliding" style="width:75%; height:56%; left: 50%; top: 10%; overflow-y:auto; border-radius: 20px 20px 20px 20px; transform:translateX(-50%)">
                    <?php 
                        echo $content["Teme"][4] . "<br>";
                    ?>
                </div>
                <div id="wideChangingPicture" class="sliding" style="width:78%; height:25%; left: 50%; top: 71.8%; overflow-y:hidden; border-radius: 20px 20px 20px 20px; transform:translateX(-50%); padding: 0">
                    <img src="pictures/bucharest2.jpg" style="width: 100%; height: 100%; object-fit:cover; position:absolute">
                    <img src="pictures/bucharest2.jpg" style="width: 100%; height: 100%; object-fit:cover; opacity: 0; position:absolute">
                </div>
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

        <script>
            transitions.fadeIn(document.getElementById('title1'), tweenFunctions.easeOutQuad, 1500);
            transitions.fadeIn(document.getElementById('titlebtn1'), tweenFunctions.easeInSine, 1500);
            var detectChange = 0;
            var lastDetectChange = 0;

            window.location.href = "#sect1";

            document.getElementById('bigScrollableSliding').onscroll = function(){
                var s = document.getElementById('bigScrollableSliding');
                if(s.scrollTop > 150 && s.scrollTop < 900){
                    detectChange = 1;
                    if(detectChange != lastDetectChange){
                        changePicture("pictures/traffic1.webp");
                        lastDetectChange = detectChange;
                    }
                }
                else if(s.scrollTop >= 900 && s.scrollTop < 1300){
                    detectChange = 2;
                    if(detectChange != lastDetectChange){
                        changePicture("pictures/park2.jpg");
                        lastDetectChange = detectChange;
                    }
                }
                else if(s.scrollTop >= 1300){
                    detectChange = 3;
                    if(detectChange != lastDetectChange){
                        changePicture("pictures/garbage1.jpg");
                        lastDetectChange = detectChange;
                    }
                }
                else{
                    detectChange = 0
                    if(detectChange != lastDetectChange){
                        changePicture('pictures/bucharest2.jpg');
                        lastDetectChange = detectChange;
                    }
                }
            }

            function readMore(x){
                var slidings = x.parentElement.getElementsByClassName("sliding");
                var title = x.parentElement.getElementsByClassName('title')[0];
                var scrollbar = document.getElementById("scroller");
                var section = x.parentElement;

                for(var a of slidings) {
                    if(a.style.right){
                        transitions.translate2D(
                            new Dimension(a, -50, "pw"),
                            new Dimension(a, 0, "ph"),
                            tweenFunctions.easeOutQuint,
                            2000
                        );
                    }
                    else{
                        transitions.translate2D(
                            new Dimension(a, 50, "pw"),
                            new Dimension(a, 0, "ph"),
                            tweenFunctions.easeOutQuint,
                            2000
                        );
                    }
                }

                transitions.translate2D(
                    new Dimension(title, -25, "pw"),
                    new Dimension(title, -20, "ph"),
                    tweenFunctions.easeInOutExpo,
                    1000
                );
                transitions.translate2D(
                    new Dimension(x, -25, "pw"),
                    new Dimension(x, -28, "ph"),
                    tweenFunctions.easeInOutExpo,
                    1000
                );
                transitions.translate2D(
                    new Dimension(scrollbar, 4.8, "vw"),
                    new Dimension(scrollbar, 0, "vh"), 
                    tweenFunctions.easeInOutExpo,
                    1000
                );
                x.innerHTML = "Read Less";
                x.setAttribute("onclick", "readLess(this);");

                document.body.style.overflowX = "scroll";
            }

            function readLess(x){
                var slidings = x.parentElement.getElementsByClassName("sliding");
                var title = x.parentElement.getElementsByClassName('title')[0];
                var scrollbar = document.getElementById("scroller");
                var section = x.parentElement;

                for(var a of slidings) {
                    if(a.style.right){
                        transitions.translate2D(
                            new Dimension(a, 50, "pw"),
                            new Dimension(a, 0, "ph"),
                            tweenFunctions.easeOutQuint,
                            2000
                        );                    
                    }
                    else{
                        transitions.translate2D(
                            new Dimension(a, -50, "pw"),
                            new Dimension(a, 0, "ph"),
                            tweenFunctions.easeOutQuint,
                            2000
                        );
                    }
                }

                transitions.translate2D(
                    new Dimension(title, 25, "pw"),
                    new Dimension(title, 20, "ph"),
                    tweenFunctions.easeInOutExpo,
                    1000
                );
                transitions.translate2D(
                    new Dimension(x, 25, "pw"),
                    new Dimension(x, 28, "ph"),
                    tweenFunctions.easeInOutExpo,
                    1000
                );
                transitions.translate2D(
                    new Dimension(scrollbar, -4.8, "vw"),
                    new Dimension(scrollbar, 0, "vh"), 
                    tweenFunctions.easeInOutExpo,
                    1000
                );
                x.innerHTML = "Read More";
                x.setAttribute("onclick", "readMore(this);");

                document.body.style.overflowX = "hidden";
                window.location.href = "#" + x.parentElement.id;
            }

            function expand(elem, X, Y, scale){
                var rectangle = elem.parentElement;

                transitions.resize2D(new Dimension(rectangle, X, "vw"),
                                    new Dimension(rectangle, Y, "vh"),
                                    tweenFunctions.easeOutCubic,
                                    1000);
                transitions.scaleUniform(elem, tweenFunctions.easeOutQuint, scale, 1000);
                transitions.scaleUniform(rectangle.getElementsByClassName('circle-bottom-right')[0] || rectangle.getElementsByClassName('circle-bottom-left')[0] , tweenFunctions.easeOutQuint, scale, 1000);

                elem.setAttribute("onclick", "retract(this, " + X + ", " + Y + ", " + scale +");");
            }

            function retract(elem, X, Y, scale){
                var rectangle = elem.parentElement;

                transitions.resize2D(new Dimension(rectangle, 0, "vw"),
                                    new Dimension(rectangle, 0, "vh"),
                                    tweenFunctions.easeOutCubic,
                                    1000);
                transitions.scaleUniform(elem, tweenFunctions.easeOutQuint, 1, 1000);
                transitions.scaleUniform(rectangle.getElementsByClassName('circle-bottom-right')[0] || rectangle.getElementsByClassName('circle-bottom-left')[0], tweenFunctions.easeOutQuint, 1, 1000);

                elem.setAttribute("onclick", "expand(this," + X + ", " + Y + ", " + scale +");");
            }

            function changePicture(path){
                var picDiv = document.getElementById('wideChangingPicture')
                var images = picDiv.getElementsByTagName("img");
                var pic1 = images[0];
                var pic2 = images[1];

                pic2.src = pic1.src;
                pic2.style.opacity = 1;
                pic1.src = path;
                pic1.style.opacity = 0;

                transitions.fadeIn(pic1, tweenFunctions.easeInOutSine, 700);
                transitions.fadeOut(pic2, tweenFunctions.easeInOutSine, 700);
            }

            function isOnScreen(element){
                var curPos = element.offset();
                var curTop = curPos.top;
                var screenHeight = $(window).height();
                return (curTop > screenHeight) ? false : true;
            }
        </script>
    </body>
</html>