<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/dbconfig.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . "/config/mailconfig.php";

    if (session_status() == PHP_SESSION_NONE) session_start();

	$displaylogin = true;
	if(!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin'] == false){
        header('Location: ../adminlogin.php');
        die();
	}

    if($_SERVER["REQUEST_METHOD"] == "GET"){

        $email = (isset($_GET['email']) && !empty($_GET['email'])) ? filter_var(trim($_GET["email"]), FILTER_SANITIZE_EMAIL) : null;

        try{
            $db = new SQLiDB();

            if($email){
                
                $sql = "SELECT id FROM participants WHERE email = :email";
                $stmt =$db->prepare($sql);

                $stmt->bindParam(":email", $email);

                $stmt->execute();
                $ret = $stmt->fetch(PDO::FETCH_ASSOC);

                if(!empty($ret)){
                    $sql = "SELECT username, passwd FROM users WHERE participant_id = :id";
                    $stmt =$db->prepare($sql);

                    $stmt->bindParam(":id", $ret['id']);

                    $stmt->execute();

                    if($stmt){
                        $ret = $stmt->fetch(PDO::FETCH_ASSOC);
                        $passwd = $ret["passwd"];
                        $username = $ret["username"];

                        $subject = "[UTE]Ne-am updatat termenii și condițiile";
                        $content = createEmail("Salut! Avem noi termeni și condiții", "Dacă dorești în continuare să participi la eveniment, te rugăm să dai click pe link-ul de mai jos și să introduci datele necesare!\r\n\r\n " . "https://ute.robosapiens.ro/updated_terms.php?uname=" . $username . "&verif=" . base64_encode($passwd) . " Mersi de înțelegere și te așteptăm la eveniment pe 26 februarie!\r\n\r\n Cheers!\r\nEchipa UPtown Ecothon");
                        $headers = "From: Contact UPtown Ecothon <ute-contact@robosapiens.ro>\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                        mail($email, $subject, $content, $headers);

                        http_response_code(200);
                        echo "Trimis mail!";
                        die();
                    }
                    else{
                        http_response_code(500);
                        echo "Something did not go as planned. Try again!";
                        die();
                    }
                }
                else{
                    http_response_code(403);
                    echo "This username is not registered!";
                    die();
                }
            }
            else{
                http_response_code(500);
                echo "Something did not go as planned :(. Try again!";
                die();
            }

            unset($db);
        }
        catch(PDOException $e){
            http_response_code(500);
            echo $e->getMessage();
            die();
        }
    }
    else{
        http_response_code(403);
        echo "Post something!";
        die();
    }
?>