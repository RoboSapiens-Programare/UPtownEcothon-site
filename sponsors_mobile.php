<!DOCTYPE html>
<html>
	<head>

		<link rel="stylesheet" type="text/css" href="css/sageatatlf.css">
		<link rel="stylesheet" type="text/css" href="css/basics.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css">
        <link rel="stylesheet" type="text/css" href="css/circlecontent.css">
        <link rel="stylesheet" type="text/css" href="css/rotatingcontent.css">
          
		<?php include 'elements/header.php'; ?>

    </head>

    <body style="margin: 0; background-color:#009452">
		<?php include "elements/sageatatlf.html"?>

		<div style="position: relative; width:100%; height: 15vh; background-color: transparent; font-size:7vw">
            <div class="text-centrat">
                A huge thank you to our sponsors!
            </div>
        </div>


        <div class="wrapper-rotating-content" style="position:relative; left:0%; height:85vh; background-color:#009452;">
            <div class="rotating-content"  id="rotating-content" style="left:0%; height: 80vh; width:100%; background-color:#009452;">
                <div class="rotate-btn" id="btn-prev" onclick="rotateLoopLeftToRight()" >
                    <!-- <img src="icons/next.svg"> -->
                </div>

                <div class="rotate-btn" id="btn-next" onclick="rotateLoopRightToLeft()" >
                    <!-- <img src="icons/next.svg"> -->
                </div>

                <div class="rotate-section" id="rt-sect3">
                    <!-- <div class="rectangle-content" style="top: 50%; left: 50%; transform: translate(-50%, -50%);" >
                        <div class="circle-top-left" onclick="expand(this, 60, 60, 0.3);" style="height: 70vh; width:70vh; background-color:#e7df68;"><div class="text-centrat">FTC</div></div>
                        <div class="circle-bottom-right" style="height: 70vh; width:70vh; background-color:#e7df68;"></div>
                        
                        <div  class="text-centrat" style="font-size: 3vh"> chestii despre ftc</div>
					</div> -->
					<div class="rotate-rectangle">
						<div class="rt-rect-title"><img src="pictures/logo-header-web.png"></div>
						<div class="rt-rect-content">chestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftc</div>
					</div>
                </div>
                <div class="rotate-section" id="rt-sect2">
                    <!-- <div class="rectangle-content" style="top: 50%; left: 50%; transform: translate(-50%, -50%);" >
                        <div class="circle-top-left" onclick="expand(this, 60, 60, 0.3);" style="height: 70vh; width:70vh; background-color:#e7df68;" ><div class="text-centrat">Gemini Sols</div></div>
                        <div class="circle-bottom-right" style="height: 70vh; width:70vh; background-color:#e7df68;"></div>
                        
                        <div  class="text-centrat" style="font-size: 3vh"> chestii despre gemini</div>
					</div> -->
					<div class="rotate-rectangle">
						<div class="rt-rect-title">Gemini Solutions</div>
						<div class="rt-rect-content">chestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftc</div>
					</div>
                </div>
                <div class="rotate-section" id="rt-sect1">
                    <!-- <div class="rectangle-content" style="top: 50%; left: 50%; transform: translate(-50%, -50%);" >
                        <div class="circle-top-left" onclick="expand(this, 60, 60, 0.3);" style="height: 70vh; width:70vh; background-color:#e7df68;"><div class="text-centrat">Fundraiser</div></div>
                        <div class="circle-bottom-right" style="height: 70vh; width:70vh; background-color:#e7df68;"></div>
                        
                        <div  class="text-centrat" style="font-size: 3vh"> chestii despre fundraiser</div>
					</div> -->
					<div class="rotate-rectangle">
						<div class="rt-rect-title">Fundraiser</div>
						<div class="rt-rect-content">chestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftcchestii despre ftc</div>
					
					</div>
                </div>
            </div>
            <div class="rotate-index">
                <ul>
                    <li id="dot1" style="margin-left: -5vw">
                        <img src="icons/dot.svg">
                    </li>
                    <li id="dot2">
                        <img src="icons/dot.svg">
                    </li>
                    <li id="dot3">
                        <img src="icons/dot.svg">
                    </li>
                </ul>
            </div>
        </div>
        

        <div id="bottom-of-page" style="overflow:hidden; background-color:transparent; position: relative; height: 25vh; width: 100%;">
            <div style="position:absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); height: 100%; width: 100%; background-color: #9de498">
                <div id="hrefuri">
                    <a href="#">
                        <div class="href-elem" style="top:0; left: 25%; transform: translate(-25%, 0%);">
                            <img src="./icons/instagram.svg">
                        </div>
                    </a>
                    <a href="#">
                        <div class="href-elem" style="top:0; left: 50%; transform: translate(-50%, 0%);">
                            <img src="./icons/facebook.svg">
                        </div>
                    </a>
                    <a href="#">
                        <div class="href-elem" style="top:0; left: 75%; transform: translate(-75%, 0%);">
                            <img src="./icons/phone.svg">
                        </div>
                    </a>

                </div>

                <div id="logouri">
                    <ul>
                        <li>
                            <div>
                                <img src="pictures/logo v3.png" style="margin-left: -2vw;">
                                <img src="pictures/robosapiens copy usa.png">
                            </div>
                        </li>
                        <li>
                            <div>
                                <img src="pictures/logo-header-web.png">
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
                
        <script>

            // alert('a'); 

            var rotateStatus = 1;
            // var rotateTimer = 3000;

            var rotatingContent = document.getElementById('rotating-content');
            // var rotatingIndex = document.getElementsByClassName('rotating-index')[0];
            // alert("a"); 

            var sect1 = rotatingContent.getElementsByClassName('rotate-section')[2];
            var sect2 = rotatingContent.getElementsByClassName('rotate-section')[1];
            var sect3 = rotatingContent.getElementsByClassName('rotate-section')[0];

            var dot1 = document.getElementById('dot1');
            var dot2 = document.getElementById('dot2');
            var dot3 = document.getElementById('dot3');

            // alert("a");

            window.onload = function(){
                rotateLoopRightToLeft();
            }

            function rotateLoopRightToLeft(){
                if(rotateStatus === 1){
                    sect2.style.opacity ="0";

                    setTimeout(function(){
                        dot1.style.opacity ="1";
                        dot2.style.opacity ="0.5";
                        dot3.style.opacity ="0.5";

                        ToLeft(sect3);
                        sect3.style.zIndex = "10"; 
                        ToCenter(sect1);
                        sect1.style.zIndex = "20";
                        ToRight(sect2);
                        sect2.style.zIndex = "30";
                    }, 500);

                    setTimeout(function(){
                        sect2.style.opacity = "1";
                    }, 1200);

                    rotateStatus = 2;
                } else if(rotateStatus === 2){
                    sect3.style.opacity ="0";

                    
                    setTimeout(function(){
                        dot1.style.opacity ="0.5";
                        dot2.style.opacity ="1";
                        dot3.style.opacity ="0.5";

                    
                        ToLeft(sect1);
                        sect1.style.zIndex = "10";
                        ToCenter(sect2);
                        sect2.style.zIndex = "20";
                        ToRight(sect3);
                        sect3.style.zIndex = "30";
                    }, 500);

                    setTimeout(function(){
                        sect3.style.opacity = "1";
                    }, 1200);

                    rotateStatus = 3;
                } else if(rotateStatus === 3){
                    sect1.style.opacity ="0";

                    
                    setTimeout(function(){
                        dot1.style.opacity ="0.5";
                        dot2.style.opacity ="0.5";
                        dot3.style.opacity ="1";
        
        
                        ToLeft(sect2);
                        sect2.style.zIndex = "10";
                        ToCenter(sect3);
                        sect3.style.zIndex = "20";
                        ToRight(sect1);
                        sect1.style.zIndex = "30";
                    }, 500);

                    setTimeout(function(){
                        sect1.style.opacity = "1";
                    }, 1200);

                    rotateStatus = 1;
                }
            }

            function rotateLoopLeftToRight(){
                if(rotateStatus === 3){
                    sect3.style.opacity ="0";

                
                    setTimeout(function(){
                        dot1.style.opacity ="0.5";
                        dot2.style.opacity ="0.5";
                        dot3.style.opacity ="1";

                
                        ToLeft(sect3);
                        sect3.style.zIndex = "10"; 
                        ToCenter(sect1);
                        sect1.style.zIndex = "20";
                        ToRight(sect2);
                        sect2.style.zIndex = "30";
                    }, 500);

                    setTimeout(function(){
                        sect3.style.opacity = "1";
                    }, 1200);

                    rotateStatus = 2;
                } else if(rotateStatus === 1){
                    sect1.style.opacity ="0";

        
                    setTimeout(function(){
                        dot1.style.opacity ="1";
                        dot2.style.opacity ="0.5";
                        dot3.style.opacity ="0.5";

                        ToLeft(sect1);
                        sect1.style.zIndex = "10";
                        ToCenter(sect2);
                        sect2.style.zIndex = "20";
                        ToRight(sect3);
                        sect3.style.zIndex = "30";
                    }, 500);

                    setTimeout(function(){
                        sect1.style.opacity = "1";
                    }, 1200);

                    rotateStatus = 3;
                } else if(rotateStatus === 2){
                    sect2.style.opacity ="0";
                    
        
                    setTimeout(function(){
                        dot1.style.opacity ="0.5";
                        dot2.style.opacity ="1";
                        dot3.style.opacity ="0.5";

        
                        ToLeft(sect2);
                        sect2.style.zIndex = "10";
                        ToCenter(sect3);
                        sect3.style.zIndex = "20";
                        ToRight(sect1);
                        sect1.style.zIndex = "30";
                    }, 500);

                    setTimeout(function(){
                        sect2.style.opacity = "1";
                    }, 1200);

                    rotateStatus = 1;
                }
            }

            function ToCenter(elem){
                transitions.slide2D(new Dimension(elem, 0, "percent"),
                    new Dimension(elem, 0, "percent"),
                    tweenFunctions.easeInOutQuad,
                    700);
            }

            function ToLeft(elem){
                transitions.slide2D(new Dimension(elem, -100, "percent"),
                    new Dimension(elem, 0, "percent"),
                    tweenFunctions.easeInOutQuad,
                    700);
            }

            function ToRight(elem){
                transitions.slide2D(new Dimension(elem, 100, "percent"),
                    new Dimension(elem, 0, "percent"),
                    tweenFunctions.easeInOutQuad,
                    700);
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
            

        </script>
    </body>

</html>