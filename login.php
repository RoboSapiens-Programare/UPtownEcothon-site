<!DOCTYPE html>

<?php
    if (session_status() == PHP_SESSION_NONE) session_start();

    if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
        header("location: home.php");
        exit;
    }

    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/dbconfig.php';

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

                    if (session_status() == PHP_SESSION_NONE) session_start();

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
        <link rel="stylesheet" type="text/css" href="css/basics.css">

        <link rel="shortcut icon" type="image/png" href="./ute-icons/FaviconUTE.png"/>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Khand&family=Montserrat:wght@300;400&display=swap" rel="stylesheet"> 

        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <title>Login - UPtown Ecothon</title>

        <?php
            //LANG
            if(isset($_GET['lang']) && $_GET['lang'] == 'en'){
                $lang = 'EN';
            }
            else{
                $lang = 'RO';
            }

            //CONTENT
            // require_once $_SERVER['DOCUMENT_ROOT'] . '/config/dbconfig.php';

            try{
                $db = new ContentDB();

                $content = array();
                $content = $db->getContentsForPage('login.php', $lang);

                $db = null;
                unset($db);
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        ?>
        

        <style>
            * {
                font-family:'Khand', sans-serif;
            }
            label{
                position: relative;
                color: black;
                font-size: 1.3vw;
                /* width: 20%; */
            }
            input{
                position:relative;
                margin: 0vh 0vw 3vh 0vw;
                border: 0.3vh solid #00ff16;
                border-radius: 20px;
                width:96%;
                background-color: transparent;
                height: 5vh;
                padding: 1%;
                font-size: 1.3vw;
            }
            button{
                position:relative;
                margin: 0vh 0vw 3vh 0vw;
                border: 0.3vh solid #00ff16;
                border-radius: 20px;
                width:100%;
                background-color: #340634;
                height: 6vh;
                padding: 1%;
                color: white;
                font-size: 1.3vw;
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
                width:96%;
                right: 0px;
                background-color: #ffafc0;
                height: 6vh;
                font-size: 1.3vw;
                text-align:center;
                padding: 1%;
            }#language {
                position: fixed;
                top: 0px;
                right: 0vw;
                margin: 1vw;
                height: 4vh;
                background-color: transparent;
                mix-blend-mode: difference;
                z-index: 104;
            }

            #language li {
                display: inline;
                font-family: 'Khand', sans-serif; font-weight: bold;
                font-size: 2vw;
                color: white;
                text-decoration: none;
            }

            #language li a {
                font-family: 'Khand', sans-serif; font-weight: bold;
                font-size: 2vw;
                color: white;
                text-decoration: none;
            }

            #language li a:hover {
                -webkit-filter: invert(50%);
                filter: invert(50%);
            }
            @media screen and (orientation:portrait){
                label{
                font-size: 4vw;
                }
                input{
                    font-size: 3vw;
                    padding: 2%;
                }
                button{
                    font-size: 4vw;
                }
                .msg{
                    font-size: 4vw;
                }#language {
                    height: 8vh;
                    right: 2vw;
                }
                #language li {
                    font-size: 5vw;
                }
                #language li a {
                    font-size: 5vw;
                }
            }
        </style>
    </head>
    <body id="home" style="background-color: #340634; margin:0px; overflow:hidden">
        <div id="language">
            <ul>
                <li style="border-right: 0.2vw solid white;">
                    <a href="?lang=ro">
                    ro
                    </a>
                </li>
                <li style="padding-left: 0.4vw;">
                    <a href="?lang=en">
                    en
                    </a>
                </li>
            </ul>
        </div>

        <div style="min-height: 100vh; width:100%;">
            <div class="page-title" style="position: relative; margin-top: 8vh; margin-bottom:3vh; width:100%; height: 8vh; background-color: transparent; font-size:4vw; z-index:70">
                <div class="text-centrat" style="color:white; text-decoration: underline dashed 0.5vh #00ff16">
                    <?php echo $content['Interface']['PageTitle']; ?>
                </div>
            </div>	

            <div class="rounded-rect" style="position:relative; left:50%; transform:translateX(-50%); background-color:white; width:90%; max-width:700px">
                <?php
                    if(isset($msg)&& $msg != ""){
                        echo "
                            <div class='msg'>"; echo $msg; echo "</div>
                        ";
                    }
                ?>
                <form method="POST" >
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username"><br>
                    <label for="passwd"><?php echo $content['LoginForm']['Password']; ?></label>
                    <input type="password" id="passwd" name="passwd"><br>
                    <button type="submit">Submit</button>
                </form>

                <div style="font-size: 1.3vw; width:100%; margin-bottom:1vh">
                    <a href="forgotpass.php" style="position:absolute; left:2%;">
                        <?php echo $content['Interface']['ForgotPass']; ?>
                    </a>
                    <!-- <a href="registration.php" style="position:absolute; right:2%;">
                        <?php echo $content['Interface']['Register']; ?>
                    </a> -->
                </div>
            </div> 
            
            <a href="home.php" style="display: block; position:relative; left:50%; transform:translateX(-50%); font-size:2.5vh; margin-top:3vh; text-align:center; color:white"><?php echo $content['Interface']['BackHome']; ?></a>
            
        </div>


    </body>
</html>