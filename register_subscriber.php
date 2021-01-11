<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once ("config/dbconfig.php");

    $email = (isset($_POST['email']) && !empty($_POST['email'])) ? $_POST['email'] : null;

    if (strpos($email, '@') == false) {
        $email = null;
    }

    try{
        $db = new SQLiDB();

        if($email){
            $query = "INSERT INTO subscribers (email) VALUES (:unemail)";
            $stmt = $db->prepare($query);
            
            $stmt->bindParam(':unemail', $email);

            $stmt->execute();

            http_response_code(200);
            echo '<p class="alert alert-success">Thank You! Your message has been successfully sent.</p>';
        } else {
            http_response_code(500);
            echo '<p class="alert alert-warning">Something went wrong, your message could not be sent.</p>';
        }

        unset($db);

        // header('Location: home.php');

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
