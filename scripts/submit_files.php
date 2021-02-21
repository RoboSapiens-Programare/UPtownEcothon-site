<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/dbconfig.php';
    require_once $_SERVER['DOCUMENT_ROOT'] . "/config/captchacredentials.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/config/captchaconfig.php";
    require_once $_SERVER['DOCUMENT_ROOT'] . "/config/curl.php";

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $uname = (isset($_POST['uname']) && !empty($_POST['uname'])) ? filter_var(trim($_POST["uname"]), FILTER_SANITIZE_SPECIAL_CHARS) : null;
        $passwd_verif = (isset($_POST['verif']) && !empty($_POST['verif'])) ? base64_decode($_POST['verif']) : null;
        $git_url = (isset($_POST['git_url']) && !empty($_POST['git_url'])) ? filter_var($_POST["git_url"], FILTER_SANITIZE_STRING) : null;
        $presentation_url = (isset($_POST['presentation_url']) && !empty($_POST['presentation_url'])) ? filter_var($_POST["presentation_url"], FILTER_SANITIZE_STRING) : null;

        try{
            $db = new SQLiDB();

            if($uname && $passwd_verif){
                $sql = "SELECT passwd, team_id FROM users WHERE username = :uname";
                $stmt =$db->prepare($sql);
    
                $stmt->bindParam(":uname", $uname);
    
                $stmt->execute();
                $ret = $stmt->fetch(PDO::FETCH_ASSOC);
    
                if(!empty($ret)){
                    if($passwd_verif !== $ret['passwd']){
                        echo "Invalid token!";
                        die();
                    }
                    $team_id = $ret['team_id'];
            
                    $sql = "SELECT name FROM teams WHERE id = :id";
                    $stmt =$db->prepare($sql);
        
                    $stmt->bindParam(":id", $team_id);
        
                    $stmt->execute();
                    $ret = $stmt->fetch(PDO::FETCH_ASSOC);

                    if (!empty($ret) && checkFiles()) {
                        $filepaths = moveFiles($team_id == 99? ("SOLO_" . $uname) : $ret['name']);

                        //Upload to database
                        $sql = "SELECT * FROM uploads 
                                WHERE team_id = :team_id AND NOT team_id = 99
                                UNION
                                SELECT * FROM uploads
                                WHERE user_modified = :uname AND team_id = 99";
                        $stmt =$db->prepare($sql);

                        $stmt->bindParam(":team_id", $team_id);
                        $stmt->bindParam(":uname", $uname);

                        $stmt->execute();
                        $ret = $stmt->fetch(PDO::FETCH_ASSOC);

                        //Check if record already exists for that team, or if the user works alone
                        if(empty($ret)){
                            $sql = "INSERT INTO uploads (team_id, user_modified) VALUES (:team_id, :uname)";
                            $stmt =$db->prepare($sql);

                            $stmt->bindParam(":team_id", $team_id);
                            $stmt->bindParam(":uname", $uname);
    
                            $stmt->execute();
                        }
                        else if($team_id != 99){
                            $sql = "UPDATE uploads SET user_modified = :uname WHERE team_id = :team_id";
                            $stmt =$db->prepare($sql);

                            $stmt->bindParam(":team_id", $team_id);
                            $stmt->bindParam(":uname", $uname);
    
                            $stmt->execute();
                        }

                        //If files are set, get the filename and the path and store them
                        if(isset($filepaths['appfile'])){
                            $app_filename = filter_var(basename($_FILES['appfile']['name']), FILTER_SANITIZE_SPECIAL_CHARS);
                            $app_path = $filepaths['appfile'];

                            $sql = "UPDATE uploads SET app_filename = :af, app_path = :ap WHERE team_id = :team_id AND user_modified = :uname";

                            $stmt =$db->prepare($sql);

                            $stmt->bindParam(":team_id", $team_id);
                            $stmt->bindParam(":uname", $uname);
                            $stmt->bindParam(":af", $app_filename);
                            $stmt->bindParam(":ap", $app_path);

                            $stmt->execute();
                        }

                        if($git_url){
                            $sql = "UPDATE uploads SET app_git_url = :url WHERE team_id = :team_id AND user_modified = :uname";

                            $stmt =$db->prepare($sql);

                            $stmt->bindParam(":team_id", $team_id);
                            $stmt->bindParam(":uname", $uname);
                            $stmt->bindParam(":url", $git_url);

                            $stmt->execute();
                        }

                        if(isset($filepaths['prezfile'])){
                            $prez_files_filename = filter_var(basename($_FILES['prezfile']['name']), FILTER_SANITIZE_SPECIAL_CHARS);
                            $prez_files_path = $filepaths['prezfile'];

                            $sql = "UPDATE uploads SET prez_files_filename = :pf, prez_files_path = :pp WHERE team_id = :team_id AND user_modified = :uname";

                            $stmt =$db->prepare($sql);

                            $stmt->bindParam(":team_id", $team_id);
                            $stmt->bindParam(":uname", $uname);
                            $stmt->bindParam(":pf", $prez_files_filename);
                            $stmt->bindParam(":pp", $prez_files_path);

                            $stmt->execute();
                        }

                        if($presentation_url){
                            $sql = "UPDATE uploads SET prez_link = :url WHERE team_id = :team_id AND user_modified = :uname";

                            $stmt =$db->prepare($sql);

                            $stmt->bindParam(":team_id", $team_id);
                            $stmt->bindParam(":uname", $uname);
                            $stmt->bindParam(":url", $presentation_url);

                            $stmt->execute();
                        }

                        if(isset($filepaths['finplan'])){
                            $fin_plan_filename = filter_var(basename($_FILES['finplan']['name']), FILTER_SANITIZE_SPECIAL_CHARS);
                            $fin_plan_path = $filepaths['finplan'];

                            $sql = "UPDATE uploads SET fin_plan_filename = :af, fin_plan_path = :ap WHERE team_id = :team_id AND user_modified = :uname";

                            $stmt =$db->prepare($sql);

                            $stmt->bindParam(":team_id", $team_id);
                            $stmt->bindParam(":uname", $uname);
                            $stmt->bindParam(":af", $fin_plan_filename);
                            $stmt->bindParam(":ap", $fin_plan_path);

                            $stmt->execute();
                        }

                        echo "Updated successfully!";
                    } else {
                        echo "Sorry, your file was not uploaded.";
                        http_response_code(403);
                    }

                }
                else{
                    echo "Not valid user!";
                    http_response_code(403);
                }
            }
            else{
                echo "No verification token!";
                http_response_code(403);
            }
        }
        catch(PDOException $e){
            echo $e->getMessage();
            http_response_code(500);
        }

        
    }
    else{
        echo "This is a POST only script!";
        http_response_code(403);
    }

    //Do the check
    function checkFiles(){
        $uploadOk = true;
            
        //See what size it has
        if ($_FILES["appfile"]["size"] > 200000000) {
            echo "Sorry, your app file is too large.";
            $uploadOk = false;
        }

        //Analyze each file, if exists, through OPSWAT API
        if(isset($_FILES['appfile']) && file_exists($_FILES['appfile']['tmp_name'])) {
            $uploadOk = analyze_file_opswat($_FILES['appfile']['tmp_name']);
        }
        if(isset($_FILES['prezfile']) && file_exists($_FILES['prezfile']['tmp_name'])) {
            $uploadOk = analyze_file_opswat($_FILES['prezfile']['tmp_name']);
        }
        if(isset($_FILES['finplan']) && file_exists($_FILES['finplan']['tmp_name'])) {
            $uploadOk = analyze_file_opswat($_FILES['finplan']['tmp_name']);
        }

        return $uploadOk;
    }

    //Move files to a folder and save the filepaths for return
    function moveFiles($team_name){
        $filepaths = array();

        //target directory outside webroot
        $target_dir = $_SERVER['DOCUMENT_ROOT']. "/../UTE-contest/uploads";
        //random string appended at end for security
        $random_string = md5(rand());

        //check if each file exists and then move them
        if(isset($_FILES['appfile']) && file_exists($_FILES['appfile']['tmp_name'])) {
            
            $target_file = $target_dir . "/" . str_replace(' ', '', $team_name) . "_appfile_" . $random_string . "." . pathinfo($_FILES['appfile']['name'])['extension'];

            if (move_uploaded_file($_FILES["appfile"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["appfile"]["name"])). " has been uploaded.<br>";
            } else {
                echo "Sorry, there was an error uploading your file.";
                http_response_code(500);
                die();
            }
            $filepaths['appfile'] = $target_file;
        }

        if(isset($_FILES['prezfile']) && file_exists($_FILES['prezfile']['tmp_name'])) {
            $target_file = $target_dir . "/" . str_replace(' ', '', $team_name) . "_prezfile_" . $random_string . "." . pathinfo($_FILES['prezfile']['name'])['extension'];  

            if (move_uploaded_file($_FILES["prezfile"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["prezfile"]["name"])). " has been uploaded.<br>";
            } else {
                echo "Sorry, there was an error uploading your file.";
                http_response_code(500);
                die();
            }
            $filepaths['prezfile'] = $target_file;
        }
        if(isset($_FILES['finplan']) && file_exists($_FILES['finplan']['tmp_name'])) {
            
            $target_file = $target_dir . "/" . str_replace(' ', '', $team_name) . "_finplan_" . $random_string . "." . pathinfo($_FILES['finplan']['name'])['extension'];

            if (move_uploaded_file($_FILES["finplan"]["tmp_name"], $target_file)) {
                echo "The file ". htmlspecialchars( basename( $_FILES["finplan"]["name"])). " has been uploaded.<br>";
            } else {
                echo "Sorry, there was an error uploading your file.";
                http_response_code(500);
                die();
            }
            $filepaths['finplan'] = $target_file;
        }

        return $filepaths;
    }

    //Send files for scan, wait for scan results and then see if its a threat - return a bool accordingly
    function analyze_file_opswat($filepath){
        //send file for scan and keep the return
        $send_scan_return = json_decode(send_file_for_scan($filepath), true);

        //check if we have errors - if yes, its probs the apikey (create config/curl_auth.php with one variable $apikey)
        if(isset($send_scan_return['error']) && $send_scan_return['error']){
            echo "File scan error (code: " . $send_scan_return['error']['code'] . "): " . $send_scan_return['error']['messages'][0] . ".<br> Please contact us if you see this!";
            http_response_code(500);
            die();
        }

        //get the tracking number of the scan after submitting the file
        $data_id = $send_scan_return['data_id'];
        $counter = 0;

        //check scan progress until 100% or the timer ran out (after 10 seconds)
        do{
            $result = json_decode(get_scan_results($data_id), true);
            $progress = $result['scan_results']['progress_percentage'];
            $counter++;
            sleep(1);
        } while($progress < 100 && $counter < 10);

        //timer ran out, print error message
        if($counter >= 10){
            echo "File scan for" . htmlspecialchars(basename($filepath)) . "timed out! Try again in a few moments!<br>";
            return 0;
        }

        //get threats
        $threats = $result['scan_results']['total_detected_avs'];

        //if we has threats, we don't likey
        if($threats > 0){
            echo "File " . htmlspecialchars(basename($filepath)) . " is infected. Please don't send infected stuff (:<br>";
            return 0;
        }

        //echo $data_id . ": " . $threats. "<br>";

        return 1;
    }
?>