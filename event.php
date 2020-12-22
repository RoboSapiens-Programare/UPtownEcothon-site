<?php
    require_once 'Mobile-Detect-master/Mobile_Detect.php';
    $detect = new Mobile_Detect;

    $scriptVersion = $detect->getScriptVersion();

    //CONTENT
    include 'config/dbconfig.php';

    try{
        $db = new SQLiDB();

        $sql = "SELECT * FROM content WHERE page = 'event.php'";

        $stmt = $db->prepare($sql);
        
        $stmt->execute();

        $content = array();
        foreach($stmt as $row){
            $content[$row["section"]][$row["subsection"]] = $row["content"];
        }

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

        <?php 
			if($detect->isMobile() || $detect->isTablet()) {
				echo "<link rel='stylesheet' type='text/css' href='css/sageatatlf.css'>";
			} else {
				echo "<link rel='stylesheet' type='text/css' href='css/sageata.css'>";
			}
		?>


        <link href="https://allfont.net/allfont.css?fonts=agency-fb-bold" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <script src="javascript/tween-functions.js"></script>
        <script src="javascript/transitions.js"></script>
    </head>
    
    <body style="margin: 0px; overflow-x: hidden; overflow-y: hidden;">
        <?php 
			if($detect->isMobile() || $detect->isTablet()) {
				include "elements/sageatatlf.html";
			} else {
				include "elements/sageata.html";
			}
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


        <div style="display: flex; width: 200vw; height: 100vh">
            <div id="sect1" class="section" style="background-color: darkkhaki; overflow-y: hidden; overflow-x:hidden">
                <div id="title1" class="title" style="opacity: 0;">Teme</div>
                <div id="titlebtn1" class="titlebtn" style="opacity: 0" onclick="readMore(this);">Read More</div>

                <div class="sliding" style="top: 0%; right: -50%; border-radius: 20px 0px 20px 20px; overflow-y:auto">
                    <?php echo "<h2>" . $content["Teme"]["Title1"] . "</h2>";
                          echo $content["Teme"][1]; ?>
                </div>
                <div class="sliding" style="bottom: 0%; right: -50%; border-radius: 20px 20px 0px 20px; background-color: darkkhaki; transform: scale(0.7)">
                    <div name="toFade" class="rectangle-content" style="top: 50%; left: 50%; transform: translate(-50%, -50%); opacity: 1">
                        <div class="circle-top-left" onclick="expand(this);" style="overflow: hidden;">
                            <img src="pictures/pollution1.jpg" style="height: 100%; width: 100%">
                        </div>
                        <div class="circle-bottom-right" style="background-color: aliceblue;"></div>
                        
                        <img src="pictures/pollution2.jpg" style="height: 100%; width: 100%; border-radius: 20px 20px 0px 20px">
                    </div>
                </div>
                <div class="sliding" style="bottom: 0%; left: -50%; border-radius: 20px 20px 20px 0px;">
                    <?php echo $content["Teme"][2] ?>
                </div>
            </div>
            <div style="flex: 50%; height: 100vh; background-color:darkkhaki; position: relative">
                <div class="sliding" style=" width:60vw; height:85vh; right: 0; top: 7.5vh; margin-right: 2vw; overflow-y:auto">
                    <?php
                        echo "<h2>" . $content["Teme"]["Title2"] . "</h2>";
                        echo $content["Teme"][3] . "<br>";
                        echo $content["Teme"]["Subtitle1"];
                        echo $content["Teme"][4] . "<br>";
                    ?>
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

        <!-- Optimize this shit -->
        <script>
            transitions.fadeIn(document.getElementById('title1'), tweenFunctions.easeOutQuad, 1500);
            transitions.fadeIn(document.getElementById('titlebtn1'), tweenFunctions.easeInSine, 1500);

            function readMore(x){
                var slidings = x.parentElement.getElementsByClassName("sliding");
                var title = x.parentElement.getElementsByClassName('title')[0];
                var scrollbar = document.getElementById("scroller");
                var section = x.parentElement;

                for(var a of slidings) {
                    if(a.style.right){
                        transitions.translate2D(
                            new Dimension(a, -50, "pw"),
                            new Dimension(a, 0, "px"),
                            tweenFunctions.easeOutQuint,
                            2000
                        );
                    }
                    else{
                        transitions.translate2D(
                            new Dimension(a, 50, "pw"),
                            new Dimension(a, 0, "px"),
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
                            new Dimension(a, 0, "px"),
                            tweenFunctions.easeOutQuint,
                            2000
                        );                    }
                    else{
                        transitions.translate2D(
                            new Dimension(a, -50, "pw"),
                            new Dimension(a, 0, "px"),
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

            function expand(elem){
                var rectangle = elem.parentElement;

                transitions.resize2D(new Dimension(rectangle, 50, "vw"),
                                    new Dimension(rectangle, 50, "vh"),
                                    tweenFunctions.easeOutCubic,
                                    1000);
                transitions.scaleUniform(elem, tweenFunctions.easeOutQuint, 0.7, 1000);
                transitions.scaleUniform(rectangle.getElementsByClassName('circle-bottom-right')[0] || rectangle.getElementsByClassName('circle-bottom-left')[0] , tweenFunctions.easeOutQuint, 0.7, 1000);

                elem.setAttribute("onclick", "retract(this);");
            }

            function retract(elem){
                var rectangle = elem.parentElement;

                transitions.resize2D(new Dimension(rectangle, 0, "vw"),
                                    new Dimension(rectangle, 0, "vh"),
                                    tweenFunctions.easeOutCubic,
                                    1000);
                transitions.scaleUniform(elem, tweenFunctions.easeOutQuint, 1, 1000);
                transitions.scaleUniform(rectangle.getElementsByClassName('circle-bottom-right')[0] || rectangle.getElementsByClassName('circle-bottom-left')[0], tweenFunctions.easeOutQuint, 1, 1000);

                elem.setAttribute("onclick", "expand(this);");
            }
        </script>
    </body>
</html>