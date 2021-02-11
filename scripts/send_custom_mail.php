<?php
    if (session_status() == PHP_SESSION_NONE) session_start();

	$displaylogin = true;
	if(!isset($_SESSION['adminloggedin']) || $_SESSION['adminloggedin'] == false){
        header('Location: ../adminlogin.php');
        die();
	}


    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $email = (isset($_GET['email']) && !empty($_GET['email'])) ? filter_var(trim($_GET["email"]), FILTER_SANITIZE_EMAIL) : null;
        $subject = (isset($_POST['subject']) && !empty($_POST['subject'])) ? $_POST["subject"] : null;
        $title = (isset($_POST['title']) && !empty($_POST['title'])) ? $_POST["title"] : null;
        $content = (isset($_POST['content']) && !empty($_POST['content'])) ? $_POST["content"] : null;

        if($email && $subject && $title && $content){
            $ncontent = createEmail($title, $content);
            $headers = "From: Contact UPtown Ecothon <ute-contact@robosapiens.ro>\r\n";
            $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

            mail($email, $subject, $ncontent, $headers);

            http_response_code(200);
            echo "Trimis mail!";
            die();
        }
        else{
            echo "Sad noises";
        }
    }

    
?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/basics.css">

        <link rel="shortcut icon" type="image/png" href="./ute-icons/FaviconUTE.png"/>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Khand&family=Montserrat:wght@300;400&display=swap" rel="stylesheet"> 

        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="robots" content="noindex">

        <title>Compose Mail - UPtown Ecothon</title>


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
                @media screen and (max-width:750px){
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
        <div class="page-title" style="position: relative; margin-top: 8vh; margin-bottom:3vh; width:100%; height: 8vh; background-color: transparent; font-size:4vw; z-index:70">
            <div class="text-centrat" style="color:white; text-decoration: underline dashed 0.5vh #00ff16")>
                Do the stanky
            </div>
        </div>

        <div class="rounded-rect" style="position:relative; left:50%; transform:translateX(-50%); background-color:white; width:60%;">
            <form method="GET" id="ting">
                <label for="email">To:</label>
                <input type="text" id="email" name="email"> <br>

                <label for="subject">Subject:</label>
                <input type="text" id="subject" name="subject"> <br>

                <label for="title">Subject:</label>
                <input type="text" id="title" name="title"> <br>

                <label for="content">Subject:</label>
                <textarea id="content" name="content"></textarea> <br>

                <button type="submit">Pwess me dawddy >///<</button>
            </form>
        </div>
    </body>
</html>