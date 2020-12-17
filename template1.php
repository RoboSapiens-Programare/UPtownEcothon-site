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
                ssb.scrollbar('scrollable', ['ssb_st', 'ssb_sb', 'ssb_up', 'ssb_down'], ['', 'ssb_sb_over', '', ''], ['', 'ssb_sb_down', '', '']); 
            }
            
        </script>
    </head>
    <body style="background-color: #3d8b8f; margin: 0;" id="body">
        <div id="scrollable" style="width: 100vw; height: 100vh; position:relative; overflow: hidden">
            <!-- <div id="scrollbar-area" class="scrollbar-area" style="z-index: 21;">
                <div class="scrollbar-right"></div>
                <div id="dot" class="dot" style="z-index: 20"></div>
                <div id="scrollbar-up" class="scrollbar-up"></div>
                <div id="scrollbar-down" class="scrollbar-down"></div>
            </div> -->

            <div id="title">
                Titlu
            </div>

            <div style="height: 10vh;"> nimic, am vrut doar un separator</div>

            <div class="franshalssection" id="franshals1">
                <div class="column" id="col-pic" style="left: 0;">
                    <div id="pic1">
                        poza 1
                    </div>
                    <div id="pic2">
                        poza 2
                    </div>
                </div>

                <div class="wrapper">
                    <div class="row-content" style="right: 0;">
                        text cu chestii 111 text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111
                    </div>
                </div>
                    
                <div class="wrapper">
                    <div class="row-content" style="right: 0;">
                        text cu chestii 222
                    </div>

                    <div style="position: relative; width: 100vh; height: 200vh"></div>
                </div>
                
            </div>
            
            <div style="height: 10vh;"> nimic, am vrut doar un separator</div>

            <div class="franshalssection" id="franshals2">
                <div class="column" id="col-pic" style=" left: 60%;">
                    <div id="pic1">
                        poza 1
                    </div>
                    <div id="pic2">
                        poza 2
                    </div>
                </div>

                <div class="wrapper">
                    <div class="row-content" style="left: 0;">
                        text cu chestii 111
                    </div>
                </div>
                    
                <div class="wrapper">
                    <div class="row-content" style="left: 0;">
                        text cu chestii 222
                    </div>
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
            
            
            var row = document.getElementById("franshals");
            var pic = document.getElementById("col-pic");
            // alert("a");
            var origOffsetY = pic.offsetTop;


            // function onScroll(e) {
            //     if(window.scrollY >= origOffsetY){
            //         pic.style.position = "fixed";
            //     }
            //     pic.style.position="absolute";
            // }

            // document.addEventListener('scroll', onScroll);
                                  
        </script>
    </body>
</html>