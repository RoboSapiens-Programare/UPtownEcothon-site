<?php
    $target_dir = "../!contest/uploads";
    $target_file = $target_dir . basename($_FILES["appfile"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if ($_FILES["appfile"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["appfile"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["appfile"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }

    // pathetic attempt to layout instructions to try to make life easier
    // get team id
    
    // check if team id exists in uploads{
    //     if yes, 
    //     exec commands
    // } if no, {
    //     create new row, with team id = team id, empty other columns
    //     exec commands
    // }

    // commands {
    //     if form is appfiles{
    //         $new app files added paths (if empty it null)
    //         $new url added (if empty it null)
    //         is file uploaded
    //         is link uploaded

    //         if (new app files exists, not empty, not null, not undefined) {
    //             is file uploaded = 0

    //             if size ok {
    //                 add files paths to wehre theyre supposed to go
    //                 is file uploaded =1 
    //                 "files were uploaded"
    //             } else {
    //                 "files were not uploaded"
    //             }
    //         }

    //         if (new url exists, not empty, not null, not undefined){
    //             is link uploaded = 0

    //             try to add/replace link in db{
    //                 if manages to do so,
    //                 is link uploaded = 1
    //                 "link has been updated"
    //             } if not manages to do so {
    //                 is link uploaded  = 0
    //                 "link has not been updated"
    //             }
    //         }

    //         specific messages
    //     }
    // }

    $team_id = (isset($_SESSION['team_id']) && !empty($_SESSION['team_id'])) ? $_SESSION['team_id'] : null;

    if ($team_id != null){
        $db = new SQLiDB();

    }
?>
