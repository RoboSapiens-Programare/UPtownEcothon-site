<!DOCTYPE html>
<html>
    <head>
        <title></title>

        <link rel="stylesheet" type="text/css" href="css/sageata.css">
        <link rel="stylesheet" type="text/css" href="css/basics.css">
        <link rel="stylesheet" type="text/css" href="css/scrollbar.css">

        <link href="https://allfont.net/allfont.css?fonts=agency-fb-bold" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <script src="javascript/tween-functions.js"></script>
        <script src="javascript/transitions.js"></script>
    </head>
    <body style="background-color: #3d8b8f;">
        <div id="scrollbar-area" class="scrollbar-area">
            <div class="scrollbar-right"></div>
            <div id="dot" class="dot"></div>
        </div>

        <script>
            document.getElementById('scrollbar-area').onclick = function clickEvent(e) {
                // e = Mouse click event.
                var rect = e.target.getBoundingClientRect();
                var x = e.clientX - rect.left; //x position within the element.
                var y = e.clientY - rect.top;  //y position within the element.

                px = x/e.target.clientWidth * 100;
                py = y/e.target.clientHeight * 100;

                //alert(px + ", " + py);

                e.target.getElementsByClassName('dot')[0].style.top = py + "%";
            }

            document.getElementById('dot').onclick = function clickEvent(e) {
                // e = Mouse click event.
                var rect = e.target.parentElement.getBoundingClientRect();
                var x = e.clientX - rect.left; //x position within the element.
                var y = e.clientY - rect.top;  //y position within the element.

                px = x/e.target.parentElement.clientWidth * 100;
                py = y/e.target.parentElement.clientHeight * 100;

                //alert(px + ", " + py);

                e.target.getElementsByClassName('dot')[0].style.top = py + "%";
            }
            
        </script>
    </body>
</html>