<!DOCTYPE html>
<html style="scroll-behavior: smooth">
	<head>

		<link rel="stylesheet" type="text/css" href="css/sageata.css">
		<link rel="stylesheet" type="text/css" href="css/basics.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css">
        <link rel="stylesheet" type="text/css" href="css/circlecontent.css">
        <link rel="stylesheet" type="text/css" href="css/rotatingcontent.css">
          
		<?php include 'elements/header.php'; ?>

        <style>
            /* .tag{
                position: absolute;
                color: white;
                font-size: 1vw;
                top: 50%;
                left: 0vh;
                transform: translate(0%,-50%);
                transition: all 200ms ease;
            }
            .rectangle-content .circle-top-left:hover .tag{
                left: 18vh;
                transform: translate(100%,-50%);
                transition: all 200ms ease;
            } */
        </style>

    </head>
    
    <body class="sponsors" style="margin: 0; background-color:#340634; overflow-x:hidden; ">

        <?php 
			include "elements/sageata.html";
        ?>

        <!-- <div style="position: absol; width:100%; height: 15vh; background-color: transparent; font-size:3vw">
            <div class="text-centrat" style="color:white; border-bottom: 0.5vh dashed #00ff16">
                <?php echo $content['Thanks'][1]; ?>    
            </div>
        </div> -->

        <!-- <div id="info-menu" style="position: fixed; width: 100%; height: 100vh; z-index: -1"> -->
            <a href="#spon" style="position: fixed; width: 7%; height: 100vh; z-index: 20; left:1%">
                <div class="rotate-btn" id="btn-prev">
                    <img src="ute-icons/arrow-left.svg">
                </div>
            </a>
            <a href="#partners" style="position: fixed; width: 7%; height: 100vh; z-index: 20; right:1%">
                <div class="rotate-btn" id="btn-next">
                    <img src="ute-icons/arrow-right.svg">
                </div>
            </a>
        <!-- </div> -->

        <div style="background:transparent; overflow-x: auto; overflow-y: hidden; margin:0px; width: 100vw; height: 100vh; box-sizing: border-box; z-index:10; position:relative; scrollbar-width: none; scroll-behavior: smooth">
            <div style="background:transparent; width: 301%; height: 100%; position: relative">
                <div id="spon" style="position:relative; display:inline-block; width: 100vw; height: 100vh">
                    <div style="position: relative; width:100%; height: 15vh; background-color: transparent; font-size:3vw">
                        <div class="text-centrat" style="color:white; border-bottom: 0.5vh dashed #00ff16">
                            <?php echo $content['Thanks'][1]; ?>    
                        </div>
                    </div>

                    <div id="container-spon" style="position:relative; width:100%; height:85vh; background-color:transparent;">
                        <div class="rectangle-content" id="rectangle-content" style="top: 30%; left: 25%; transform:translate(-50%,-50%)">
                            <div class="circle-top-left" onclick="expand(this, 60, 60, 17, 'vh');" style="height: 45vh; width:45vh;"><div class="text-centrat" style="width:90%"><img src="pictures/logo-softelligence.png" alt="Softelligence" style="width:100%"></div></div>
                            <div class="circle-bottom-right" style="height: 45vh; width:45vh;"></div>
                            
                            <div  class="text-centrat" style="font-size: 1.2vw; width: 90%; max-height:90%; overflow: hidden; font-family: 'Montserrat', sans-serif"> <?php echo $content['Softelligence']['desc']; ?> </div>

                        </div>

                        <div class="rectangle-content" id="rectangle-content" style="top: 30%; left: 75%; transform:translate(-50%,-50%)">
                            <div class="circle-top-left" onclick="expand(this, 60, 60, 17, 'vh');" style="height: 45vh; width:45vh;"><div class="text-centrat" style="width:90%"><img src="pictures/endava.png" alt="Endava" style="width: 100%;"></div></div>
                            <div class="circle-bottom-right" style="height: 45vh; width:45vh;"></div>
                            
                            <div  class="text-centrat" style="font-size: 1.2vw; width: 90%; max-height:90%; overflow: hidden; font-family: 'Montserrat', sans-serif"> <?php echo $content['Endava']['desc']; ?> </div>
                        </div>

                        <div class="rectangle-content" id="rectangle-content" style="top: 60%; left: 50%; transform:translate(-50%,-50%)">
                            <div class="circle-top-left" onclick="expand(this, 60, 60, 17, 'vh');" style="height: 45vh; width:45vh;"><div class="text-centrat" style="width:90%"><img src="pictures/gemini-solutions-logo.svg" alt="Gemini Sols" style="width:100%; filter:contrast(200%); -webkit-filer:contrast(200%);"></div></div>
                            <div class="circle-bottom-right" style="height: 45vh; width:45vh;"></div>
                            
                            <div  class="text-centrat" style="font-size: 1.2vw; width: 90%; max-height:90%; overflow: hidden; font-family: 'Montserrat', sans-serif"> <?php echo $content['Gemini']['desc']; ?> </div>
                        </div>
                    </div>
                </div>

                <div id="partners" style="position:relative; display:inline-block; width: 100vw; height: 100vh">
                    <div style="position: relative; width:100%; height: 15vh; background-color: transparent; font-size:3vw">
                        <div class="text-centrat" style="color:white; border-bottom: 0.5vh dashed #00ff16">
                            <?php echo $content['Thanks'][2]; ?>    
                        </div>
                    </div>

                    <div id="container-partners" style="position:relative; width:100%; height:85vh; background-color:transparent;">
                        <div class="rectangle-content" id="rectangle-content" style="top: 30%; left: 20%; transform:translate(-50%,-50%)">
                            <div class="circle-top-left" id="hoverpls" onclick="expand(this, 60, 60, 17, 'vh');" style="height: 30vh; width:30vh;"><div class="text-centrat" style="width:90%"><img src="pictures/logo-softelligence.png" alt="Softelligence" style="width:100%"></div></div>
                            <div class="circle-bottom-right" style="height: 30vh; width:30vh;"></div>
                            
                            <div  class="text-centrat" style="font-size: 1.2vw; width: 90%; max-height:90%; overflow: hidden; font-family: 'Montserrat', sans-serif"> <?php echo $content['Softelligence']['desc']; ?> </div>
                            
                            <div class="tagtag">Parteneri Strategici, Media</div>
                        </div>

                        <div class="rectangle-content" id="rectangle-content" style="top: 30%; left: 60%; transform:translate(-50%,-50%)">
                            <div class="circle-top-left" onclick="expand(this, 60, 60, 17, 'vh');" style="height: 30vh; width:30vh;"><div class="text-centrat" style="width:90%"><img src="pictures/logo-highedu.png" alt="High Edu" style="width:100%"></div></div>
                            <div class="circle-bottom-right" style="height: 30vh; width:30vh;"></div>
                            
                            <div  class="text-centrat" style="font-size: 1.2vw; width: 90%; max-height:90%; overflow: hidden; font-family: 'Montserrat', sans-serif"> <?php echo $content['HighEdu']['desc']; ?> </div>
                            <div class="tagtag">Parteneri Strategici, Media</div>
                        </div>

                        <div class="rectangle-content" id="rectangle-content" style="top: 60%; left: 40%; transform:translate(-50%,-50%)">
                            <div class="circle-top-left" onclick="expand(this, 60, 60, 17, 'vh');" style="height: 30vh; width:30vh;"><div class="text-centrat" style="width:90%"><img src="pictures/geyc.png" alt="geyc" style="width: 100%;"></div></div>
                            <div class="circle-bottom-right" style="height: 30vh; width:30vh;"></div>
                            
                            <div  class="text-centrat" style="font-size: 1.2vw; width: 90%; max-height:90%; overflow: hidden; font-family: 'Montserrat', sans-serif"> <?php echo $content['Geyc']['desc']; ?> </div>
                            <div class="tagtag">Parteneri Strategici, Media</div>
                        </div>

                        <div class="rectangle-content" id="rectangle-content" style="top: 60%; left: 80%; transform:translate(-50%,-50%)">
                            <div class="circle-top-left" onclick="expand(this, 60, 60, 17, 'vh');" style="height: 30vh; width:30vh;"><div class="text-centrat" style="width:90%"><img src="pictures/FTC.png" alt="FTC" style="width:100%"></div></div>
                            <div class="circle-bottom-right" style="height: 30vh; width:30vh;"></div>
                            
                            <div  class="text-centrat" style="font-size: 1.2vw; width: 90%; max-height:90%; overflow: hidden; font-family: 'Montserrat', sans-serif"> <?php echo $content['FTC']['desc']; ?> </div>
                            <div class="tagtag">Parteneri Strategici, Media</div>
                        </div>

                        
                    </div>
                </div>    
            </div> 
        </div>


        <!-- <div class="wrapper-rotating-content" style="position:relative; left:0%; height:85vh; overflow-y:visible">
        <div style="position:absolute; width:100%; height:100%; background:linear-gradient(black, black), url(pictures/blob.gif);background-position: -10% center; background-size:cover; background-blend-mode: hue; filter:blur(10px)"></div>
            <div class="rotating-content"  id="rotating-content" style="left:0%; height: 80vh; width:100%; background-color:transparent">
                <div class="rotate-btn" id="btn-prev" onclick="rotateLoopLeftToRight()" onmouseover="pauseLoop()" onmouseleave="resumeLoop()">
                    <img src="ute-icons/arrow-left.svg">
                </div>

                <div class="rotate-btn" id="btn-next" onclick="rotateLoopRightToLeft()" onmouseover="pauseLoop()" onmouseleave="resumeLoop()">
                    <img src="ute-icons/arrow-right.svg">
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
                        <img src="ute-icons/dot.svg">
                    </li>
                    <li id="dot2">
                        <img src="ute-icons/dot.svg">
                    </li>
                    <li id="dot3">
                        <img src="ute-icons/dot.svg">
                    </li>
                    <li id="dot4">
                        <img src="ute-icons/dot.svg">
                    </li>
                </ul>
            </div>
        </div> -->
        
        <?php include "elements/footer.html"; ?>	
                
        <script>

            // alert(window.innerWidth); 

            // var rotateStatus = 1;
            // var rotateTimer = 3000;
            // var isFirst = true;

            // var rotatingContent = document.getElementById('rotating-content');
            // // var rotatingIndex = document.getElementsByClassName('rotating-index')[0];
            // // alert("a"); 

            // var sect1 = rotatingContent.getElementsByClassName('rotate-section')[3];
            // var sect2 = rotatingContent.getElementsByClassName('rotate-section')[2];
            // var sect3 = rotatingContent.getElementsByClassName('rotate-section')[1];
            // var sect4 = rotatingContent.getElementsByClassName('rotate-section')[0];

            // var dot1 = document.getElementById('dot1');
            // var dot2 = document.getElementById('dot2');
            // var dot3 = document.getElementById('dot3');
            // var dot4 = document.getElementById('dot4');

            // // alert("a");

            // window.onload = function(){
            //     sect2.style.opacity ="0";
            //     sect3.style.opacity ="0";
            //     sect4.style.opacity ="0";
            //     rotateLoopRightToLeft();
            //     setTimeout(function(){
            //         sect2.style.opacity ="1";
            //         sect3.style.opacity ="1";
            //         sect4.style.opacity ="1";
            //     }, 1200);

            // }

            // var startLoop = setInterval(function(){
            //     rotateLoopRightToLeft();
            // }, rotateTimer);

            // function pauseLoop(){
            //     clearInterval(startLoop);
            //     // console.log("a");
            // }

            // function resumeLoop(){
            //     startLoop = setInterval(function(){
            //     rotateLoopRightToLeft();
            //     }, rotateTimer);
            //     // console.log("b");
            // }

            // function rotateLoopRightToLeft(){
            //     if(rotateStatus === 1){
            //         sect3.style.opacity ="0";
            //         // if(isFirst){
            //         //     sect2.style.opacity ="0";
            //         // }

            //         setTimeout(function(){
            //             dot1.style.filter ="invert(100%)";
            //             dot2.style.filter ="invert(60%)";
            //             dot3.style.filter ="invert(60%)";
            //             dot4.style.filter ="invert(60%)";
            //             // dot2.style.opacity ="0.5";
            //             // dot3.style.opacity ="0.5";
            //             // dot4.style.opacity ="0.5";

            //             ToLeft(sect4);
            //             sect4.style.zIndex = "10"; 
            //             ToCenter(sect1);
            //             sect1.style.zIndex = "20";
            //             ToRight(sect3);
            //             sect3.style.zIndex = "10";
            //             ToRight(sect2);
            //             sect2.style.zIndex = "30";
                        
            //         }, 500);

            //         setTimeout(function(){
            //             sect3.style.opacity = "1";
            //             // if(isFirst){
            //             //     sect2.style.opacity ="1";
            //             //     isFirst = false;
            //             // }
            //         }, 1200);

            //         rotateStatus = 2;
            //     } else if(rotateStatus === 2){
            //         sect4.style.opacity ="0";

            //         setTimeout(function(){
            //             dot1.style.filter ="invert(60%)";
            //             dot2.style.filter ="invert(100%)";
            //             dot3.style.filter ="invert(60%)";
            //             dot4.style.filter ="invert(60%)";
            //             // dot1.style.opacity ="0.5";
            //             // dot2.style.opacity ="1";
            //             // dot3.style.opacity ="0.5";
            //             // dot4.style.opacity ="0.5";
                    
            //             ToLeft(sect1);
            //             sect1.style.zIndex = "10";
            //             ToCenter(sect2);
            //             sect2.style.zIndex = "20";
            //             ToRight(sect3);
            //             sect3.style.zIndex = "30";
            //             ToRight(sect4);
            //             sect4.style.zIndex = "10";
            //         }, 500);

            //         setTimeout(function(){
            //             sect4.style.opacity = "1";
            //         }, 1200);

            //         rotateStatus = 3;
            //     } else if(rotateStatus === 3){
            //         sect1.style.opacity ="0";

            //         setTimeout(function(){
            //             dot1.style.filter ="invert(60%)";
            //             dot2.style.filter ="invert(60%)";
            //             dot3.style.filter ="invert(100%)";
            //             dot4.style.filter ="invert(60%)";
            //             // dot1.style.opacity ="0.5";
            //             // dot2.style.opacity ="0.5";
            //             // dot3.style.opacity ="1";
            //             // dot4.style.opacity ="0.5";
        
            //             ToLeft(sect2);
            //             sect2.style.zIndex = "10";
            //             ToCenter(sect3);
            //             sect3.style.zIndex = "20";
            //             ToRight(sect1);
            //             sect1.style.zIndex = "10";
            //             ToRight(sect4);
            //             sect4.style.zIndex = "30";
            //         }, 500);

            //         setTimeout(function(){
            //             sect1.style.opacity = "1";
            //         }, 1200);

            //         rotateStatus = 4;
            //     } else if(rotateStatus === 4){
            //         sect2.style.opacity ="0";

            //         setTimeout(function(){
            //             // dot1.style.opacity ="0.5";
            //             // dot2.style.opacity ="0.5";
            //             // dot3.style.opacity ="0.5";
            //             // dot4.style.opacity ="1";
            //             dot1.style.filter ="invert(60%)";
            //             dot2.style.filter ="invert(60%)";
            //             dot3.style.filter ="invert(60%)";
            //             dot4.style.filter ="invert(100%)";
        
            //             ToLeft(sect3);
            //             sect3.style.zIndex = "10";
            //             ToCenter(sect4);
            //             sect4.style.zIndex = "20";
            //             ToRight(sect2);
            //             sect2.style.zIndex = "10";
            //             ToRight(sect1);
            //             sect1.style.zIndex = "30";
            //         }, 500);

            //         setTimeout(function(){
            //             sect2.style.opacity = "1";
            //         }, 1200);

            //         rotateStatus = 1;
            //     }
            // }

            // function rotateLoopLeftToRight(){
            //     if(rotateStatus === 3){
            //         sect4.style.opacity ="0";

            //         setTimeout(function(){
            //             dot1.style.filter ="invert(100%)";
            //             dot2.style.filter ="invert(60%)";
            //             dot3.style.filter ="invert(60%)";
            //             dot4.style.filter ="invert(60%)";
            //             // dot1.style.opacity ="1";
            //             // dot2.style.opacity ="0.5";
            //             // dot3.style.opacity ="0.5";
            //             // dot4.style.opacity ="0.5";
                
            //             ToLeft(sect4);
            //             sect4.style.zIndex = "10"; 
            //             ToCenter(sect1);
            //             sect1.style.zIndex = "20";
            //             ToRight(sect2);
            //             sect2.style.zIndex = "30";
            //             ToRight(sect3);
            //             sect3.style.zIndex = "10";
            //         }, 500);

            //         setTimeout(function(){
            //             sect4.style.opacity = "1";
            //         }, 1200);

            //         rotateStatus = 2;
            //     } else if(rotateStatus === 1){
            //         sect2.style.opacity ="0";
        
            //         setTimeout(function(){
            //             dot1.style.filter ="invert(60%)";
            //             dot2.style.filter ="invert(60%)";
            //             dot3.style.filter ="invert(100%)";
            //             dot4.style.filter ="invert(60%)";
            //             // dot1.style.opacity ="0.5";
            //             // dot2.style.opacity ="0.5";
            //             // dot3.style.opacity ="1";
            //             // dot4.style.opacity ="0.5";

            //             ToLeft(sect2);
            //             sect2.style.zIndex = "10";
            //             ToCenter(sect3);
            //             sect3.style.zIndex = "20";
            //             ToRight(sect4);
            //             sect4.style.zIndex = "30";
            //             ToRight(sect1);
            //             sect1.style.zIndex = "10";
            //         }, 500);

            //         setTimeout(function(){
            //             sect2.style.opacity = "1";
            //         }, 1200);

            //         rotateStatus = 4;
            //     } else if(rotateStatus === 2){
            //         sect3.style.opacity ="0";
        
            //         setTimeout(function(){
            //             dot1.style.filter ="invert(60%)";
            //             dot2.style.filter ="invert(60%)";
            //             dot3.style.filter ="invert(60%)";
            //             dot4.style.filter ="invert(100%)";
            //             // dot1.style.opacity ="0.5";
            //             // dot2.style.opacity ="0.5";
            //             // dot3.style.opacity ="0.5";
            //             // dot4.style.opacity ="1";

            //             ToLeft(sect3);
            //             sect3.style.zIndex = "10";
            //             ToCenter(sect4);
            //             sect4.style.zIndex = "20";
            //             ToRight(sect1);
            //             sect1.style.zIndex = "30";
            //             ToRight(sect2);
            //             sect2.style.zIndex = "10";
            //         }, 500);

            //         setTimeout(function(){
            //             sect3.style.opacity = "1";
            //         }, 1200);

            //         rotateStatus = 1;
            //     } else if(rotateStatus === 4){
            //         sect1.style.opacity ="0";
        
            //         setTimeout(function(){
            //             dot1.style.filter ="invert(60%)";
            //             dot2.style.filter ="invert(100%)";
            //             dot3.style.filter ="invert(60%)";
            //             dot4.style.filter ="invert(60%)";
            //             // dot1.style.opacity ="0.5";
            //             // dot2.style.opacity ="1";
            //             // dot3.style.opacity ="0.5";
            //             // dot4.style.opacity ="0.5";

            //             ToLeft(sect1);
            //             sect1.style.zIndex = "10";
            //             ToCenter(sect2);
            //             sect2.style.zIndex = "20";
            //             ToRight(sect3);
            //             sect3.style.zIndex = "30";
            //             ToRight(sect4);
            //             sect4.style.zIndex = "10";
            //         }, 500);

            //         setTimeout(function(){
            //             sect1.style.opacity = "1";
            //         }, 1200);

            //         rotateStatus = 3;
            //     }
            // }

            // function ToCenter(elem){
            //     transitions.slide2D(new Dimension(elem, 0, "percent"),
            //         new Dimension(elem, 0, "percent"),
            //         tweenFunctions.easeInOutQuad,
            //         700);
            // }

            // function ToLeft(elem){
            //     transitions.slide2D(new Dimension(elem, -100, "percent"),
            //         new Dimension(elem, 0, "percent"),
            //         tweenFunctions.easeInOutQuad,
            //         700);
            // }

            // function ToRight(elem){
            //     transitions.slide2D(new Dimension(elem, 100, "percent"),
            //         new Dimension(elem, 0, "percent"),
            //         tweenFunctions.easeInOutQuad,
            //         700);
            // }

            function expand(elem, X, Y, toSize, sizeunit){
                var rectangle = elem.parentElement;
                var initialheight = parseFloat(elem.style.height);
                var origX = parseFloat(rectangle.style.left);
                var origY = parseFloat(rectangle.style.top);
                rectangle.style.zIndex = "50";
                rectangle.setAttribute("id", "rectangle-content current");
                var otherdivs = document.querySelectorAll('div#rectangle-content:not(#current)')
                for (i = 0; i < otherdivs.length; i++) {
                    transitions.fadeOut(otherdivs[i], tweenFunctions.easeOutCubic, 500);
                }

                // alert(initialheight);

                transitions.resize2D(new Dimension(rectangle, X, "vw"),
                                    new Dimension(rectangle, Y, "vh"),
                                    tweenFunctions.easeOutCubic,
                                    1000);
                transitions.slide2D(new Dimension(rectangle, 50, "percent"),
                                    new Dimension(rectangle, 50, "percent"),
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

                elem.setAttribute("onclick", "retract(this, " + X + ", " + Y + ", " + initialheight + ", " + "'" + sizeunit + "'" + ", " + toSize + ", "+ origX + ", " + origY +");");
            }

            function retract(elem, X, Y, initialheight, sizeUnit, toSize, origX, origY){
                // alert("a");

                var rectangle = elem.parentElement;
                var otherdivs = document.querySelectorAll('div#rectangle-content:not(#current)')
                for (i = 0; i < otherdivs.length; i++) {
                    transitions.fadeIn(otherdivs[i], tweenFunctions.easeOutCubic, 500);
                }

                
                // alert("a");

                transitions.resize2D(new Dimension(rectangle, 0, "vw"),
                                    new Dimension(rectangle, 0, "vh"),
                                    tweenFunctions.easeOutCubic,
                                    1000);
                transitions.slide2D(new Dimension(rectangle, origX, "percent"),
                                    new Dimension(rectangle, origY, "percent"),
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
                rectangle.removeAttribute("id");
                rectangle.setAttribute("id", "rectangle-content");
                rectangle.style.zIndex = "0";

                elem.setAttribute("onclick", "expand(this," + X + ", " + Y + ", " + toSize + ", " + "'" + sizeUnit + "'" + ");");
            }
            

        </script>
    </body>

</html>