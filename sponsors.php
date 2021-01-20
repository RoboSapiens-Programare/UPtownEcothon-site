<!DOCTYPE html>
<html style="scroll-behavior: smooth">
	<head>

		<link rel="stylesheet" type="text/css" href="css/sageata.css">
		<link rel="stylesheet" type="text/css" href="css/basics.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css">
        <link rel="stylesheet" type="text/css" href="css/circlecontent.css">
        <link rel="stylesheet" type="text/css" href="css/rotatingcontent.css">
          
		<?php include 'elements/header.php'; ?>

    </head>
    
    <body class="sponsors" style="margin: 0; background-color:black">

        <?php 
			include "elements/sageata.html";
        ?>

        <div style="position: relative; width:100%; height: 15vh; background-color: transparent; font-size:3vw">
            <div class="text-centrat" style="color:white; border-bottom: 0.5vh dashed #00ff16">
                <?php echo $content['Thanks'][1]; ?>    
            </div>
        </div>


        <div class="wrapper-rotating-content" style="position:relative; left:0%; height:85vh; overflow-y:visible">
        <div style="position:absolute; width:100%; height:100%; background:linear-gradient(black, black), url(pictures/blob.gif);background-position: -10% center; background-size:cover; background-blend-mode: hue; filter:blur(10px)"></div>
            <div class="rotating-content"  id="rotating-content" style="left:0%; height: 80vh; width:100%; background-color:transparent">
                <div class="rotate-btn" id="btn-prev" onclick="rotateLoopLeftToRight()" onmouseover="pauseLoop()" onmouseleave="resumeLoop()">
                    <img src="icons/arrow-left.svg">
                </div>

                <div class="rotate-btn" id="btn-next" onclick="rotateLoopRightToLeft()" onmouseover="pauseLoop()" onmouseleave="resumeLoop()">
                    <img src="icons/arrow-right.svg">
                </div>

                <div class="rotate-section" id="rt-sect4">
                    <div class="rectangle-content" style="top: 50%; left: 50%; transform: translate(-50%, -50%);" onmouseover="pauseLoop()" onmouseleave="resumeLoop()">
                        <div class="circle-top-left" onclick="expand(this, 60, 60, 17, 'vh');" style="height: 70vh; width:70vh;"><div class="text-centrat" style="width:95%"><img src="pictures/FTC.png" alt="FTC" style="width:100%"></div></div>
                        <div class="circle-bottom-right" style="height: 70vh; width:70vh;"></div>
                        
                        <div  class="text-centrat" style="font-size: 1.2vw; width: 90%; max-height:90%; overflow: hidden; font-family: 'Montserrat', sans-serif"> <?php echo $content['FTC']['desc']; ?> </div>
                    </div>
                </div>
                <div class="rotate-section" id="rt-sect3">
                    <div class="rectangle-content" style="top: 50%; left: 50%; transform: translate(-50%, -50%);" onmouseover="pauseLoop()" onmouseleave="resumeLoop()">
                        <div class="circle-top-left" onclick="expand(this, 60, 60, 17, 'vh');" style="height: 70vh; width:70vh;" ><div class="text-centrat" style="width:95%"><img src="pictures/gemini-solutions-logo.svg" alt="Gemini Sols" style="width:100%"></div></div>
                        <div class="circle-bottom-right" style="height: 70vh; width:70vh;"></div>
                        
                        <div  class="text-centrat" style="font-size: 1.2vw; width: 90%; max-height:90%; overflow: hidden; font-family: 'Montserrat', sans-serif"> <?php echo $content['Gemini']['desc']; ?> </div>
                    </div>
                </div>
                <div class="rotate-section" id="rt-sect2">
                    <div class="rectangle-content" style="top: 50%; left: 50%; transform: translate(-50%, -50%);" onmouseover="pauseLoop()" onmouseleave="resumeLoop()">
                        <div class="circle-top-left" onclick="expand(this, 60, 60, 17, 'vh');" style="height: 70vh; width:70vh;"><div class="text-centrat" style="width: 90%;"><img src="pictures/endava.png" alt="Endava" style="width: 100%;"></div></div>
                        <div class="circle-bottom-right" style="height: 70vh; width:70vh;"></div>
                        
                        <div  class="text-centrat" style="font-size: 1.2vw; width: 90%; max-height:90%; overflow: hidden; font-family: 'Montserrat', sans-serif"> <?php echo $content['Endava']['desc']; ?> </div>
                    </div>
                </div>
                <div class="rotate-section" id="rt-sect1">
                    <div class="rectangle-content" style="top: 50%; left: 50%; transform: translate(-50%, -50%);" onmouseover="pauseLoop()" onmouseleave="resumeLoop()">
                        <div class="circle-top-left" onclick="expand(this, 60, 60, 17, 'vh');" style="height: 70vh; width:70vh; font-size:200%"><div class="text-centrat" style="color:white; font-size:100%"><img src="pictures/sprijina.svg" alt="Fundraiser" style="width:100%;"></div></div>
                        <div class="circle-bottom-right" style="height: 70vh; width:70vh;"></div>
                        
                        <div  class="text-centrat" style="font-size: 1.2vw; width: 90%; max-height:90%; overflow: hidden; font-family: 'Montserrat', sans-serif"> <?php echo $content['Fundraiser']['desc']; ?> </div>
                    </div>
                </div>
            </div>
            <div class="rotate-index">
                <ul>
                    <li id="dot1" style="margin-left: -2.1vw">
                        <img src="icons/dot.svg">
                    </li>
                    <li id="dot2">
                        <img src="icons/dot.svg">
                    </li>
                    <li id="dot3">
                        <img src="icons/dot.svg">
                    </li>
                    <li id="dot4">
                        <img src="icons/dot.svg">
                    </li>
                </ul>
            </div>
        </div>
        
        <?php include "elements/footer.html"; ?>	
                
        <script>

            // alert(window.innerWidth); 

            var rotateStatus = 1;
            var rotateTimer = 3000;
            var isFirst = true;

            var rotatingContent = document.getElementById('rotating-content');
            // var rotatingIndex = document.getElementsByClassName('rotating-index')[0];
            // alert("a"); 

            var sect1 = rotatingContent.getElementsByClassName('rotate-section')[3];
            var sect2 = rotatingContent.getElementsByClassName('rotate-section')[2];
            var sect3 = rotatingContent.getElementsByClassName('rotate-section')[1];
            var sect4 = rotatingContent.getElementsByClassName('rotate-section')[0];

            var dot1 = document.getElementById('dot1');
            var dot2 = document.getElementById('dot2');
            var dot3 = document.getElementById('dot3');
            var dot4 = document.getElementById('dot4');

            // alert("a");

            window.onload = function(){
                sect2.style.opacity ="0";
                sect3.style.opacity ="0";
                sect4.style.opacity ="0";
                rotateLoopRightToLeft();
                setTimeout(function(){
                    sect2.style.opacity ="1";
                    sect3.style.opacity ="1";
                    sect4.style.opacity ="1";
                }, 1200);

            }

            var startLoop = setInterval(function(){
                rotateLoopRightToLeft();
            }, rotateTimer);

            function pauseLoop(){
                clearInterval(startLoop);
                // console.log("a");
            }

            function resumeLoop(){
                startLoop = setInterval(function(){
                rotateLoopRightToLeft();
                }, rotateTimer);
                // console.log("b");
            }

            function rotateLoopRightToLeft(){
                if(rotateStatus === 1){
                    sect3.style.opacity ="0";
                    // if(isFirst){
                    //     sect2.style.opacity ="0";
                    // }

                    setTimeout(function(){
                        dot1.style.filter ="invert(100%)";
                        dot2.style.filter ="invert(60%)";
                        dot3.style.filter ="invert(60%)";
                        dot4.style.filter ="invert(60%)";
                        // dot2.style.opacity ="0.5";
                        // dot3.style.opacity ="0.5";
                        // dot4.style.opacity ="0.5";

                        ToLeft(sect4);
                        sect4.style.zIndex = "10"; 
                        ToCenter(sect1);
                        sect1.style.zIndex = "20";
                        ToRight(sect3);
                        sect3.style.zIndex = "10";
                        ToRight(sect2);
                        sect2.style.zIndex = "30";
                        
                    }, 500);

                    setTimeout(function(){
                        sect3.style.opacity = "1";
                        // if(isFirst){
                        //     sect2.style.opacity ="1";
                        //     isFirst = false;
                        // }
                    }, 1200);

                    rotateStatus = 2;
                } else if(rotateStatus === 2){
                    sect4.style.opacity ="0";

                    setTimeout(function(){
                        dot1.style.filter ="invert(60%)";
                        dot2.style.filter ="invert(100%)";
                        dot3.style.filter ="invert(60%)";
                        dot4.style.filter ="invert(60%)";
                        // dot1.style.opacity ="0.5";
                        // dot2.style.opacity ="1";
                        // dot3.style.opacity ="0.5";
                        // dot4.style.opacity ="0.5";
                    
                        ToLeft(sect1);
                        sect1.style.zIndex = "10";
                        ToCenter(sect2);
                        sect2.style.zIndex = "20";
                        ToRight(sect3);
                        sect3.style.zIndex = "30";
                        ToRight(sect4);
                        sect4.style.zIndex = "10";
                    }, 500);

                    setTimeout(function(){
                        sect4.style.opacity = "1";
                    }, 1200);

                    rotateStatus = 3;
                } else if(rotateStatus === 3){
                    sect1.style.opacity ="0";

                    setTimeout(function(){
                        dot1.style.filter ="invert(60%)";
                        dot2.style.filter ="invert(60%)";
                        dot3.style.filter ="invert(100%)";
                        dot4.style.filter ="invert(60%)";
                        // dot1.style.opacity ="0.5";
                        // dot2.style.opacity ="0.5";
                        // dot3.style.opacity ="1";
                        // dot4.style.opacity ="0.5";
        
                        ToLeft(sect2);
                        sect2.style.zIndex = "10";
                        ToCenter(sect3);
                        sect3.style.zIndex = "20";
                        ToRight(sect1);
                        sect1.style.zIndex = "10";
                        ToRight(sect4);
                        sect4.style.zIndex = "30";
                    }, 500);

                    setTimeout(function(){
                        sect1.style.opacity = "1";
                    }, 1200);

                    rotateStatus = 4;
                } else if(rotateStatus === 4){
                    sect2.style.opacity ="0";

                    setTimeout(function(){
                        // dot1.style.opacity ="0.5";
                        // dot2.style.opacity ="0.5";
                        // dot3.style.opacity ="0.5";
                        // dot4.style.opacity ="1";
                        dot1.style.filter ="invert(60%)";
                        dot2.style.filter ="invert(60%)";
                        dot3.style.filter ="invert(60%)";
                        dot4.style.filter ="invert(100%)";
        
                        ToLeft(sect3);
                        sect3.style.zIndex = "10";
                        ToCenter(sect4);
                        sect4.style.zIndex = "20";
                        ToRight(sect2);
                        sect2.style.zIndex = "10";
                        ToRight(sect1);
                        sect1.style.zIndex = "30";
                    }, 500);

                    setTimeout(function(){
                        sect2.style.opacity = "1";
                    }, 1200);

                    rotateStatus = 1;
                }
            }

            function rotateLoopLeftToRight(){
                if(rotateStatus === 3){
                    sect4.style.opacity ="0";

                    setTimeout(function(){
                        dot1.style.filter ="invert(100%)";
                        dot2.style.filter ="invert(60%)";
                        dot3.style.filter ="invert(60%)";
                        dot4.style.filter ="invert(60%)";
                        // dot1.style.opacity ="1";
                        // dot2.style.opacity ="0.5";
                        // dot3.style.opacity ="0.5";
                        // dot4.style.opacity ="0.5";
                
                        ToLeft(sect4);
                        sect4.style.zIndex = "10"; 
                        ToCenter(sect1);
                        sect1.style.zIndex = "20";
                        ToRight(sect2);
                        sect2.style.zIndex = "30";
                        ToRight(sect3);
                        sect3.style.zIndex = "10";
                    }, 500);

                    setTimeout(function(){
                        sect4.style.opacity = "1";
                    }, 1200);

                    rotateStatus = 2;
                } else if(rotateStatus === 1){
                    sect2.style.opacity ="0";
        
                    setTimeout(function(){
                        dot1.style.filter ="invert(60%)";
                        dot2.style.filter ="invert(60%)";
                        dot3.style.filter ="invert(100%)";
                        dot4.style.filter ="invert(60%)";
                        // dot1.style.opacity ="0.5";
                        // dot2.style.opacity ="0.5";
                        // dot3.style.opacity ="1";
                        // dot4.style.opacity ="0.5";

                        ToLeft(sect2);
                        sect2.style.zIndex = "10";
                        ToCenter(sect3);
                        sect3.style.zIndex = "20";
                        ToRight(sect4);
                        sect4.style.zIndex = "30";
                        ToRight(sect1);
                        sect1.style.zIndex = "10";
                    }, 500);

                    setTimeout(function(){
                        sect2.style.opacity = "1";
                    }, 1200);

                    rotateStatus = 4;
                } else if(rotateStatus === 2){
                    sect3.style.opacity ="0";
        
                    setTimeout(function(){
                        dot1.style.filter ="invert(60%)";
                        dot2.style.filter ="invert(60%)";
                        dot3.style.filter ="invert(60%)";
                        dot4.style.filter ="invert(100%)";
                        // dot1.style.opacity ="0.5";
                        // dot2.style.opacity ="0.5";
                        // dot3.style.opacity ="0.5";
                        // dot4.style.opacity ="1";

                        ToLeft(sect3);
                        sect3.style.zIndex = "10";
                        ToCenter(sect4);
                        sect4.style.zIndex = "20";
                        ToRight(sect1);
                        sect1.style.zIndex = "30";
                        ToRight(sect2);
                        sect2.style.zIndex = "10";
                    }, 500);

                    setTimeout(function(){
                        sect3.style.opacity = "1";
                    }, 1200);

                    rotateStatus = 1;
                } else if(rotateStatus === 4){
                    sect1.style.opacity ="0";
        
                    setTimeout(function(){
                        dot1.style.filter ="invert(60%)";
                        dot2.style.filter ="invert(100%)";
                        dot3.style.filter ="invert(60%)";
                        dot4.style.filter ="invert(60%)";
                        // dot1.style.opacity ="0.5";
                        // dot2.style.opacity ="1";
                        // dot3.style.opacity ="0.5";
                        // dot4.style.opacity ="0.5";

                        ToLeft(sect1);
                        sect1.style.zIndex = "10";
                        ToCenter(sect2);
                        sect2.style.zIndex = "20";
                        ToRight(sect3);
                        sect3.style.zIndex = "30";
                        ToRight(sect4);
                        sect4.style.zIndex = "10";
                    }, 500);

                    setTimeout(function(){
                        sect1.style.opacity = "1";
                    }, 1200);

                    rotateStatus = 3;
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

            function expand(elem, X, Y, toSize, sizeunit){
                var rectangle = elem.parentElement;
                var initialheight = parseFloat(elem.style.height);
                // alert(initialheight);

                transitions.resize2D(new Dimension(rectangle, X, "vw"),
                                    new Dimension(rectangle, Y, "vh"),
                                    tweenFunctions.easeOutCubic,
                                    1000);
                transitions.resize2D(new Dimension(elem, toSize, sizeunit),
                new Dimension(rectangle, toSize, sizeunit),
                tweenFunctions.easeOutCubic,
                1000);
                transitions.resize2D(new Dimension(rectangle.getElementsByClassName('circle-bottom-right')[0] || rectangle.getElementsByClassName('circle-bottom-left')[0], toSize, sizeunit),
                new Dimension(rectangle.getElementsByClassName('circle-bottom-right')[0] || rectangle.getElementsByClassName('circle-bottom-left')[0], toSize, sizeunit),
                tweenFunctions.easeOutCubic,
                1000);
                // transitions.scaleUniform(elem, tweenFunctions.easeOutQuint, scale, 1000);
                // transitions.scaleUniform(rectangle.getElementsByClassName('circle-bottom-right')[0] || rectangle.getElementsByClassName('circle-bottom-left')[0] , tweenFunctions.easeOutQuint, scale, 1000);

                elem.setAttribute("onclick", "retract(this, " + X + ", " + Y + ", " + initialheight + ", " + "'" + sizeunit + "'" + ", " + toSize + ");");
            }

            function retract(elem, X, Y, initialheight, sizeUnit, toSize){
                // alert("a");

                var rectangle = elem.parentElement;
                // alert("a");

                transitions.resize2D(new Dimension(rectangle, 0, "vw"),
                                    new Dimension(rectangle, 0, "vh"),
                                    tweenFunctions.easeOutCubic,
                                    1000);
                transitions.resize2D(new Dimension(elem, initialheight, sizeUnit),
                                    new Dimension(elem, initialheight, sizeUnit),
                                    tweenFunctions.easeOutCubic,
                                    1000);
                transitions.resize2D(new Dimension(rectangle.getElementsByClassName('circle-bottom-right')[0] || rectangle.getElementsByClassName('circle-bottom-left')[0], initialheight, sizeUnit),
                                    new Dimension(rectangle.getElementsByClassName('circle-bottom-right')[0] || rectangle.getElementsByClassName('circle-bottom-left')[0], initialheight, sizeUnit),
                                    tweenFunctions.easeOutCubic,
                                    1000);
                // transitions.scaleUniform(elem, tweenFunctions.easeOutQuint, 1, 1000);
                // transitions.scaleUniform(rectangle.getElementsByClassName('circle-bottom-right')[0] || rectangle.getElementsByClassName('circle-bottom-left')[0], tweenFunctions.easeOutQuint, 1, 1000);

                elem.setAttribute("onclick", "expand(this," + X + ", " + Y + ", " + toSize + ", " + "'" + sizeUnit + "'" + ");");
            }
            

        </script>
    </body>

</html>