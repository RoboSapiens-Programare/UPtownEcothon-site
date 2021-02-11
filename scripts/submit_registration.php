<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/dbconfig.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . "/config/captchacredentials.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/config/captchaconfig.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){

        $res = verify_captcha();

        if ($res['success'] == true && $res['score'] >= 0.5) {

            $firstname = (isset($_POST['firstname']) && !empty($_POST['firstname'])) ? filter_var($_POST["firstname"], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;
            $lastname = (isset($_POST['lastname']) && !empty($_POST['lastname'])) ? filter_var(trim($_POST["lastname"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;
            $email = (isset($_POST['email']) && !empty($_POST['email'])) ? filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL) : null;
            $phone = (isset($_POST['phone']) && !empty($_POST['phone'])) ? filter_var(trim($_POST["phone"]), FILTER_SANITIZE_NUMBER_INT) : null;
            $position = (isset($_POST['position']) && !empty($_POST['position'])) ? filter_var(trim($_POST["position"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;
            $dob = (isset($_POST['dob']) && !empty($_POST['dob'])) ? preg_replace("([^0-9/])", "", $_POST['dob']) : null;
            $city = (isset($_POST['city']) && !empty($_POST['city'])) ? filter_var(trim($_POST["city"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
            $institution = (isset($_POST['institution']) && !empty($_POST['institution'])) ? filter_var(trim($_POST["institution"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
            $studyyear = (isset($_POST['studyyear']) && !empty($_POST['studyyear'])) ? filter_var(trim($_POST["studyyear"]), FILTER_SANITIZE_FULL_SPECIAL_CHARS) : '';
            $experience = (isset($_POST['experience']) && !empty($_POST['experience'])) ? filter_var($_POST["experience"], FILTER_SANITIZE_STRING) : null;
            $teamCreateName = (isset($_POST['teamcreatename']) && !empty($_POST['teamcreatename'])) ? filter_var($_POST["teamcreatename"], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;
            $teamName = (isset($_POST['teamname']) && !empty($_POST['teamname'])) ? filter_var($_POST["teamname"], FILTER_SANITIZE_FULL_SPECIAL_CHARS) : null;
            $ideaDescription = (isset($_POST['ideadesc']) && !empty($_POST['ideadesc'])) ? filter_var($_POST["ideadesc"], FILTER_SANITIZE_STRING) : null;

            if($email){
                try{
                    $db = new SQLiDB();

                    $sql = "SELECT * FROM participants WHERE email = :email";
                    $stmt = $db->prepare($sql);

                    $stmt->bindParam(':email', $email);
                    
                    $stmt->execute();

                    if($stmt->fetch(PDO::FETCH_ASSOC)){
                        $email = null;
                        http_response_code(403);
                        echo 'Whoops. You have already registered with this email!';
                        die();
                    }

                    $db = null;
                    unset($db);
                }
                catch(PDOException $e){
                    $e->getMessage();
                }
            }

            if($teamCreateName){
                try{
                    $db = new SQLiDB();

                    $sql = "SELECT * FROM teams WHERE name = :name";
                    $stmt = $db->prepare($sql);

                    $stmt->bindParam(':name', $teamCreateName);
                    
                    $stmt->execute();

                    if($stmt->fetch(PDO::FETCH_ASSOC)){
                        $teamCreateName = null;

                        http_response_code(403);
                        echo 'The name you chose for the team is already taken!';
                        die();
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
            $username = (isset($_POST['username']) && !empty($_POST['username'])) ? filter_var(trim($_POST["username"]), FILTER_SANITIZE_ENCODED) : null;
            $passwd = (isset($_POST['passwd']) && isset($_POST['cpasswd']) && ($_POST['passwd'] === $_POST['cpasswd'])) ? $_POST['passwd'] : null;

            if($username){
                try{
                    $db = new SQLiDB();

                    $sql = "SELECT * FROM users WHERE username = :username";
                    $stmt = $db->prepare($sql);

                    $stmt->bindParam(':username', $username);
                    
                    $stmt->execute();

                    if($stmt->fetch(PDO::FETCH_ASSOC)){
                        $username = null;
                        http_response_code(403);
                        echo 'Well, someone else won the race... This unsername is already taken!';
                        die();
                    }

                    $db = null;
                    unset($db);
                }
                catch(PDOException $e){
                    $e->getMessage();
                }
            }

            $hasTeam = null;
            if(isset($_POST['hasteam'])){
                if($_POST['hasteam'] === "yes"){
                    $hasTeam = true;
                }
                else if(!empty($_POST['hasteam'])){
                    $hasTeam = false;
                }
            }

            ///Dis where the fun begins
            try{
                $db = new SQLiDB();

                //Check to see if all fields are filled accordingly
                if($firstname && $lastname && $email && $phone && $position && $dob && $experience && $username && $passwd && ($hasTeam ? ($teamName && (is_numeric($teamName) ? true : $teamCreateName)) : true)){

                    //For participant registration

                    //Set a random ID for the participant
                    //  $participant_id = rand(1000, 9999);
                        
                    $sql = "INSERT INTO participants (firstname, lastname, email, phone, position, experience, dob, city, institution, studyyear) VALUES (:firstname, :lastname, :email, :phone, :position, :experience, :dob, :city, :institution, :studyyear);";

                    // http_response_code(403);
                    // echo $sql;
                    // die();
                    
                    $stmt = $db->prepare($sql);

                //  $stmt->bindParam(':participant_id', $participant_id);
                    $stmt->bindParam(':firstname', $firstname);
                    $stmt->bindParam(':lastname', $lastname);
                    $stmt->bindParam(':email', $email);
                    $stmt->bindParam(':phone', $phone);
                    $stmt->bindParam(':position', $position);
                    $stmt->bindParam(':experience', $experience);
                    $stmt->bindParam(':dob', $dob);
                    $stmt->bindParam(':city', $city);
                    $stmt->bindParam(':institution', $institution);
                    $stmt->bindParam(':studyyear', $studyyear);

                    $stmt->execute();
                
                    //If user wants newsletter subscription
                    if(isset($_POST['wantsubscribe']) && !empty($_POST['wantsubscribe'])){
                        $sql = "INSERT INTO subscribers (email) VALUES (:unemail);";

                        $stmt = $db->prepare($sql);
                        $stmt->bindParam(':unemail', $email);

                        $stmt->execute();
                    }

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
                        if($hasTeam == false && $_POST['hasteam'] == "want"){
                            //Want Team ID
                            $team_id = 0;
                        }
                        else{
                            //Solo ID
                            $team_id = 99;
                        }
                    }

                    //For user idea
                    if(!empty($ideaDescription)){
                        $sql = "INSERT INTO ideas (description, team_id) VALUES (:ideaDescription, :team_id);";
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

                    http_response_code(200);
                    echo 'Registration Submitted! You will be redirected to the login page in 3 seconds...';
                }
                else{
                    http_response_code(403);
                    echo 'Please complete all fields accordingly!';
                }

                $db = null;
                unset($db);

            }
            catch(PDOException $e){
                http_response_code(500);
                echo $e->getMessage();
            }  
        }
        else{
            http_response_code(403);
            echo "Woah! Are you a robot? ... or ... did your captcha expire? In which case, try again";
        }
    }
?>