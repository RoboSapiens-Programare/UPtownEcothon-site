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
            label, .label{
                position: relative;
                font-size: 2vh;
                width: 20%;
                text-decoration: underline dashed 0.2vh #00ff16;
            }
            input, textarea, select, .chestie{
                position:relative;
                margin: 0vh 0vw 3vh 0vw;
                border: none;
                /* border: 0.3vh solid #00ff16; */
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
                transition: all 500ms ease;
            }
            button:hover, button:active{
                background-color: transparent;
                color: black;
                cursor:pointer;
                transition: all 500ms ease; 
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
            <div class="label">Email:</div> 
            <div class="chestie" style="border:none"> [echo email]</div>

            <form method="post" name="change-details" id="change-details" onsubmit="return validateForm()">
                <div class="msg"></div>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="echo username" disabled> <br>

                <label for="fname">First name</label>
                <input type="text" id="fname" name="fname" value="echo fname" disabled> <br>

                <label for="lname">Last name:</label>
                <input type="text" id="lname" name="lname" value="echo lname" disabled> <br>

                <label for="phone">Phone number:</label>
                <input type="text" id="phone" name="phone" value="echo phone" disabled> <br>

                <button type="button" id="edit-btn" onclick="enableEdit()">Edit Details</button>
                <button type="submit" id="submit-btn" style="display: none;">Submit</button>

                <div class="msg" style="background-color: transparent;"></div>
                
            </form>
            
            <!-- <div id="current-data" class="section">
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
            </div> -->

        </div>

        <a href="logout.php" style="display: block; position:relative; left:50%; transform:translateX(-50%); font-size:2.5vh; margin-top:3vh; text-align:center">sign out</a>

        <script>
            // function openSection(btn, section){
            //     section.style.display = "block";
            //     btn.style.backgroundColor = "#76667d";
            //     btn.style.color = "white";
            //     btn.style.margin = "0";
            //     btn.setAttribute('onclick', "closeSection(this, document.getElementById(this.getAttribute('title')))");
            // }
            // function closeSection(btn, section){
            //     section.style.display = "none";
            //     btn.removeAttribute('style');
            //     btn.setAttribute('onclick', "openSection(this, document.getElementById(this.getAttribute('title')))");
            // }

            var edit = document.getElementById("edit-btn");
            var submit = document.getElementById("submit-btn");
            var errorMsg = document.getElementsByClassName("msg")[0];
            var submitMsg = document.getElementsByClassName("msg")[1];
            // alert(edit + " " + submit);

            function enableEdit() {

                edit.style.display = "none";
                submit.style.display = "block";

                var input = document.querySelectorAll("input");
                // alert("a");

                for (i = 0; i < input.length; ++i) {
                // alert("b");
                    input[i].style.border = "0.3vh solid #00ff16";
                    input[i].disabled = false;
                }
            }

            function validateForm(){
                var isOK = true;
                
                var input = document.querySelectorAll("input");
                for (i = 0; i < input.length; ++i) {
                    if(input[i].value.length == 0 || input[i]==null){
                        input[i].style.borderColor = "red";
                        isOK = false;
                    }
                }

                if(!isOK){
                    errorMsg.innerHTML = "Please complete all of the fields before submitting.";
                    return false;
                } else {
                    for (i = 0; i < input.length; ++i) {
                        input[i].style.border = "none";
                        input[i].disabled = true;
                    }

                    submitMsg.innerHTML = "Please confirm your changes via email";

                    edit.style.display = "block";
                    submit.style.display = "none";


                    //false for testing??
                    return false;
                }
            }
        </script>

    </body>
</html>