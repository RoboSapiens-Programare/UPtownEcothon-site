<!DOCTYPE html>
<html style="scroll-behavior: smooth">
    <head>
        <link rel="stylesheet" type="text/css" href="css/twistycontent.css">
        <link rel="stylesheet" type="text/css" href="css/basics.css">
        <link rel="stylesheet" type="text/css" href="css/sageatatlf.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

        <?php 
            include 'elements/header.php';
            require_once('config/captchacredentials.php'); 
        ?>

        <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $site_key; ?>"></script>

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
                height: 20%;
                width: 90%;
            }
            .info-btn div{
                color: white;
                font-size:5vw;
                text-decoration: none;
            }
            h1, h2{
                text-decoration: underline;
                text-decoration-style: dashed;
                text-decoration-color: #00ff16;
            }
            p{
                text-decoration: none;
            }
             /* Popup container */
            .popup {
                position: relative;
                cursor: pointer;
                bottom: 10%; 
                left: 50%;
                transform: translateX(-50%); 
                font-family: 'Khand', sans-serif; 
                font-size: 7vw; 
                font-weight: bold; 
                color: white;
                text-align: center;
            }

            .popup:hover{
                color: grey;
            }

            /* The actual popup (appears on top) */
                .popup .popuptext {
                visibility: hidden;
                width: 260px;
                background-color: #555;
                color: #fff;
                text-align: center;
                border-radius: 6px;
                padding: 8px 0;
                position: absolute;
                z-index: 1;
                bottom: 125%;
                left: 50%;
                margin-left: -130px;
                font-family: 'Montserrat', sans-serif;
                font-weight: 300;
                font-size: 4vw;
            }

            /* Popup arrow */
            .popup .popuptext::after {
                content: "";
                position: absolute;
                top: 100%;
                left: 50%;
                margin-left: -5px;
                border-width: 5px;
                border-style: solid;
                border-color: #555 transparent transparent transparent;
            }

            /* Toggle this class when clicking on the popup container (hide and show the popup) */
            .popup .show {
                visibility: visible;
                -webkit-animation: fadeIn 1s;
                animation: fadeIn 1s
            }

            /* Add animation (fade in the popup) */
            @-webkit-keyframes fadeIn {
                from {opacity: 0;}
                to {opacity: 1;}
            }

            @keyframes fadeIn {
                from {opacity: 0;}
                to {opacity:1 ;}
            } 
        </style>
    </head>

    <body id="aboutus-mobile" style="margin: 0; overflow-x:hidden; background-color:#340634;">
        <?php include "elements/sageatatlf.html"?>

        <div style="position: relative; width:100%; height:21vw; margin:0vh 0vw 3vh 0vw; padding:2vh 2vw 2vh 2vw;font-size:15vw; font-family: 'Khand', sans-serif;">
            <div style="position: absolute; right:10%; top:50%; transform:translateY(-50%); color:white; border-bottom: 0.5vh dashed #00ff16">
                <?php echo $content['Interface']['Page-title']; ?>
            </div>
        </div>
        <div style="position: relative; width:100%; height:30vh; border:0px solid blue">
            <a href="#contact" class="info-btn" style="left:5%; top: 5%">
                <div class="text-centrat">
                    <?php echo $content['Contact']['Title'] ?>
                </div>
            </a>
            <a href="#team" class="info-btn" style="left: 5%;  top: 35%">
                <div class="text-centrat">
                    <?php echo $content['Descriere Echipa']['Title'] ?>
                </div>
            </a>
            <a href="#site" class="info-btn" style="left: 5%;  top: 65%">
                <div class="text-centrat">
                    <?php echo $content['Site']['Title'] ?>
                </div>
            </a>
        </div>
        <div id="contact" class="bigcontent" style="background-color:white; ">
            <div class="bcontent" style="position: relative; color:black">
                <div style="padding:3% 5% 3% 5%; font-size:2vh; font-family:'Montserrat', sans-serif">
                    <h1><?php echo $content['Contact']['Title'] ?></h1>
                    <?php echo $content['Contact']['Long']?>
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
        </div>
        <div id="team" class="bigcontent" style="background-color:black; ">
            <div class="bcontent" style="position: relative; color:white">
                <div style=" padding:3% 5% 3% 5%; font-size:2vh; font-family:'Montserrat', sans-serif">
                    <h1><?php echo $content['Descriere Echipa']['Title'] ?></h1>
                    <?php echo $content['Descriere Echipa']['Long']?>
                </div>
            </div>
        </div>
        <div id="site" class="bigcontent" style="background-color: #76667d">
            <div class="bcontent" >
                <div style=" padding:3% 5% 3% 5%; font-size:2vh; font-family:'Montserrat', sans-serif">
                    <h1><?php echo $content['Site']['Title'] ?></h1>
                    <?php echo $content['Site']['Long']?>
                </div>
                <div class="popup" onclick="showCredits()">Show credits
                <span class="popuptext" id="credPopup">
                    <ul>
                        <?php 
                            //Acest cod cred ca e cel mai prost mod de a face ce voiam sa fac :D
                            $thesmecheri = array("Negoițescu Miruna", "Tanislav Alexia", "Peter Daniel");
                            $rand_keys = array_rand($thesmecheri, 2);
                            foreach ($rand_keys as $a){
                                echo "<li>" . $thesmecheri[$a] . "</li>";
                                unset($thesmecheri[$a]);
                            }
                            echo "<li>" . array_slice($thesmecheri, 0, 3)[0] . "</li>";
                        ?>
                    </ul>
                </span>
            </div>
            </div>
        </div>

        <?php include "elements/footer.html"; ?>	

        <script>
            function showCredits(){
                var popup = document.getElementById("credPopup");
                popup.classList.toggle("show");
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