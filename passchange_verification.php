<!DOCTYPE html>
<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/dbconfig.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . "/config/mailconfig.php";

    $uname = (isset($_GET['uname']) && !empty($_GET['uname'])) ? filter_var(trim($_GET["uname"]), FILTER_SANITIZE_ENCODED) : null;
    $passwd_verif = (isset($_GET['verif']) && !empty($_GET['verif'])) ? base64_decode($_GET['verif']) : null;

    try{
        $db = new SQLiDB();

        if($uname && $passwd){
            $sql = "SELECT passwd FROM users WHERE uname = :uname";
            $stmt =$db->prepare($sql);

            $stmt->bindParam(":uname", $uname);

            $stmt->execute();
            $ret = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!empty($ret)){
                //nu stiu daca am nevoie sa verific mai intai ca usernameul exista si dupa sa iau parola in functie de asta daca verific daca exista parola pt un anume user din prima

                // $sql = "SELECT passwd FROM users WHERE participant_id = :id";
                // $stmt =$db->prepare($sql);

                // $stmt->bindParam(":id", $ret['participant_id']);

                // $stmt->execute();
                // $ret = $stmt->fetch(PDO::FETCH_ASSOC);
                
                // if(!$ret){
                //     //password does not exist
                //         http_response_code(500);
                //         echo "Something did not go as planned. Try again!";
                //         die();
                // } else {
                    $old_passwd = $ret['passwd'];
                    if(strcmp($old_passwd, $passwd_verif) == 0){
                        $npasswd = (isset($_POST['npasswd']) && isset($_POST['cnpasswd']) && ($_POST['npasswd'] === $_POST['cnpasswd'])) ? $_POST['npasswd'] : null;
                        
                        if($npasswd != null) {
                            $password = password_hash($npasswd, PASSWORD_DEFAULT);
                            
                            $sql = "UPDATE users SET passwd = :passwd WHERE uname = :uname";
                            $stmt = $db->prepare($sql);

                            $stmt->bindParam(":uname", $uname);
                            $stmt->bindParam(":passwd", $password);

                            $stmt->execute();

                            http_response_code(200);
                            echo "Password has been changed successfully!";
                            die();
                        } else {
                            http_response_code(500);
                            echo "Something did not go as planned. Try again!";
                            die();
                        }

                    } else {
                        //passwd does not match
                        http_response_code(500);
                        echo "Something did not go as planned. Try again!";
                        die();
                    }
                // }

            } else {
                http_response_code(500);
                echo "Something did not go as planned. Try again!";
                die();
                // http_response_code(403);
                // echo "This user is not registered!";
                // die();
            }

        } else {
            http_response_code(500);
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
                }
            </style>
    </head>
    <body style="background-color: #340634; margin:0px; overflow:hidden">
        <div class="page-title" style="position: relative; margin-top: 8vh; margin-bottom:3vh; width:100%; height: 8vh; background-color: transparent; font-size:4vw; z-index:70">
            <div class="text-centrat" style="color:white; text-decoration: underline dashed 0.5vh #00ff16")>
                Change Password
            </div>
        </div>

        <div class="rounded-rect" style="position:relative; left:50%; transform:translateX(-50%); background-color:white; width:60%;">
            <form method="POST" id="passchange" onsubmit="return validateForm()">
                <label for="npasswd">Enter new password:</label>
                <input type="text" id="npasswd" name="npasswd"> <br>

                <label for="cnpasswd">Confirm new password:</label>
                <input type="text" id="cnpasswd" name="cnpasswd"> <br>

                <button type="submit">Change to new password</button>
            </form>
        </div>
        
        <script>
            function validateForm(){
                var isOk = true;

                //verify all input fields are filled in + checks if the passwords match
                var input = document.querySelectorAll("input");
                for (i = 0; i < input.length; ++i) {
                    if(input[i].value.length == 0 || input[i]==null){
                        input[i].style.borderColor = "red";
                        isOk = false;
                    } else if (input[i].getAttribute('id')=="cnpasswd"){
                        var passwdValue = document.forms["passchange"]["npasswd"].value;
                        var cpasswdValue = document.forms["passchange"]["cnpasswd"].value;
                        if (passwdValue.normalize() != cpasswdValue.normalize()){
                            document.getElementById("npasswd").style.borderColor = "red";
                            document.getElementById("cnpasswd").style.borderColor = "red";
                            isOk = false;
                        }
                    }
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