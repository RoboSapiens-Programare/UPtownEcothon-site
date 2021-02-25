<!DOCTYPE html>
<?php
    if (session_status() == PHP_SESSION_NONE) session_start();

    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true){
        header('Location: login.php');
        die();
    }

    require_once $_SERVER['DOCUMENT_ROOT'] . '/config/dbconfig.php';

?>
<!-- Getting info from db -->
<?php
    try{
        $db = new SQLiDB();

        $fields = array();
        $participants = array();
        $appfile; $prezfile; $moneysfile;
        $teamID;

        $sql = "SELECT * FROM users WHERE id = :id LIMIT 1";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(":id", $_SESSION["id"]);

        $stmt->execute();

        if($stmt){
            $ret = $stmt->fetch(PDO::FETCH_ASSOC);

            if(!empty($ret) && isset($ret) && $ret!=null){
                $uname = $ret['username'];
                $teamID = $ret["team_id"]; 
                // echo "<script type='text/javascript'>alert(" . $ret["teamID"] . ");</script>";
    
                $_SESSION['team_id'] = $teamID;
    
                if($teamID!=99 && $teamID!=0){
                    //get team name
                    $sql = "SELECT * FROM teams WHERE id = :id LIMIT 1";
                    $stmt = $db->prepare($sql);
    
                    $stmt->bindParam(":id", $teamID);
    
                    $stmt->execute();
                    if($stmt){
                        $ret = $stmt->fetch(PDO::FETCH_ASSOC);
                        if(isset($ret) && !empty($ret)){
                            // echo "<script type='text/javascript'>alert(" . $ret . ");</script>";
                            $fields["team_name"] = $ret["name"];
                        } else{
                            $fields["team_name"] = "No team!";
                        }
                    } 
    
                    // get members
                    $sql = "SELECT * FROM users WHERE team_id = :id";
                    $stmt = $db->prepare($sql);
    
                    $stmt->bindParam(":id", $teamID);
    
                    $stmt->execute();
                    if($stmt){
                        foreach($stmt as $row) {
                            if(!empty($row)&& isset($row)){
                                $participants[]= $row['username'];
                            }
                        }

                        if(count($participants)==0 || empty($participants) || !isset($participants)){
                            $fields["participants"] = "Looks like you're on your own";
                        }
                    }
                } else {
                    $fields["team_name"] = "You work alone!";
                    $fields["participants"] = "It's just you here";
                }

                //TODO:add function that displays files currently uploaded
                if($teamID == 99){
                    $sql = "SELECT * FROM uploads WHERE user_modified = :uname LIMIT 1";
                    $stmt = $db->prepare($sql);

                    $stmt->bindParam(":uname", $uname);
                } else {
                    $sql = "SELECT * FROM uploads WHERE team_id = :team_id LIMIT 1";
                    $stmt = $db->prepare($sql);

                    $stmt->bindParam(":team_id", $teamID);
                }
                

                $stmt->execute();
                if($stmt){
                    $ret = $stmt->fetch(PDO::FETCH_ASSOC);
                    if(!empty($ret)){
                        if(!empty($ret['app_filename'])){
                            $fields['appfile'] = $ret['app_filename'];
                            $fields['apppath'] = $ret['app_path'];
                        }
                        if(!empty($ret['prez_files_filename'])){
                            $fields['prezfile'] = $ret['prez_files_filename'];
                            $fields['prezpath'] = $ret['prez_files_path'];
                        }
                        if(!empty($ret['fin_plan_filename'])){
                            $fields['moneysfile'] = $ret['fin_plan_filename'];
                            $fields['moneyspath'] = $ret['fin_plan_path'];
                        }
                    }
                }

            } else{
                $fields["team_name"] = "Team wasn't found!";
                $fields["participants"] = "Looks like you're on your own for now";
            }
        } else {
            echo "<script type='text/javascript'>alert('Team DOnt exist');</script>";
        }

        //This for security token
        $sql = "SELECT passwd FROM users WHERE id = :id LIMIT 1";
        $stmt = $db->prepare($sql);

        $stmt->bindParam(":id", $_SESSION["id"]);

        $stmt->execute();
        $ret = $stmt->fetch(PDO::FETCH_ASSOC);

        $token = "";
        if(!empty($ret)){
            $token = base64_encode($ret['passwd']);
        }

        unset($db);
        
    } catch(PDOException $e){
        echo $e->getMessage();
    }
?>
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/basics.css">
        <link rel="stylesheet" type="text/css" href="css/upload_solution.css">

        <meta name="robots" content="noindex">

        <?php
            if(isset($_GET['lang']) && $_GET['lang'] == 'en'){
                $lang = 'EN';
            }
            else{
                $lang = 'RO';
            }

            //CONTENT
            require_once $_SERVER['DOCUMENT_ROOT'] . '/config/dbconfig.php';

            try{
                $db = new ContentDB();

                $content = array();
                $content = $db->getContentsForPage('upload_solution.php', $lang);

                $db = null;
                unset($db);
            }
            catch(PDOException $e){
                echo $e->getMessage();
            }
        ?>

        <link rel="shortcut icon" type="image/png" href="./ute-icons/FaviconUTE.png"/>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Khand&family=Montserrat:wght@300;400&display=swap" rel="stylesheet"> 

        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
        <meta name="robots" content="noindex">

        <title>Upload Solution - UPtown Ecothon</title>
    </head>
    <body style="background-color: #340634; margin:0px; overflow-x:hidden">
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

        <div class="page-title" style="position: relative; margin-top: 8vh; margin-bottom:3vh; width:100%; height: 8vh; background-color: transparent; font-size:4vw; z-index:70">
            <div class="text-centrat" style="color:white; text-decoration: underline dashed 0.5vh #00ff16")>
                <?php echo $content['Interface']['PageTitle']; ?>
            </div>
        </div>

        <a href="account.php" style="display: block; position:relative; left:50%; transform:translateX(-50%); font-size:2.5vh; margin-top:3vh; text-align:center"><?php echo $content['Interface']['BackAccountBtn']; ?></a>

        <div class="rounded-rect" style="position:relative; left:50%; transform:translateX(-50%); background-color:white; width:90%; max-width:1000px;">
            <h2 style="font-size: 3vh; font-weight:normal">Team: <span style="font-weight:bold;text-decoration:underline dashed #00ff16 0.3vh;"><?php echo $fields["team_name"]; ?></span></h2>

            <h2 style="font-size: 3vh; font-weight:normal">Members:
                <span style="font-weight: bold;">
                    <?php 
                        if(empty($participants) || !isset($participants)){
                            echo $fields['participants'];
                        } else {
                            for ($i = 0; $i < count($participants); $i++) {
                                echo $participants[$i];
                                if($i != count($participants)-1){
                                    echo ", ";
                                }
                            }
                        }
                    ?>
                </span>
             </h2>
            
            <form method="post" class="ajax-form" enctype="multipart/form-data" onsubmit="return validateForm(this)" action="scripts/submit_files.php">
                <div class="msg" style="display:none"></div>

                <h2>Code files:</h2>

                <label for="appfile">Select project files to upload:</label>
                <input type="file" name="appfile" id="appfile" class="file">
                <div id="appfile" class="filelist-wrapper appfile">
                    <div style="height: 0.1vh;"></div> 
                    <p style="color: #76667d;">currently uploaded file:</p> <span class="fileList" style="color: #76667d;"><?php 
                        if(isset($fields['appfile']) && !empty($fields['appfile'])){
                            echo "<a class='href' href='".$fields['apppath']."'>".$fields['appfile']."</a>";
                        } else {
                            echo "no file currently uploaded";
                        }
                    ?></span>
                    <div style="height: 0.1vh;"></div>
                    <p>upload file size:</p> <span class="fileSize" >0</span>
                </div>
                
                <label for="appurl">Or enter a git url:</label>
                <input type="text" name="appurl" id="appurl" class="url" onclick="makeGreen(this)">


                <h2>Prezentation files files:</h2>

                <label for="prezfile">Select prezentation files to upload:</label>
                <input type="file" name="prezfile" id="prezfile" class="file" onclick="makeGreen(this)">
                <div class="filelist-wrapper prezfile">
                    <div style="height: 0.1vh;"></div> 
                    <p style="color: #76667d;">currently uploaded file:</p> <span class="fileList" style="color: #76667d;"><?php 
                        if(isset($fields['prezfile']) && !empty($fields['prezfile'])){
                            echo "<a class='href' href='".$fields['prezpath']."'>". $fields['prezfile']."</a>";
                        } else {
                            echo "no file currently uploaded";
                        }
                    ?></span>
                    <div style="height: 0.1vh;"></div>
                    <p>upload file size:</p> <span class="fileSize" >0</span>
                </div>
               
                <label for="prezurl">Or enter a url for your online presentation:</label>
                <input type="text" name="prezurl" id="prezurl" class="url" onclick="makeGreen(this)">

                <label for="finplan">Select financial plan files to upload:</label>
                <input type="file" name="finplan" id="moneysfile" class="file" onclick="makeGreen(this)">
                <div class="filelist-wrapper moneysfile">
                    <div style="height: 0.1vh;"></div> 
                    <p style="color: #76667d;">currently uploaded file:</p> <span class="fileList" style="color: #76667d;"><?php 
                        if(isset($fields['moneysfile']) && !empty($fields['moneysfile'])){
                            echo "<a class='href' href='".$fields['moneyspath']."'>".$fields['moneysfile']."</a>";
                        } else {
                            echo "no file currently uploaded";
                        }
                    ?></span>
                    <div style="height: 0.1vh;"></div>
                    <p>upload file size:</p> <span class="fileSize" >0</span>
                </div>

                <!-- Please just don't push this -->
                <input type="hidden" name="uname" value="<?php echo $_SESSION['username'] ?>">
                <input type="hidden" name="verif" value="<?php echo $token ?>">

                <button id="update-btn" type="submit">Update</button>
                <div class="msg ajax-return-message" style="background-color: transparent;"></div>
            </form>
        </div>
        
        <script>
            var appfile_bytes;
            var prezfile_bytes;
            var moneysfile_bytes;

            //list files and files total size
            function updateSize(fileInput) {
                let nBytes = 0,
                    oFiles = fileInput.files,
                    nFiles = oFiles.length,
                    children = "";

                let type = fileInput.getAttribute('id');

                for (let nFileId = 0; nFileId < nFiles; nFileId++) {
                    nBytes += oFiles[nFileId].size;
                    // children += '<li>' + oFiles.item(nFileId).name + '</li>';
                    children += oFiles.item(nFileId).name;
                }               

                let sOutput = nBytes + " bytes";
                // optional code for multiples approximation (NOTE: i do not know exactly what is happenning here but the aproximaiton looks nice so ill leave it in)
                const aMultiples = ["KiB", "MiB", "GiB", "TiB", "PiB", "EiB", "ZiB", "YiB"];
                for (nMultiple = 0, nApprox = nBytes / 1024; nApprox > 1; nApprox /= 1024, nMultiple++) {
                    sOutput = nApprox.toFixed(3) + " " + aMultiples[nMultiple] + " (" + nBytes + " bytes)";
                }
                // end of optional code
                
                fileInput.parentElement.getElementsByClassName(type)[0].getElementsByClassName("fileSize")[0].innerHTML = sOutput;
                fileInput.parentElement.getElementsByClassName(type)[0].getElementsByClassName("fileList")[0].innerHTML = children;
                fileInput.parentElement.getElementsByClassName(type)[0].getElementsByClassName("fileList")[0].style.color = "black";

                return nBytes;
            }

            function getExtension(filename) {
                var parts = filename.split('.');
                return parts[parts.length - 1];
            }

            function isNotExe(fileInput, section){
                let oFiles = fileInput.files,
                    nFiles = oFiles.length,
                    ext = "";

                for (let nFileId = 0; nFileId < nFiles; nFileId++) {
                    ext = getExtension(oFiles[nFileId].name);

                    if(ext === "exe"){
                        section.getElementsByClassName('msg')[0].style.display = "block";
                        section.getElementsByClassName('msg')[0].innerHTML = "Script files are not permitted.";
                        fileInput.style.borderColor = "red";
                        return false;
                    } else {
                        return true;
                    }
                }  
            }

            document.getElementById("appfile").addEventListener("change", function(){
                makeGreen(this);
                appfile_bytes = updateSize(this);
                isNotExe(this, this.parentElement);
            }, false);

            document.getElementById("prezfile").addEventListener("change", function(){
                makeGreen(this);
                prezfile_bytes= updateSize(this);
                isNotExe(this, this.parentElement);
            }, false);

            document.getElementById("moneysfile").addEventListener("change", function(){
                makeGreen(this);
                moneysfile_bytes= updateSize(this);
                isNotExe(this, this.parentElement);
            }, false);

            //ye
            function validateForm(section){
                var isOK = true;

                var fileinput = section.querySelectorAll('.file');
                alert(fileinput.length);
                for(let i = 0; i<fileinput.length; i++){
                    //if (true) return true PT CA imi e lene sa mai pun conditie de undefined 
                    if(fileinput[i].files!==null && isNotExe(fileinput[i], section)==false){
                        isOK = false;
                    }
                }
               
                // verify file size does not exceeed 50mb?????????????(pt ca aparent POST iti limiteaza automat la 50mb) in the messiest way possible 
                if(appfile_bytes>41943040 || prezfile_bytes>41943040 || moneysfile_bytes>41943040){
                    section.getElementsByClassName('msg')[0].style.display = "block";
                    section.getElementsByClassName('msg')[0].innerHTML = "Your files must be under 200MB !";
                    isOK = false;
                } 

                // TODO: DONT FORGET TO UNCOMMENT!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!1
                return isOK; 
                // return false;
            }

            function makeAllGreen(section){
                section.getElementsByClassName('msg')[0].style.display = "none";
                var inputs = section.querySelectorAll("input")
                for (i = 0; i < inputs.length; i++) {
                    // inputs[i].addEventListener('click', function() {
                        inputs[i].style.borderColor = "#00ff16";
                    // });
                }
            }

            function makeGreen(elem){
                elem.parentElement.getElementsByClassName('msg')[0].style.display = "none";
                elem.style.borderColor = "#00ff16";
            }
        </script>

        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>
            //AJAX
            (function ($) {
                'use strict';
                
                var form = $('.ajax-form'), message = $('.ajax-return-message'), form_data;

                function init_send(){
                    $('#update-btn').prop("disabled", true);
                    $('#update-btn').text("Please wait. We are scanning your files...");
                    $('#update-btn').addClass("deactivated-btn");
                }

                function done_func(response) {
                    message.fadeIn()
                    message.html(response);
                    $('#update-btn').prop("disabled", false);
                    $('#update-btn').text("Update");
                    $('#update-btn').removeClass("deactivated-btn");
                }

                function handle_msg(data) {
                    message.fadeIn()
                    message.html(data.responseText);
                    setTimeout(function () {
                        message.fadeOut();
                    }, 10000);
                    $('#update-btn').prop("disabled", false);
                    $('#update-btn').text("Update");
                    $('#update-btn').removeClass("deactivated-btn");
                }
                
                form.submit(function (e) {
                    e.preventDefault();
                    form_data = new FormData();
                    init_send();
                    
                    // add assoc key values, this will be posts values
                    form_data.append("appfile", $("#appfile")[0].files[0]);
                    form_data.append("prezfile", $("#prezfile")[0].files[0]);
                    form_data.append("finplan", $("#moneysfile")[0].files[0]);
                    form_data.append("git_url", $("#appurl").val());
                    form_data.append("presentation_url", $("#prezurl").val());
                    form_data.append("uname", "<?php echo $_SESSION['username'] ?>");
                    form_data.append("verif", "<?php echo $token ?>");
                    //alert(form_data);
                    $.ajax({
                        type: 'POST',
                        url: form.attr('action'),
                        contentType: false,
                        processData: false,
                        data: form_data
                    })
                    .done(done_func)
                    .fail(handle_msg);
                }); 

                $(".href").click(function(e){
                    e.preventDefault();
                    window.location = "scripts/serve_file.php?filename=" + $(this).attr('href');
                });
            })(jQuery);
            
        </script>
    </body>
</html>