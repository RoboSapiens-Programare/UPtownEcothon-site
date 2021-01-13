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

    <body id="sponsors" style="margin: 0; background-color:#009452">
		<?php include "elements/sageatatlf.html"?>

		
        <!-- <div class="wrapper-rotating-content" style="position:relative; left:0%; height:100vh; background-color:#009452;"> -->
            
        
            <div class="rotating-content"  id="rotating-content" style="left:0%; height: 100vh; width:100%; z-index:1; overflow:hidden">
                <div class="page-title" style="position: relative; margin-top: 5vh; width:100%; height: 10vh; background-color: transparent; font-size:7vw; z-index:70">
                    <div class="text-centrat">
                        <?php echo $content['Thanks'][1]; ?>                    
                    </div>
                </div>

                <div class="rotate-index" style="z-index: 70;">
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
                        <li id="dot4">
                            <img src="icons/dot.svg">
                        </li>
                        <li id="dot5" style="opacity: 0;">
                            <img src="icons/dot.svg">
                        </li>
                    </ul>
                </div>
                
                <div class="rotate-btn" id="btn-prev" onclick="rotateLoopLeftToRight()" >
                    <!-- <img src="icons/next.svg"> -->
                </div>

                <div class="rotate-btn" id="btn-next" onclick="rotateLoopRightToLeft()" >
                    <!-- <img src="icons/next.svg"> -->
                </div>

                <div class="rotate-section" id="rt-sect4" style="background-color: #f0a7c0;">
                        <div class="wrapper" style="background-color: #f0a7c0;">
                            <div class="sect-title"> <div class="text-centrat">FTC</div> </div>
                            <div class="read-more-btn" onclick="readMore(this)"><div class="text-centrat">Read More</div></div>
                        </div>
                        <div class="sect-content"><?php echo $content['FTC']['desc']; ?></div>
                </div>
                <div class="rotate-section" id="rt-sect3" style="background-color: #e7df68">
                        <div class="wrapper" style="background-color: #e7df68">
                            <div class="sect-title"> <div class="text-centrat">Gemini Solutions</div> </div>
                            <div class="read-more-btn" onclick="readMore(this)"><div class="text-centrat">Read More</div></div>
                        </div>
                        <div class="sect-content"><?php echo $content['Gemini']['desc']; ?></div>
                </div>
                <div class="rotate-section" id="rt-sect2" style="background-color: #9cc0e9">
                        <div class="wrapper" style="background-color: #9cc0e9">
                            <div class="sect-title"> <div class="text-centrat">Endava</div> </div>
                            <div class="read-more-btn" onclick="readMore(this)"><div class="text-centrat">Read More</div></div>
                        </div>
                        <div class="sect-content"><?php echo $content['Endava']['desc']; ?></div>
                </div>
                <div class="rotate-section" id="rt-sect1" style="background-color: #009452">
                        <div class="wrapper" style="background-color: #009452">
                            <div class="sect-title"> <div class="text-centrat">Fundraiser</div> </div>
                            <div class="read-more-btn" onclick="readMore(this)"><div class="text-centrat">Read More</div></div>
                        </div>
                        <div class="sect-content">
                            <?php echo $content['Fundraiser']['desc']; ?>
                        </div>
                </div>
            </div>
           
        <?php include "elements/footer.html"?>

        
                
        <script>

            // alert('a'); 

            var rotateStatus = 1;
            // var rotateTimer = 3000;
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

            var pageTitle = rotatingContent.getElementsByClassName('page-title')[0];
            var rotateIndex = rotatingContent.getElementsByClassName('rotate-index')[0];
            var btnPrev = rotatingContent.getElementsByClassName('rotate-btn')[0];
            var btnNext = rotatingContent.getElementsByClassName('rotate-btn')[1];
            

            // alert("b");

            window.onload = function(){
                rotateLoopRightToLeft();
            }

            function rotateLoopRightToLeft(){
                if(rotateStatus === 1){
                    sect3.style.opacity ="0";
                    if(isFirst){
                        sect2.style.opacity ="0";
                    }

                    setTimeout(function(){
                        dot1.style.opacity ="1";
                        dot2.style.opacity ="0.5";
                        dot3.style.opacity ="0.5";
                        dot4.style.opacity ="0.5";

                        ToLeft(sect4);
                        sect4.style.zIndex = "10"; 
                        ToCenter(sect1);
                        sect1.style.zIndex = "20";
                        ToRight(sect3);
                        sect3.style.zIndex = "30";
                        ToRight(sect2);
                        sect2.style.zIndex = "40";
                        
                    }, 500);

                    setTimeout(function(){
                        sect3.style.opacity = "1";
                        if(isFirst){
                            sect2.style.opacity ="1";
                            isFirst = false;
                        }
                    }, 1200);

                    rotateStatus = 2;
                } else if(rotateStatus === 2){
                    sect4.style.opacity ="0";

                    setTimeout(function(){
                        dot1.style.opacity ="0.5";
                        dot2.style.opacity ="1";
                        dot3.style.opacity ="0.5";
                        dot4.style.opacity ="0.5";
                    
                        ToLeft(sect1);
                        sect1.style.zIndex = "10";
                        ToCenter(sect2);
                        sect2.style.zIndex = "20";
                        ToRight(sect3);
                        sect3.style.zIndex = "40";
                        ToRight(sect4);
                        sect4.style.zIndex = "30";
                    }, 500);

                    setTimeout(function(){
                        sect4.style.opacity = "1";
                    }, 1200);

                    rotateStatus = 3;
                } else if(rotateStatus === 3){
                    sect1.style.opacity ="0";

                    setTimeout(function(){
                        dot1.style.opacity ="0.5";
                        dot2.style.opacity ="0.5";
                        dot3.style.opacity ="1";
                        dot4.style.opacity ="0.5";
        
                        ToLeft(sect2);
                        sect2.style.zIndex = "10";
                        ToCenter(sect3);
                        sect3.style.zIndex = "20";
                        ToRight(sect1);
                        sect1.style.zIndex = "30";
                        ToRight(sect4);
                        sect4.style.zIndex = "40";
                    }, 500);

                    setTimeout(function(){
                        sect1.style.opacity = "1";
                    }, 1200);

                    rotateStatus = 4;
                } else if(rotateStatus === 4){
                    sect2.style.opacity ="0";

                    setTimeout(function(){
                        dot1.style.opacity ="0.5";
                        dot2.style.opacity ="0.5";
                        dot3.style.opacity ="0.5";
                        dot4.style.opacity ="1";
        
                        ToLeft(sect3);
                        sect3.style.zIndex = "10";
                        ToCenter(sect4);
                        sect4.style.zIndex = "20";
                        ToRight(sect2);
                        sect2.style.zIndex = "30";
                        ToRight(sect1);
                        sect1.style.zIndex = "40";
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
                        dot1.style.opacity ="1";
                        dot2.style.opacity ="0.5";
                        dot3.style.opacity ="0.5";
                        dot4.style.opacity ="0.5";
                
                        ToLeft(sect4);
                        sect4.style.zIndex = "10"; 
                        ToCenter(sect1);
                        sect1.style.zIndex = "20";
                        ToRight(sect2);
                        sect2.style.zIndex = "40";
                        ToRight(sect3);
                        sect3.style.zIndex = "30";
                    }, 500);

                    setTimeout(function(){
                        sect4.style.opacity = "1";
                    }, 1200);

                    rotateStatus = 2;
                } else if(rotateStatus === 1){
                    sect2.style.opacity ="0";
        
                    setTimeout(function(){
                        dot1.style.opacity ="0.5";
                        dot2.style.opacity ="0.5";
                        dot3.style.opacity ="1";
                        dot4.style.opacity ="0.5";

                        ToLeft(sect2);
                        sect2.style.zIndex = "10";
                        ToCenter(sect3);
                        sect3.style.zIndex = "20";
                        ToRight(sect4);
                        sect4.style.zIndex = "40";
                        ToRight(sect1);
                        sect1.style.zIndex = "30";
                    }, 500);

                    setTimeout(function(){
                        sect2.style.opacity = "1";
                    }, 1200);

                    rotateStatus = 4;
                } else if(rotateStatus === 2){
                    sect3.style.opacity ="0";
        
                    setTimeout(function(){
                        dot1.style.opacity ="0.5";
                        dot2.style.opacity ="0.5";
                        dot3.style.opacity ="0.5";
                        dot4.style.opacity ="1";

                        ToLeft(sect3);
                        sect3.style.zIndex = "10";
                        ToCenter(sect4);
                        sect4.style.zIndex = "20";
                        ToRight(sect1);
                        sect1.style.zIndex = "40";
                        ToRight(sect2);
                        sect2.style.zIndex = "30";
                    }, 500);

                    setTimeout(function(){
                        sect3.style.opacity = "1";
                    }, 1200);

                    rotateStatus = 1;
                } else if(rotateStatus === 4){
                    sect1.style.opacity ="0";
        
                    setTimeout(function(){
                        dot1.style.opacity ="0.5";
                        dot2.style.opacity ="1";
                        dot3.style.opacity ="0.5";
                        dot4.style.opacity ="0.5";

                        ToLeft(sect1);
                        sect1.style.zIndex = "10";
                        ToCenter(sect2);
                        sect2.style.zIndex = "20";
                        ToRight(sect3);
                        sect3.style.zIndex = "40";
                        ToRight(sect4);
                        sect4.style.zIndex = "30";
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
            
            function readMore(btn){
                var wrapper = btn.parentElement;
                var section = wrapper.parentElement;                
                var title = wrapper.getElementsByClassName("sect-title")[0];
                var readTag =btn.getElementsByClassName('text-centrat')[0];
                var content = section.getElementsByClassName("sect-content")[0];

                transitions.resize2D(new Dimension(wrapper, 100, "pw"),
                    new Dimension(wrapper, 20, "ph"),
                    tweenFunctions.easeInOutQuad,
                    500);

                transitions.translate2D(new Dimension(title, 0, "pw"),
                    new Dimension(title, -40, "ph"),
                    tweenFunctions.easeInOutQuad,
                    500);
                
                transitions.translate2D(new Dimension(btn, 0, "pw"),
                    new Dimension(btn, -5, "ph"),
                    tweenFunctions.easeInOutQuad,
                    500);

                transitions.translate2D(new Dimension(pageTitle, 0, "pw"),
                    new Dimension(pageTitle, -50, "ph"),
                    tweenFunctions.easeInOutQuad,
                    500);
                
                transitions.translate2D(new Dimension(rotateIndex, 0, "vw"),
                    new Dimension(rotateIndex, -50, "vh"),
                    tweenFunctions.easeInOutQuad,
                    500);
                
                // alert("a");
                
                transitions.translate2D(new Dimension(btnPrev, -50, "pw"),
                    new Dimension(btnPrev, 0, "ph"),
                    tweenFunctions.easeInOutQuad,
                    500);
                
                transitions.translate2D(new Dimension(btnNext, 50, "pw"),
                    new Dimension(btnNext, 0, "ph"),
                    tweenFunctions.easeInOutQuad,
                    500);


                transitions.translate2D(new Dimension(content, 0, "pw"),
                    new Dimension(content, -80, "ph"),
                    tweenFunctions.easeInOutQuad,
                    500);
                // alert("a");                    
                readTag.innerHTML = "Read Less";
                btn.setAttribute('onclick', 'readLess(this);');

                section.style.overflowY = "auto";
            }

            function readLess(btn){
                var wrapper = btn.parentElement;
                var section = wrapper.parentElement;
                var title = wrapper.getElementsByClassName("sect-title")[0];
                var readTag =btn.getElementsByClassName('text-centrat')[0];
                var content = section.getElementsByClassName("sect-content")[0];

                transitions.resize2D(new Dimension(wrapper, 100, "pw"),
                    new Dimension(wrapper, 100, "ph"),
                    tweenFunctions.easeInOutQuad,
                    500);



                transitions.translate2D(new Dimension(title, 0, "pw"),
                    new Dimension(title, 40, "ph"),
                    tweenFunctions.easeInOutQuad,
                    500);
                
                transitions.translate2D(new Dimension(btn, 0, "pw"),
                    new Dimension(btn, 5, "ph"),
                    tweenFunctions.easeInOutQuad,
                    500);

                transitions.translate2D(new Dimension(pageTitle, 0, "pw"),
                    new Dimension(pageTitle, 50, "ph"),
                    tweenFunctions.easeInOutQuad,
                    500);
                
                transitions.translate2D(new Dimension(rotateIndex, 0, "vw"),
                    new Dimension(rotateIndex, 50, "vh"),
                    tweenFunctions.easeInOutQuad,
                    500);
                
                // alert("a");
                
                transitions.translate2D(new Dimension(btnPrev, 50, "pw"),
                    new Dimension(btnPrev, 0, "ph"),
                    tweenFunctions.easeInOutQuad,
                    500);
                
                transitions.translate2D(new Dimension(btnNext, -50, "pw"),
                    new Dimension(btnNext, 0, "ph"),
                    tweenFunctions.easeInOutQuad,
                    500);


                transitions.translate2D(new Dimension(content, 0, "pw"),
                    new Dimension(content, 80, "ph"),
                    tweenFunctions.easeInOutQuad,
                    500);
                // alert("a");                    
                readTag.innerHTML = "Read More";
                btn.setAttribute('onclick', 'readMore(this);');

                section.style.overflowY = "hidden";
            }

        </script>
    </body>

</html>