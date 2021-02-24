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

                        $subject = "[UTE]Confirmă participarea";
                        $content = createEmail("Hei! Care îți mai sunt planurile?", "Vrem să știm dacă vei participa la eveniment. 
                                                Mai jos găsești un link pe care poti da click pentru a confirma participarea. Va 
                                                trebui să îți introduci username-ul de discord, ca să te putem repartiza channel-ului 
                                                echipei tale. Dacă nu ai un user de Discord, poti intra pe acest <a href='https://discord.com/register'>link</a> 
                                                sa iti creezi unul. E gratis!<br><br> " 
                                                . "https://ute.robosapiens.ro/confirm_registration.php?uname=" . $username . "&verif=" . base64_encode($passwd) . "<br><br>
                                                <span style='color: #d222d2'>Joi seara(25.02)</span>, cei ce nu au echipă, dar doresc
                                                să găsească una vor fi anunțați de repartiția echipelor.<br>
                                                <span style='color: #d222d2'>Vineri dimineață(26.02) </span> îți vom trimite un mail conținând link-ul pentru a te înscrie
                                                pe server-ul de Discord. <br>
                                                Te așteptăm la eveniment pe 26 februarie!<br><br> Cheers!<br>
                                                <span style='color: #00ff16'>Echipa UPtown Ecothon</span>");
                        $headers = "From: Contact UPtown Ecothon <ute-contact@robosapiens.ro>\r\n";
                        $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

                        mail($email, $subject, $content, $headers);

                        http_response_code(200);
                        echo "Trimis mail!";
                        //echo $content;
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