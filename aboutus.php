<!DOCTYPE html>
<html style="scroll-behavior: smooth">
    <head>

        <link rel="stylesheet" type="text/css" href="css/sageata.css">
        <link rel="stylesheet" type="text/css" href="css/twistycontent.css">
        <link rel="stylesheet" type="text/css" href="css/basics.css">
        <link rel="stylesheet" type="text/css" href="css/contact-form.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <?php 
            include 'elements/header.php'; 
            require_once('config/captchacredentials.php');
        ?>

        
        <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $site_key; ?>"></script>

        <style>
            #footer-special ul{
                list-style: none;
                height: 100%;
                overflow: hidden;
                bottom: 0;
                position: absolute;
            }
            #footer-special ul li{
                /* border: 2px solid blue; */
                width:auto;
                height: 8%;
                margin: 3vh 0vw 3vh -1vw;
            }
            #footer-special ul li a{
                /* position: absolute; */
                height: 100%;
                /* width:100%; */
            }
            #footer-special ul li a img{
                /* position: absolute; */
                height: inherit;
                width:inherit;
            }
        </style>
    </head>

    <body style="margin: 0px; overflow-x:hidden; overflow-y:hidden">
        <?php 
			include "elements/sageata.html";
        ?>	
        
        <div id="footer-special" style="position:absolute; top:50%; left:0; transform:translate(0%,-50%); width:15%; height:45vh;">
            <ul>
                <li style="height:10%; filter:invert(100%)">
                    <a href="https://www.instagram.com/uptown.ecothon/">
                        <img src="./icons/instagram.svg">
                    </a>
                </li>
                <li style="height: 10%; filter:invert(100%)">
                    <a href="https://www.facebook.com/uptown.ecothon">
                        <img src="./icons/facebook.svg">
                    </a>
                </li>
                <li>
                    <a href="sponsors.php">
                        <img src="pictures/FTC.png">
                    </a>
                </li>
                <li>
                    <a href="sponsors.php" style="filter: invert(100%);">
                        <img src="pictures/natie.png">
                    </a>
                </li>
                <li>
                    <a href="sponsors.php">
                        <img src="pictures/gemini-solutions-logo.svg">
                    </a>
                </li>
                <li>
                    <a href="sponsors.php">
                        <img src="pictures/endava.png">
                    </a>
                </li>

            </ul>
        </div>

        <div style="display: flex; width:100vw; height: 100vh">
            <div style="height:100vh; flex: 33.3%; background-color:#340634; border-right:0.3vw solid #00ff16"></div>
            <div style="height:100vh; flex: 66.6%; background-image: url(pictures/spiru1.jpg); object-fit: cover; background-position: center center; filter: blur(3px);"></div>
        </div>
        
        <div id="smallcontent1" class="smallcontent" style="top: 10%;">
            <div class="smallcontent-inner" style="z-index: 1">
                <div class="title-card">
                    <div class="title">Contact</div>
                </div>
                <div class="content-card">
                    <div class="content"><?php echo $content['Contact']['Short'] ?></div>
                    <div class="expand-button" style="top: 80%; left: 50%; transform:translate(-50%, -50%);" onclick="expand(0);">Expand</div>
                </div>
            </div>
        </div>

        <div id="smallcontent2" class="smallcontent" style="top: 37.5%;">
            <div class="smallcontent-inner" style="z-index: 1">
                <div class="title-card">
                    <div class="title">Our Team</div>
                </div>
                <div class="content-card">
                    <div class="content"><?php echo $content['Descriere Echipa']['Short'] ?></div>
                    <div class="expand-button" style="top: 80%; left: 50%; transform:translate(-50%, -50%);" onclick="expand(1);">Expand</div>
                </div>
            </div>
        </div>

        <div id="smallcontent3" class="smallcontent" style="top: 65%;">
            <div class="smallcontent-inner" style="z-index: 1">
                <div class="title-card">
                    <div class="title">This Site</div>
                </div>
                <div class="content-card" >
                    <div class="content"><?php echo $content['Site']['Short'] ?></div>
                    <div class="expand-button" style="top: 80%; left: 50%; transform:translate(-50%, -50%);" onclick="expand(2);">Expand</div>
                </div>
            </div>
        </div>

        <div class="bigcontent" style="opacity: 0;">
            <div id="bigtitle" class="btitle">Contact</div>
            <div id="bcontent" class="bcontent">
                <?php echo $content['Contact']['Long'] ?>
                <section style="margin: 50px 20px;">
                    <div style="max-width: 768px; margin: auto;">
                        
                        <!-- contact form -->
                        <div class="card">
                        <h2 class="card-header" style="color: black; font-size: 2rem">Contact Form</h2>
                        <div class="card-body">
                            <form class="contact_form" method="post" action="mail.php">

                                <!-- form fields -->
                                <div class="row">
                                    <div class="col-md-6 form-group">
                                    <input name="name" type="text" class="form-control" placeholder="Name" required>
                                    </div>
                                    <div class="col-md-6 form-group">
                                    <input name="email" type="email" class="form-control" placeholder="Email" required>
                                    </div>
                                    <div class="col-md-12 form-group">
                                    <input name="subject" type="text" class="form-control" placeholder="Subject" required>
                                    </div>
                                    <div class="col-12 form-group">
                                    <textarea name="message" class="form-control" rows="5" placeholder="Message" required></textarea>
                                    </div>

                                    <!-- form message prompt -->
                                    <div class="row">
                                    <div class="col-12">
                                        <div class="contact_msg" style="display: none">
                                        <p>Your message was sent.</p>
                                        </div>
                                    </div>
                                    </div>

                                    <div class="col-12">
                                    <input type="submit" value="Submit Form" class="btn btn-success" name="post">
                                    </div>

                                    <!-- hidden reCaptcha token input -->
                                    <input type="hidden" id="token" name="token">
                                </div>

                            </form>
                        </div>
                        </div>

                    </div>
                </section>
            </div>
        </div>

        <div class="bigcontent" style="opacity: 0;">
            <div id="bigtitle" class="btitle">Our Team</div>
            <div id="bcontent" class="bcontent"><?php echo $content['Descriere Echipa']['Long'] ?></div>
        </div>

        <div class="bigcontent" style="opacity: 0;">
            <div id="bigtitle" class="btitle">This Site</div>
            <div id="bcontent" class="bcontent"><?php echo $content['Site']['Long'] ?></div>
            
        </div>
        <div class="bigcontent" style="opacity: 1;">
            <div class="btitle" style="font-size: 5vw; width:auto; top: 50%; left: 50%; transform: translate(-50%, -50%)">
                About Us
            </div>
        </div>


        <script>
            var i_content = 0;
            var bigcontents = document.getElementsByClassName('bigcontent');
            var smallcontents = document.getElementsByClassName('smallcontent');

            function expand(index){
                var box = smallcontents[index];
                var expand = bigcontents[index];

                restoreElementsBeside(index);

                transitions.fadeOut(box, tweenFunctions.easeInQuint, 200);
                transitions.fadeIn(expand, tweenFunctions.easeOutQuint, 1000);

                expand.style.display = "block";
            }

            function restoreElementsBeside(index){
                for(let i = 0; i < bigcontents.length; i++){
                    if(i !== index){
                        transitions.fadeOut(bigcontents[i], tweenFunctions.easeOutQuint, 1000);
                        bigcontents[i].style.display = "none";
                    }
                }

                for(let i = 0; i < smallcontents.length; i++){
                    if(i !== index){
                        transitions.fadeIn(smallcontents[i], tweenFunctions.easeOutExpo, 1000);
                    }
                }
            }

            grecaptcha.ready(function() {
                grecaptcha.execute('<?php echo $site_key; ?>', {action: 'homepage'}).then(function(token) {
                // console.log(token);
                document.getElementById("token").value = token;
                });
            });
            
        </script>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="javascript/form.js"></script>
    </body>
</html>
