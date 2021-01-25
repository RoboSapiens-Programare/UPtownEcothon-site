<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/dbconfig.php';

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

                    $subject = "[UTE]Account deletion verification";
                    
                }
                else{
                    http_response_code(500);
                    echo "Something did not go as planned. Try again!";
                }
            }
            else{
                http_response_code(500);
                echo "Something did not go as planned :(. Try again!";
            }

            unset($db);
        }
        catch(PDOException $e){
            http_response_code(500);
            echo $e->getMessage();
        }
    }
    else{
        http_response_code(403);
        echo "Post something!";
    }
?>