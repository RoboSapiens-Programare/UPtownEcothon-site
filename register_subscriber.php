<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once ("config/dbconfig.php");

    // $scrollPos = (array_key_exists('scroll', $_GET)) ? $_GET['scroll'] : 0; 

    $email = (isset($_POST['email']) && !empty($_POST['email'])) ? $_POST['email'] : null;

    if (strpos($email, '@') == false) {
        $email = null;

        $_SESSION['subscribemsg'] = 'Please enter a valid e-mail address';

        header('Location: home.php');

        $_SESSION['showsbs'] = true;
        
    }

    try{
        $db = new SQLiDB();

        if($email){
            $query = "INSERT INTO subscribers (email) VALUES (:unemail)";
            $stmt = $db->prepare($query);
            
            $stmt->bindParam(':unemail', $email);

            $stmt->execute();

            $_SESSION['subscribemsg'] = 'You have successfully subscribed to our newsletter ;D';
        } else {
            $_SESSION['subscribemsg'] = 'Something went wrong :(';
        }

        unset($db);

        header('Location: home.php');
        // header('Location: home.php#scroll='.$scrollPos);
        $_SESSION['showsbs'] = true;

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
