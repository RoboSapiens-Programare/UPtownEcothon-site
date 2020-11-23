<!DOCTYPE html>
<html>
    <head>
        <title></title>

        <link rel="stylesheet" type="text/css" href="css/sageata.css">
        <link rel="stylesheet" type="text/css" href="css/twistycontent.css">
        <link rel="stylesheet" type="text/css" href="css/slidingcontent.css">

        <link href="https://allfont.net/allfont.css?fonts=agency-fb-bold" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <script src="javascript/tween-functions.js"></script>
        <script src="javascript/transitions.js"></script>
    </head>
    <body>
        <div id="sect1" class="section" style="background-color: darkkhaki;">
            <div id="title1" class="title" style="opacity: 1;">Test</div>
            <div id="titlebtn1" class="titlebtn" style="opacity: 1" onclick="doThing(this);">Test Button</div>
        </div>

        <script>
            function doThing(elem){
                //elem.style.transform = "translate(0px, 0px)";
                transitions.slide2DPercentageParent(elem, tweenFunctions.easeInExpo, 1500, 66, 50);
            }
        </script>
    </body>
</html>