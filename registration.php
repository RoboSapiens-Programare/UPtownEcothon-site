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
        $sql = "SELECT * FROM teams WHERE id <> 0 AND id <> 99";
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
        <title>Registration - UPtown Ecothon</title>
        <link rel="shortcut icon" type="image/png" href="./ute-icons/FaviconUTE.png"/>

        <link rel="stylesheet" type="text/css" href="css/sageata.css">
		<link rel="stylesheet" type="text/css" href="css/basics.css">

        <link rel="stylesheet" type="text/css" href="css/bottom.css">
        <link rel="stylesheet" type="text/css" href="css/slidingcontent.css">

        <script src="https://www.google.com/recaptcha/api.js?render=<?php echo $site_key; ?>"></script>

        <?php
            //LANG
            if(isset($_GET['lang']) && $_GET['lang'] == 'en'){
                $lang = 'EN';
            }
            else{
                $lang = 'RO';
            }

            //CONTENT
            // require_once $_SERVER['DOCUMENT_ROOT'] . '/config/dbconfig.php';

            try{
                $db = new ContentDB();

                $content = array();
                $content = $db->getContentsForPage('registration.php', $lang);

                $db = null;
                unset($db);
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        ?>
        
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
                transition: all 500ms ease;
            }
            button:hover{
                background-color: transparent;
                color: black;
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
            }#language {
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
                    font-size: 3vw;
                }
                input, textarea, select{
                    margin: 0vh 0vw 1vh 0vw;
                    width:98%;
                    height: 3vh;
                    padding: 1%;
                    font-size: 3vw;
                }
                button{
                    margin: 0vh 0vw 1vh 0vw;
                    width:100%;
                    padding: 1%;
                    font-size: 3vw;
                }
                .msg{
                    margin: 0vh 0vw 1vh 0vw;
                    width:100%;
                    font-size: 3vw;
                    padding: 1%;
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
    <body id="home" style="background-color: #340634; margin:0px; " onload="enButton();">
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

        <div class="page-title" style="position: relative; margin-top: 3vh; margin-bottom:2vh; width:100%; height: 8vh; background-color: transparent; font-size:4vw; z-index:70">
            <div class="text-centrat" style="color:white; text-decoration: underline dashed 0.5vh #00ff16">
                <?php echo $content['Interface']['PageTitle']; ?>
            </div>
        </div>

        <a href="home.php" style="display: block; position:relative; left:50%; transform:translateX(-50%); font-size:2.5vh; margin-top:3vh; text-align:center"><?php echo $content['Interface']['BackHomeBtn']; ?></a>

        <div style="position:relative; width:90%; max-width: 700px; left: 50%; transform:translateX(-50%);" class="rounded-rect">
                
            <div id="registerParticipant" class="formelement">
                
                <form method="post" name='registration' id='registration' action="scripts/submit_registration.php" class="ajax-form">
                    <div id="Registration" class="formelement">
                        <div class="msg" id="msg-reg" style="display: none;"></div>

                        <label for="firstname"><?php echo $content['RegistrationSect']['Fname']; ?></label>
                        <input type="text" id="firstname" name="firstname"><br>
                        <label for="lastname"><?php echo $content['RegistrationSect']['Lname']; ?></label>
                        <input type="text" id="lastname" name="lastname"><br>
                        <label for="email">E-mail:</label>
                        <input type="text" id="email" name="email"><br>
                        <label for="phone"><?php echo $content['RegistrationSect']['Phone']; ?></label>
                        <input type="number" id="phone" name="phone"><br>
                        <label for="position"><?php echo $content['RegistrationSect']['Status']; ?></label>
                        <select id="position" name="position" style="height:5vh">
                            <option value="selectcard"> - </option>
                            <option value="elev"><?php echo $content['RegistrationSect']['Elev']; ?></option>
                            <option value="student"><?php echo $content['RegistrationSect']['Student']; ?></option>
                            <option value="angajat"><?php echo $content['RegistrationSect']['Employee']; ?></option>
                            <option value="l-intrep"><?php echo $content['RegistrationSect']['Freelancer']; ?></option>
                        </select><br>
                        <label for="experience"><?php echo $content['RegistrationSect']['Experience']; ?></label>
                        <textarea type="text" id="experience" name="experience" style="height: 9vh;"></textarea><br>  
                        <button id="regbtn" type="button"  onclick="registrationOK();">Next</button>  
                    </div>
                    
                    <div id="teamDetails" style="display: none;" class="formelement">
                        <div class="msg" id="msg-team" style="display: none;"></div>

                        <h2><?php echo $content['TeamSect']['SectTitle']; ?></h2>
                        <label for="hasteam"><?php echo $content['TeamSect']['hasTeam']; ?></label>
                        <select name="hasteam" id="hasteam" oninput="hasTeam();" style="height:5vh">
                            <option value="selectcard"> - </option>
                            <option value="yes"><?php echo $content['TeamSect']['Yes']; ?></option>
                            <option value="want"><?php echo $content['TeamSect']['Want']; ?></option>
                            <option value="no"><?php echo $content['TeamSect']['No']; ?></option>
                        </select><br>
                        
                        <div id="teamdiv" style="display: none;">
                            <label for="team"><?php echo $content['TeamSect']['Team']; ?></label>
                            <select id="team" name="teamname" oninput="configNewTeam();" style="height:5vh">
                                <option value="selectcard"><?php echo $content['TeamSect']['SelectTeam']; ?></option>
                                <option value="create"><?php echo $content['TeamSect']['NewTeam']; ?></option>
                            <?php
                                foreach($teamOptions as $op){
                                    echo $op;
                                }
                            ?>
                            </select><br>
                        </div>
                        <div id="configNewTeam" style="display: none;">
                            <label for="teamCreateName"><?php echo $content['TeamSect']['TeamName']; ?></label>
                            <input type="text" id="teamCreateName" name="teamcreatename" ><br>
                        </div>

                        <div id="ideasSection" style="display: none;">
                            <h2><?php echo $content['IdeasSect']['SectTitle']; ?></h2>
                            
                            <label for="ideas"><?php echo $content['IdeasSect']['Ideas']; ?> </label>
                            <textarea type="text" id="ideas" name="ideadesc" style="height: 10vh;"></textarea><br> 
                        </div>
                        
                        <button id="teambtn" type="button" onclick="teamOK();">Next</button>
                    </div>

                    <div id="configureAccount" style="display: none;" class="formelement">
                        <div class="msg" id="msg-account" style="display: none;"></div>
                                    
                        <h2><?php echo $content['ConfigAccSect']['SectTitle']; ?></h2>
                        
                        <label for="username">Username:</label>
                        <input type="text" id="username" name="username"><br>
                        <label for="passwd"><?php echo $content['ConfigAccSect']['Password']; ?></label>
                        <input type="password" id="passwd" name="passwd"><br>
                        <label for="passwd"><?php echo $content['ConfigAccSect']['ConfirmPass']; ?></label>
                        <input type="password" id="cpasswd" name="cpasswd"><br>

                        <label for="newsletter"><?php echo $content['ConfigAccSect']['Newsletter']; ?></label>
                        <input type="checkbox" id="newsletter" style="margin-left:2vw; width: 2vw; height:2vw; vertical-align:center; border-color:#00ff16" name="wantsubscribe"><br>

                        <div>
                            <input type="checkbox" class="form-check-input" id="captchaRefresh" onclick="reqRefresh(this);" style="margin-left:2vw; width: 2vw; height:2vw; vertical-align:center; border-color:#00ff16">
                            <label class="form-check-label" for="captchaRefresh"><?php echo $content['ConfigAccSect']['Captcha']; ?></label>
                        </div>
                        <input type="hidden" id="token" name="token">

                        <div class="msg" id="msg-disclaimer" style="display: block; background-color:transparent; font-weight:bold"><?php echo $content['ConfigAccSect']['Disclaimer']; ?></div>

                        <button id="btn-submit" type="submit" onclick="return accountOK()">Submit</button>
                    </div>
                    <div class="msg ajax-return-message" style="display: none;"><?php echo $content['ConfigAccSect']['ThankMsg']; ?></div>
                </form>
            </div>  

            <a href="login.php" style="font-size: 2vh; width:100%; margin-bottom:4vh; text-align:center">
                <?php echo $content['Interface']['Login']; ?>
            </a>
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