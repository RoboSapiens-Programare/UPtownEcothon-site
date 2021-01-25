<!DOCTYPE html>
<?php
    if (!isset ($_SESSION)) session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
        header('Location: login.php');
        die();
	}	

    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/dbconfig.php';

    $firstname = (isset($_POST['firstname']) && !empty($_POST['firstname'])) ? filter_var($_POST["firstname"], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;
    $lastname = (isset($_POST['lastname']) && !empty($_POST['lastname'])) ? filter_var(trim($_POST["lastname"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;
    $phone = (isset($_POST['phone']) && !empty($_POST['phone'])) ? filter_var(trim($_POST["phone"]), FILTER_SANITIZE_NUMBER_INT) : null;
    $username = (isset($_POST['username']) && !empty($_POST['username'])) ? filter_var(trim($_POST["username"]), FILTER_SANITIZE_ENCODED) : null;

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

        if($username && $firstname && $lastname && $phone && isset($_POST["submit"])){
            $sql = "UPDATE users SET username = :uname WHERE id = :id";
            $stmt = $db->prepare($sql);

            $stmt->bindParam(":uname", $username);
            $stmt->bindParam(":id", $_SESSION['id']);

            $stmt->execute();

            $sql = "SELECT participant_id FROM users WHERE id = :id LIMIT 1";
            $stmt = $db->prepare($sql);

            $stmt->bindParam(":id", $_SESSION["id"]);

            $stmt->execute();

            if($stmt){
                $ret = $stmt->fetch(PDO::FETCH_ASSOC);
                $participant_id = $ret["participant_id"];
            }
            
            $sql = "UPDATE participants SET firstname = :fname, lastname = :lname, phone = :phone WHERE id = :id";
            $stmt = $db->prepare($sql);
            
            $stmt->bindParam(":fname", $firstname);
            $stmt->bindParam(":lname", $lastname);
            $stmt->bindParam(":phone", $phone);
            $stmt->bindParam(":id", $participant_id);

            $stmt->execute();


            $_SESSION["username"] = $username;
            $update_msg = "Profile updated successfully!";
        }
        else if(!isset($update_msg)){
            $update_msg = "We need all details to update your account!";
        }

        unset($db);
    }
    catch(PDOException $e){
        $update_msg = $e->getMessage();
    }


?>
<!-- Aici e partea de getting info from db -->
<?php
    try{
        $db = new SQLiDB();

        $fields = array();

        $sql = "SELECT username, participant_id FROM users WHERE id = :id LIMIT 1";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(":id", $_SESSION["id"]);

        $stmt->execute();

        if($stmt){
            $ret = $stmt->fetch(PDO::FETCH_ASSOC);
            $fields["username"] = $ret["username"];
            $participant_id = $ret["participant_id"];
        }

        $sql = "SELECT email, firstname, lastname, phone FROM participants WHERE id = :id LIMIT 1";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(":id", $participant_id);

        $stmt->execute();

        if($stmt){
            $ret = $stmt->fetch(PDO::FETCH_ASSOC);
            $fields["email"] = $ret['email'];
            $fields["firstname"] = $ret["firstname"];
            $fields["lastname"] = $ret["lastname"];
            $fields["phone"] = $ret["phone"];
        }
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>
<html style="scroll-behavior: smooth">
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/sageata.css">
		<link rel="stylesheet" type="text/css" href="css/basics.css">

        <link rel="stylesheet" type="text/css" href="css/bottom.css">
        <link rel="stylesheet" type="text/css" href="css/slidingcontent.css">

        <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $site_key; ?>"></script>

        <?php require_once 'elements/header.php'; ?>
        
        <style>
             * {
                font-family:'Khand', sans-serif;
                color: black;

            }
            label, .label{
                position: relative;
                font-size: 2vh;
                width: 20%;
                text-decoration: underline dashed 0.2vh #00ff16;
            }
            input, textarea, select, .chestie{
                position:relative;
                margin: 0vh 0vw 3vh 0vw;
                border: none;
                /* border: 0.3vh solid #00ff16; */
                border-radius: 20px;
                width:98%;
                right: 0px;
                background-color: transparent;
                height: 2vh;
                padding: 1%;
                font-size: 2vh;
            }
            button, #delete-btn{
                position:relative;
                margin: 0vh 0vw 3vh 0vw;
                border: 0.3vh solid #00ff16;
                border-radius: 20px;
                width:100%;
                right: 0px;
                background-color: #340634;
                height: 5vh;
                padding: 1%;
                font-size: 2vh;
                color: white;
                transition: all 500ms ease;
            }
            #delete-btn{
                background-color: #ffafc0;
                color: black;
            }
            button:hover, button:active, #delete-btn:hover{
                background-color: transparent;
                color: black;
                cursor:pointer;
                transition: all 500ms ease; 
            }
            .msg{
                position:relative;
                margin: 0vh 0vw 3vh 0vw;
                border-radius: 20px;
                width:100%;
                right: 0px;
                background-color: #ffafc0;
                font-size: 2vh;
                text-align:center;
                padding: 1%;
            }
            .section{
                position: relative;
                width:100%;
                margin: 0vh 0vw 3vh 0vw;
                border: 0px solid blue;
                background-color: transparent;
                height: auto;
                font-size: 2.5vh;
            }
            a{
                color: white;
            }
            #footer-special ul{
                list-style: none;
                height: 100%;
                overflow: hidden;
                bottom: 0;
                position: absolute;
            }
            #footer-special ul li{
                width:auto;
                height: 8%;
                margin: 3vh 0vw 3vh -1vw;
            }
            #footer-special ul li a{
                height: 100%;
            }
            #footer-special ul li a img{
                height: inherit;
                width:inherit;
            }
        </style>

    </head>
    <body id="home" style="background-color: #340634; margin:0px; " onload="enButton();">
        <?php include "elements/sageata.html"; ?>


        <div id="footer-special" style="position:absolute; top:50%; left:0; transform:translate(0%,-50%); width:15%; height:45vh;">
            <ul>
                <li style="height:10%; filter:invert(100%)">
                    <a href="https://www.instagram.com/uptown.ecothon/">
                        <img src="./ute-icons/instagram.svg">
                    </a>
                </li>
                <li style="height: 10%; filter:invert(100%)">
                    <a href="https://www.facebook.com/uptown.ecothon">
                        <img src="./ute-icons/facebook.svg">
                    </a>
                </li>
                <li>
                    <a href="sponsors.php">
                        <img src="pictures/FTC.png">
                    </a>
                </li>
                <li>
                    <a href="sponsors.php" style="filter: invert(100%);">
                        <img src="pictures/natie.png">
                    </a>
                </li>
                <li>
                    <a href="sponsors.php">
                        <img src="pictures/gemini-solutions-logo.svg">
                    </a>
                </li>
                <li>
                    <a href="sponsors.php">
                        <img src="pictures/endava.png">
                    </a>
                </li>

            </ul>
        </div>

        <div class="page-title" style="position: relative; margin-top: 3vh; margin-bottom:4vh; width:100%; height: 8vh; background-color: transparent; font-size:4vw; z-index:70">
            <div class="text-centrat" style="color:white; text-decoration: underline dashed 0.5vh #00ff16")>
                Configure Account
            </div>
        </div>

        <div style="position:relative; width:90%; max-width: 850px; left: 50%; transform:translateX(-50%);" class="rounded-rect">
            <div class="label">Email:</div> 
            <div class="chestie" style="border:none"> <?php echo $fields["email"]; ?></div>

            <form method="post" name="change-details" id="change-details" onsubmit="return validateForm()">
                <div class="msg" style="display: none;"></div>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $fields["username"]; ?>" disabled> <br>

                <label for="fname">First name</label>
                <input type="text" id="fname" name="firstname" value="<?php echo $fields["firstname"]; ?>" disabled> <br>

                <label for="lname">Last name:</label>
                <input type="text" id="lname" name="lastname" value="<?php echo $fields["lastname"]; ?>" disabled> <br>

                <label for="phone">Phone number:</label>
                <input type="number" id="phone" name="phone" value="<?php echo $fields["phone"]; ?>" disabled> <br>

                <button type="button" id="edit-btn" onclick="enableEdit()">Edit Details</button>
                <button type="submit" id="submit-btn" style="display: none;" name="submit">Submit</button>

                <div class="msg" style="background-color: transparent;"><?php echo $update_msg ?></div>
                
            </form>

            <button type="button" id="delete-btn">Delete Account</button>
        </div>

        <a href="logout.php" style="display: block; position:relative; left:50%; transform:translateX(-50%); font-size:2.5vh; margin-top:3vh; text-align:center">sign out</a>

        <script>
            var edit = document.getElementById("edit-btn");
            var submit = document.getElementById("submit-btn");
            var errorMsg = document.getElementsByClassName("msg")[0];
            var submitMsg = document.getElementsByClassName("msg")[1];

            function enableEdit() {

                edit.style.display = "none";
                submit.style.display = "block";

                var input = document.querySelectorAll("input");

                for (i = 0; i < input.length; ++i) {
                    input[i].style.border = "0.3vh solid #00ff16";
                    input[i].disabled = false;
                }
            }

            function validateForm(){
                var isOK = true;
                
                var input = document.querySelectorAll("input");
                for (i = 0; i < input.length; ++i) {
                    if(input[i].value.length == 0 || input[i]==null){
                        input[i].style.borderColor = "red";
                        isOK = false;
                    }
                }

                if(!isOK){
                    errorMsg.style.display = "block";
                    errorMsg.innerHTML = "Please complete all of the fields before submitting.";
                    return false;
                } else {
                    // for (i = 0; i < input.length; ++i) {
                    //     input[i].style.border = "none";
                    //     input[i].disabled = true;
                    // }

                    submitMsg.innerHTML = "Please confirm your changes via email";

                    edit.style.display = "block";
                    submit.style.display = "none";
                    return true;
                }
            }
        </script>

    </body>
</html>