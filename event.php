<!DOCTYPE html>
<html style="scroll-behavior: smooth">
    <head>

        <link rel="stylesheet" type="text/css" href="css/slidingcontent.css">
        <link rel="stylesheet" type="text/css" href="css/basics.css">
        <link rel="stylesheet" type="text/css" href="css/circlecontent.css">     
        <link rel='stylesheet' type='text/css' href='css/sageata.css'>
        
        <?php include "elements/header.php"; ?>

        <style>
            #award-row{
                position:absolute; 
                height: 45vh; 
                width: 81vw; 
                bottom: 0; 
                margin-left:10vw; 
                background-color: transparent; 
                border-radius: 20px 20px 20px 20px;
            }

            #award-row .award-slot{
                position: relative;
                height: 100%;
                width: 33%;
                border-radius: 20px 20px 20px 20px;
                background-color: white;
                display: inline-block;
                margin-left: 0.3%;
                opacity: 0.8;
                mix-blend-mode: normal;
            }

            .award-slot .title{
                font-family: 'Khand', sans-serif;
                font-size: 3vw;
                font-weight: bold;
                width: 70%;
                top: 5%;
                transform: translate(-50%, 0%);
                color: white;
                mix-blend-mode:exclusion;
            }

            .award-slot .desc{
                font-family: 'Khand', sans-serif;
                font-size: 1.5vw;
                font-weight: normal;
                width: 90%;
                height: fit-content;
                height: -moz-fit-content;
                bottom: 2%;
                transform: translate(-50%, 0%);
                color: grey;
                mix-blend-mode:exclusion;
            }
        </style>
    </head>
    
    <body id="event" style="margin: 0px; overflow:scroll; overflow-x: hidden; overflow-y: hidden;">
        <?php 
			include "elements/sageata.html";
		?>

        <div id="scroller" class="scroller">
            <div id="link1" class="link">
                <a href="#sect1" class="dot"></a>
                <div class="sect-title"><?php echo $content['Scop']['Title']; ?></div>
            </div>
            <div id="link2" class="link">
                <a href="#sect2" class="dot"></a>
                <div class="sect-title"><?php echo $content['Teme']['Title']; ?></div>
            </div>
            <div id="link3" class="link">
                <a href="#sect3" class="dot"></a>
                <div class="sect-title"><?php echo $content['Cerinte & Premii']['Title']; ?></div>
            </div>
            <div id="link4" class="link">
                <a href="#sect4" class="dot"></a>
                <div class="sect-title"><?php echo $content['Code of Conduct']['Title']; ?></div>
            </div>
        </div>

        <div id="sect1" class="section" style="background-color: #340634;">
            <div id="title2" class="title"><?php echo $content['Scop']['Title']; ?></div>

            <div id="titlebtn2" class="titlebtn" onclick="readMore(this, false);"><?php echo $content['Interface']['Expand-btn']; ?></div>

            <div id="scopSliding" class="sliding" style="top: 0%; right: -50%; border-radius: 20px 20px 20px 20px; overflow-y:auto; height: 90vh; margin-top:2.5vh">
                <?php echo $content["Scop"][1]; ?>
            </div>
            <div class="sliding" style="bottom: 0%; left: -50%; border-radius: 20px 20px 20px 20px; margin-bottom:2.5vh; padding: 0; overflow-y:hidden;">
                <img src="pictures/bucharest2.jpg" style="width: 100%; height: 100%; object-fit:cover; position:absolute">
                <img src="pictures/bucharest2.jpg" style="width: 100%; height: 100%; object-fit:cover; opacity: 0; position:absolute">            
            </div>
        </div>

        <div style="display: flex; width: 300vw; height: 100vh">
            <div id="sect2" class="section" style="background-color: #9d49a1; overflow-y: hidden; overflow-x:hidden">
                <div id="title1" class="title" style="opacity: 0;"><?php echo $content['Teme']['Title']; ?></div>
                <div id="titlebtn1" class="titlebtn" style="opacity: 0" onclick="readMore(this, true);"><?php echo $content['Interface']['Expand-btn']; ?></div>

                <div class="sliding" style="top: 0%; right: -50%; border-radius: 20px 0px 20px 20px; overflow-y:auto">
                    <?php echo $content["Teme"][1]; ?>
                </div>
                <div class="sliding" style="bottom: 0%; right: -50%; border-radius: 20px 20px 0px 20px; background-color: #9d49a1; transform: scale(0.7)">
                    <div name="toFade" class="rectangle-content" style="top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 1">
                        <div class="circle-top-left" onclick="expand(this, 50, 50, 15, 'vh');" style="overflow: hidden;">
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
            <div style="flex: 33%; height: 100vh; background-color:#9d49a1; position: relative">
                <div class="sliding" style=" width:60vw; height:75vh; right: 0; top: 12.5vh; margin-right: 2vw; overflow-y:auto; border-radius: 20px 20px 20px 20px">
                    <?php
                        echo $content["Teme"][3] . "<br>";
                    ?>
                </div>
                <div name="toFade" class="rectangle-content" style="top: 50%; left: 15%; transform: translate(-40%, -30%); z-index: 102">
                    <div class="circle-top-left" onclick="expand(this, 27, 60, 10, 'vh');" style="overflow: hidden;">
                        <img src="pictures/pollution4.webp" style="height: 100%; width: 100%">
                    </div>
                    <div class="circle-bottom-right" style="background-color: aliceblue;"></div>
                    
                    <img src="pictures/pollution3.jpg" style="height: 100%; width: 100%; border-radius: 20px 20px 0px 20px">
                </div>
            </div>
            <div style="flex: 33%; height: 100vh; background-color:#9d49a1; position: relative">
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

        

        <div id="sect3" class="section" style="background-color:#5a0b5a;">
            <div id="title3" class="title"><?php echo $content['Cerinte & Premii']['Title']; ?></div>

            <div id="titlebtn3" class="titlebtn" onclick="readMore(this, false); showAwards(true);"><?php echo $content['Interface']['Expand-btn']; ?></div>

            <div class="sliding" style="top: 0%; right: -50%; border-radius: 20px 0px 20px 20px; overflow-y:auto">
                <?php 
                    echo $content["Cerinte & Premii"]["Descriere"] . "<br>";
                ?>
            </div>

            <div id="award-row"  style="top: 100vh;">
                <div class="award-slot">
                    <div class="text-centrat title" style="font-size: 2.5vw;">Creativity Award</div>
                    <div class="text-centrat desc"><?php echo $content["Cerinte & Premii"]["Creativitate"] . "<br>"; ?></div>
                </div><div class="award-slot">
                    <div class="text-centrat title" style="font-size: 2.5vw;">Innovation Award</div>
                    <div class="text-centrat desc"><?php echo $content["Cerinte & Premii"]["Inovatie"] . "<br>"; ?></div>
                </div><div class="award-slot">
                    <div class="text-centrat title" style="font-size: 2.5vw;">Utility & Implementation Award</div>
                    <div class="text-centrat desc"><?php echo $content["Cerinte & Premii"]["Implementare"] . "<br>"; ?></div>
                </div>
            </div>
        </div>

        <div id="sect4" class="section" style="background-color:#76667d;">
            <div id="title4" class="title"><?php echo $content['Code of Conduct']['Title']; ?></div>

            <div id="titlebtn4" class="titlebtn" onclick="readMore(this, false);"><?php echo $content['Interface']['Expand-btn']; ?></div>

            <div class="sliding" style="top: 0%; right: -50%; border-radius: 20px 20px 20px 20px; overflow-y:auto; height: 90vh; margin-top:2.5vh; overflow-y: auto">
                <?php echo $content["Code of Conduct"][1]; ?>
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
                var pic = document.getElementById('wideChangingPicture');
                if(s.scrollTop > 150 && s.scrollTop < 900){
                    detectChange = 1;
                    if(detectChange != lastDetectChange){
                        changePicture(pic, "pictures/traffic1.webp");
                        lastDetectChange = detectChange;
                    }
                }
                else if(s.scrollTop >= 900 && s.scrollTop < 1300){
                    detectChange = 2;
                    if(detectChange != lastDetectChange){
                        changePicture(pic, "pictures/park2.jpg");
                        lastDetectChange = detectChange;
                    }
                }
                else if(s.scrollTop >= 1300){
                    detectChange = 3;
                    if(detectChange != lastDetectChange){
                        changePicture(pic, "pictures/garbage1.jpg");
                        lastDetectChange = detectChange;
                    }
                }
                else{
                    detectChange = 0
                    if(detectChange != lastDetectChange){
                        changePicture(pic, 'pictures/bucharest2.jpg');
                        lastDetectChange = detectChange;
                    }
                }
            }

            document.getElementById('scopSliding').onscroll = function(){

            }

            function readMore(x, showOverflow){
                var slidings = x.parentElement.getElementsByClassName("sliding");
                var title = x.parentElement.getElementsByClassName('title')[0];
                var scrollbar = document.getElementById("scroller");
                var section = x.parentElement;

                for(var a of slidings) {
                    if(a.style.right){
                        transitions.slideX(
                            new Dimension(a, 50, "pw"),
                            tweenFunctions.easeOutQuint,
                            2000
                        );
                    }
                    else{
                        transitions.slideX(
                            new Dimension(a, 2, "pw"),
                            tweenFunctions.easeOutQuint,
                            2000
                        );
                    }
                }

                transitions.slide2D(
                    new Dimension(title, 25, "pw"),
                    new Dimension(title, 30, "ph"),
                    tweenFunctions.easeInOutExpo,
                    1000
                );
                transitions.slide2D(
                    new Dimension(x, 25, "pw"),
                    new Dimension(x, 45, "ph"),
                    tweenFunctions.easeInOutExpo,
                    1000
                );
                transitions.slide2D(
                    new Dimension(scrollbar, 100.8, "vw"),
                    new Dimension(scrollbar, 50, "vh"), 
                    tweenFunctions.easeInOutExpo,
                    1000
                );
                x.innerHTML = "<?php echo $content['Interface']['Close-btn']; ?>";
                

                if(showOverflow){
                    var body = document.body;

                    body.style.overflowX = "auto";

                    // section.parentElement.addEventListener('wheel', function(e) {
                    //     if (e.deltaY > 0) {
                    //         body.scrollLeft += 100;
                    //         alert(body.style.overflowX);
                    //     }
                    //     else {
                    //         body.scrollLeft -= 100;
                    //     }
                    // });
                }

                if(section.getElementsByClassName('award-slot').length > 0){
                    showAwards(true);
                    x.setAttribute("onclick", "readLess(this, " + showOverflow +"); showAwards(false);");
                }
                else{
                    x.setAttribute("onclick", "readLess(this, " + showOverflow +");");
                }

            }

            function readLess(x, showOverflow){
                var slidings = x.parentElement.getElementsByClassName("sliding");
                var title = x.parentElement.getElementsByClassName('title')[0];
                var scrollbar = document.getElementById("scroller");
                var section = x.parentElement;

                for(var a of slidings) {
                    if(a.style.right){
                        transitions.slideX(
                            new Dimension(a, 100, "pw"),
                            tweenFunctions.easeOutQuint,
                            2000
                        );                    
                    }
                    else{
                        transitions.slideX(
                            new Dimension(a, -50, "pw"),
                            tweenFunctions.easeOutQuint,
                            2000
                        );
                    }
                }

                transitions.slide2D(
                    new Dimension(title, 50, "pw"),
                    new Dimension(title, 50, "ph"),
                    tweenFunctions.easeInOutExpo,
                    1000
                );
                transitions.slide2D(
                    new Dimension(x, 50, "pw"),
                    new Dimension(x, 70, "ph"),
                    tweenFunctions.easeInOutExpo,
                    1000
                );
                transitions.slide2D(
                    new Dimension(scrollbar, 96, "vw"),
                    new Dimension(scrollbar, 50, "vh"), 
                    tweenFunctions.easeInOutExpo,
                    1000
                );
                x.innerHTML = "<?php echo $content['Interface']['Expand-btn']; ?>";
                if(section.getElementsByClassName('award-slot').length > 0){
                    showAwards(false);
                    x.setAttribute("onclick", "readMore(this, " + showOverflow +"); showAwards(true);");
                }
                else{
                    x.setAttribute("onclick", "readMore(this, " + showOverflow +");");
                }

                document.body.style.overflowX = "hidden";
                window.location.href = "#" + x.parentElement.id;
            }

            // function expand(elem, X, Y, scale){
            //     var rectangle = elem.parentElement;

            //     transitions.resize2D(new Dimension(rectangle, X, "vw"),
            //                         new Dimension(rectangle, Y, "vh"),
            //                         tweenFunctions.easeOutCubic,
            //                         1000);
            //     transitions.scaleUniform(elem, tweenFunctions.easeOutQuint, scale, 1000);
            //     transitions.scaleUniform(rectangle.getElementsByClassName('circle-bottom-right')[0] || rectangle.getElementsByClassName('circle-bottom-left')[0] , tweenFunctions.easeOutQuint, scale, 1000);

            //     elem.setAttribute("onclick", "retract(this, " + X + ", " + Y + ", " + scale +");");
            // }

            // function retract(elem, X, Y, scale){
            //     var rectangle = elem.parentElement;

            //     transitions.resize2D(new Dimension(rectangle, 0, "vw"),
            //                         new Dimension(rectangle, 0, "vh"),
            //                         tweenFunctions.easeOutCubic,
            //                         1000);
            //     transitions.scaleUniform(elem, tweenFunctions.easeOutQuint, 1, 1000);
            //     transitions.scaleUniform(rectangle.getElementsByClassName('circle-bottom-right')[0] || rectangle.getElementsByClassName('circle-bottom-left')[0], tweenFunctions.easeOutQuint, 1, 1000);

            //     elem.setAttribute("onclick", "expand(this," + X + ", " + Y + ", " + scale +");");
            // }

            function expand(elem, X, Y, toSize, sizeunit){
                var rectangle = elem.parentElement;
                // var initialheight = parseFloat(elem.style.height);
                // var initialheight = document.styleSheets[0].cssRules[0].style;
                // // alert(initialheight);
                // if (!isNaN(parseFloat(elem.style.height))) {
                //     // let dimHeight = new Dimension(elem, parseFloat(elem.style.height), toHeight.unitOfMeasurement);
                //     alert(initialheight + "1");
                    
                //     initialheight = parseFloat(elem.style.height);
                // } 
                // else if (!isNaN(parseFloat(initialheight.getPropertyValue('height')))) {
                //     alert(initialheight + "2");

                //     initialheight = parseFloat(initialheight.getPropertyValue('height'));
                // } 
                // else {
                //     alert(initialheight + "3");

                //     initialheight = 0;
                // }
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

                elem.setAttribute("onclick", "retract(this, " + X + ", " + Y + ", " + 30 + ", " + "'" + sizeunit + "'" + ", " + toSize + ");");
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

            function showAwards(b){
                var el = document.getElementById("award-row");

                transitions.slide2D(
                    new Dimension(el, 0, "vw"),
                    new Dimension(el, b? 55 : 100, "vh"),
                    tweenFunctions.easeInOutExpo,
                    1000
                );
            }

        </script>
    </body>
</html>