<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once ("config/dbconfig.php");

    // $scrollPos = (array_key_exists('scroll', $_GET)) ? $_GET['scroll'] : 0; 

    $email = (isset($_POST['email']) && !empty($_POST['email'])) ? $_POST['email'] : null;

    if (strpos($email, '@') == false) {
        $email = null;

        $_SESSION['subscribemsg'] = 'Please enter a valid e-mail address';
        
    }

    try{
        $db = new SQLiDB();

        if($email){
            $query = "INSERT INTO subscribers (email) VALUES (:unemail)";
            $stmt = $db->prepare($query);
            
            $stmt->bindParam(':unemail', $email);

            $stmt->execute();

            // http_response_code(200);
            // echo '<p class="alert alert-success">Thank You! Your message has been successfully sent.</p>';
            $_SESSION['subscribemsg'] = 'You have successfully subscribed to our newsletter ;D';
        } else {
            // http_response_code(500);
            // echo '<p class="alert alert-warning">Something went wrong, your message could not be sent.</p>';
            $_SESSION['subscribemsg'] = 'Something went wrong :(';
        }

        unset($db);

        header('Location: home.php');
        // header('Location: home.php#scroll='.$scrollPos);

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
