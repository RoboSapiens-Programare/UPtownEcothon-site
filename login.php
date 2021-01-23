<!DOCTYPE html>

<?php
    if (!isset ($_SESSION)) session_start();

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        header("location: home.php");
        exit;
    }

    require_once 'config/dbconfig.php';

    $username = (isset($_POST['username']) && !empty($_POST['username'])) ? $_POST['username'] : null;
    $passwd = (isset($_POST['passwd']) && !empty($_POST['passwd'])) ? $_POST['passwd'] : null;
    $msg = "";

    try{
        $db = new SQLiDB();
        if($username && $passwd){
            $sql = "SELECT id, username, passwd FROM users WHERE username = :uname LIMIT 1";
            $stmt = $db->prepare($sql);

            $stmt->bindParam(':uname', $username);

            $stmt->execute();

            if($stmt){
                $ret = $stmt->fetch(PDO::FETCH_ASSOC);
                $hash = $ret['passwd'];
                if(password_verify($passwd, $hash)){
                    $msg = "Ai intrat!";

                    if (!isset ($_SESSION)) session_start();

                    $_SESSION['loggedin'] = true;
                    $_SESSION['id'] = $ret['id'];
                    $_SESSION['username'] = $ret['username'];

                    header("location: home.php");
                }
                else{
                    $msg = "Username or password incorrect!";
                }
            }
            else{
                $msg = "Database problem!";
            }
        }

        $db = null;
        unset($db);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>

<html> 
    <head>
        <link rel="stylesheet" type="text/css" href="css/slideup.css">
        <link rel="stylesheet" type="text/css" href="css/sageata.css">
        <link rel="stylesheet" type="text/css" href="css/basics.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        
        <?php include 'elements/header.php'; ?>

        <style>
            * {
                font-family:'Khand', sans-serif;
            }
            label{
                position: relative;
                color: black;
                font-size: 2vw;
                /* text-decoration: underline dashed 0.2vh #00ff16; */
                /* margin-left: 5vw; */
                width: 20%;
                /* margin: 1vh 1vw 1vh 1vw; */

            }
            input{
                position:relative;
                margin: 0vh 0vw 3vh 0vw;
                border: 0.3vh solid #00ff16;
                border-radius: 20px;
                width:100%;
                right: 0px;
                background-color: transparent;
                height: 5vh;
                padding: 1%;
            }
            button{
                position:relative;
                margin: 0vh 0vw 3vh 0vw;
                border: 0.3vh solid #00ff16;
                border-radius: 20px;
                width:100%;
                right: 0px;
                background-color: #340634;
                height: 6vh;
                padding: 1%;
                color: white;
                font-size: 1vw;
            }
            button:hover{
                background-color: transparent;
                color: black;
            }
            .msg{
                position:relative;
                margin: 0vh 0vw 3vh 0vw;
                /* border: 0.3vh solid #00ff16; */
                border-radius: 20px;
                width:100%;
                right: 0px;
                background-color: #ffafc0;
                height: 6vh;
                font-size: 1.3vw;
                text-align:center;
                padding: 1%;
            }
            #footer-special ul{
                list-style: none;
                height: 100%;
                overflow: hidden;
                bottom: 0;
                position: absolute;
            }
            #footer-special ul li{
                /* border: 2px solid blue; */
                width:auto;
                height: 8%;
                margin: 3vh 0vw 3vh -1vw;
            }
            #footer-special ul li a{
                /* position: absolute; */
                height: 100%;
                /* width:100%; */
            }
            #footer-special ul li a img{
                /* position: absolute; */
                height: inherit;
                width:inherit;
            }
        </style>
    </head>
    <body id="home" style="background-color: #340634; margin:0px; ">
        <?php include "elements/sageata.html";?>

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


        <div style="min-height: 100vh; width:100%;">
            <div class="page-title" style="position: relative; margin-top: 8vh; margin-bottom:3vh; width:100%; height: 8vh; background-color: transparent; font-size:4vw; z-index:70">
                <div class="text-centrat" style="color:white; text-decoration: underline dashed 0.5vh #00ff16")>
                    Login
                </div>
            </div>	

            <div class="rounded-rect" style="position:relative; left:50%; transform:translateX(-50%); background-color:white; width:60%;">
                <?php
                    if(isset($msg)&& $msg != ""){
                        echo "
                            <div class='msg'>"; echo $msg; echo "</div>
                        ";
                    }
                ?>
                <form method="POST" >
                    <label for="username">Username</label>
                    <input type="text" id="username" name="username"><br>
                    <label for="passwd">Password</label>
                    <input type="password" id="passwd" name="passwd"><br>
                    <button type="submit">Submit</button>
                </form>

                <div style="font-size: 1vw;">
                    Forgot your <a href="#"> password <a> ?
                </div>
            </div>            
        </div>

    </body>
</html>