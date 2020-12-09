<?php
require_once 'Mobile-Detect-master/Mobile_Detect.php';
$detect = new Mobile_Detect;

$scriptVersion = $detect->getScriptVersion();
?>
<!DOCTYPE html>
<html>
    <head>
        <title></title>

        <!-- <link rel="stylesheet" type="text/css" href="css/sageata.css"> -->
        <link rel="stylesheet" type="text/css" href="css/twistycontent.css">
        <link rel="stylesheet" type="text/css" href="css/basics.css">
        <!-- <link rel="stylesheet" type="text/css" href="css/sageatatlf.css"> -->

        <?php 
			if($detect->isMobile() || $detect->isTablet()) {
				echo "<link rel='stylesheet' type='text/css' href='css/sageatatlf.css'>";
			} else {
				echo "<link rel='stylesheet' type='text/css' href='css/sageata.css'>";
			}
		?>


        <link href="https://allfont.net/allfont.css?fonts=agency-fb-bold" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 


        <?php 
            include "content/c_aboutus.php";
            $contentArray = array();
            $contentArray[] = $__DescEchipa;
            $contentArray[] = $__Contact;
            $contentArray[] = $__ThisSite;
        ?>

        <script src="javascript/tween-functions.js"></script>
        <script src="javascript/transitions.js"></script>

        <script>
            var content = <?php echo json_encode($contentArray); ?>;
        </script>
    </head>
    <body>
        <?php 
			if($detect->isMobile() || $detect->isTablet()) {
				include "elements/sageatatlf.html";
			} else {
				include "elements/sageata.html";
			}
		?>

        <div style="display: flex; width:100vw; height: 100vh">
            <div style="height:100vh; flex: 33.3%; background-color:peachpuff;"></div>
            <div style="height:100vh; flex: 66.6%; background-color:white;"></div>
        </div>

        <!-- <div id="bigcontent" class="bigcontent">
            <div id="bigtitle" class="btitle"></div>
            <div id="bcontent" class="bcontent"></div>
        </div> -->

        
        <div id="smallcontent1" class="smallcontent" style="top: 10%;">
            <div class="smallcontent-inner" style="z-index: 1">
                <div class="title-card">
                    <div class="title">Salut</div>
                </div>
                <div class="content-card">
                    <div class="content">aa</div>
                    <div class="expand-button" style="top: 80%; left: 50%; transform:translate(-50%, -50%);" onclick="expand(0);">Expand</div>
                </div>
            </div>
        </div>

        <div id="smallcontent2" class="smallcontent" style="top: 37.5%;">
            <div class="smallcontent-inner" style="z-index: 1">
                <div class="title-card">
                    <div class="title">Salut</div>
                </div>
                <div class="content-card">
                    <div class="content">aa</div>
                    <div class="expand-button" style="top: 80%; left: 50%; transform:translate(-50%, -50%);" onclick="expand(1);">Expand</div>
                </div>
            </div>
        </div>

        <div id="smallcontent3" class="smallcontent" style="top: 65%;">
            <div class="smallcontent-inner" style="z-index: 1">
                <div class="title-card">
                    <div class="title">Salut</div>
                </div>
                <div class="content-card" >
                    <div class="content">aa</div>
                    <div class="expand-button" style="top: 80%; left: 50%; transform:translate(-50%, -50%);" onclick="expand(2);">Expand</div>
                </div>
            </div>
        </div>

        <div class="bigcontent" style="opacity: 0;">
            <div id="bigtitle" class="btitle"></div>
            <div id="bcontent" class="bcontent"></div>
        </div>

        <div class="bigcontent" style="opacity: 0;">
            <div id="bigtitle" class="btitle"></div>
            <div id="bcontent" class="bcontent"></div>
        </div>

        <div class="bigcontent" style="opacity: 0;">
            <div id="bigtitle" class="btitle"></div>
            <div id="bcontent" class="bcontent"></div>
            
        </div>
        <div class="bigcontent" style="opacity: 1;">
            <div class="btitle" style="font-size: 5vw; width:auto; top: 50%; left: 50%; transform: translate(-50%, -50%)">
                About Us
            </div>
        </div>


        <script>
            var i_content = 0;
            var bigcontents = document.getElementsByClassName('bigcontent');
            for(let i = 0; i < bigcontents.length-1; i++){
                bigcontents[i].getElementsByClassName('btitle')[0].innerHTML = content[i]['title'];
                bigcontents[i].getElementsByClassName('bcontent')[0].innerHTML = content[i]['content'];
            }

            var smallcontents = document.getElementsByClassName('smallcontent');
            for(let i = 0; i < smallcontents.length; i++){
                smallcontents[i].getElementsByClassName('title')[0].innerHTML = content[i]['title'];
                smallcontents[i].getElementsByClassName('content')[0].innerHTML = content[i]['short-description'];
            }

            function expand(index){
                var box = smallcontents[index];
                var expand = bigcontents[index];

                restoreElementsBeside(index);

                transitions.fadeOut(box, tweenFunctions.easeInQuint, 200);
                transitions.fadeIn(expand, tweenFunctions.easeOutQuint, 1000);
            }

            function restoreElementsBeside(index){
                for(let i = 0; i < bigcontents.length; i++){
                    if(i !== index){
                        transitions.fadeOut(bigcontents[i], tweenFunctions.easeInQuint, 1000);
                    }
                }

                for(let i = 0; i < smallcontents.length; i++){
                    if(i !== index){
                        transitions.fadeIn(smallcontents[i], tweenFunctions.easeOutExpo, 1000);
                    }
                }
            }
        </script>
    </body>
</html>