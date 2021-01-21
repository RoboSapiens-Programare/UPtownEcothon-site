<?php
if (!isset ($_SESSION)) session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    require_once ("config/dbconfig.php");
    require_once ("config/mailconfig.php");

    $email = (isset($_POST['email']) && !empty($_POST['email'])) ? $_POST['email'] : null;
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

    // if (strpos($email, '@') == false) {
    if (substr_count($email,'@') != 1){
        $email = null;

        $_SESSION['subscribemsg'] = 'Please enter a valid e-mail address';

        $_SESSION['hassbs'] = false;

        if($_SESSION['ismobile']){
            header("location: home_mobile.php");
        } else{
            header("location: home.php");
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
                $subject = "[UTE]Mulțumim că te-ai abonat la newsletter-ul nostru!";
                $content = createEmail("Hey! Îți mulțumim pentru interes.", "Te vom ține la curent cu tot ce se întâmplă în cadrul evenimentului, ca să nu pierzi nimic! <br>Daca dorești să te dezabonezi, poți găsi mai jos butonul de unsubscribe.");
                $headers = "From: Contact UPtown Ecothon <ute-contact@robosapiens.ro>\r\n";
                $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
    
                mail($mail_to, $subject, $content, $headers);
            } else {
                $_SESSION['subscribemsg'] = 'Something went wrong :(';
                $_SESSION['hassbs'] = false;
            }
    
            unset($db);
    
            // $_SESSION['hassbs'] = true;
    
            if($_SESSION['ismobile']){
                header("location: home_mobile.php");
            } else{
                header("location: home.php");
            }
    
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    
}
?>

