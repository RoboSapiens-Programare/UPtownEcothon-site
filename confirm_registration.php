<!DOCTYPE html>
<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/dbconfig.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . "/config/mailconfig.php";

    $uname = (isset($_GET['uname']) && !empty($_GET['uname'])) ? filter_var(trim($_GET["uname"]), FILTER_SANITIZE_SPECIAL_CHARS) : null;
    $passwd_verif = (isset($_GET['verif']) && !empty($_GET['verif'])) ? base64_decode($_GET['verif']) : null;

    $err_msg = '';

    try{
        $db = new SQLiDB();

        if($uname && $passwd_verif){
            $sql = "SELECT passwd, participant_id FROM users WHERE username = :uname";
            $stmt =$db->prepare($sql);

            $stmt->bindParam(":uname", $uname);

            $stmt->execute();
            $ret = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!empty($ret)){
                $old_passwd = $ret['passwd'];
                if(strcmp($old_passwd, $passwd_verif) == 0){
                    $discord_uname = (isset($_POST['discord_uname']) && !empty($_POST['discord_uname'])) ? filter_var(trim($_POST["discord_uname"]), FILTER_SANITIZE_SPECIAL_CHARS) : null;
                    
                    if($discord_uname != null) {
                        $sql = "UPDATE participants SET discord_uname = :discord_uname, confirmed = 1 WHERE id = :participant_id";
                        $stmt = $db->prepare($sql);

                        $stmt->bindParam(":participant_id", $ret['participant_id']);
                        $stmt->bindParam(":discord_uname", $discord_uname);

                        $stmt->execute();

                        echo "Mulțumim!";
                        header("location: home.php");
                    }
                    else {
                        //passwd does not match
                        $err_msg =  "Complete the field!";
                    }
                } else {
                    //passwd does not match
                    http_response_code(500);
                    $err_msg =  "Weird... You couldn't have been identified. Try again!";
                    die();
                }
            } else {
                http_response_code(500);
                echo "Something did not go as planned. Try again!";
                die();
            }

        } else {
            http_response_code(403);
            echo "Something did not go as planned. Try again!";
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
        <?php
            if(isset($_GET['lang']) && $_GET['lang'] == 'en'){
                $lang = 'EN';
            }
            else{
                $lang = 'RO';
            }

            //CONTENT
            require_once $_SERVER['DOCUMENT_ROOT'] . '/config/dbconfig.php';

            try{
                $db = new ContentDB();

                $content = array();
                $content = $db->getContentsForPage('confirm_registration.php', $lang);

                $db = null;
                unset($db);
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        ?>

        <link rel="shortcut icon" type="image/png" href="./ute-icons/FaviconUTE.png"/>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Khand&family=Montserrat:wght@300;400&display=swap" rel="stylesheet"> 

        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="robots" content="noindex">

        <title>Confirm Registration - UPtown Ecothon</title>


        <style>
                * {
                    font-family:'Khand', sans-serif;
                    font-size: 2vw;
                }
                label{
                    position: relative;
                    color: black;
                    font-size: 2vw;
                    width: 20%;
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
                    border-radius: 20px;
                    width:100%;
                    right: 0px;
                    background-color: #ffafc0;
                    height: 6vh;
                    font-size: 2vw;
                    text-align:center;
                    padding: 1%;
                } #language {
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
    <body style="background-color: #340634; margin:0px; overflow:hidden">
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

        <div class="page-title" style="position: relative; margin-top: 8vh; margin-bottom:3vh; width:100%; height: 8vh; background-color: transparent; font-size:4vw; z-index:70">
            <div class="text-centrat" style="color:white; text-decoration: underline dashed 0.5vh #00ff16")>
                <?php echo $content['Interface']['PageTitle']; ?>
            </div>
        </div>

        <div class="rounded-rect" style="position:relative; left:50%; transform:translateX(-50%); background-color:white; width:60%;">
            <form method="POST" id="passchange" onsubmit="return validateForm()">
                <label for="discord_uname"><?php echo $content['Interface']['Discord']; ?></label>
                <input type="text" id="discord_uname" name="discord_uname" ><br>

                <div id="message" class="msg"><?php echo $err_msg; ?></div>

                <button type="submit"><?php echo $content['Interface']['SubmitBtn']; ?></button>
            </form>
        </div>
        
        <script>
            function validateForm(){
                var isOk = true;

                //verify all input fields are filled in + checks if the passwords match
                var input = document.getElementById('discord_uname');
                if(input.value.length == 0 || input == null){
                    input.style.borderColor = "red";
                    isOk = false;
                } 

                const re = /^(([^<>()\[\]\\.,;:\s#"]+(\.[^<>()\[\]\\.,;:\s#"]+)*)|(".+"))#([0-9]{4})$/;
                var isDiscord = re.test(String(input.value).toLowerCase());

                if(!isDiscord){
                    isOk = false;
                    var message = document.getElementById('message');
                    message.innerHTML = "Please enter a valid Discord name!";
                }

                if(isOk){
                    return true;
                } else {
                    return false;
                }
            }

            var inputs = document.querySelectorAll("input")
            for (i = 0; i < inputs.length; i++) {
                inputs[i].addEventListener('click', function() {
                    this.style.borderColor = "#00ff16";
                });
            }
        </script>
        
        
    </body>
</html>