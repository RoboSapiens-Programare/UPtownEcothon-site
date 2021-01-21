<?php
    function createEmail($title, $content){
        $mail_file = fopen("../elements/template_mail.html", "r");
        
        $mail_string = "";

        while(! feof($mail_file))  {
            $result = fgets($mail_file);
            $mail_string .= $result;
        }

        fclose($mail_file);

        $mail_string = str_replace("%title%", $title, $mail_string);
        $mail_string = str_replace("%content%", $content, $mail_string);

        return $mail_string;
    }
?>

