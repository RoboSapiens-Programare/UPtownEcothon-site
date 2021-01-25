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
        <link rel="stylesheet" type="text/css" href="css/sageatatlf.css">
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
                font-size: 4vw;
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
                height: 7vh;
                font-size: 3vw;
                padding: 2%;
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
                font-size: 4vw;
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
                font-size: 4vw;
                text-align:center;
                padding: 3%;
            }
            
        </style>
    </head>
    <body id="home" style="background-color: #340634; margin:0px; ">
        <?php include "elements/sageatatlf.html";?>

        <div style="min-height: 100vh; width:100%;">
            <div class="page-title" style="position: relative; margin-top: 10vw; margin-bottom:10vw; width:100%; height: 8vh; background-color: transparent; font-size:10vw; z-index:70">
                <div class="text-centrat" style="color:white; text-decoration: underline dashed 0.5vh #00ff16")>
                    Login
                </div>
            </div>	

            <div class="rounded-rect" style="position:relative; left:50%; transform:translateX(-50%); background-color:white; width:90%;">
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

                <div style="font-size: 4vw; width:100%; margin-bottom:4vh">
                    <a href="#" style="position:absolute; left:2%;">
                        Forgot your password?
                    </a>
                    <a href="registration.php" style="position:absolute; right:2%;">
                        Don't have an account yet?
                    </a>
                </div>
            </div>
        </div>

        <?php include "elements/footer.html";?>
    </body>
</html>