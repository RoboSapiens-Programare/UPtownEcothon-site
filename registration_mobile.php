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
                width:98%;
                left: 50%;
                transform: translateX(-50%);
                background-color: transparent;
                height: 3vh;
                padding: 1%;
                font-size: 3vw;
            }
            button{
                position:relative;
                margin: 0vh 0vw 1vh 0vw;
                border: 0.3vh solid #00ff16;
                border-radius: 20px;
                width:100%;
                left: 50%;
                transform: translateX(-50%);
                background-color: #340634;
                /* height: 5vh; */
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
            h2{
                margin:0;
                padding:0;
            }
        </style>

    </head>
    <body id="home" style="background-color: #340634; margin:0px; ">
        <?php include "elements/sageatatlf.html"; ?>


        <?php
            require_once 'config/dbconfig.php';

            function trim_value(&$value)
            {
                $value = trim($value);
            }
            array_filter($_POST, 'trim_value');

            $firstname = (isset($_POST['firstname']) && !empty($_POST['firstname'])) ? filter_var(trim($_POST["firstname"]), FILTER_SANITIZE_EMAIL) : null;
            $lastname = (isset($_POST['lastname']) && !empty($_POST['lastname'])) ? filter_var(trim($_POST["lastname"]), FILTER_SANITIZE_EMAIL) : null;
            $email = (isset($_POST['email']) && !empty($_POST['email'])) ? filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL) : null;
            $phone = (isset($_POST['phone']) && !empty($_POST['phone'])) ? filter_var(trim($_POST["phone"]), FILTER_SANITIZE_EMAIL) : null;
            $position = (isset($_POST['position']) && !empty($_POST['position'])) ? filter_var(trim($_POST["position"]), FILTER_SANITIZE_EMAIL) : null;
            $experience = (isset($_POST['experience']) && !empty($_POST['experience'])) ? filter_var(trim($_POST["experience"]), FILTER_SANITIZE_EMAIL) : null;
            $teamCreateName = (isset($_POST['teamcreatename']) && !empty($_POST['teamcreatename'])) ? filter_var(trim($_POST["teamcreatename"]), FILTER_SANITIZE_EMAIL) : null;
            $teamName = (isset($_POST['teamname']) && !empty($_POST['teamname'])) ? filter_var(trim($_POST["teamname"]), FILTER_SANITIZE_EMAIL) : null;
            $ideaDescription = (isset($_POST['ideadesc']) && !empty($_POST['ideadesc'])) ? filter_var(trim($_POST["ideadesc"]), FILTER_SANITIZE_EMAIL) : null;


            if($teamCreateName){
                try{
                    $db = new SQLiDB();

                    $sql = "SELECT * FROM teams WHERE name = :name";
                    $stmt = $db->prepare($sql);

                    $stmt->bindParam(':name', $teamCreateName);
                    
                    $stmt->execute();

                    if($stmt->rowCount() > 0){
                        $teamCreateName = null;
                    }

                    $db = null;
                    unset($db);
                }
                catch(PDOException $e){
                    $e->getMessage();
                }
            }

            $team_id = 1;
           //  $participant_id = null;
            $username = (isset($_POST['username']) && !empty($_POST['username'])) ? filter_var(trim($_POST["username"]), FILTER_SANITIZE_EMAIL) : null;
            $passwd = (isset($_POST['passwd']) && isset($_POST['cpasswd']) && ($_POST['passwd'] === $_POST['cpasswd'])) ? $_POST['passwd'] : null;

            $hasTeam = null;
            if(isset($_POST['hasteam'])){
               if($_POST['hasteam'] === "yes"){
                    $hasTeam = true;
                }
                else if(!empty($_POST['hasname'])){
                    $hasTeam = false;
                }
            }

            ///Dis where the fun begins
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


                //Check to see if all fields are filled accordingly
                if($firstname && $lastname && $email && $phone && $position && $experience && $username && $passwd && ($hasTeam ? ($teamName && (is_numeric($teamName) ? true : $teamCreateName)) : true)){

                    //For participant registration

                    //Set a random ID for the participant
                   //  $participant_id = rand(1000, 9999);
                    
                   $sql = "INSERT INTO participants (firstname, lastname, email, phone, position, experience) VALUES (:firstname, :lastname, :email, :phone, :position, :experience)";
                   $stmt = $db->prepare($sql);

                   //  $stmt->bindParam(':participant_id', $participant_id);
                    $stmt->bindParam(':firstname', $firstname);
                    $stmt->bindParam(':lastname', $lastname);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':phone', $phone);
                    $stmt->bindParam(':position', $position);
                    $stmt->bindParam(':experience', $experience);

                    $stmt->execute();
                

                    //For team details

                    //If the user has or wants to create a team
                    if($hasTeam){
                        //If the user wants to create a new team
                        if($teamName === "create"){
                            $sql = "INSERT INTO teams (name) VALUES (:name)";
                            $stmt = $db->prepare($sql);

                            $stmt->bindParam(':name', $teamCreateName);

                            $stmt->execute();

                            $sql = "SELECT * FROM teams WHERE name = :name";
                            $stmt = $db->prepare($sql);

                            $stmt->bindParam(':name', $teamCreateName);

                            $stmt->execute();

                            if($stmt){
                                $team_id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];
                            }
                        }
                        //Else if the team already exists, use its id
                        else if(is_numeric($teamName)){
                            $team_id = $teamName;
                        }
                    }
                    else{
                        $sql = "INSERT INTO teams (name) VALUES (:name)";
                        $stmt = $db->prepare($sql);

                        $personalTeamName = $firstname . $lastname . "'s Team";
                        $stmt->bindParam(':name', $personalTeamName);

                        $stmt->execute();

                        $sql = "SELECT * FROM teams WHERE name = :name LIMIT 1";
                        $stmt = $db->prepare($sql);

                        $stmt->bindParam(':name', $personalTeamName);

                        $stmt->execute();

                        if($stmt){
                            $team_id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];
                        }
                    }

                    //For user idea
                    if(!empty($ideaDescription)){
                       $sql = "INSERT INTO ideas (desc, team_id) VALUES (:ideaDescription, :team_id);";
                       $stmt = $db->prepare($sql);

                       $stmt->bindParam(':ideaDescription', $ideaDescription);
                       $stmt->bindParam(':team_id', $team_id);

                       $stmt->execute();
                   }

                    //For user configuration

                    //Get created participant's id
                    $sql = "SELECT id FROM participants WHERE email = :email LIMIT 1";
                    $stmt = $db->prepare($sql);
                    $stmt->bindParam(':email', $email);
                    $stmt->execute();
                    $participant_id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];
                    
                    $sql = "INSERT INTO users (username, passwd, team_id, participant_id) VALUES (:username, :passwd, :team_id, :participant_id)";
                    $stmt = $db->prepare($sql);
                    
                    $password = password_hash($passwd, PASSWORD_DEFAULT);

                    $stmt->bindParam(':username', $username);
                    $stmt->bindParam(':passwd', $password);
                    $stmt->bindParam(':team_id', $team_id);
                    $stmt->bindParam(':participant_id', $participant_id);

                    $stmt->execute();
                }
                else{
                    echo "
                    <script> 
                        document.getElementById('msg').style.display = 'block';
                        document.getElementById('msg').innerHTML = 'Please complete all fields accordingly!';
                    </script>";
                }

                $db = null;
                unset($db);

            }
            catch(PDOException $e){
                echo $e->getMessage();
            }  
        ?>


        <div class="page-title" style="position: relative; margin-top: 10vw; margin-bottom:8vw; width:100%; height: 8vh; background-color: transparent; font-size:10vw; z-index:70">
            <div class="text-centrat" style="color:white; text-decoration: underline dashed 0.5vh #00ff16">
                Register
            </div>
        </div>	

        <div style="position:relative; width:90%; max-width: 700px; left: 50%; transform:translateX(-50%);" class="rounded-rect">
            <div class="msg" id="msg" style="display: none;"></div>

            <!-- <div id="registerParticipant" class="formelement"> -->
                
            <form method="post" onsubmit='return validateForm()' name='registration' id='registration'>
                <div id="Registration" class="formelement">
                        <div class="msg" id="msg-reg" style="display: none;"></div>

                        <label for="firstname">First Name</label>
                        <input type="text" id="firstname" name="firstname" value=<?php if($firstname) echo $firstname; ?>><br>
                        <label for="lastname">Last Name</label>
                        <input type="text" id="lastname" name="lastname" value=<?php if($lastname) echo $lastname; ?>><br>
                        <label for="email">E-Mail Adress</label>
                        <input type="text" id="email" name="email" value=<?php if($email) echo $email; ?>><br>
                        <label for="phone">Phone</label>
                        <input type="number" id="phone" name="phone" value=<?php if($phone) echo $phone; ?>><br>
                        <label for="position">Position</label>
                        <select id="position" name="position" style="height:5vh; font-size:3vw;">
                            <option value="selectcard"> - </option>
                            <option value="elev">Elev</option>
                            <option value="student">Student</option>
                            <option value="angajat">Angajat</option>
                            <option value="l-intrep">Liber Intreprinzator</option>
                        </select><br>
                        <label for="experience">Experience</label>
                        <textarea type="text" id="experience" name="experience" style="height: 9vh;"><?php if($experience) echo $experience; ?></textarea><br>  
                        <button id="regbtn" type="button"  onclick="registrationOK();">Next</button>  
                </div>
            
                <div id="teamDetails" style="display: none;" class="formelement">
                    <div class="msg" id="msg-team" style="display: none;"></div>

                    <h2>Team Details</h2>
                        <label for="hasteam">Do you have a team?</label>
                        <select name="hasteam" id="hasteam" oninput="hasTeam();" style="height:5vh; font-size:3vw">
                            <option value="selectcard"> - </option>
                            <option value="yes">Yes</option>
                            <option value="want">No, but I want to find a team</option>
                            <option value="no">No, and I am a lone wolf</option>
                        </select><br>
                        
                        <div id="teamdiv" style="display: none;">
                            <label for="team">Team</label>
                            <select id="team" name="teamname" oninput="configNewTeam();" style="height:5vh; font-size:3vw">
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
                            <input type="text" id="teamCreateName" name="teamcreatename" value="<?php if($teamCreateName) echo "$teamCreateName"; ?>"><br>
                        </div>
                        <button id="teambtn" type="button" onclick="teamOK();">Next</button>
                </div>

                <div id="ideasSection" style="display: none;" class="fomelement">
                    <h2>Do you have any project ideas?</h2>

                        <label for="ideas">Share them with us! (optional) </label>
                        <textarea type="text" id="ideas" name="ideas" style="height: 10vh;"><?php if($ideaDescription) echo $ideaDescription; ?></textarea><br> 
                        <button id="ideabtn" type="button" onclick="ideaOK();">Next</button>                   
                </div>


                <div id="configureAccount" style="display: none;" class="formelement">
                    <div class="msg" id="msg-account" style="display: none;"></div>
                                
                    <h2>Configure Account</h2>
                    
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value=<?php if($username) echo $username; ?>><br>
                        <label for="passwd">Password</label>
                        <input type="password" id="passwd" name="passwd"><br>
                        <label for="passwd">Confirm Password</label>
                        <input type="password" id="cpasswd" name="cpasswd"><br>
                        <label for="newsletter">Subscribe to our newsletter?</label>
                        <input type="checkbox" id="newsletter" style="margin-left:1vw; width: 3vw; height:3vw ; vertical-align:center; "><br>
                        <button type="submit" onclick="return accountOK()">Submit</button>
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

                //verify all input fields are filled in
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
                
                // verify select fields
                var selects = section.querySelectorAll("select");
                for (i = 0; i < selects.length; ++i) {
                    if(selects[i].value == "selectcard"){
                        selects[i].style.borderColor = "red";
                        isOk = false;
                    } else if (selects[i].value=="want" || selects[i].value=="no"){
                        i = selects.length + 10;
                        isOk=true;
                    } else if(selects[i].value=="yes"){
                        i++;
                        if(selects[i].value!="create" && selects[i].value != "selectcard"){
                            i = selects.length + 10;
                            isOk=true;
                        } else {
                            if(document.forms["registration"]["teamcreatename"].value.length == 0 || document.forms["registration"]["teamcreatename"]==null){
                                document.forms["registration"]["teamcreatename"].style.borderColor="red";
                                isOk = false;
                            }
                        }
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
                if (sel.value === "yes") {
                    x.style.display = "block";
                } else {
                    x.style.display = "none";
                }
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
                if(validateForm(section,    false)==true){
                    var x = document.getElementById('ideasSection');
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

            function ideaOK(){
                var x = document.getElementById('configureAccount');
                x.style.display = "block";

                document.getElementById('ideabtn').style.display = "none";
            }

            function accountOK(){
                var section =document.getElementById('configureAccount');
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
        </script>
    </body>  

</html>