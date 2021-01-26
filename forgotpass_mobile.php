<!DOCTYPE html>

<html> 
    <head>
        <link rel="stylesheet" type="text/css" href="css/slideup.css">
        <link rel="stylesheet" type="text/css" href="css/sageatatlf.css">
        <link rel="stylesheet" type="text/css" href="css/basics.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        
        <?php include 'elements/header.php'; ?>

        <style>
            * {
                font-family:'Khand', sans-serif;

            }

            label{
                position: relative;
                color: black;
                font-size: 4vw;
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
                height: 7vh;
                font-size: 3vw;
                padding: 2%;
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
                font-size: 4vw;
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
                font-size: 4vw;
                text-align:center;
                padding: 3%;
            }
            
        </style>
    </head>
    <body id="home" style="background-color: #340634; margin:0px; ">
        <?php include "elements/sageatatlf.html";?>

        <div style="min-height: 100vh; width:100%;">
            <div class="page-title" style="position: relative; margin-top: 10vw; margin-bottom:10vw; width:100%; height: 8vh; background-color: transparent; font-size:10vw; z-index:70">
                <div class="text-centrat" style="color:white; text-decoration: underline dashed 0.5vh #00ff16")>
                    Forgot Password
                </div>
            </div>	

            <div class="rounded-rect" style="position:relative; left:50%; transform:translateX(-50%); background-color:white; width:90%;">
                <?php
                    if(isset($msg)&& $msg != ""){
                        echo "
                            <div class='msg'>"; echo $msg; echo "</div>
                        ";
                    }
                ?>
                <form method="POST" action="scripts/send_passchange_verification.php" class="ajax-form">
                    <label for="email">Email</label>
                    <input type="text" id="email" name="email"><br>
                    <button type="submit">Send verification mail</button>
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

        <?php include "elements/footer.html";?>
    </body>
</html>