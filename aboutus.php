<!DOCTYPE html>

<?php
    $successmsg = "";
    $recaptchaSecret = "6Lc3EicaAAAAADJIqvcY6peRjuj3TxLVetydIwvE";

    try{
        if (!isset($_POST['g-recaptcha-response'])) {
            throw new \Exception('ReCaptcha is not set.');
        }

        // $recaptcha = new \ReCaptcha\ReCaptcha($recaptchaSecret, new \ReCaptcha\RequestMethod\CurlPost());

        // $response = $recaptcha->verify($_POST['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);

        // post request to server
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array('secret' => $recaptchaSecret, 'response' => $_POST['g-recaptcha-response']);

        $options = array(
            'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
            )
        );
        $context  = stream_context_create($options);
        $response = file_get_contents($url, false, $context);
        $responseKeys = json_decode($response,true);
        header('Content-type: application/json');

        if (!$responseKeys["success"] || $responseKeys["score"] <= 0.5) {
            throw new \Exception('ReCaptcha was not validated.');
        }

        if (isset($_POST['Email'])) {
            $email_to = "ute-contact@robosapiens.ro";
            $email_subject = "New form submissions";

            function problem($error)
            {
                echo "We are very sorry, but there were error(s) found with the form you submitted. ";
                echo "These errors appear below.<br><br>";
                echo $error . "<br><br>";
                echo "Please go back and fix these errors.<br><br>";
                die();
            }

            // validation expected data exists
            if (
                !isset($_POST['Name']) ||
                !isset($_POST['Email']) ||
                !isset($_POST['Message'])
            ) {
                problem('We are sorry, but there appears to be a problem with the form you submitted.');
            }

            $name = $_POST['Name']; // required
            $email = $_POST['Email']; // required
            $message = $_POST['Message']; // required

            $error_message = "";
            $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';

            if (!preg_match($email_exp, $email)) {
                $error_message .= 'The Email address you entered does not appear to be valid.<br>';
            }

            $string_exp = "/^[A-Za-z .'-]+$/";

            if (!preg_match($string_exp, $name)) {
                $error_message .= 'The Name you entered does not appear to be valid.<br>';
            }

            if (strlen($message) < 2) {
                $error_message .= 'The Message you entered do not appear to be valid.<br>';
            }

            if (strlen($error_message) > 0) {
                problem($error_message);
            }

            $email_message = "Form details below.\n\n";

            function clean_string($string)
            {
                $bad = array("content-type", "bcc:", "to:", "cc:", "href");
                return str_replace($bad, "", $string);
            }

            $email_message .= "Name: " . clean_string($name) . "\n";
            $email_message .= "Email: " . clean_string($email) . "\n";
            $email_message .= "Message: " . clean_string($message) . "\n";

            // create email headers
            $headers = 'From: ' . $email . "\r\n" .
                'Reply-To: ' . $email . "\r\n" .
                'X-Mailer: PHP/' . phpversion();
            mail($email_to, $email_subject, $email_message, $headers);

            $successmsg = "Thank you for contacting us. We will be in touch with you very soon.";
        }
    } catch (\Exception $e) {
        echo $e->getMessage();
    }

    // if (!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest') {
    //     $encoded = json_encode($responseArray);
    
    //     header('Content-Type: application/json');
    
    //     echo $encoded;
    // } else {
    //     echo $responseArray['message'];
    // }
?>

<html>
    <head>

        <link rel="stylesheet" type="text/css" href="css/sageata.css">
        <link rel="stylesheet" type="text/css" href="css/twistycontent.css">
        <link rel="stylesheet" type="text/css" href="css/basics.css">
        <link rel="stylesheet" type="text/css" href="css/contact-form.css">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://www.google.com/recaptcha/api.js?render=6Lc3EicaAAAAACx7cucfSk0pKiALJOH6v2puvb4G"></script>


        <?php include 'elements/header.php'; ?>
    </head>

    <body style="margin: 0px; overflow-x:hidden; overflow-y:hidden">
        <?php 
			include "elements/sageata.html";
		?>	

        <div style="display: flex; width:100vw; height: 100vh">
            <div style="height:100vh; flex: 33.3%; background-color:peachpuff;"></div>
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
                <!-- contact form demo container -->
                <section style="margin: 50px 20px;">
                    <div style="max-width: 768px; margin: auto;">
                        
                        <!-- contact form -->
                        <div class="card">
                        <h2 class="card-header">Contact Form</h2>
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
                                <div class="col-md-6 form-group">
                                <input name="phone" type="text" class="form-control" placeholder="Phone" required>
                                </div>
                                <div class="col-md-6 form-group">
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
                grecaptcha.execute('6Lc3EicaAAAAACx7cucfSk0pKiALJOH6v2puvb4G', {action: 'homepage'}).then(function(token) {
                // console.log(token);
                document.getElementById("token").value = token;
                });
            });
            
        </script>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script src="javascript/form.js"></script>
    </body>
</html>
