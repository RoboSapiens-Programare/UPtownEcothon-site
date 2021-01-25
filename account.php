<!DOCTYPE html>
<?php
    if (!isset ($_SESSION)) session_start();
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
            label{
                position: relative;
                font-size: 2vh;
                width: 20%;
            }
            input, textarea, select{
                position:relative;
                margin: 0vh 0vw 3vh 0vw;
                border: 0.3vh solid #00ff16;
                border-radius: 20px;
                width:98%;
                right: 0px;
                background-color: transparent;
                height: 2vh;
                padding: 1%;
                font-size: 2vh;
            }
            button{
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
            <div class="section">
                <span style="text-decoration: underline dashed #00ff16 0.2vh;"> Username: </span> [echo username]; <br>
                <span style="text-decoration: underline dashed #00ff16 0.2vh;">E-mail:</span> [echo email]; <br>
                <span style="text-decoration: underline dashed #00ff16 0.2vh;">Phone nuber:</span> [echo phone number]; <br>
            </div>
            <div class="section">
                <button>Change Username</button>
                <button>Change E-mail</button>
                <button>Change Phone Number</button>
                <button>Change Password</button>
            </div>
        </div>

    </body>
</html>