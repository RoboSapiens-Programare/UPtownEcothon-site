<!DOCTYPE html>
<html>
    <head>
        <title></title>

        <link rel="stylesheet" type="text/css" href="css/sageata.css">
        <link rel="stylesheet" type="text/css" href="css/basics.css">
        <link rel="stylesheet" type="text/css" href="css/scrollbar.css">
        <link rel="stylesheet" type="text/css" href="css/franshalscontent.css">

        <link href="https://allfont.net/allfont.css?fonts=agency-fb-bold" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <script src="javascript/tween-functions.js"></script>
        <script src="javascript/transitions.js"></script>
        <script src="javascript/customscrollbar.js"></script>

        <script>
            window.onload = function() {
                //ssb.scrollbar('body', ['scrollbar-area', 'scrollbar-dot', 'scrollbar-up', 'scrollbar-down'], ['', 'scrollbar-dot-over', '', ''], ['', '', '', '']);
                ssb.scrollbar('body', ['ssb_st', 'ssb_sb', 'ssb_up', 'ssb_down'], ['', 'ssb_sb_over', '', ''], ['', 'ssb_sb_down', '', '']); 
            }
            
        </script>
    </head>
    <body style="background-color: #3d8b8f; margin: 0;" id="body">
        <!-- <div id="scrollbar-area" class="scrollbar-area" style="z-index: 21;">
            <div class="scrollbar-right"></div>
            <div id="dot" class="dot" style="z-index: 20"></div>
            <div id="scrollbar-up" class="scrollbar-up"></div>
            <div id="scrollbar-down" class="scrollbar-down"></div>
        </div> -->

        <div id="title">
            Titlu
        </div>

        <div class="row">
            <div class="col" id="col-pic">
                <div id="pic1">
                    poza 1
                </div>
                <div id="pic2">
                    poza 2
                </div>
            </div>

            <div class="col" id="col-text">
                <div class="row" id="text1">
                    text cu chestii 1
                </div>
                <div class="row" id="text2">
                    text cu chestii 2
                </div>
            </div>
        </div>
        
        <script>
            // var clicked = false;

            // document.getElementById('scrollbar-area').onmousedown = function clickEvent(e) {
            //     var rect = e.target.getBoundingClientRect();
            //     var x = e.clientX - rect.left; //x position within the element.
            //     var y = e.clientY - rect.top;  //y position within the element.

            //     px = x/e.target.clientWidth * 100;
            //     py = y/e.target.clientHeight * 100;

            //     e.target.getElementsByClassName('dot')[0].style.top = py + "%";
            // }

            // document.getElementById('dot').onmousedown = function clickEvent(e){
            //     clicked = true;
            // }

            // document.getElementById('scrollbar-area').onmousemove = function clickEvent(e) {
            //     if(clicked){
            //         var rect = e.target.getBoundingClientRect();
            //         var x = e.clientX - rect.left; //x position within the element.
            //         var y = e.clientY - rect.top;  //y position within the element.

            //         px = x/e.target.clientWidth * 100;
            //         py = y/e.target.clientHeight * 100;

            //         e.target.getElementsByClassName('dot')[0].style.top = py + "%";
            //     }
            // }

            // document.getElementById('dot').onmouseup = function clickEvent(e) {
            //     clicked = false;
            // }
            
        </script>
    </body>
</html>