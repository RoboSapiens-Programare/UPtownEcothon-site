<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/dbconfig.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . "/config/mailconfig.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $email = (isset($_POST['email']) && !empty($_POST['email'])) ? filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL) : null;

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

                        $subject = "[UTE]Verificare modificare parola";
                        $content = createEmail("Am înțeles că dorești să iți modifici parola", "Pentru a confirma această acțiune, te rugăm apasă <a href='https://ute.robosapiens.ro/passchange_verification.php?uname=" . $username . "&verif=" . base64_encode($passwd) . "'>aici</a>.");
                        $headers = "From: Contact UPtown Ecothon <ute-contact@robosapiens.ro>\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                        mail($email, $subject, $content, $headers);

                        http_response_code(200);
                        echo "We have sent you a verification mail!";
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