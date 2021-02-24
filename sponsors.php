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
            .image{
                font-size: 5vh;
                position: absolute;
                top:50%;
                left:50%;
                transform: translate(-50%,-50%);
                width:80%;
            }
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

                    <a href="https://www.sprijina.ro/cauze/uptown-ecothon-robosapiens" style="position:absolute; bottom:2%;z-index:10;text-align:center;width:100%;font-size:1.5vw; color:white; text-decoration:underline #00ff16; font-family:'Khand',sans serif;"><?php echo $content['Fundraiser']['short'];?></a>

                    <div id="container-spon" style="position:relative; width:100%; height:85vh; background-color:transparent;">
                        
                        <div class="rectangle-content" id="rectangle-content" style="top: 60%; left: 25%; transform:translate(-50%,-50%)">
                            <div class="circle-top-left" onclick="expand(this, 60, 60, 17, 'vh');" style="height: 45vh; width:45vh;"><img class="image" src="pictures/endava.png" alt="Endava"></div>
                            <div class="circle-bottom-right" style="height: 45vh; width:45vh;"></div>
                            
                            <div  class="text-centrat" style="font-size: 1.2vw; width: 90%; max-height:90%; overflow: hidden; font-family: 'Montserrat', sans-serif"> <?php echo $content['Endava']['desc']; ?> </div>
                        </div>

                        <div class="rectangle-content" id="rectangle-content" style="top: 30%; left: 50%; transform:translate(-50%,-50%)">
                            <div class="circle-top-left" onclick="expand(this, 60, 60, 17, 'vh');" style="height: 45vh; width:45vh;"><img class="image" src="pictures/logo-softelligence.png" alt="Softelligence"></div>
                            <div class="circle-bottom-right" style="height: 45vh; width:45vh;"></div>
                            
                            <div  class="text-centrat" style="font-size: 1.2vw; width: 90%; max-height:90%; overflow: hidden; font-family: 'Montserrat', sans-serif"> <?php echo $content['Softelligence']['desc']; ?> </div>
                        </div>

                        <div class="rectangle-content" id="rectangle-content" style="top: 60%; left: 75%; transform:translate(-50%,-50%)">
                            <div class="circle-top-left" onclick="expand(this, 60, 60, 17, 'vh');" style="height: 45vh; width:45vh;"><img class="image" src="pictures/gemini-solutions-logo.svg" alt="Gemini Sols" style="filter:contrast(200%); -webkit-filer:contrast(200%);"></div>
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

                    <a href="https://www.sprijina.ro/cauze/uptown-ecothon-robosapiens" style="position:absolute; bottom:2%;z-index:10;text-align:center;width:100%;font-size:1.5vw; color:white; text-decoration:underline #00ff16; font-family:'Khand',sans serif;"><?php echo $content['Fundraiser']['short'];?></a>

                    <div id="container-partners" style="position:relative; width:100%; height:85vh; background-color:transparent;">
                        <div class="rectangle-content" id="rectangle-content" style="top: 60%; left: 20%; transform:translate(-50%,-50%)" onclick="document.location.href = 'http://highedu.ro/'">
                            <div class="circle-top-left" style="height: 27vh; width:27vh; cursor:default"><img class="image" src="pictures/logo-highedu.png" alt="High Edu"></div>
                            
                            <div class="tagtag"><?php echo $content['HighEdu']['tag']; ?></div>
                        </div>

                        <div class="rectangle-content" id="rectangle-content" style="top: 30%; left: 35%; transform:translate(-50%,-50%)" onclick="document.location.href = 'https://www.softelligence.net/'">
                            <div class="circle-top-left" id="hoverpls" style="height: 27vh; width:27vh; cursor:default"><img class="image" src="pictures/logo-softelligence.png" alt="Softelligence"></div>
                            
                            <div class="tagtag"><?php echo $content['Softelligence']['tag']; ?></div>
                        </div>
                   
                        <div class="rectangle-content" id="rectangle-content" style="top: 60%; left: 50%; transform:translate(-50%,-50%)" onclick="document.location.href = 'https://dezvoltam.ro/'">
                            <div class="circle-top-left" style="height: 27vh; width:27vh; cursor:default"><img class="image" src="pictures/dezvoltam.png" alt="Dezvoltam.ro"></div>
                            
                            <div class="tagtag"><?php echo $content['Dezvoltam']['tag']; ?></div>
                        </div>

                        <div class="rectangle-content" id="rectangle-content" style="top: 30%; left: 65%; transform:translate(-50%,-50%)" >
                            <div class="circle-top-left" onclick="expand(this, 60, 60, 17, 'vh');" style="height: 27vh; width:27vh;"><img class="image" src="pictures/FTC.png" alt="FTC"></div>
                            <div class="circle-bottom-right" style="height: 27vh; width:27vh;"></div>
                            
                            <div  class="text-centrat" style="font-size: 1.2vw; width: 90%; max-height:90%; overflow: hidden; font-family: 'Montserrat', sans-serif"> <?php echo $content['FTC']['desc']; ?> </div>
                            <div class="tagtag"><?php echo $content['FTC']['tag']; ?></div>
                        </div>

                        <div class="rectangle-content" id="rectangle-content" style="top: 60%; left: 80%; transform:translate(-50%,-50%)" onclick="document.location.href = 'https://www.geyc.ro/'">
                            <div class="circle-top-left" style="height: 27vh; width:27vh; cursor:default"><img class="image" src="pictures/geyc.png" alt="geyc"></div>
                            
                            <div class="tagtag"><?php echo $content['Geyc']['tag']; ?></div>
                        </div>
                    </div>
                </div>    
            </div> 
        </div>

        
        <?php include "elements/footer.html"; ?>	
                
        <script>
            function expand(elem, X, Y, toSize, sizeunit){
                var rectangle = elem.parentElement;
                var initialheight = parseFloat(elem.style.height);
                var origX = parseFloat(rectangle.style.left);
                var origY = parseFloat(rectangle.style.top);
                rectangle.style.zIndex = "50";
                rectangle.setAttribute("id", "rectangle-content current");
                var otherdivs = rectangle.parentElement.querySelectorAll('div#rectangle-content:not(#current)')
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

                elem.setAttribute("onclick", "retract(this, " + X + ", " + Y + ", " + initialheight + ", " + "'" + sizeunit + "'" + ", " + toSize + ", "+ origX + ", " + origY +");");
            }

            function retract(elem, X, Y, initialheight, sizeUnit, toSize, origX, origY){

                var rectangle = elem.parentElement;
                var otherdivs = rectangle.parentElement.querySelectorAll('div#rectangle-content:not(#current)')
                for (i = 0; i < otherdivs.length; i++) {
                    transitions.fadeIn(otherdivs[i], tweenFunctions.easeOutCubic, 500);
                }

                

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
                rectangle.removeAttribute("id");
                rectangle.setAttribute("id", "rectangle-content");
                rectangle.style.zIndex = "0";

                elem.setAttribute("onclick", "expand(this," + X + ", " + Y + ", " + toSize + ", " + "'" + sizeUnit + "'" + ");");
            }
            

        </script>
    </body>

</html>