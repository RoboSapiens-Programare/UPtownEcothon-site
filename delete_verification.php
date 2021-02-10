<?php
    if (session_status() == PHP_SESSION_NONE) session_start();

    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/dbconfig.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . "/config/mailconfig.php";

    $email = (isset($_GET['email']) && !empty($_GET['email'])) ? filter_var(trim($_GET["email"]), FILTER_SANITIZE_EMAIL) : null;
    $username = (isset($_GET['uname']) && !empty($_GET['uname'])) ? filter_var(trim($_GET["uname"]), FILTER_SANITIZE_ENCODED) : null;
    $passwd = (isset($_GET['verif']) && !empty($_GET['verif'])) ? base64_decode(trim($_GET['verif'])) : null;

    try{
        $db = new SQLiDB();

        if($username && $passwd){
            $sql = "SELECT passwd FROM users WHERE username = :uname";
            $stmt =$db->prepare($sql);

            $stmt->bindParam(":uname", $username);

            $stmt->execute();
            $ret = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!empty($ret)){
                if($passwd !== $ret['passwd']){
                    echo "Invalid token!";
                    die();
                }
                else{
                    if($email){
                        $sql = "DELETE FROM users WHERE username = :uname";
                        $stmt =$db->prepare($sql);

                        $stmt->bindParam(":uname", $username);

                        $stmt->execute();

                        $sql = "DELETE FROM participants WHERE email = :email";
                        $stmt =$db->prepare($sql);

                        $stmt->bindParam(":email", $email);

                        $stmt->execute();
                        
                        session_destroy();
                    }
                    else{
                        echo "Something went wrong. Please try again.";
                        die();
                    }
                }

            } else {
                echo "Your account doesn't seem to exist :(";
                die();
            }

        } else {
            echo "Something went wrong. You will be redirected to our homepage. Please try again.";
            die();
        }
    } catch(PDOException $e){
        http_response_code(500);
        echo $e->getMessage();
        die();
    }
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/basics.css">

        <link rel="shortcut icon" type="image/png" href="./ute-icons/FaviconUTE.png"/>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Khand&family=Montserrat:wght@300;400&display=swap" rel="stylesheet"> 

        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <title>Change Password - UPtown Ecothon</title>

        <style>
                * {
                    font-family:'Khand', sans-serif;
                    font-size: 2vw;
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
                    font-size: 2vw;
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
                    font-size: 2vw;
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
                    font-size: 2vw;
                    text-align:center;
                    padding: 1%;
                }
            </style>
    </head>
    <body style="background-color: #340634; margin:0px; overflow:hidden">
        <div class="page-title" style="position: relative; margin-top: 8vh; margin-bottom:3vh; width:100%; height: 8vh; background-color: transparent; font-size:4vw; z-index:70">
            <div class="text-centrat" style="color:white; text-decoration: underline dashed 0.5vh #00ff16")>
                Account Deleted!
            </div>
        </div>

        <div class="rounded-rect" style="position:relative; left:50%; transform:translateX(-50%); background-color:white; width:60%;">
            You will be redirected soon...
        </div>
        
        <script>
            setTimeout(function(){
                document.location.href = "home.php";
            }, 3000)
        </script>
    </body>
</html>