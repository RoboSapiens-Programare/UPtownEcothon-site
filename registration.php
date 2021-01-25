<!DOCTYPE html>
<?php
    // header('Location: notyet.php');
    //imi dadea o eroare but this seemed to fix it, nu cred ca ai nevoie de session aici dar nu pare ca vrea sa mearga fara????
    if (!isset ($_SESSION)) session_start();

    require_once $_SERVER["DOCUMENT_ROOT"] . "/config/dbconfig.php";
    require_once $_SERVER["DOCUMENT_ROOT"] . "/config/captchacredentials.php";

    try{
        $db = new SQLiDB();

        //Get team options
        $sql = "SELECT * FROM teams";
        $stmt = $db->prepare($sql);
        
        $stmt->execute();

        $teamOptions = array();

        foreach($stmt as $row){
            $teamOptions[] = "<option value=" . $row['id'] . ">" . $row['name'] . "</option>";
        }

        unset($db);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
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
                Register
            </div>
        </div>

        <div style="position:relative; width:90%; max-width: 700px; left: 50%; transform:translateX(-50%);" class="rounded-rect">
                
            <div id="registerParticipant" class="formelement">
                
                <form method="post"  name='registration' id='registration' action="scripts/submit_registration.php" class="ajax-form">
                    <div id="Registration" class="formelement">
                        <div class="msg" id="msg-reg" style="display: none;"></div>

                        <label for="firstname">First Name</label>
                        <input type="text" id="firstname" name="firstname"><br>
                        <label for="lastname">Last Name</label>
                        <input type="text" id="lastname" name="lastname"><br>
                        <label for="email">E-Mail Adress</label>
                        <input type="text" id="email" name="email"><br>
                        <label for="phone">Phone</label>
                        <input type="number" id="phone" name="phone"><br>
                        <label for="position">Position</label>
                        <select id="position" name="position" style="height:5vh">
                            <option value="selectcard"> - </option>
                            <option value="elev">Elev</option>
                            <option value="student">Student</option>
                            <option value="angajat">Angajat</option>
                            <option value="l-intrep">Liber Intreprinzator</option>
                        </select><br>
                        <label for="experience">Experience</label>
                        <textarea type="text" id="experience" name="experience" style="height: 10vh;"></textarea><br>  
                        <button id="regbtn" type="button"  onclick="registrationOK();">Next</button>  
                    </div>
                    
                    <div id="teamDetails" style="display: none;" class="formelement">
                        <div class="msg" id="msg-team" style="display: none;"></div>

                        <h2>Team Details</h2>
                        <label for="hasteam">Do you have a team?</label>
                        <select name="hasteam" id="hasteam" oninput="hasTeam();" style="height:5vh">
                            <option value="selectcard"> - </option>
                            <option value="yes">Yes</option>
                            <option value="want">No, but I want to find a team</option>
                            <option value="no">No, and I am a lone wolf</option>
                        </select><br>
                        
                        <div id="teamdiv" style="display: none;">
                            <label for="team">Team</label>
                            <select id="team" name="teamname" oninput="configNewTeam();" style="height:5vh">
                                <option value="selectcard">select team</option>
                                <option value="create">new team...</option>
                            <?php
                                foreach($teamOptions as $op){
                                    echo $op;
                                }
                            ?>
                            </select><br>
                        </div>
                        <div id="configNewTeam" style="display: none;">
                            <label for="teamCreateName">Team Name</label>
                            <input type="text" id="teamCreateName" name="teamcreatename" ><br>
                        </div>

                        <div id="ideasSection" style="display: none;">
                            <h2>Do you have any project ideas?</h2>
                            
                            <label for="ideas">Have any project ideas? </label>
                            <textarea type="text" id="ideas" name="ideadesc" style="height: 10vh;"></textarea><br> 
                        </div>
                        
                        <button id="teambtn" type="button" onclick="teamOK();">Next</button>
                    </div>

                    <div id="configureAccount" style="display: none;" class="formelement">
                        <div class="msg" id="msg-account" style="display: none;"></div>
                                    
                        <h2>Configure Account</h2>
                        
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username"><br>
                        <label for="passwd">Password</label>
                        <input type="password" id="passwd" name="passwd"><br>
                        <label for="passwd">Confirm Password</label>
                        <input type="password" id="cpasswd" name="cpasswd"><br>

                        <label for="newsletter">Subscribe to our newsletter?</label>
                        <input type="checkbox" id="newsletter" style="margin-left:2vw; width: 2vw; height:2vw; vertical-align:center; border-color:#00ff16" name="wantsubscribe"><br>

                        <div>
                            <input type="checkbox" class="form-check-input" id="captchaRefresh" onclick="reqRefresh(this);" style="margin-left:2vw; width: 2vw; height:2vw; vertical-align:center; border-color:#00ff16">
                            <label class="form-check-label" for="captchaRefresh">Check this thing cause the captcha expired!</label>
                        </div>
                        <input type="hidden" id="token" name="token">

                        <button id="btn-submit" type="submit" onclick="return accountOK()">Submit</button>
                    </div>
                    <div class="msg ajax-return-message" style="display: none;">Thank you for registering!</div>
                </form>
            </div>

            <div id="debug">
                <h2>Debug</h2>
                <form method="post">
                    <button type="submit" name="delete">Clear Table</button>
                    <button type="submit" name="dump">Dump Table</button>
                </form>
                <?php
                    if(isset($_POST['delete'])){
                        $db = new SQLiDB();
                        $sql = "DELETE FROM participants";
                        $db->exec($sql);
                        unset($db);

                        echo "Table records deleted!";
                    }

                    if(isset($_POST['dump'])){

                        $db = new SQLiDB();
                        $sql = "SELECT * FROM participants";
                        $result = $db->query($sql);
                        
                        foreach($result as $row){
                            foreach($row as $a){
                                echo $a . " : ";
                            }
                            echo "<br>";
                        }
                        unset($db);
                    }
                ?>
            </div>
        </div>


        <script>

            function validateForm(section, hasEmail){
                var isOk = true;

                //verify all input fields are filled in + checks if the passwords match
                var input = section.querySelectorAll("input");
                for (i = 0; i < input.length; ++i) {
                    if(input[i].value.length == 0 || input[i]==null){
                        input[i].style.borderColor = "red";
                        isOk = false;
                    } else if (input[i].getAttribute('id')=="cpasswd"){
                        var passwdValue = document.forms["registration"]["passwd"].value;
                        var cpasswdValue = document.forms["registration"]["cpasswd"].value;
                        if (passwdValue.normalize() != cpasswdValue.normalize()){
                            document.getElementById("passwd").style.borderColor = "red";
                            document.getElementById("cpasswd").style.borderColor = "red";
                            isOk = false;
                        }
                    }
                }

                if(hasEmail){
                    //verify experience field is filled in
                    if(document.forms["registration"]["experience"].value.length == 0 || document.forms["registration"]["experience"]==null){
                        document.forms["registration"]["experience"].style.borderColor="red";
                        isOk = false;
                    }

                    // verify email address
                    var email = document.forms["registration"]["email"].value;
                    const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                    var isemail = re.test(String(email).toLowerCase());
                    var message = document.getElementById('message');

                    if(isemail==false){
                        document.getElementById('email').style.borderColor = "red";
                        isOk = false;
                    }
                }
                
                var mandatoryIdea = false;
                // verify select fields + conditions to only check create or select team fields if user has selected so
                var selects = section.querySelectorAll("select");
                for (i = 0; i < selects.length; ++i) {
                    if(selects[i].value == "selectcard"){
                        selects[i].style.borderColor = "red";
                        isOk = false;
                    } else if (selects[i].value=="want"){
                        i = selects.length + 10;
                        isOk=true;
                        document.forms["registration"]["ideas"].style.borderColor="#00ff16";
                    } else if(selects[i].value=="no"){
                        i = selects.length + 10;
                        mandatoryIdea = true;
                        // alert(mandatoryIdea);
                        isOk=true;
                    } else if(selects[i].value=="yes"){
                        mandatoryIdea = true;
                        // alert(mandatoryIdea);
                        i++;
                        if(selects[i].value!="create" && selects[i].value!="selectcard"){
                            i = selects.length + 10;
                            isOk=true;
                        } else {
                            if(document.forms["registration"]["teamcreatename"].value.length == 0 || document.forms["registration"]["teamcreatename"]==null || selects[i].value=="selectcard"){
                                document.forms["registration"]["teamcreatename"].style.borderColor="red";
                                isOk = false;
                            }
                        }
                    }
                }

                //checks idea field only if person has team or wants to work alone
                if(mandatoryIdea==true){
                    // alert("a");
                    if(document.forms["registration"]["ideas"].value.length == 0 || document.forms["registration"]["ideas"]==null){
                        // alert("b");
                        document.forms["registration"]["ideas"].style.borderColor="red";
                        isOk = false;
                    }
                }

                //daca ceva nu e ok
                if(isOk==false){
                    return false;
                } else {
                    return true;
                }
            }
            
            function registrationOK(){
                var section =document.getElementById('Registration');
                if(validateForm(section,true)==true){
                    // alert("A mers");
                    var x = document.getElementById('teamDetails');
                    x.style.display = "block";

                    document.getElementById('msg-reg').style.display = "none";
                    document.getElementById('regbtn').style.display = "none";
                    
                } else{
                    // alert("nu");
                    document.getElementById('msg-reg').style.display = "block";
					document.getElementById('msg-reg').innerHTML = 'Please complete all fields accordingly!';
                }
                
            }

            function hasTeam(){
                var x = document.getElementById("teamdiv");
                var sel = document.getElementById("hasteam");
                var idea = document.getElementById('ideasSection');
                if (sel.value === "yes") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
                idea.style.display = "block";
            }

            function configNewTeam(){
                var x = document.getElementById("configNewTeam");
                var sel = document.getElementById("team");
                if (sel.value === "create") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
            }

            function teamOK(){
                var section = document.getElementById('teamDetails');
                if(validateForm(section,false)==true){
                    // var x = document.getElementById('ideasSection');
                    // x.style.display = "block";
                    var x = document.getElementById('configureAccount');
                    x.style.display = "block";

                    document.getElementById('msg-team').style.display = "none";
                    document.getElementById('teambtn').style.display = "none";
                } else{
                    document.getElementById('msg-team').style.display = "block";
					document.getElementById('msg-team').innerHTML = 'Please complete all fields accordingly!';
                }
                // var x = document.getElementById('ideasSection');
                // x.style.display = "block";

                // document.getElementById('teambtn').style.display = "none";
            }

            // function ideaOK(){
            //     var section = document.getElementById('ideasSection');
            //     if(validateForm(section,false)==true){
            //         var x = document.getElementById('configureAccount');
            //         x.style.display = "block";

            //         document.getElementById('msg-idea').style.display = "none";
            //         document.getElementById('ideabtn').style.display = "none";
            //     } else{
            //         document.getElementById('msg-idea').style.display = "block";
			// 		document.getElementById('msg-idea').innerHTML = 'Please complete all fields accordingly!';
            //     }
            // }

            function accountOK(){
                var section = document.getElementById('configureAccount');
                if(validateForm(section,false)){
                    document.getElementById('msg-account').style.display = "none";
                    return true;
                } else{
                    document.getElementById('msg-account').style.display = "block";
                    document.getElementById('msg-account').innerHTML = 'Please complete all fields accordingly!';
                    return false;
                }
            }


            //CEVA nu imi pare safe la atatea loop uri dar maeks stuff green if clicked on (for when u enter stuff wrong and it turn red)
            var inputs = document.querySelectorAll("input")
            for (i = 0; i < inputs.length; i++) {
                inputs[i].addEventListener('click', function() {
                    this.style.borderColor = "#00ff16";
                });
            }

            var selects = document.querySelectorAll("select")
            for (i = 0; i < selects.length; i++) {
                selects[i].addEventListener('click', function() {
                    this.style.borderColor = "#00ff16";
                });
            }

            var textareas = document.querySelectorAll("textarea")
            for (i = 0; i < textareas.length; i++) {
                textareas[i].addEventListener('click', function() {
                    this.style.borderColor = "#00ff16";
                });
            }

            //For reCaptcha
            grecaptcha.ready(function() {
                captchaRefresh();
            });

            function captchaRefresh(){
                grecaptcha.execute('<?php echo $site_key; ?>', {action: 'homepage'}).then(function(token) {
                document.getElementById("token").value = token;
                });
            }

            function reqRefresh(){
                captchaRefresh();
                enButton(document.getElementById("token").value);
            }

            async function enButton(old_token) {
                btn_submit = document.getElementById('btn-submit');
                btn_check = document.getElementById('captchaRefresh');
                btn_check.parentElement.style.display = "none";
                btn_submit.disabled = true;

                var strToken = old_token;
                var varCant = 0;

                while (strToken == old_token && varCant < 30) {
                    strToken = document.getElementById("token").value;

                    await sleep(100);
                    varCant++;
                }


                btn_submit.style.opacity = 1;
                btn_submit.disabled = false;

                setTimeout(function(){
                    disButton();
                }, 60000);
            }

            function sleep(ms) {
                return new Promise(resolve => setTimeout(resolve, ms));
            }

            function disButton(){
                btn_submit = document.getElementById('btn-submit');
                btn_check = document.getElementById('captchaRefresh');
                btn_check.checked = false;
                btn_check.parentElement.style.display = "block";
                btn_submit.style.opacity = 0.6;
                btn_submit.disabled = true;
            }
        </script>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>
            //AJAX code
            (function ($) {
                'use strict';
                
                var form = $('.ajax-form'),
                message = $('.ajax-return-message'),
                form_data;
                
                function done_func(response) {
                    message.fadeIn()
                    message.html(response);
                    setTimeout(function () {
                        document.location.href = "login.php";
                    }, 3000);
                    form.find('input:not([type="submit"]), textarea').val('');
                }
                
                function fail_func(data) {
                    message.fadeIn()
                    message.html(data.responseText);
                    setTimeout(function () {
                        message.fadeOut();
                    }, 10000);
                    reqRefresh();
                }
                
                form.submit(function (e) {
                    e.preventDefault();
                    form_data = $(this).serialize();
                    $.ajax({
                        type: 'POST',
                        url: form.attr('action'),
                        data: form_data
                    })
                    .done(done_func)
                    .fail(fail_func);
                }); 
            })(jQuery);
        </script>
    </body>  

</html>