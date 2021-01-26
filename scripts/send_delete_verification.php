<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/dbconfig.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . "/config/mailconfig.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $username = (isset($_POST['username']) && !empty($_POST['username'])) ? filter_var(trim($_POST["username"]), FILTER_SANITIZE_ENCODED) : null;
        $id = (isset($_POST['id']) && !empty($_POST['id'])) ? filter_var(trim($_POST["id"]), FILTER_SANITIZE_NUMBER_INT) : null;

        try{
            $db = new SQLiDB();

            if($username && $id){
                $sql = "SELECT passwd, participant_id FROM users WHERE id = :id";
                $stmt =$db->prepare($sql);

                $stmt->bindParam(":id", $id);

                $stmt->execute();

                if($stmt){
                    $ret = $stmt->fetch(PDO::FETCH_ASSOC);
                    $passwd = $ret["passwd"];

                    $sql = "SELECT email FROM participants WHERE id = :id";
                    $stmt =$db->prepare($sql);

                    $stmt->bindParam(":id", $ret['participant_id']);

                    $stmt->execute();

                    if($stmt){
                        $ret2 = $stmt->fetch(PDO::FETCH_ASSOC);
                        $email = $ret2['email'];
                    }

                    $subject = "[UTE]Verificare stergere cont";
                    $content = createEmail("Am înțeles că dorești să iți ștergi contul", "Pentru a confirma această acțiune, te rugăm apasă <a href='https://ute.robosapiens.ro/delete_verification.php?email=" . $email . "&uname=" . $username . "&verif=" . base64_encode($passwd) . "'>aici</a>.");
                    $headers = "From: Contact UPtown Ecothon <ute-contact@robosapiens.ro>\r\n";
                    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                    mail($email, $subject, $content, $headers);

                    http_response_code(200);
                    echo "We have sent you a verification mail!";
                    //DEBUG
                    //echo "<a href='https://ute.robosapiens.ro/delete_verification.php?email=" . $email . "&uname=" . $username . "&verif=" . base64_encode($passwd) . "'>aici</a>.";
                    die();
                }
                else{
                    http_response_code(500);
                    echo "Something did not go as planned. Try again!";
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