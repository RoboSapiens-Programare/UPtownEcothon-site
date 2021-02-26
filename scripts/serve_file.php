<?php
    if($_SERVER["REQUEST_METHOD"] == "GET"){
        $filename = (isset($_GET['filename']) && !empty($_GET['filename'])) ? $_GET["filename"] : null;

        if(!is_clean($filename)){
            echo "Something went wrong with your request! Contact us!";
            die();
        }

        $dir = $_SERVER["DOCUMENT_ROOT"] . "/../UTE-contest/uploads/";
        $file = $dir . $filename;

        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);

        http_response_code(200);
        die();
    }

    function is_clean ($string) {
        return ! preg_match("/[^a-zA-Z\d_\-.' ]/i", $string);
    }
?>