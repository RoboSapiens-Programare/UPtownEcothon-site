<!DOCTYPE html>

<?php
    session_start();

    if(isset($_SESSION['adminloggedin']) && $_SESSION['adminloggedin'] == true){
        header("location: cms.php");
        die();
    }

    $msg = "";

    require_once('config/captchacredentials.php');
    require_once('config/captchaconfig.php');  

    $res = verify_captcha();
    
    if ($res['success'] == true && $res['score'] >= 0.5) {
        
        require_once 'config/dbconfig.php';

        $username = (isset($_POST['username']) && !empty($_POST['username'])) ? $_POST['username'] : null;
        $passwd = (isset($_POST['passwd']) && !empty($_POST['passwd'])) ? $_POST['passwd'] : null;

        try{
            $db = new ContentDB();

            if($username && $passwd){
                $sql = "SELECT id, username, passwd FROM admins WHERE username = :uname LIMIT 1";
                $stmt = $db->prepare($sql);

                $stmt->bindParam(':uname', $username);

                $stmt->execute();

                if($stmt){
                    $ret = $stmt->fetch(PDO::FETCH_ASSOC);
                    $hash = $ret['passwd'];
                    if(password_verify($passwd, $hash)){
                        $msg = "Ai intrat!";

                        session_start();

                        $_SESSION['adminloggedin'] = true;
                        $_SESSION['adminid'] = $ret['id'];
                        $_SESSION['adminusername'] = $ret['username'];

                        header("location: cms.php");
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
    
    } else {
    
        echo '<div>
        Error! The security token has expired or you are a bot.
        </div>';
    }  
?>

<html>
    <head>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
        <script src="https://www.google.com/recaptcha/api.js?render=6Lc3EicaAAAAACx7cucfSk0pKiALJOH6v2puvb4G"></script>

        <title>Admin Login - UTE</title>
    </head>
    <body>
        <section style="margin: 50px 20px;">
            <div style="max-width: 300px; margin: auto;">
                
                <!-- contact form -->
                <div class="card">
                    <h2 class="card-header" style="color: black; font-size: 2rem">Admin Login</h2>
                    <div class="card-body">
                        <form class="contact_form" method="post">

                            <!-- form fields -->
                            <div class="row">
                                <div class="col-md-12 form-group">
                                    <input id="username" name="username" type="text" class="form-control" placeholder="Username" required>
                                </div>
                                <div class="col-md-12 form-group">
                                    <input id="passwd" name="passwd" type="password" class="form-control" placeholder="Password" required>
                                </div>

                                <div class="col-12">
                                    <input type="submit" value="Login" class="btn btn-success" name="post">
                                </div>

                                <?php echo $msg ?>
                                <!-- hidden reCaptcha token input -->
                                <input type="hidden" id="token" name="token">
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </section>

        <script>
            grecaptcha.ready(function() {
                grecaptcha.execute('6Lc3EicaAAAAACx7cucfSk0pKiALJOH6v2puvb4G', {action: 'homepage'}).then(function(token) {
                // console.log(token);
                document.getElementById("token").value = token;
                });
            });
        </script>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    </body>
</html>