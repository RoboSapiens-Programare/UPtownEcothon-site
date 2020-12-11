<?php
require_once 'Mobile-Detect-master/Mobile_Detect.php';
$detect = new Mobile_Detect;

$scriptVersion = $detect->getScriptVersion();
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>

		  <link rel="stylesheet" type="text/css" href="css/slideup.css">
		  <!-- <link rel="stylesheet" type="text/css" href="css/sageata.css"> -->
		  <link rel="stylesheet" type="text/css" href="css/basics.css">
		  <!-- <link rel="stylesheet" type="text/css" href="css/sageatatlf.css"> -->
		  <link rel="stylesheet" type="text/css" href="css/footer.css">

		  <?php 
			if($detect->isMobile() || $detect->isTablet()) {
				echo "<link rel='stylesheet' type='text/css' href='css/sageatatlf.css'>";
			} else {
				echo "<link rel='stylesheet' type='text/css' href='css/sageata.css'>";
			}
		  ?>	
				  

		  <link href="https://allfont.net/allfont.css?fonts=agency-fb-bold" rel="stylesheet" type="text/css" />
		  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

		  <script src="javascript/tween-functions.js"></script>
		  <script src="javascript/transitions.js"></script>
		  <script src="javascript/animatietowncothon.js"></script>

	</head>

	<body style="background-color:#75667c; margin:0px;">
    
		<?php 
			if($detect->isMobile() || $detect->isTablet()) {
				include "elements/sageatatlf.html";
			} else {
				include "elements/sageata.html";
			}
		?>	

		<div id="content1" class="row">
			
			<div id="desc1" class="column" style="flex: 30vh; height: 80vh; background-color: #2A3151">Descriere primul content</div>
			<div id="imagine1" class="column" style="flex: 70vh; height: 80vh"></div>
		</div>
		<br>
		<div id="content2" class="row">
			<div id="imagine2" class="column" style="flex: 70vh; height: 100vh"></div>
			<div id="desc2" class="column" style="flex: 30vh; background-color: #AA3151; height: 100vh">Descriere al doilea content</div>
		</div> 

		<div id="bottom">
			<?php
				if($displaylogin){
					echo "You are not logged in. <a href='login.php'>Login</a> or <a href='registration.php'>Sign up</a>.";
				}
				else{
					echo $welcomemsg . " <a href='logout.php'>Logout</a>";
				}
			?>
		</div>

		<div style="background-color: white;"><div id="rotunjit-colturi" style="overflow:hidden;"></div></div>
		<?php include "elements/footer.html"; ?>	

	</body>

</html>