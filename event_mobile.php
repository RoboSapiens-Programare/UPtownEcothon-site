<!DOCTYPE html>
<html style="scroll-behavior: smooth">
    <head>
		<title>Event - UTE</title>

        <link rel="stylesheet" type="text/css" href="css/slidingcontent.css">
        <link rel="stylesheet" type="text/css" href="css/basics.css">
        <link rel="stylesheet" type="text/css" href="css/circlecontent.css">     
       
		<link rel='stylesheet' type='text/css' href='css/sageatatlf.css'>

        <?php include "elements/header.php"; ?>
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
            <div style="position: -webkit-sticky; position: -moz-sticky; position: -ms-sticky; position: -o-sticky; position: sticky; width: 100%; height: 100%; bottom: 0; z-index: -1">
                <img src="pictures/pollution_portrait1.jpg" style="position:absolute; width: 100%; height: 100%; object-fit: cover">
                <img src="pictures/pollution_portrait1.jpg" style="position:absolute; width: 100%; height: 100%; object-fit: cover; opacity: 0">
            </div>
        </div>

        <div id="sect2" class="section" >
            <div class="wrapper" style="background-color:darkslategray; z-index: 5">
                <div id="title1" class="title">Scop</div>
                <div id="titlebtn1" class="titlebtn" onclick="readMore(this);">Read More</div>
            </div>
        </div>

        <div id="sect3" class="section" >
            <div class="wrapper" style="background-color:salmon; z-index: 5">
                <div id="title1" class="title" style="font-size: 15vw; width: 100vw;text-align: center">Cerinte & Premii</div>
                <div id="titlebtn1" class="titlebtn" onclick="readMore(this);">Read More</div>
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
                var title = x.parentElement.getElementsByClassName('title')[0];
                var scrollbar = document.getElementById("scroller");
                var wrapper = x.parentElement;
                var section = wrapper.parentElement;

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

                section.style.overflowY = "auto";
            }

            function readLess(x){
                var title = x.parentElement.getElementsByClassName('title')[0];
                var scrollbar = document.getElementById("scroller");
                var wrapper = x.parentElement;
                var section = wrapper.parentElement;

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

                window.location.href = "#" + section.id;
                section.style.overflowY = "hidden";
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

        </script>
    </body>
</html>