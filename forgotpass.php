<!DOCTYPE html>
<?php
    if (!isset ($_SESSION)) session_start();

    //LANG
    $mobile_suffix = "_mobile";
    $extension = ".php";

    $including_filename = pathinfo(debug_backtrace()[0]['file'])['basename'];

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
        $content = $db->getContentsForPage(str_replace($mobile_suffix, "", $including_filename), $lang);

        $db = null;
        unset($db);
    }
    catch(PDOException $e){
        echo $e->getMessage();
    }
?>
<html> 
    <head>
        <link rel="stylesheet" type="text/css" href="css/slideup.css">
        <link rel="stylesheet" type="text/css" href="css/sageata.css">
        <link rel="stylesheet" type="text/css" href="css/basics.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        
        <link rel="stylesheet" type="text/css" href="css/basics.css">

        <link rel="shortcut icon" type="image/png" href="./ute-icons/FaviconUTE.png"/>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Khand&family=Montserrat:wght@300;400&display=swap" rel="stylesheet"> 

        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <title>Forgot Password - UPtown Ecothon</title>
        <style>
            * {
                font-family:'Khand', sans-serif;
            }
            label{
                position: relative;
                color: black;
                font-size: 2vw;
                /* text-decoration: underline dashed 0.2vh #00ff16; */
                /* margin-left: 5vw; */
                width: 20%;
                /* margin: 1vh 1vw 1vh 1vw; */

            }
            input{
                position:relative;
                margin: 0vh 0vw 3vh 0vw;
                border: 0.3vh solid #00ff16;
                border-radius: 20px;
                width:100%;
                right: 0px;
                background-color: transparent;
                height: 5vh;
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
                height: 6vh;
                padding: 1%;
                color: white;
                font-size: 2vh;
            }
            button:hover{
                background-color: transparent;
                color: black;
            }
            .msg{
                position:relative;
                margin: 0vh 0vw 3vh 0vw;
                /* border: 0.3vh solid #00ff16; */
                border-radius: 20px;
                width:100%;
                right: 0px;
                background-color: #ffafc0;
                height: 6vh;
                font-size: 1.3vw;
                text-align:center;
                padding: 1%;
            } #language {
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
                font-size: 4vw;
                }
                input{
                    font-size: 3vw;
                    padding: 2%;
                }
                button{
                    font-size: 4vw;
                }
                .msg{
                    font-size: 4vw;
                }#language {
                    height: 8vh;
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
    <body id="home" style="background-color: #340634; margin:0px; overflow:hidden">

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


        <div style="min-height: 100vh; width:100%;">
            <div class="page-title" style="position: relative; margin-top: 8vh; margin-bottom:3vh; width:100%; height: 8vh; background-color: transparent; font-size:4vw; z-index:70">
                <div class="text-centrat" style="color:white; text-decoration: underline dashed 0.5vh #00ff16")>
                    <?php echo $content['Interface']['PageTitle']; ?>
                </div>
            </div>	

            <div class="rounded-rect" style="position:relative; left:50%; transform:translateX(-50%); background-color:white; width:90%; max-width:750px">
                <form method="POST" action="scripts/send_passchange_verification.php" class="ajax-form">
                    <label for="email">Email:</label>
                    <input type="text" id="email" name="email"><br>
                    <button type="submit"><?php echo $content['Interface']['SendEmail']; ?></button>
                    <div class="msg ajax-return-message" style="background-color: transparent;"></div>
                </form>
            </div>            
        </div>
        <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
        <script>
            //AJAX code
            (function ($) {
                'use strict';
                
                var form = $('.ajax-form'), message = $('.ajax-return-message'), form_data;

                function done_func(response) {
                    message.fadeIn()
                    message.html(response);
                }

                function handle_msg(data) {
                    message.fadeIn()
                    message.html(data.responseText);
                    setTimeout(function () {
                        message.fadeOut();
                    }, 10000);
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
                    .fail(handle_msg);
                }); 
            })(jQuery);
        </script>
    </body>
</html>