<!DOCTYPE html>
<html>
    <head>
        <title></title>

        <link rel="stylesheet" type="text/css" href="css/sageata.css">
        <link rel="stylesheet" type="text/css" href="css/twistycontent.css">

        <link href="https://allfont.net/allfont.css?fonts=agency-fb-bold" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

        <?php 
            include "content/c_aboutus.php";
            $contentArray = array();
            $contentArray[] = $__DescEchipa;
            $contentArray[] = $__Contact;
            $contentArray[] = $__ThisSite;
        ?>

        <script src="javascript/tween-functions.js"></script>

        <script>
            var content = <?php echo json_encode($contentArray); ?>;
        </script>
    </head>
    <body>
        <?php include "elements/sageata.html" ?>

        <div style="display: flex; width:100vw; height: 100vh">
            <div style="height:100vh; flex: 33.3%; background-color:peachpuff;"></div>
            <div style="height:100vh; flex: 66.6%; background-color:white;"></div>
        </div>

        <div id="bigcontent" class="bigcontent">
            <div id="bigtitle" class="title">Descriere Echipa</div>
        </div>

        <div id="smallcontent1" class="smallcontent" style="top: 10%;">

        </div>

        <div id="smallcontent2" class="smallcontent" style="top: 37.5%;">

        </div>

        <div id="smallcontent3" class="smallcontent" style="bottom: 10%;">

        </div>

        <script>
            //document.getElementById("bigcontent").innerHTML = content[0]['Descriere Echipa'];
        </script>
    </body>
</html>