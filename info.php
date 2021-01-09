<!DOCTYPE html>
<html style="scroll-behavior: smooth">
    <head>

        <link rel="stylesheet" type="text/css" href="css/sageata.css">
        <link rel="stylesheet" type="text/css" href="css/franshalscontent.css">
        <link rel="stylesheet" type="text/css" href="css/basics.css">

        <?php include 'elements/header.php'; ?>
       
    </head>
    <body style="background-color: #855754; overflow-y: hidden; margin:0px;">
        
        <?php 
			include "elements/sageata.html";
		?>	

        <div class="rounded-rect" style="position:absolute; left: 0; top: 50%; transform:translateY(-50%); height:70vh; width: 85vw; overflow-y: auto; overflow-x: hidden; padding:0">
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
            function offset(el) {
                var rect = el.getBoundingClientRect(),
                scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                return rect.top + scrollTop;
            }

            var fanshals1 = document.getElementById("franshals1");
            var wrapper12 = franshals1.getElementsByClassName("wrapper")[1];
            var wrapper12Offset = offset(wrapper12)-(window.innerHeight/2);
            var pic1 = franshals1.getElementsByClassName("col-pic")[0];
            var Change1 = false;
            var lastChange1 = false;

            var fanshals2 = document.getElementById("franshals2");
            var wrapper22 = franshals2.getElementsByClassName("wrapper")[1];
            var wrapper22Offset = offset(wrapper22)-(window.innerHeight/2);
            var pic2 = franshals2.getElementsByClassName("col-pic")[0];
            var Change2 = false;
            var lastChange2 = false;

            function imageChangeTrigger(){
                if(window.scrollY >= wrapper12Offset){
                    Change1 = true;
                    if(Change1 ^ lastChange1){
                        slideOutPoze(franshals1);
                        lastChange1 = true;
                    }
                } else {
                    Change1 = false;
                    if(Change1 ^ lastChange1){
                        slideInPoze(franshals1);
                        lastChange1 = false;
                    }
                }

                if(window.scrollY >= wrapper22Offset){
                    Change2 = true;
                    if(Change2 ^ lastChange2){
                        slideOutPoze(franshals2);
                        lastChange2 = true;
                    }
                } else {
                    Change2 = false;
                    if(Change2 ^ lastChange2){
                        slideInPoze(franshals2);
                        lastChange2 = false;
                    }
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