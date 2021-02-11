<!DOCTYPE html>
<html style="scroll-behavior: smooth">
    <head>

        <link rel="stylesheet" type="text/css" href="css/sageata.css">
        <link rel="stylesheet" type="text/css" href="css/franshalscontent.css">
        <link rel="stylesheet" type="text/css" href="css/basics.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">

        <?php include 'elements/header.php'; ?>
       
        <style>
            .menu-item:hover{
                /* background-color: burlywood; */
                opacity: 0.9;
                cursor: pointer;
            }
        </style>
    </head>
    <body class="sponsors" style="background:linear-gradient(#340634, #340634), url(pictures/blob.gif); background-size:100% 100%; background-blend-mode: multiply; background-position:left top;  background-repeat:repeat-x; overflow-x: hidden; margin:0px;">

        <?php 
			include "elements/sageata.html";
        ?>	
        
        <div class="page-title" style="position: absolute; margin-top: 5vh; width:100%; height: 4vh; background-color: transparent; font-size:3vw; z-index:70">
            <div class="text-centrat" style="color:white; text-decoration: underline dashed 0.5vh #00ff16")>
                Info
            </div>
        </div>

        <!-- document.location.href = '#program'; -->
        <div id="info-menu" style="position: fixed; width: 10vw; height: 70vh; top:50vh; right: 1vw; transform:translateY(-50%); z-index: 20">
            <a href="#general">
                <div class="menu-item rounded-rect" style="position:absolute; height:20%; width: 100%; top: 35%; padding: 0; border:0.5vh solid #00ff16">
                    <div class="text-centrat" style="font-size: 1.5vw;">General</div>
                </div>
            </a>
            <a href="#program">
                <div class="menu-item rounded-rect" style="position:absolute; height:20%; width: 100%; top: 65%; padding: 0; border:0.5vh solid #00ff16">
                    <div class="text-centrat" style="font-size: 1.5vw;">Program</div>
                </div>
            </a>
            <!-- <a href="#news">
                <div class="menu-item rounded-rect" style="position:absolute; height:20%; width: 100%; top: 70%; padding: 0; border:0.5vh solid #00ff16">
                    <div class="text-centrat" style="font-size: 1.5vw;">News</div>
                </div>
            </a> -->
        </div>

        <!-- background-color: #855754; -->
        <div style="background:transparent; overflow-x: auto; overflow-y: hidden; margin:0px; width: 100vw; height: 100vh; box-sizing: border-box; z-index:10; position:relative; scrollbar-width: none; scroll-behavior: smooth">
            <div style="background:transparent; width: 301%; height: 100%; position: relative">
                <div id="general" style="position:relative; display:inline-block; width: 100vw; height: 100vh; z-index:0; color: white">
                    <div id="general-container" class="rounded-rect" style="position:absolute;  left: 1%; top: 55%; transform:translateY(-50%); height:70%; width: 80%; overflow-y: auto; overflow-x: hidden; font-size:1.4vw; background-color: white; background-size:cover;  background-position: left center;color: black;">
                        <div style="position: absolute; width:55%; height: 100%; left:1%; top:50%; transform:translate(0%, -50%);">
                            <?php echo $content['General'][1]?>
                        </div>
                        <img src="pictures/LogoUTE.png" alt="timetable" style="position:absolute; right:1%; top:50%; transform:translate(0%, -50%);  width: 40%;border:0px solid red">

                    </div>
                </div>

                <div id="program" style="position:relative; display:inline-block; width: 100vw; height: 100vh">
                    <div id="program-container" class="rounded-rect" style="position:absolute; left: 1%; top: 55%; transform:translateY(-50%); height:70%; width: 80%; overflow-y: hidden; overflow-x: hidden; font-size:1.4vw; background: url(pictures/infobkg1.png); background-size:cover;  background-position: left center;color:white">
                        <div style="position: absolute; left:1%; top:50%; transform:translate(0%, -50%);">
                            <?php echo $content['Program'][1]?>
                        </div>
                        <!-- <div style="position:absolute; left:60%; top:50%; transform:translate(0%, -50%); height:90%; border:2px solid red"> -->
                            <img src="pictures/timetablefinal.png" alt="timetable" style="position:absolute; right:1%; top:50%; transform:translate(0%, -50%);  width: 40%;border:0px solid red">
                        <!-- </div> -->
                    </div>
                </div>    

                <!-- <div id="news" style="position:relative; display:inline-block; width: 100vw; height: 100vh;">
                    <div id="news-container" class="rounded-rect" style="position:absolute; left: 1%; top: 55%; transform:translateY(-50%); height:70%; width: 80%; overflow-y: auto; overflow-x: hidden; padding:0">
                        <div id="temp-unav" class="text-centrat" style="font-family: 'Montserrat', sans-serif; font-size: 4vw">
                            <?php echo $content['Errors']['news-unav']; ?>
                        </div>

                        <div >

                        </div>
                    
                    </div> 
                </div> -->
            </div> 
        </div>

        <?php 
			include "elements/footer.html";
        ?>	

        <script>   

            var news = document.getElementById('news');
            var program = document.getElementById('program');
            
            // function toNews(){
            //     transitions.slideX(new Dimension(program, -100, "percent"),
            //         tweenFunctions.easeInOutQuad,
            //         500);
            //     transitions.slideX(new Dimension(news, 0, "percent"),
            //         tweenFunctions.easeInOutQuad,
            //         500);
            // }

            // function toProgram(){
            //     transitions.slideX(new Dimension(news, 100, "percent"),
            //         tweenFunctions.easeInOutQuad,
            //         500);
            //     transitions.slideX(new Dimension(program, 0, "percent"),
            //         tweenFunctions.easeInOutQuad,
            //         500);
            // }
            
            function offset(el) {
                var rect = el.getBoundingClientRect();
                var scrollTop = container.scrollTop;
                // alert(rect.top);
                return rect.top + scrollTop;
            }

            var container = document.getElementById('news-container');

            var franshals1 = document.getElementById("franshals1");
            var wrapper12 = franshals1.getElementsByClassName("wrapper")[1];
            // var wrapper12Offset = offset(wrapper12)-(container.clientHeight/2);
            // var pic1 = franshals1.getElementsByClassName("col-pic")[0];
            // var Change1 = false;
            // var lastChange1 = false;

            var franshals2 = document.getElementById("franshals2");
            var wrapper22 = franshals2.getElementsByClassName("wrapper")[1];
            // var wrapper22Offset = offset(wrapper22)-(container.clientHeight/2);
            // var pic2 = franshals2.getElementsByClassName("col-pic")[0];
            // var Change2 = false;
            // var lastChange2 = false;

            // var Change = false;
            // var lastChange = false;

            // alert(wrapper12.offsetTop + ", " + wrapper22.offsetTop);


            function imageChangeTrigger(franshalssection){
                // var franshals1 = document.getElementById("franshals1"); ELEM
                // var franshalssection = section;
                // alert(franshalssection);
                var wrapper2 = franshalssection.getElementsByClassName("wrapper")[1];
                var wrapper2Offset = offset(wrapper2)-(container.clientHeight/2);
                // var wrapper2Offset = wrapper2.offsetTop-(container.clientHeight/2);
                // var pic = franshalssection.getElementsByClassName("col-pic")[0];
                var Change = false;
                var lastChange = false;
                
                if(container.scrollTop >= wrapper2Offset){
                    Change = true;
                    if(Change ^ lastChange){
                        slideOutPoze(franshalssection);
                        lastChange = true;
                    } 
                } else {
                    // Change = false;
                    // if(Change ^ lastChange){
                        slideInPoze(franshalssection);
                    //     lastChange = false;
                    // }
                }
                console.log(Change + ", " + lastChange + ", " + wrapper2.offsetTop);

                // if(container.scrollTop >= wrapper22Offset){
                //     Change2 = true;
                //     if(Change2 ^ lastChange2){
                //         slideOutPoze(franshals2);
                //         lastChange2 = true;
                //     }
                // } else {
                //     Change2 = false;
                //     if(Change2 ^ lastChange2){
                //         slideInPoze(franshals2);
                //         lastChange2 = false;
                //     }
                // }

            }

            container.addEventListener('scroll', function(){
                imageChangeTrigger(franshals1);
                imageChangeTrigger(franshals2);
            });

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