<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/sageata.css">
        <link rel="stylesheet" type="text/css" href="css/basics.css">

        <?php 
            include 'elements/header.php'; 
            require_once('config/captchacredentials.php');
        ?>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $site_key; ?>"></script>

        <style>
            .collapsible:hover{
                cursor: pointer;
            }

            .card-body{
                display: none;
            }
        </style>

    </head>
    <body style="padding: 0; background-color: cornflowerblue">
        <?php include 'elements/sageata.html' ?>

        <div class="rounded-rect" style="position:relative; width: 45%; height: 80vh; margin: 5% 2.5% 5% 2.5%; overflow-x: hidden; overflow-y: auto; display: inline-block">
            <?php echo $content['Report Issue'][1] ?>
            <section style="margin: 50px 20px;">
                <div style="max-width: 768px; margin: auto;">
                    
                    <!-- contact form -->
                    <div class="card">
                    <h2 class="card-header collapsible" style="color: black; font-size: 2rem">Form for Reporting Issue</h2>
                    <div class="card-body">
                        <form class="contact_form" method="post" action="reportissue.php">

                            <!-- form fields -->
                            <div class="row">
                                <div class="col-md-6 form-group">
                                <input name="name" type="text" class="form-control" placeholder="Name">
                                </div>
                                <div class="col-md-6 form-group">
                                <input name="surname" type="text" class="form-control" placeholder="Surname">
                                </div>
                                <div class="col-md-6 form-group">
                                <input name="email" type="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="col-md-6 form-group">
                                <input name="phone" type="phone" class="form-control" placeholder="Phone number (optional)">
                                </div>
                                <div class="col-md-12 form-group">
                                <input name="subject" type="text" class="form-control" placeholder="Problem on short" required>
                                </div>
                                <div class="col-12 form-group">
                                <textarea name="message" class="form-control" rows="5" placeholder="When making a report, the following information is useful: Who violated the Code of Conduct? Where and when did the violation occur? What happened? Who may have witnessed the violation?" required></textarea>
                                </div>

                                <!-- form message prompt -->
                                <div class="row">
                                <div class="col-12">
                                    <div class="contact_msg" style="display: none">
                                    <p>Your message was sent.</p>
                                    </div>
                                </div>
                                </div>

                                <div class="form-check col-md-12" style="display: none;">
                                    <input type="checkbox" class="form-check-input" id="captchaRefresh" onclick="reqRefresh(this);">
                                    <label class="form-check-label" for="captchaRefresh">Captcha has expired. Please check me to get a new token and verify that I am not a bot!</label>
                                </div>

                                <div class="col-12">
                                <input type="submit" value="Report Issue" class="btn btn-success" name="post">
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

        <div class="rounded-rect" style="position:absolute; width: 45%; height: 80vh; margin: 5% 2.5% 5% 2.5%; overflow-x: hidden; overflow-y: auto; display: inline-block">
            <?php echo $content['Contact Mentor'][1] ?>
            <section style="margin: 50px 20px;">
                <div style="max-width: 768px; margin: auto;">
                    
                    <!-- contact form -->
                    <div class="card">
                    <h2 class="card-header collapsible" style="color: black; font-size: 2rem">Stuck? Contact a mentor to help you out!</h2>
                    <div class="card-body">
                        <form class="contact_form" method="post" action="contactmentor.php">

                            <!-- form fields -->
                            <div class="row">
                                <div class="col-md-6 form-group">
                                <input name="email" type="email" class="form-control" placeholder="Email" required>
                                </div>
                                <div class="col-md-6 form-group">
                                <input name="phone" type="phone" class="form-control" placeholder="Phone number (optional)">
                                </div>
                                <div class="col-md-6 form-group">
                                <input name="team" type="text" class="form-control" placeholder="Team name" required>
                                </div>
                                <div class="col-md-6 form-group">
                                <input name="discordname" type="text" class="form-control" placeholder="Discord nickname" required>
                                </div>
                                <div class="col-12 form-group">
                                <textarea name="message" class="form-control" rows="5" placeholder="Tell us about your problem" required></textarea>
                                </div>
                                <div class="col-md-12 form-group">
                                <input name="tags" type="text" class="form-control" placeholder="Some tags to help us forward your request (e.g. javascript, api, backend, database,...)" required>
                                </div>

                                <!-- form message prompt -->
                                <div class="row">
                                <div class="col-12">
                                    <div class="contact_msg" style="display: none">
                                    <p>Your message was sent.</p>
                                    </div>
                                </div>
                                </div>

                                <div class="form-check col-md-12" style="display: none;">
                                    <input type="checkbox" class="form-check-input" id="captchaRefresh" onclick="reqRefresh(this);">
                                    <label class="form-check-label" for="captchaRefresh">Captcha has expired. Please check me to get a new token and verify that I am not a bot!</label>
                                </div>

                                <div class="col-12">
                                <input type="submit" value="Submit" class="btn btn-success" name="post">
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

        <script>
            var coll = document.getElementsByClassName("collapsible");
            var i;

            for (i = 0; i < coll.length; i++) {
                coll[i].addEventListener("click", function() {
                    var content = this.nextElementSibling;
                    if (content.style.display === "block") {
                        content.style.display = "none";
                    } else {
                        content.style.display = "block";
                    }

                    var checkbox_input = content.getElementsByClassName('form-check-input')[0];
                    reqRefresh(checkbox_input);
                });
            } 


            grecaptcha.ready(function() {
                captchaRefresh();
            });

            function captchaRefresh(){
                grecaptcha.execute('<?php echo $site_key; ?>', {action: 'homepage'}).then(function(token) {
                // console.log(token);
                document.getElementById("token").value = token;
                });
            }

            function reqRefresh(el){
                captchaRefresh();
                enButton(document.getElementById("token").value, el);
            }

            async function enButton(old_token, el) {
                btn_submit = el.parentElement.parentElement.getElementsByClassName('btn-success')[0];
                btn_check = el;
                btn_check.parentElement.style.display = "none";
                btn_submit.disabled = true;

                var strToken = old_token;
                var varCant = 0;

                while (strToken == old_token && varCant < 30) {
                    strToken = document.getElementById("token").value;

                    await sleep(100);
                    varCant++;
                }


                btn_submit.style.opacity = 1;
                btn_submit.disabled = false;

                setTimeout(function(){
                    disButton(el);
                }, 120000);
            }

            function sleep(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            }

            function disButton(el){
                btn_submit = el.parentElement.parentElement.getElementsByClassName('btn-success')[0];
                btn_check = el;
                btn_check.checked = false;
                btn_check.parentElement.style.display = "block";
                btn_submit.style.opacity = 0.6;
                btn_submit.disabled = true;
            }
        </script>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="javascript/form.js"></script>
    </body>
</html>