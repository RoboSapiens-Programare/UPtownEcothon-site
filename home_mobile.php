<?php
require_once 'Mobile-Detect-master/Mobile_Detect.php';
$detect = new Mobile_Detect;

$scriptVersion = $detect->getScriptVersion();
?>

<!DOCTYPE html>
<html>
	<head>

		  <link rel="stylesheet" type="text/css" href="css/slideup.css">
		  <link rel="stylesheet" type="text/css" href="css/basics.css">
		  <link rel="stylesheet" type="text/css" href="css/footer.css">
          <link rel="stylesheet" type="text/css" href="css/progressbar.css">
          <link rel='stylesheet' type='text/css' href='css/sageatatlf.css'>	  

		  <!-- <link href="https://allfont.net/allfont.css?fonts=agency-fb-bold" rel="stylesheet" type="text/css" /> -->
		  <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0">  -->

		  <!-- <script src="javascript/tween-functions.js"></script> -->
		  <!-- <script src="javascript/transitions.js"></script> -->

		  <?php include "elements/header.php"; ?>

    </head>
    
    <body style="background-color: #e7df68; margin: 0px; overflow-x:hidden;">
    
        <?php include "elements/sageatatlf.html"?>
        
        <div class="banner-homepage" style="position: relative; width:100%; height:100vh; background-color:transparent">
			<div class="bkg-banner" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); height: 100%; width: 100%; background-color: purple;">
				<div class="text-centrat" style="font-size: 10vh;"> gif background + detailed menu </div>
			</div>
		</div>

			<div style="position:relative; height: 20vh; width: 100%; border:0px solid black; margin: 3vh 0vw 5vh 0vw;font-size:8vw;"> <div class="text-centrat" style="border-bottom: 0.5vh dashed #df458d">Helpful Timeline =D</div> </div>

			<div class="sectiune-timeline">
				<div class="timeline">
					<div class="progress"></div>
					
					<div class="milestone" style="top: 0.5%;" onclick="showMeaning(this)">
						<div class="text-centrat main"> site :D</div>
						<div class="text-centrat meaning" style="opacity: 0;"> avem site woo </div>
					</div>

					<div class="milestone" style="top:25%; left: 50%; transform: translate(-50%, -25%);" onclick="showMeaning(this)">
						<div class="text-centrat main"> inscriere </div>
						<div class="text-centrat meaning" style="opacity: 0;"> te poti inscrie incepand cu 26 ianuarie :D </div>
					</div>

					<div class="milestone" style="top:50%; left: 50%; transform: translate(-50%, -50%);" onclick="showMeaning(this)">
						<div class="text-centrat main"> terminat inscrieri </div>
						<div class="text-centrat meaning" style="opacity: 0;"> nu te mai poti inscrie :( </div>
					</div>

					<div class="milestone" style="top:75%; left: 50%; transform: translate(-50%, -75%);" onclick="showMeaning(this)">
						<div class="text-centrat main"> 3 days til event</div>
						<div class="text-centrat meaning" style="opacity: 0;"> mai sunt 3 zile pana la event!! </div>
					</div>

					<div class="milestone" style="top: 99.5%; left:50%; transform: translate(-50%, -99.5%)" onclick="showMeaning(this)">
						<div class="text-centrat main"> event! </div>
						<div class="text-centrat meaning" style="opacity: 0;"> daca esti inscris hai pe discord pls </div>
					</div>
				</div>

        </div>
        
		<?php include "elements/footer.html"; ?>
		
		<script> 
			function showMeaning(elem){
					var main = elem.getElementsByClassName("main")[0];
					var meaning = elem.getElementsByClassName("meaning")[0];

					transitions.resize2D(new Dimension(elem, 35, "vw"),
					new Dimension(elem, 35, "vw"),
					tweenFunctions.easeOutQuad,
					400);

					transitions.fadeOut(main, tweenFunctions.easeOutExpo, 400);

					transitions.fadeIn(meaning, tweenFunctions.easeInExpo, 400);

					elem.setAttribute("onclick", "hideMeaning(this)")

				}
				function hideMeaning(elem){
					var main = elem.getElementsByClassName("main")[0];
					var meaning = elem.getElementsByClassName("meaning")[0];

					transitions.resize2D(new Dimension(elem, 20, "vw"),
					new Dimension(elem, 20, "vw"),
					tweenFunctions.easeInQuad,
					400);
					
					transitions.fadeOut(meaning, tweenFunctions.easeOutExpo, 400);

					transitions.fadeIn(main, tweenFunctions.easeInExpo, 400);

					elem.setAttribute("onclick", "showMeaning(this)")
				}
		</script>

    </body>