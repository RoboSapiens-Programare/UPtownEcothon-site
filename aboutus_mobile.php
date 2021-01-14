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
        </style>
    </head>

    <body style="margin: 0; overflow-x:hidden; background-color:#340634;">
        <?php include "elements/sageatatlf.html"?>

        <div style="position: relative; width:100%; height:21vw; margin:0vh 0vw 3vh 0vw;padding:2vh 2vw 2vh 2vw;font-size:15vw; font-family: 'Khand', sans-serif;">
            <div style="position: absolute; left:50%; top:50%; transform:translate(-50%, -50%); color:white; border-bottom: 0.5vh dashed #00ff16">
                About us
            </div>
        </div>
        <div style="position: relative; width:100%; height:30vh; border:0px solid blue">
            <a href="#contact" class="info-btn" style="left:5%; top: 5%">
                <div class="text-centrat">
                    Contact
                </div>
            </a>
            <a href="#team" class="info-btn" style="left: 5%;  top: 35%">
                <div class="text-centrat">
                    Our Team
                </div>
            </a>
            <a href="#site" class="info-btn" style="left: 5%;  top: 65%">
                <div class="text-centrat">
                    This Site
                </div>
            </a>
        </div>
        <div id="contact" class="bigcontent" style="background-color:white; ">
            <div class="bcontent" style="position: relative; color:black">
                <div style="padding:3% 5% 3% 5%; font-size:2vh; font-family:'Montserrat', sans-serif">
                    <h1>Contact</h1>
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
                    <h1>Our Team</h1>
                    <?php echo $content['Descriere Echipa']['Long']?>
                </div>
            </div>
        </div>
        <div id="site" class="bigcontent" style="background-color: #76667d">
            <div class="bcontent" >
                <div style=" padding:3% 5% 3% 5%; font-size:2vh; font-family:'Montserrat', sans-serif">
                    <h1> This Site </h1>
                    <?php echo $content['Site']['Long']?>
                </div>
            </div>
        </div>

        <?php include "elements/footer.html"; ?>	

        <script>
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