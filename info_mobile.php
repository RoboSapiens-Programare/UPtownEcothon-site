<!DOCTYPE html>
<html style="scroll-behavior: smooth">
    <head>
        <link rel="stylesheet" type="text/css" href="css/circlecontent.css">
        <link rel="stylesheet" type="text/css" href="css/basics.css">
        <link rel="stylesheet" type="text/css" href="css/sageatatlf.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">

        <style>
            .info-btn{
                position: absolute;
                /* top: 50%; */
                /* transform: translate(0%, -50%); */
                border: 0.4vh solid #00ff16;
                border-radius: 2vw;
                background-color: black;
                color:white;
                /* font-size:4vw; */
                height: 80%;
                width: 40%;
            }
            .info-btn div{
                color: white;
                font-size:5vw;
                text-decoration: none;
            }
            h2{
                text-decoration: underline;
                text-decoration-style: dashed;
                text-decoration-color: #00ff16;
            }
            p{
                text-decoration: none;
            }
        </style>

        <?php include 'elements/header.php'; ?>
    </head>

    <body id="info-mobile" style="margin: 0; overflow-x:hidden; background-color:#340634;">
        <?php include "elements/sageatatlf.html"?>

        <div style="position: relative; width:100%; height:21vw; margin:0vh 0vw 3vh 0vw;padding:2vh 2vw 2vh 2vw;font-size:20vw; font-family: 'Khand', sans-serif ">
            <div style="position: absolute; right:10%; top:50%; transform:translateY(-50%); color:white; border-bottom: 0.5vh dashed #00ff16">
                Info
            </div>
        </div>
        <div style="position: relative; width:100%; height:15vh; border:0px solid blue">
            <a href="#program" class="info-btn" style="left:5%;">
                <div class="text-centrat">
                    Program
                </div>
            </a>
            <a href="#news" class="info-btn" style="right: 5%;">
                <div class="text-centrat">
                    News
                </div>
            </a>
        </div>
        <div id="program" style="position: relative; width:100%; background-color:white; ">
            <div style="position: relative; color:black">
                <div style="padding:3% 5% 3% 5%; font-size:2vh; font-family:sans-serif">
                    <?php echo $content['Program'][1]?>
                </div>
            </div>
            <div style="position: relative; color:black">
                <div style=" padding:3% 5% 3% 5%; font-size:2vh; font-family:sans-serif">
                    <h2> Timetable </h2>
                </div>
            </div>
            <div style="position: relative; width:95%; left:50%; transform:translate(-50%, 0%); padding:3%">
                <img src="pictures/drafttimetable.png" alt="timetable.png crashed most likely" style=" width:inherit;">
            </div>
        </div>
        <div id="news" style="position: relative; width:100%; background-color:black; ">
            <div style="position: relative; color:white">
                <div style=" padding:3% 5% 3% 5%; font-size:2vh; font-family:sans-serif">
                    <h2> News </h2>
                    <p style="font-size: 1.5vh;">No news at the moment :(</p>
                </div>
            </div>
            <!-- <div id="news-container" class="rounded-rect" style="position:relative; left: 50%; transform:translateX(-50%); height:75%; width: 90%; overflow-y: auto; overflow-x: hidden; padding:0"> -->
                    <!-- <div class="franshalssection" id="franshals1">
                        <div class="column col-pic" id="col-pic1" style="flex:40%;" onclick="slideOutPoze(this)">
                            <div class="sticky-col">
                                <div class="poza1" style="background-color:red; z-index:3;"></div>
                                <div class="poza2" style="background-color:pink; z-index:3;"></div>

                                <div class="poza1" style="background-color:blue; z-index:2"></div>
                                <div class="poza2" style="background-color:green; z-index:2;"></div>
                            </div>  
                        </div>

                        <div class="column col-text" style="flex: 60%; position: relative;">
                            <div class="wrapper">
                                <div class="row-content" style="right: 0; ">
                                    text cu chestii 111 text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111text cu chestii 111
                                </div>
                            </div>
                                
                            <div class="wrapper">
                                <div class="row-content" style="right: 0">
                                    text cu chestii 222
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="franshalssection" id="franshals2">
                        
                        <div class="column" style="flex: 60%">
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

                        <div class="column col-pic" id="col-pic2" style="flex:40%;">
                            <div class="sticky-col" >
                                <div class="poza1" style="background-color:red; z-index:3;"></div>
                                <div class="poza2" style="background-color:pink; z-index:3;"></div>

                                <div class="poza1" style="background-color:blue; z-index:2"></div>
                                <div class="poza2" style="background-color:green; z-index:2;"></div>
                            </div>
                        </div> 

                    </div>
                </div> -->
        </div>

        <?php include "elements/footer.html"; ?>	

        <script>        
            function offset(el) {
                var rect = el.getBoundingClientRect(),
                scrollTop = container.scrollTop;
                //alert(rect.top);
                return rect.top;
            }

            var container = document.getElementById('news-container');

            var fanshals1 = document.getElementById("franshals1");
            var wrapper12 = franshals1.getElementsByClassName("wrapper")[1];
            var wrapper12Offset = offset(wrapper12)-(container.clientHeight/2);
            var pic1 = franshals1.getElementsByClassName("col-pic")[0];
            var Change1 = false;
            var lastChange1 = false;

            var fanshals2 = document.getElementById("franshals2");
            var wrapper22 = franshals2.getElementsByClassName("wrapper")[1];
            var wrapper22Offset = offset(wrapper22)-(container.clientHeight/2);
            var pic2 = franshals2.getElementsByClassName("col-pic")[0];
            var Change2 = false;
            var lastChange2 = false;

            function imageChangeTrigger(){
                if(container.scrollTop >= wrapper12Offset){
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

                if(container.scrollTop >= wrapper22Offset){
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

            //container.addEventListener('scroll', imageChangeTrigger);

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