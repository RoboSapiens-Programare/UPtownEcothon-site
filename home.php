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
		  <link rel="stylesheet" type="text/css" href="css/progressbar.css">

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

	</head>

	
	 <body style="background-color: #e7df68; margin: 0px; overflow-x:hidden;">
    
		<?php 
			if($detect->isMobile() || $detect->isTablet()) {
				include "elements/sageatatlf.html";
			} else {
				include "elements/sageata.html";
			}
		?>	

		<div class="banner-homepage" style="position: relative; width:100%; height:100vh; background-color:transparent">
			<div class="bkg-banner" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); height: 100%; width: 100%; background-color: purple;">
				<div class="text-centrat" style="font-size: 10vh;"> gif background + detailed menu </div>
			</div>
		</div>

			<div style="position:relative; height: 20vh; width: 100%; border:0px solid black; margin: 3vh 0vw -10vh 0vw;font-size:5vh;"> <div class="text-centrat" style="border-bottom: 0.5vh dashed #df458d">Helpful Timeline =D</div> </div>

			<div class="sectiune-timeline">
				<div class="timeline">
					<div class="progress"></div>
					
					<div class="milestone" style="left: 0.5%;" onmouseover="showMeaning(this)" onmouseleave="hideMeaning(this)">
						<div class="text-centrat main"> site :D</div>
						<div class="text-centrat meaning" style="opacity: 0;"> avem site woo </div>
					</div>

					<div class="milestone" style="top:50%; left: 25%; transform: translate(-25%, -50%);" onmouseover="showMeaning(this)" onmouseleave="hideMeaning(this)">
						<div class="text-centrat main"> inscriere </div>
						<div class="text-centrat meaning" style="opacity: 0;"> te poti inscrie incepand cu 26 ianuarie :D </div>
					</div>

					<div class="milestone" style="top:50%; left: 50%; transform: translate(-50%, -50%);" onmouseover="showMeaning(this)" onmouseleave="hideMeaning(this)">
						<div class="text-centrat main"> terminat inscrieri </div>
						<div class="text-centrat meaning" style="opacity: 0;"> nu te mai poti inscrie :( </div>
					</div>

					<div class="milestone" style="top:50%; left: 75%; transform: translate(-75%, -50%);" onmouseover="showMeaning(this)" onmouseleave="hideMeaning(this)">
						<div class="text-centrat main"> 3 days til event</div>
						<div class="text-centrat meaning" style="opacity: 0;"> mai sunt 3 zile pana la event!! </div>
					</div>

					<div class="milestone" style="right: 0.5%;" onmouseover="showMeaning(this)" onmouseleave="hideMeaning(this)">
						<div class="text-centrat main"> event! </div>
						<div class="text-centrat meaning" style="opacity: 0;"> daca esti inscris hai pe discord pls </div>
					</div>
				</div>

		</div>

		<!-- <div id="content1" class="row">
			
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

		<div style="background-color: white;"><div id="rotunjit-colturi" style="overflow:hidden;"></div></div>  -->
		<?php include "elements/footer.html"; ?>	

		<script>

			// alert(window.innerWidth);

			function showMeaning(elem){
				var main = elem.getElementsByClassName("main")[0];
				var meaning = elem.getElementsByClassName("meaning")[0];

				transitions.resize2D(new Dimension(elem, 30, "vh"),
                new Dimension(elem, 30, "vh"),
                tweenFunctions.easeOutQuad,
				400);

				transitions.fadeOut(main, tweenFunctions.easeOutExpo, 400);

				transitions.fadeIn(meaning, tweenFunctions.easeInExpo, 400);

			}
			function hideMeaning(elem){
				var main = elem.getElementsByClassName("main")[0];
				var meaning = elem.getElementsByClassName("meaning")[0];

				transitions.resize2D(new Dimension(elem, 12, "vh"),
                new Dimension(elem, 12, "vh"),
                tweenFunctions.easeInQuad,
				400);
				
				transitions.fadeOut(meaning, tweenFunctions.easeOutExpo, 400);

				transitions.fadeIn(main, tweenFunctions.easeInExpo, 400);
			}
		</script>
	</body>

</html>