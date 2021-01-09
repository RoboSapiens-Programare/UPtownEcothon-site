<!DOCTYPE html>

<?php
    $successmsg = "";

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
?>

<html>
    <head>

        <link rel="stylesheet" type="text/css" href="css/sageata.css">
        <link rel="stylesheet" type="text/css" href="css/twistycontent.css">
        <link rel="stylesheet" type="text/css" href="css/basics.css">
        <link rel="stylesheet" type="text/css" href="css/contact-form.css">

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
                <div class="fcf-body" style="width: 50%;">

                    <div id="fcf-form">
                        <h3 class="fcf-h3">Contact us</h3>

                        <form id="fcf-form-id" class="fcf-form-class" method="post">
                            
                            <div class="fcf-form-group">
                                <label for="Name" class="fcf-label">Your name</label>
                                <div class="fcf-input-group">
                                    <input type="text" id="Name" name="Name" class="fcf-form-control" required>
                                </div>
                            </div>

                            <div class="fcf-form-group">
                                <label for="Email" class="fcf-label">Your email address</label>
                                <div class="fcf-input-group">
                                    <input type="email" id="Email" name="Email" class="fcf-form-control" required>
                                </div>
                            </div>

                            <div class="fcf-form-group">
                                <label for="Message" class="fcf-label">Your message</label>
                                <div class="fcf-input-group">
                                    <textarea id="Message" name="Message" class="fcf-form-control" rows="6" maxlength="3000" required></textarea>
                                </div>
                            </div>

                            <div class="fcf-form-group">
                                <button type="submit" id="fcf-button" class="fcf-btn fcf-btn-primary fcf-btn-lg fcf-btn-block">Send Message</button>
                            </div>

                            <?php echo $successmsg; ?>
                        </form>
                    </div>
                </div>
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
        </script>
    </body>
</html>
