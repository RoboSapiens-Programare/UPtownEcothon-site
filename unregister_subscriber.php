<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once ("config/dbconfig.php");

    $email = (isset($_POST['email']) && !empty($_POST['email'])) ? $_POST['email'] : null;
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

    try{
        $db = new SQLiDB();

        if($email){
            $query = "DELETE FROM subscribers WHERE email = :unemail";
            $stmt = $db->prepare($query);
            
            $stmt->bindParam(':unemail', $email);

            $stmt->execute();

            echo "Unsubscribed successfully!";
        } else {
            echo 'Something went wrong :(';
        }

        unset($db);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
?>

