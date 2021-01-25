<!DOCTYPE html>
<?php
    // header('Location: notyet.php');
    //imi dadea o eroare but this seemed to fix it, nu cred ca ai nevoie de session aici dar nu pare ca vrea sa mearga fara????
    if (!isset ($_SESSION)) session_start();
?>
<html style="scroll-behavior: smooth">
    <head>
        <title></title>
        <link rel="stylesheet" type="text/css" href="css/sageatatlf.css">
		<link rel="stylesheet" type="text/css" href="css/basics.css">

        <link rel="stylesheet" type="text/css" href="css/bottom.css">
        <link rel="stylesheet" type="text/css" href="css/slidingcontent.css">

        <?php include 'elements/header.php'; ?>
        
        <style>
             * {
                font-family:'Khand', sans-serif;
                color: black;
            }
            label{
                position: relative;
                font-size: 3vw;
                width: 20%;
            }
            input, textarea, select{
                position:relative;
                margin: 0vh 0vw 1vh 0vw;
                border: 0.3vh solid #00ff16;
                border-radius: 20px;
                width:95%;
                left: 50%;
                transform: translateX(-50%);
                background-color: transparent;
                height: 3vh;
                padding: 1%;
                font-size: 3vw;
            }
            button{
                position:relative;
                margin: 1vh 0vw 1.5vh 0vw;
                border: 0.3vh solid #00ff16;
                border-radius: 20px;
                width:100%;
                left: 50%;
                transform: translateX(-50%);
                background-color: #340634;
                height: 8vh;
                padding: 1%;
                font-size: 3vw;
                color: white;
            }
            button:hover{
                background-color: transparent;
                color: black;
            }
            .msg{
                position:relative;
                margin: 0vh 0vw 1vh 0vw;
                border-radius: 20px;
                width:100%;
                left: 50%;
                transform: translateX(-50%);
                background-color: #ffafc0;
                font-size: 3vw;
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
                font-size: 4vw;
                overflow: hidden;
            }
            h2{
                margin:0;
                padding:0;
            }
        </style>
    </head>

    <body id="home" style="background-color: #340634; margin:0px; ">
        <?php include "elements/sageatatlf.html"; ?>

        <div class="page-title" style="position: relative; margin-top: 10vw; margin-bottom:8vw; width:100%; height: 8vh; background-color: transparent; font-size:10vw; z-index:70">
            <div class="text-centrat" style="color:white; text-decoration: underline dashed 0.5vh #00ff16">
                Configure Account
            </div>
        </div>	

        <div style="position:relative; width:90%; max-width: 850px; left: 50%; transform:translateX(-50%);" class="rounded-rect">
        <div id="current-data" class="section">
                <span style="text-decoration: underline dashed #00ff16 0.2vh;"> Username: </span> [echo username]; <br>
                <span style="text-decoration: underline dashed #00ff16 0.2vh;">E-mail:</span> [echo email]; <br>
                <span style="text-decoration: underline dashed #00ff16 0.2vh;">Phone nuber:</span> [echo phone number]; <br>
            </div>

            <button id="username-btn" title="username-sect" onclick="openSection(this, document.getElementById(this.getAttribute('title')))">Change Username</button>
            <div id="username-sect" class="section" style="display:none; border-bottom: 0.3vh dashed #00ff16;">
               <h2>Changing your username?</h2>
               <form method="post" name='change-username' id='change-username'>
                    <label for="new-username">Enter new username:</label>
                    <input type="text" id="new-username" name="new-username"><br>
                    <button type="submit"> Submit </button>
                    <div class="msg" style="background-color: transparent;"> You will receive an email verification in order to change your username.</div>
               </form>
            </div>
            
            <button id="email-btn" title="email-sect" onclick="openSection(this, document.getElementById(this.getAttribute('title')))">Change E-mail</button>
            <div id="email-sect" class="section" style="display:none; border-bottom: 0.3vh dashed #00ff16;">
                <h2>Changing your email?</h2>
                <form method="post" name='change-email' id='change-email'>
                    <label for="new-email">Enter new email address:</label>
                    <input type="text" id="new-email" name="new-email"><br>
                    <button type="submit"> Submit </button>
                    <div class="msg" style="background-color: transparent;"> You will receive a text verification ??????.</div>
               </form>
            </div>
            
            <button id="phone-btn" title="phone-sect" onclick="openSection(this, document.getElementById(this.getAttribute('title')))">Change Phone Number</button>
            <div id="phone-sect" class="section" style="display:none; border-bottom: 0.3vh dashed #00ff16;">
                <h2>Changing your phone number?</h2>
                <form method="post" name='change-phone' id='change-phone'>
                    <label for="new-phone">Enter new phone number:</label>
                    <input type="text" id="new-phone" name="new-phone"><br>
                    <button type="submit"> Submit </button>
                    <div class="msg" style="background-color: transparent;"> You will receive an email verification in order to change your phone number.</div>
               </form>
            </div>
            
            <button id="passwd-btn" title="passwd-sect" onclick="openSection(this, document.getElementById(this.getAttribute('title')))">Change Password</button>
            <div id="passwd-sect" class="section" style="display:none; border-bottom: 0.3vh dashed #00ff16;">
                <h2>Changing your password?</h2>
                <form method="post" name='change-passwd' id='change-passwd'>
                    <label for="old-passwd">Enter your old password:</label>
                    <input type="password" id="old-passwd" name="old-passwd" autocomplete="off"><br>

                    <label for="new-passwd">Enter new password:</label>
                    <input type="password" id="new-passwd" name="new-passwd"><br>
                    
                    <label for="cpasswd">Enter new password again:</label>
                    <input type="password" id="cpasswd" name="cpasswd"><br>

                    <button type="submit"> Submit </button>
                    <div class="msg" style="background-color: transparent;"> You will receive an email verification in order to change your username.</div>
               </form>
            </div>

            <button id="delete-btn" title="delete-sect" onclick="openSection(this, document.getElementById(this.getAttribute('title')))" style="background-color:#ffafc0; color:black">Delete your account</button>
            <div id="delete-sect" class="section" style="display:none; border-bottom: 0.3vh dashed #00ff16;">
                <h2>Deleting your account?</h2>
                By doing so, you will be eliminated from UPtown Ecothon. Are you sure you want to continue?
                <button>Yes.</button>
            </div>
        </div>

        <a href="logout.php" style="display: block; position:relative; left:50%; transform:translateX(-50%); font-size:2.5vh; margin-top:3vh; text-align:center">sign out</a>

        <script>
            function openSection(btn, section){
                section.style.display = "block";
                btn.style.backgroundColor = "#76667d";
                btn.style.color = "white";
                btn.style.margin = "0";
                btn.setAttribute('onclick', "closeSection(this, document.getElementById(this.getAttribute('title')))");
            }
            function closeSection(btn, section){
                section.style.display = "none";
                btn.removeAttribute('style');
                btn.setAttribute('onclick', "openSection(this, document.getElementById(this.getAttribute('title')))");
            }
        </script>


    </body>
</html>