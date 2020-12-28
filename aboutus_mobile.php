<!DOCTYPE html>
<html>
    <head>

        <link rel="stylesheet" type="text/css" href="css/twistycontent.css">
        <link rel="stylesheet" type="text/css" href="css/basics.css">
        <link rel="stylesheet" type="text/css" href="css/sageatatlf.css">

        <?php include 'elements/header.php'; ?>


        <?php 
            include "content/c_aboutus.php";
            $contentArray = array();
            $contentArray[] = $__DescEchipa;
            $contentArray[] = $__Contact;
            $contentArray[] = $__ThisSite;
        ?>

        <script src="javascript/tween-functions.js"></script>
        <script src="javascript/transitions.js"></script>

        <script>
            var content = <?php echo json_encode($contentArray); ?>;
        </script>
    </head>

    <body>
        <?php include "elements/sageatatlf.html"?>

    </body>

</html>