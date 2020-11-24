<!DOCTYPE html>
<html>
    <head>
        <title></title>

        <link rel="stylesheet" type="text/css" href="css/sageata.css">
        <link rel="stylesheet" type="text/css" href="css/twistycontent.css">
        <link rel="stylesheet" type="text/css" href="css/circlecontent.css">
		<link rel="stylesheet" type="text/css" href="css/basics.css">


        <link href="https://allfont.net/allfont.css?fonts=agency-fb-bold" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <script src="javascript/tween-functions.js"></script>
        <script src="javascript/transitions.js"></script>
    </head>
    <body style="background-color: #855754;">
        <?php include "elements/sageata.html" ?>

        <div id="rect" class="rectangle-content" style="top: 70%; left: 50%; transform: translate(-50%, -50%); opacity: 0">
            <div class="circle-top-left" onclick="expand(this);"><div id = "text" class="text-centrat" style="opacity: 0">Salut</div></div>
            <div class="circle-bottom-right"></div>
            
            <div  class="text-centrat" style="font-size: 3vh">Salutare din nou, din spatele cercului</div>
        </div>

        <div id="rect" class="rectangle-content" style="top: 16%; left: 60%; transform: translate(-50%, -50%); opacity: 1; scale: 0.4">
            <div class="circle-top-right" onclick="expand(this);"><div id = "text" class="text-centrat" style="opacity: 1">Salut</div></div>
            <div class="circle-bottom-left"></div>
            
            <div  class="text-centrat" style="font-size: 3vh">Salutare din nou, din spatele cercului</div>
        </div>

        <script>
            transitions.fadeIn(document.getElementById('rect'), tweenFunctions.easeOutSine, 1000);
            transitions.fadeIn(document.getElementById('text'), tweenFunctions.easeOutSine, 3000);
            

            function expand(elem){
                var rectangle = elem.parentElement;

                transitions.resize2DViewport(rectangle, tweenFunctions.easeOutCubic, 50, 50, 1000);
                transitions.scaleUniform(elem, tweenFunctions.easeOutQuint, 0.7, 1000);
                transitions.scaleUniform(rectangle.getElementsByClassName('circle-bottom-right')[0] || rectangle.getElementsByClassName('circle-bottom-left')[0] , tweenFunctions.easeOutQuint, 0.7, 1000);

                elem.setAttribute("onclick", "retract(this);");
            }

            function retract(elem){
                var rectangle = elem.parentElement;

                transitions.resize2DViewport(rectangle, tweenFunctions.easeOutCubic, 0, 0, 1000);
                transitions.scaleUniform(elem, tweenFunctions.easeOutQuint, 1, 1000);
                transitions.scaleUniform(rectangle.getElementsByClassName('circle-bottom-right')[0] || rectangle.getElementsByClassName('circle-bottom-left')[0], tweenFunctions.easeOutQuint, 1, 1000);

                elem.setAttribute("onclick", "expand(this);");
            }
        </script>
    </body>
</html>