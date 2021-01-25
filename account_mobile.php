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
            label, .label{
                position: relative;
                font-size: 4vw;
                /* width: 20%;   */
                text-decoration: underline dashed 0.2vh #00ff16;
            }
            input, textarea, select, .chestie{
                position:relative;
                margin: 0vh 0vw 2vh 0vw;
                /* border: 0.3vh solid #00ff16; */
                border: none;
                border-radius: 20px;
                width:95%;
                left: 50%;
                transform: translateX(-50%);
                background-color: transparent;
                height: 3vh;
                padding: 1%;
                font-size: 4vw;
            }
            button, #delete-btn{
                position:relative;
                margin: 1vh 0vw 1.5vh 0vw;
                border: none;
                border: 0.3vh solid #00ff16;
                border-radius: 20px;
                width:100%;
                left: 50%;
                transform: translateX(-50%);
                background-color: #340634;
                height: 8vh;
                padding: 1%;
                font-size: 4vw;
                color: white;
            }
            #delete-btn{
                background-color: #ffafc0;
                color: black;
            }
            button:hover, #delete-btn:hover{
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
                font-size: 4vw;
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

            <div class="label">Email:</div> 
            <div class="chestie" style="border:none"> [echo email] </div>

            <form method="post" name="change-details" id="change-details" onsubmit="return validateForm()">
                <div class="msg" style="display: none;"></div>

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="echo username" disabled> <br>

                <label for="fname">First name</label>
                <input type="text" id="fname" name="fname" value="echo fname" disabled> <br>

                <label for="lname">Last name:</label>
                <input type="text" id="lname" name="lname" value="echo lname" disabled> <br>

                <label for="phone">Phone number:</label>
                <input type="number" id="phone" name="phone" value="0123456789" disabled> <br>

                <button type="button" id="edit-btn" onclick="enableEdit()">Edit Details</button>
                <button type="submit" id="submit-btn" style="display: none;">Submit</button>

                <div class="msg" style="background-color: transparent;"></div>
                
            </form>

            <button type="button" id="delete-btn">Delete Account</button>
            
        </div>

        <a href="logout.php" style="display: block; position:relative; left:50%; transform:translateX(-50%); font-size:2.5vh; margin-top:3vh; text-align:center">sign out</a>

        <script>
            var edit = document.getElementById("edit-btn");
            var submit = document.getElementById("submit-btn");
            var errorMsg = document.getElementsByClassName("msg")[0];
            var submitMsg = document.getElementsByClassName("msg")[1];

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
                    errorMsg.style.display = "block";
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
                    return true;
                }
            }
        </script>
    </body>
</html>