<?php
    //CONTENT
    include 'config/dbconfig.php';

    try{
        $db = new ContentDB();

        $content = array();
        $content = $db->getContentsForPage("event.php");

        $db = null;
        unset($db);
    }
    catch(PDOException $e){
        $e->getMessage();
    }
?>
<!DOCTYPE html>
<html style="scroll-behavior: smooth">
    <head>
		<title>Event - UTE</title>

        <link rel="stylesheet" type="text/css" href="css/slidingcontent.css">
        <link rel="stylesheet" type="text/css" href="css/basics.css">
        <link rel="stylesheet" type="text/css" href="css/circlecontent.css">     
       
		<link rel='stylesheet' type='text/css' href='css/sageatatlf.css'>

        <link href="https://allfont.net/allfont.css?fonts=agency-fb-bold" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <script src="javascript/tween-functions.js"></script>
        <script src="javascript/transitions.js"></script>
    </head>
    
    <body style="margin: 0px; overflow-x:hidden">
        <?php 
			include "elements/sageatatlf.html";
		?>

        <div id="scroller" class="scroller" style="left: 0; width: 6vh">
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


        <!-- <div style="display: flex; width: 300vw; height: 100vh">
            <div id="sect1" class="section" style="background-color: darkkhaki; overflow-y: hidden; overflow-x:hidden">
                <div id="title1" class="title" style="opacity: 0;">Teme</div>
                <div id="titlebtn1" class="titlebtn" style="opacity: 0" onclick="readMore(this);">Read More</div>

                <div class="sliding" style="top: 0%; right: -50%; border-radius: 20px 0px 20px 20px; overflow-y:auto">
                    <?php //echo $content["Teme"][1]; ?>
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
                    <?php //echo $content["Teme"][2] ?>
                </div>
            </div>
            <div style="flex: 33%; height: 100vh; background-color:darkkhaki; position: relative">
                <div class="sliding" style=" width:60vw; height:75vh; right: 0; top: 12.5vh; margin-right: 2vw; overflow-y:auto; border-radius: 20px 20px 20px 20px">
                    <?php
                        //echo $content["Teme"][3] . "<br>";
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
                        //echo $content["Teme"][4] . "<br>";
                    ?>
                </div>
                <div id="wideChangingPicture" class="sliding" style="width:78%; height:25%; left: 50%; top: 71.8%; overflow-y:hidden; border-radius: 20px 20px 20px 20px; transform:translateX(-50%); padding: 0">
                    <img src="pictures/bucharest2.jpg" style="width: 100%; height: 100%; object-fit:cover; position:absolute">
                    <img src="pictures/bucharest2.jpg" style="width: 100%; height: 100%; object-fit:cover; opacity: 0; position:absolute">
                </div>
            </div>
        </div> -->

        <div id="sect1" class="section" >
            <div class="wrapper" style="background-color:darkkhaki; z-index: 5">
                <div id="title1" class="title" style="opacity: 0;">Teme</div>
                <div id="titlebtn1" class="titlebtn" style="opacity: 0" onclick="readMore(this);">Read More</div>
            </div>

            <div class="sliding" style="border-radius: 20px 20px 20px 20px; overflow-y:hidden; width:80vw; height:fit-content; margin-bottom: 50vh">
                <?php echo $content["Teme"][1]; ?>
            </div>
            <div class="sliding" style="border-radius: 20px 20px 20px 20px; overflow-y:hidden; width:80vw; height:fit-content">
                <?php echo $content["Teme"][2] ?>
            </div>
            <div class="sliding" style="border-radius: 20px 20px 20px 20px; overflow-y:hidden; width:80vw; height:fit-content; margin-bottom: 50vh">
                <?php echo $content["Teme"][3] ?>
            </div>
            <div id="city" class="sliding" style="border-radius: 20px 20px 20px 20px; overflow-y:hidden; width:80vw; height:fit-content">
                <?php echo $content["Teme"][4] ?>
            </div>
            <div style="position: sticky; width: 100%; height: 100%; bottom: 0; z-index: -1">
                <img src="pictures/pollution_portrait1.jpg" style="position:absolute; width: 100%; height: 100%; object-fit: cover">
                <img src="pictures/pollution_portrait1.jpg" style="position:absolute; width: 100%; height: 100%; object-fit: cover; opacity: 0">
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

            document.getElementById('sect1').onscroll = function(){
                var s = document.getElementById('sect1');
                //alert(document.getElementById('garbage').offsetTop);
                if(s.scrollTop > (document.getElementById('garbage').offsetTop + document.getElementById('city').offsetHeight) + document.documentElement.clientHeight/2){
                    detectChange = 1;
                    if(detectChange != lastDetectChange){
                        changePicture(s, "pictures/garbage1.jpg");
                        lastDetectChange = detectChange;
                    }
                }
                else if(s.scrollTop > (document.getElementById('park').offsetTop + document.getElementById('city').offsetHeight + document.documentElement.clientHeight/2)){
                    detectChange = 2;
                    if(detectChange != lastDetectChange){
                        changePicture(s, "pictures/park2.jpg");
                        lastDetectChange = detectChange;
                    }
                }
                else if(s.scrollTop > (document.getElementById('traffic').offsetTop + document.getElementById('city').offsetHeight + document.documentElement.clientHeight/2)){
                    detectChange = 3;
                    if(detectChange != lastDetectChange){
                        changePicture(s, "pictures/traffic1.webp");
                        lastDetectChange = detectChange;
                    }
                }
                else if(s.scrollTop > document.getElementById('city').offsetHeight + + document.documentElement.clientHeight/2){
                    detectChange = 4;
                    if(detectChange != lastDetectChange){
                        changePicture(s, "pictures/bucharest2.jpg");
                        lastDetectChange = detectChange;
                    }
                }
                else{
                    detectChange = 0
                    if(detectChange != lastDetectChange){
                        changePicture(s, 'pictures/pollution_portrait1.jpg');
                        lastDetectChange = detectChange;
                    }
                }
            }

            function readMore(x){
                var slidings = x.parentElement.getElementsByClassName("sliding");
                var title = x.parentElement.getElementsByClassName('title')[0];
                var scrollbar = document.getElementById("scroller");
                var wrapper = x.parentElement;

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

                transitions.resize2D(
                    new Dimension(wrapper, 100, "pw"),
                    new Dimension(wrapper, 20, "ph"),
                    tweenFunctions.easeInOutExpo,
                    1000
                );
                transitions.translate2D(
                    new Dimension(title, 0, "pw"),
                    new Dimension(title, -23, "ph"),
                    tweenFunctions.easeInOutExpo,
                    1000
                );
                transitions.translate2D(
                    new Dimension(scrollbar, -10, "vw"),
                    new Dimension(scrollbar, 0, "vh"), 
                    tweenFunctions.easeInOutExpo,
                    1000
                );
                x.innerHTML = "Read Less";
                x.setAttribute("onclick", "readLess(this);");
            }

            function readLess(x){
                var slidings = x.parentElement.getElementsByClassName("sliding");
                var title = x.parentElement.getElementsByClassName('title')[0];
                var scrollbar = document.getElementById("scroller");
                var wrapper = x.parentElement;

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
                    new Dimension(title, 0, "pw"),
                    new Dimension(title, 23, "ph"),
                    tweenFunctions.easeInOutExpo,
                    1000
                );
                transitions.resize2D(
                    new Dimension(wrapper, 100, "pw"),
                    new Dimension(wrapper, 100, "ph"),
                    tweenFunctions.easeInOutExpo,
                    1000
                );
                transitions.translate2D(
                    new Dimension(scrollbar, 10, "vw"),
                    new Dimension(scrollbar, 0, "vh"), 
                    tweenFunctions.easeInOutExpo,
                    1000
                );
                x.innerHTML = "Read More";
                x.setAttribute("onclick", "readMore(this);");

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

            function changePicture(elem, path){
                var picDiv = elem;
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

            function isInViewport(element) {
                const rect = element.getBoundingClientRect();
                return (
                    rect.top >= 0 &&
                    rect.left >= 0 &&
                    rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
                    rect.right <= (window.innerWidth || document.documentElement.clientWidth)
                );
            }

        </script>
    </body>
</html>