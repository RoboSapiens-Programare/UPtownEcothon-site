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
            <div id="bigtitle" class="btitle"></div>
            <div id="bcontent" class="bcontent"></div>
        </div>

        
        <div id="smallcontent1" class="smallcontent" style="top: 10%;">
            <div class="smallcontent-inner">
                <div class="title-card">
                    <div class="title">Salut</div>
                </div>
                <div class="content-card">
                    <div class="content">aa</div>
                </div>
            </div>
        </div>

        <div id="smallcontent2" class="smallcontent" style="top: 37.5%;">
            <div class="smallcontent-inner">
                <div class="title-card">
                    <div class="title">Salut</div>
                </div>
                <div class="content-card">
                    <div class="content">aa</div>
                </div>
            </div>
        </div>

        <div id="smallcontent3" class="smallcontent" style="bottom: 10%;">
            <div class="smallcontent-inner">
                <div class="title-card">
                    <div class="title">Salut</div>
                </div>
                <div class="content-card">
                    <div class="content">aa</div>
                </div>
            </div>
        </div>

        <script>
            var i_content = 0;
            var bigtitle = document.getElementById('bigtitle');
            var bigcontent = document.getElementById('bcontent');
            bigtitle.innerHTML = content[i_content]['title'];
            bigcontent.innerHTML = content[i_content]['content'];

            var smalltitles = document.getElementsByClassName('title');
            for(let i = 0; i < smalltitles.length; i++){
                smalltitles[i].innerHTML = content[i]['title'];
            }

            var smallcontents = document.getElementsByClassName('content');
            for(let i = 0; i < smalltitles.length; i++){
                smallcontents[i].innerHTML = content[i]['content'];
            }
        </script>
    </body>
</html>