<?php
if (!isset ($_SESSION)) session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once $_SERVER['DOCUMENT_ROOT'] . "/config/dbconfig.php";

    $email = (isset($_POST['email']) && !empty($_POST['email'])) ? $_POST['email'] : null;
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

    // if (strpos($email, '@') == false) {
    if (substr_count($email,'@') != 1){
        $email = null;

        $_SESSION['subscribemsg'] = 'Please enter a valid e-mail address';

        $_SESSION['hassbs'] = false;

        if($_SESSION['ismobile']){
            header("location: " . $_SERVER['DOCUMENT_ROOT'] . "/home_mobile.php");
        } else{
            header("location: " . $_SERVER['DOCUMENT_ROOT'] . "/home.php");
        }
        
    } else {
        try{
            $db = new SQLiDB();
    
            if($email){
                $query = "INSERT INTO subscribers (email) VALUES (:unemail)";
                $stmt = $db->prepare($query);
                
                $stmt->bindParam(':unemail', $email);
    
                $stmt->execute();
    
                // $_SESSION['subscribemsg'] = 'You have successfully subscribed to our newsletter ;D';
                $_SESSION['hassbs'] = true;
    
                $mail_to = $email;
                $subject = "[UTE]Thank you for subscribing to our newsletter!";
                $content = "Fenk";
                $headers = "From: Contact UPtown Ecothon <ute-contact@robosapiens.ro>";
    
                mail($mail_to, $subject, $content, $headers);
            } else {
                $_SESSION['subscribemsg'] = 'Something went wrong :(';
                $_SESSION['hassbs'] = false;
            }
    
            unset($db);
    
            // $_SESSION['hassbs'] = true;
    
            if($_SESSION['ismobile']){
                header("location: " . $_SERVER['DOCUMENT_ROOT'] . "/home_mobile.php");
            } else{
                header("location: " . $_SERVER['DOCUMENT_ROOT'] . "/home.php");
            }
    
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    
}
?>

