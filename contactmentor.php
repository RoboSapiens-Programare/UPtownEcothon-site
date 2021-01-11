<?php
require_once('config/captchacredentials.php');
require_once('config/captchaconfig.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

  $res = verify_captcha();

  if ($res['success'] == true && $res['score'] >= 0.5) {
 
    # Recipient email
    $mail_to = "ute-contact@robosapiens.ro";
    
    # Sender form data
    $teamname = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["team"])));
    $discordname = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["discordname"])));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $tags = trim($_POST["tags"]);
    $message = trim($_POST["message"]);
    $subject = "$discordname (of $teamname) has an issue!";

    
    if (!filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($tags) OR empty($message)) {
      # Set a 400 (bad request) response code and exit
      http_response_code(400);
      echo '<p class="alert-warning">Please complete the form and try again.</p>';
      exit;
    }

    # Mail content
    $content = "Discord nickname: $discordname\n";
    $content .= "Team name: $teamname\n\n";
    $content .= "Email: $email\n\n";
    $content .= "Message:\n$message\n";
    $content .= "Tags: $tags\n";

    # Email headers
    $headers = "From: <$email>";

    # Send the email
    $success = mail($mail_to, $subject, $content, $headers);
    
    if ($success) {
      # Set a 200 (okay) response code
      http_response_code(200);
      echo '<p class="alert alert-success">Thank You! Your message has been successfully sent.</p>';
    } else {
      # Set a 500 (internal server error) response code
      http_response_code(500);
      echo '<p class="alert alert-warning">Something went wrong, your message could not be sent.</p>';
    }   

  } else {

    echo '<div class="alert alert-danger">
        Error! The security token has expired or you are a bot.
       </div>';
  }  

} else {
  # Not a POST request, set a 403 (forbidden) response code
  http_response_code(403);
  echo '<p class="alert-warning">There was a problem with your submission, please try again.</p>';
} ?>
