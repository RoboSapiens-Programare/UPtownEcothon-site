<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/dbconfig.php';

    $firstname = (isset($_POST['firstname']) && !empty($_POST['firstname'])) ? filter_var($_POST["firstname"], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;
    $lastname = (isset($_POST['lastname']) && !empty($_POST['lastname'])) ? filter_var(trim($_POST["lastname"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;
    $email = (isset($_POST['email']) && !empty($_POST['email'])) ? filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL) : null;
    $phone = (isset($_POST['phone']) && !empty($_POST['phone'])) ? filter_var(trim($_POST["phone"]), FILTER_SANITIZE_NUMBER_INT) : null;

    if($email){
        try{
            $db = new SQLiDB();

            $sql = "SELECT * FROM participants WHERE email = :email";
            $stmt = $db->prepare($sql);

            $stmt->bindParam(':email', $email);
            
            $stmt->execute();

            if($stmt->fetch(PDO::FETCH_ASSOC)){
                $email = null;
                $update_msg = 'Whoops. You have already registered with this email!';
                die();
            }

            $db = null;
            unset($db);
        }
        catch(PDOException $e){
            $e->getMessage();
        }
    }

    if($username){
        try{
            $db = new SQLiDB();

            $sql = "SELECT * FROM users WHERE username = :username";
            $stmt = $db->prepare($sql);

            $stmt->bindParam(':username', $username);
            
            $stmt->execute();

            if($stmt->fetch(PDO::FETCH_ASSOC)){
                $username = null;
                $update_msg = 'Well, someone else won the race... This unsername is already taken!';
                die();
            }

            $db = null;
            unset($db);
        }
        catch(PDOException $e){
            $e->getMessage();
        }
    }

    try{
        $db = new SQLiDB();

        if($username && $email && $firstname && $lastname){
            $sql = "UPDATE participants SET email = :email, firstname = :fname, lastname = :lname WHERE id = :id";
            $stmt = $db->prepare($sql);
            
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":fname", $firstname);
            $stmt->bindParam(":lname", $lastname);
            $stmt->bindParam(":id", $_SESSION["id"]);

            $stmt->execute();

            $sql = "UPDATE users SET username = :uname WHERE participant_id = :id";
            $stmt = $db->prepare($sql);

            $stmt->bindParam(":uname", $username);

            $stmt->execute();

            $update_msg = "Profile updated successfully!";
        }
        else{
            $update_msg = "We need all details to update your account!";
        }

        unset($db);
    }
    catch(PDOException $e){
        $update_msg = $e->getMessage();
    }


?>