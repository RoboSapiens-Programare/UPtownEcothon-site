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
          

		  <link href="https://allfont.net/allfont.css?fonts=agency-fb-bold" rel="stylesheet" type="text/css" />
		  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

		  <script src="javascript/tween-functions.js"></script>
		  <script src="javascript/transitions.js"></script>
    </head>
    <body>

        <div>
            <h2>Login</h2>
            <form method="POST">
                <label for="username">Username</label>
                <input type="text" id="username" name="username"><br>
                <label for="passwd">Password</label>
                <input type="password" id="passwd" name="passwd"><br>
                <button type="submit">Submit</button>
            </form>
        </div>

        <?php
            echo $msg;
        ?>
    </body>
</html>