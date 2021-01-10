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
            echo '<div class="subtitile text-centrat">Thank You! Your email has been successfully sent.</div>';
        } else {
            echo 'not a vaild email';
        }

        unset($db);

        header('Location: home.php');

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>
