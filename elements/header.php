<?php
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
    include 'config/dbconfig.php';

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
        
        
<title> <?php echo ucwords(str_replace($mobile_suffix, "", basename($including_filename, $extension))); ?> - UPtown Ecothon </title>

<link rel="shortcut icon" type="image/png" href="./icons/FaviconUTE.png"/>

<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Khand&family=Montserrat:wght@300;400&display=swap" rel="stylesheet"> 

<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

<script src="javascript/tween-functions.js"></script>
<script src="javascript/transitions.js"></script>

<script>   
    var pagename = "<?php echo basename($including_filename, $extension); ?>";
    var mobile_suffix = "<?php echo $mobile_suffix; ?>";
    var extension = "<?php echo $extension; ?>";
    if(pagename.includes(mobile_suffix)) {
        if(window.innerHeight < window.innerWidth){
            document.location.href = pagename.replace(mobile_suffix, "") + extension;
        }

        window.onresize = function(){
            if(window.innerHeight < window.innerWidth){
                document.location.href = pagename.replace(mobile_suffix, "") + extension;
            }
        }
    }
    else{
        if(window.innerHeight > window.innerWidth){
            document.location.href = pagename + mobile_suffix + extension;
        }

        window.onresize = function(){
            if(window.innerHeight > window.innerWidth){
                document.location.href = pagename + mobile_suffix + extension;
            }
        }
    }
</script>