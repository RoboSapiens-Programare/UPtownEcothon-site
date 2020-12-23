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
        <!-- <script src="javascript/customscrollbar.js"></script> -->

        <script>
            window.onload = function() {
                ssb.scrollbar('scrollable', ['scrollbar-area', 'scrollbar-dot', 'scrollbar-up', 'scrollbar-down'], ['', 'scrollbar-dot-over', '', ''], ['', '', '', '']);
                //ssb.scrollbar('scrollable', ['ssb_st', 'ssb_sb', 'ssb_up', 'ssb_down'], ['', 'ssb_sb_over', '', ''], ['', 'ssb_sb_down', '', '']); 
            }
            
        </script>
    </head>
    <body style=" margin: 0;" id="body">
        <!-- <div id="scrollable" style="width: 100vw; height: 100vh; position: relative; overflow: auto; scale: 1"> -->
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
                <div class="column col-pic" id="col-pic1" style="flex:40%;" onclick="slideOutPoze(this)">
                    <div class="sticky-col" style="height: 100vh;">
                        <div class="poza1" style="background-color:red; z-index:3;"></div>
                        <div class="poza2" style="background-color:pink; z-index:3;"></div>

                        <div class="poza1" style="background-color:blue; z-index:2"></div>
                        <div class="poza2" style="background-color:green; z-index:2;"></div>
                    </div>  
                </div>

                <div class="column col-text" style="flex: 60%; position: relative;">
                    <div class="wrapper" style="height: 100vh;">
                        <div class="row-content" style="right: 0; ">
                            text cu chestii 111 text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111
                        </div>
                    </div>
                        
                    <div class="wrapper" style="height: 100vh;">
                        <div class="row-content" style="right: 0">
                            text cu chestii 222
                        </div>

                        <!-- <div style="position: relative; width: 100vh; height: 200vh"></div> -->
                    </div>
            
                </div>
                
                
            </div>
            
            <div style="height: 10vh;"> nimic, am vrut doar un separator</div>

            <div class="franshalssection" id="franshals2">
                
                <div class="column" style="flex: 60%">
                    <div class="wrapper" style="height: 100vh;">
                        <div class="row-content" style="left: 0;">
                            text cu chestii 111
                        </div>
                    </div>
                        
                    <div class="wrapper" style="height: 100vh;">
                        <div class="row-content" style="left: 0;">
                            text cu chestii 222
                        </div>
                    </div>
                </div>

                <div class="column col-pic" id="col-pic2" style="flex:40%;">
                    <div class="sticky-col" style="height: 100vh;" >
                        <div class="poza1" style="background-color:red; z-index:3;"></div>
                        <div class="poza2" style="background-color:pink; z-index:3;"></div>

                        <div class="poza1" style="background-color:blue; z-index:2"></div>
                        <div class="poza2" style="background-color:green; z-index:2;"></div>
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
            
            function offset(el) {
                var rect = el.getBoundingClientRect(),
                scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                return rect.top + scrollTop;
            }

            var fanshals1 = document.getElementById("franshals1");
            var wrapper12 = franshals1.getElementsByClassName("wrapper")[1];
            var wrapper12Offset = offset(wrapper12)-(window.innerHeight/2);
            var pic1 = franshals1.getElementsByClassName("col-pic")[0];

            var fanshals2 = document.getElementById("franshals2");
            var wrapper22 = franshals2.getElementsByClassName("wrapper")[1];
            var wrapper22Offset = offset(wrapper22)-(window.innerHeight/2);
            var pic2 = franshals2.getElementsByClassName("col-pic")[0];

            function imageChangeTrigger(){
                if(window.scrollY >= wrapper12Offset){
                    slideOutPoze(franshals1);
                } else {
                    slideInPoze(franshals1);
                }

                if(window.scrollY >= wrapper22Offset){
                    slideOutPoze(franshals2);
                } else {
                    slideInPoze(franshals2);
                }

            }

            window.addEventListener('scroll', imageChangeTrigger);

            function slideOutPoze(section){
                let half1 = section.getElementsByClassName('poza1')[0];
                let half2 = section.getElementsByClassName('poza2')[0];
                
                transitions.slide2D(new Dimension(half1, 0, "percent"),
                                    new Dimension(half1, -50, "percent"),
                                    tweenFunctions.easeOutQuad,
                                    300);

                transitions.slide2D(new Dimension(half2, 0, "percent"),
                                    new Dimension(half2, 100, "percent"),
                                    tweenFunctions.easeOutQuad,
                                    300);

                section.setAttribute("onclick", "slideInPoze(this);");
            }

            function slideInPoze(section){
                let half1 = section.getElementsByClassName('poza1')[0];
                let half2 = section.getElementsByClassName('poza2')[0];
                
                transitions.slide2D(new Dimension(half1, 0, "percent"),
                                    new Dimension(half1, 0, "percent"),
                                    tweenFunctions.easeInQuad,
                                    300);

                transitions.slide2D(new Dimension(half2, 0, "percent"),
                                    new Dimension(half2, 50, "percent"),
                                    tweenFunctions.easeInQuad,
                                    300);
                
                section.setAttribute("onclick", "slideOutPoze(this);");
            }
      
        </script>
    </body>
</html>