<!DOCTYPE html>
<html>
    <head>
		<title></title>

        <link rel="stylesheet" type="text/css" href="css/sageata.css">
        <link rel="stylesheet" type="text/css" href="css/bottom.css">
        <link rel="stylesheet" type="text/css" href="css/slidingcontent.css">

        <link href="https://allfont.net/allfont.css?fonts=agency-fb-bold" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    </head>
    
    <body>
        <?php include "elements/sageata.html" ?>

        <div id="sect1" class="section" style="background-color: darkkhaki;">
            <div id="title1" class="title">Teme</div>
            <div id="titlebtn1" class="titlebtn" onclick="readMore(this);">Read More</div>

            <div class="sliding" style="top: 0%; right: 0%; border-radius: 20px 0px 20px 20px; display: none">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="sliding" style="bottom: 0%; right: 0%; border-radius: 20px 20px 0px 20px; display: none">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
            <div class="sliding" style="bottom: 0%; left: 0%; border-radius: 20px 20px 20px 0px; display: none">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
            </div>
        </div>
    </body>

    <script>
        function readMore(x){
            var slidings = x.parentElement.getElementsByClassName("sliding");
            for(var a of slidings) {
                if (a.style.display === "none") {
                    a.style.display = "block";
                } else {
                    a.style.display = "none";
                }
            }
        }
    </script>
</html>