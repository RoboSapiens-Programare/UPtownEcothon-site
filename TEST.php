<!DOCTYPE html>
<html>
    <head>
        <title>Test page 12</title>

        <meta name="robots" content="noindex">
        
        <link rel="stylesheet" type="text/css" href="css/sageata.css">
        <link rel="stylesheet" type="text/css" href="css/twistycontent.css">
        <link rel="stylesheet" type="text/css" href="css/slidingcontent.css">

        <link href="https://allfont.net/allfont.css?fonts=agency-fb-bold" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <script src="javascript/tween-functions.js"></script>
        <script src="javascript/transitions.js"></script>
        <script src="javascript/customscrollbar.js"></script>

        <style>
            body {
                background: #999;
                margin: 0;
                padding: 0;
            }

            .wrapper {
                -moz-border-radius: 5px;
                -webkit-border-radius: 5px;
                background: #FFF;
                border: 1px #000 solid;
                margin: 20px auto;
                padding: 15px;
                position: relative;
                width: 600px;
                height: 600px;
            }

            #container {
                width: 580px;
                height: 580px;
                padding: 5px;
                margin-top: 5px;
                overflow: auto;
                position: relative;
            }

            .ssb_down {
            background-color: #33ccaa;
            bottom:0;
            cursor:pointer;
            position:absolute;
            right:0;
            border-radius: 10px;
            }

            .ssb_sb {
            background-color: #22aabb;
            cursor:pointer;
            position:absolute;
            right:0;
            border-radius: 10px;
            }

            .ssb_sb_down {
            background-color: #1199aa;
            }

            .ssb_sb_over {
            background-color: #33bbcc;
            }

            .ssb_st {
            background-color: #dedede;
            cursor:pointer;
            height:100%;
            position:absolute;
            right:0;
            top:0;
            border-radius: 10px;
            }

            .ssb_up {
            background-color: #33ccaa;
            cursor:pointer;
            position:absolute;
            right:0;
            top:0;
            border-radius: 10px;
            }

            .parent {
            font-family:verdana;
            height:100%;
            padding:10px;
            position:relative;
            }
        </style>

        <script>
            window.onload = function() {
               ssb.scrollbar('container', ['ssb_st', 'ssb_sb', 'ssb_up', 'ssb_down'], ['', 'ssb_sb_over', '', ''], ['', 'ssb_sb_down', '', '']); 
            }
        </script>
    </head>
    
    <body>
        <div class="wrapper">
            <div id="container">
                <div class="parent">
                    <h2>Custom scrollbar</h2>
                    Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. Many different text. 
                </div>
            </div>
        </div>

        <div style="background-color: red; width:50vw; height:50vh; position:relative" id="pilk">
            <input type="text" id="value">
            <button id="conv" onclick="slidey();">Convert</button>
        </div>

        <script>
            function convert(){
                var dim = new Dimension(document.getElementById('value'), document.getElementById('value').value, "vw");
                alert(dim.to("percent"));
            }

            function slidey(){
                var elem = document.getElementById('pilk');
                var toX = new Dimension(elem, 50, "percent");
                var toY = new Dimension(elem, 0, "percent");
                transitions.slide2D(toX, toY, tweenFunctions.easeInQuad, 1000);
            }
        </script>
    </body>
</html>
