<?php

    function verify_captcha(){
        # BEGIN Setting reCaptcha v3 validation data
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $data = [
            'secret' => $GLOBALS["secret_key"],
            'response' => $_POST['token'],
            'remoteip' => $_SERVER['REMOTE_ADDR']
        ];

        $options = array(
            'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data)
            )
            );
        
        # Creates and returns stream context with options supplied in options preset 
        $context  = stream_context_create($options);
        # file_get_contents() is the preferred way to read the contents of a file into a string
        $response = file_get_contents($url, false, $context);
        # Takes a JSON encoded string and converts it into a PHP variable
        $res = json_decode($response, true);
        # END setting reCaptcha v3 validation data
        
            // print_r($response); 
        # Post form OR output alert and bypass post if false. NOTE: score conditional is optional
        # since the successful score default is set at >= 0.5 by Google. Some developers want to
        # be able to control score result conditions, so I included that in this example.

        return $res;
    }
?>