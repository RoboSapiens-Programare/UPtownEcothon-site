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

	<style>
			#banner-homepage{
				position: absolute; 
				top:0;
				width:100%; 
				height:100%; 
				background: url(pictures/gifbackgroundhome2.gif); 
				background-size: cover;
				background-position: center center;
				/* filter: blur(7px); */
			}
			.wrapper-bulina{
				position: relative;
				display: inline-block;
				width: 80%;
				height: 20%;
				background-color: transparent;
				margin-left: 15%;
				/* border: 1px  solid blue; */
			}
			.buline-homepage{
				position: absolute;
				z-index: 100;
				top: 0;
				width: 10vw;
				height: 10vw;
				left: 0%;
				background-color: purple;
				border-radius: 50%;
			}
			.wrapper-lists{
				position: absolute;
				z-index: 100;
				bottom: 0;
				width: 100%;
				height: 80%;
				background-color: transparent;
				overflow-y: hidden;
				scrollbar-width: none;
			}
			.wrapper-lists::-webkit-scrollbar{
				display: none;
			}
			.sectiune-butoane {
				position: relative;
				height: 200vh;
				width: 100vw;
			}
		</style>
    
    <body id="home" style="background-color: #e7df68; margin: 0px; overflow-x:hidden;">
    
        <?php include "elements/sageatatlf.html"?>
        
        <div style="width: 100vw; height: 100vh; overflow: hidden">
			<div id="banner-homepage"></div>
			<div style=" position: absolute; top: 70%; left: 50%; transform: translate(-50%, -50%); font-family: 'Agency FB', arial; font-weight: bold; color: black; z-index: inherit; text-align: center; font-size: 4vw; width:100%"> Join us in the quest for building a better Bucharest! </div>
			<img src="pictures/LogoUTE.png" style="z-index: 100; position: absolute; height:30%; top: 50%; left: 50%; transform: translate(-50%, -50%);">
		</div>

		<div class="sectiune-butoane">
			<div style="background-color: transparent; width: 100%; height: 100%; bottom:0%; top:0%; z-index:100; position: absolute">
				<div class="wrapper-bulina" style="margin: 0; margin-left: 15%;">
					<div class="buline-homepage" style="top: 5%;">
						<a href="info.php">
							<div class="text-centrat" style="color: white; opacity: 0; z-index: 105;">Info</div>
							<img class="icon" id="info" style="height: 70%; width: 70%; left: 50%; top: 50%; transform: translate(20%, 20%);" src="icons/calendar.svg" alt="Info">
						</a>
					</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Agency FB Bold', arial; color: white; font-size: x-large;">
							<li>copac</li>
							<li>mai multe cuvinte</li>
							<li>sunt foarte multe cuvinte pe un rand si nu stiu cum sa le pun sa se puna pe randul urmator oare merge daca doar scriu mult? da</li>
						</ul>
					</div>
				</div>
				<div class="wrapper-bulina">
					<div class="buline-homepage">
						<a href="aboutus.php">
							<div class="text-centrat" style="color: white; opacity: 0;">About Us</div>
							<img class="icon" id="contact" style="height: 70%; width: 70%; left: 50%; top: 50%; transform: translate(20%, 20%);" src="icons/users.svg" alt="About Us">
						</a>
					</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Agency FB Bold', arial; color: white; font-size: x-large;">
							<li>copac</li>
							<li>mai multe cuvinte</li>
							<li>sunt foarte multe cuvinte pe un rand si nu stiu cum sa le pun sa se puna pe randul urmator oare merge daca doar scriu mult? da</li>
						</ul>
					</div>
				</div>
				<div class="wrapper-bulina">
					<div class="buline-homepage">
						<a href="#">
							<div class="text-centrat" style="color: white; opacity: 0;">Got A Problem?</div>
							<img class="icon" id="help" style="height: 70%; width: 70%; left: 50%; top: 50%; transform: translate(20%, 20%);" src="icons/help.svg" alt="Got A Problem?">
						</a>
					</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Agency FB Bold', arial; color: white; font-size: x-large;">
							<li>copac</li>
							<li>mai multe cuvinte</li>
							<li>sunt foarte multe cuvinte pe un rand si nu stiu cum sa le pun sa se puna pe randul urmator oare merge daca doar scriu mult? da</li>
						</ul>
					</div>
				</div>
				<div class="wrapper-bulina">
					<div class="buline-homepage">
						<a href="event.php">
							<div class="text-centrat" style="color: white; opacity: 0;">Event</div>
							<img class="icon" id="event" style="height: 70%; width: 70%; left: 50%; top: 50%; transform: translate(20%, 20%);" src="icons/book.svg" alt="Event">
						</a>
					</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Agency FB Bold', arial; color: white; font-size: x-large;">
							<li>copac</li>
							<li>mai multe cuvinte</li>
							<li>sunt foarte multe cuvinte pe un rand si nu stiu cum sa le pun sa se puna pe randul urmator oare merge daca doar scriu mult? da</li>
						</ul>
					</div>
				</div>
				<div class="wrapper-bulina">
					<div class="buline-homepage">
						<a href="sponsors.php">
							<div class="text-centrat" style="color: white; opacity: 0;">Our Sponsors</div>
							<img class="icon" id="sponsors" style="height: 70%; width: 70%; left: 50%; top: 50%; transform: translate(20%, 20%);" src="icons/investment.svg" alt="Our Sponsors">
						</a>
					</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Agency FB Bold', arial; color: white; font-size: x-large;">
							<li>copac</li>
							<li>mai multe cuvinte</li>
							<li>sunt foarte multe cuvinte pe un rand si nu stiu cum sa le pun sa se puna pe randul urmator oare merge daca doar scriu mult? da</li>
						</ul>
					</div>
				</div>
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

					<div class="milestone" style="top:20%; left: 50%; transform: translate(-50%, -20%);" onclick="showMeaning(this)">
						<div class="text-centrat main"> inscriere </div>
						<div class="text-centrat meaning" style="opacity: 0;"> te poti inscrie incepand cu 26 ianuarie :D </div>
					</div>

					<div class="milestone" style="top:40%; left: 50%; transform: translate(-50%, -40%);" onclick="showMeaning(this)">
						<div class="text-centrat main"> terminat inscrieri </div>
						<div class="text-centrat meaning" style="opacity: 0;"> nu te mai poti inscrie :( </div>
					</div>

					<div class="milestone" style="top:60%; left: 50%; transform: translate(-50%, -60%);" onclick="showMeaning(this)">
						<div class="text-centrat main"> team making </div>
						<div class="text-centrat meaning" style="opacity: 0;"> se fac echipele, expect e-mails :D </div>
					</div>

					<div class="milestone" style="top:80%; left: 50%; transform: translate(-50%, -80%);" onclick="showMeaning(this)">
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