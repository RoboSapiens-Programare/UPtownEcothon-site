<!DOCTYPE html>

<html style="scroll-behavior: smooth">
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

		<style>
			#banner-homepage{
				position: relative; 
				top:0;
				width:100%; 
				height:100vh; 
				background: url(pictures/gifbackgroundhome2.gif); 
				background-size: cover;
				background-position: center center;
				/* filter: blur(7px); */
				overflow:hidden;
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
				width: 12vw;
				height: 12vw;
				left: 0%;
				background-color: purple;
				border-radius: 50%;
			}
			.titlu-buline {
				position: absolute;
				height: 12vw;
				width: 100%;
				background-color: transparent;
				top: 0;
				left: 12vw;
				/* border: 1px solid blue; */
				font-family: 'Agency FB', arial; 
				font-weight: bold;
				padding-left: 5%;
    			font-size: 10vw;
			}
			.wrapper-lists{
				position: absolute;
				z-index: 100;
				bottom: 0;
				width: 100%;
				height: 70%;
				background-color: transparent;
				overflow-y: hidden;
				scrollbar-width: none;
			}
			.wrapper-lists::-webkit-scrollbar{
				display: none;
			}
			.sectiune-butoane {
				position: relative;
				height: 100vh;
				width: 100vw;
			}
			.wrapper-registration #href{
				text-decoration: underline; color: black;
			}
			.wrapper-registration #href:hover{
				color: #e7df68;
			}
			.registration-button{
				position:absolute; 
				top:0%;  
				/* transform: translate(0%, -50%);  */
				/* height: 20%; 
				width: 8%;  */
				border: 0.4vh solid black; 
				border-radius:2vw;
				font-size: 3vh;
				background-color:#e7df68
			}
			.registration-button:hover{
				color:white;
				border: 0.5vh solid #e7df68; 
				cursor:pointer;
				background-color: transparent;
			}
			.registration-button:hover div{
				color:white;
				cursor:pointer;
			}
			.wrapper-lists ul {
				columns: 2;
				-webkit-columns: 2;
				-moz-columns: 2;
			}
		</style>

    </head>

	<?php
	// session_start();

	$_SESSION['ismobile'] = true;

	if(isset($_SESSION['subscribemsg']) && !empty($_SESSION['subscribemsg']) && $_SESSION['showsbs']){
		$subscribemessage = $_SESSION['subscribemsg'];
	} else {
		$subscribemessage = " ";
	}
	?>
    
	<body id="home" style="background-color: #e7df68; margin: 0px; overflow-x:hidden;">			
        <?php include "elements/sageatatlf.html"?>
        
        <!-- <div style="width: 100vw; height: 100vh; overflow: hidden"> -->
			<div id="banner-homepage"></div>
			<div style=" position: absolute; top: 70%; left: 50%; transform: translate(-50%, -50%); font-family: 'Agency FB', arial; font-weight: bold; color: black; z-index: inherit; text-align: center; font-size: 4vw; width:100%"> Join us in the quest for building a better Bucharest! </div>
			<img src="pictures/LogoUTE.png" style="z-index: 100; position: absolute; height:30%; top: 50%; left: 50%; transform: translate(-50%, -50%);">
		<!-- </div>  -->

		<div style="position: relative; height: 5vh; width: 100%; background-color: transparent;"></div>
		<div class="sectiune-butoane">
			<div style="background-color: transparent; width: 100%; height: 100%; bottom:0%; top:0%; z-index:100; position: absolute">
				<div class="wrapper-bulina" style="margin: 0; margin-left: 15%;">
					<div class="buline-homepage">
						<a href="info.php">
							<div class="text-centrat" style="color: white; opacity: 0; z-index: 105;">Info</div>
							<img class="icon" id="info" style="height: 70%; width: 70%; left: 50%; top: 50%; transform: translate(20%, 20%);" src="icons/calendar.svg" alt="Info">
						</a>
					</div>
					<div class="titlu-buline">Info</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Agency FB Bold', arial; color: white; font-size: x-large; columns: 1; -webkit-columns: 1; -moz-columns: 1;">
							<li>Program</li>
							<li>News</li>
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
					<div class="titlu-buline">About us</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Agency FB Bold', arial; color: white; font-size: x-large;">
							<li>Contact</li>
							<li>Echipa</li>
							<li>Site</li>
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
					<div class="titlu-buline">Got a problem?</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Agency FB Bold', arial; color: white; font-size: x-large;">
							<li>Raporteaza o problema</li>
							<li>Contacteaza un mentor</li>
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
					<div class="titlu-buline">Event</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Agency FB Bold', arial; color: white; font-size: x-large;">
							<li>Scop</li>
							<li>Teme</li>
							<li>Cerinte si premii</li>
							<li>Code of conduct</li>
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
					<div class="titlu-buline">Sponsors</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Agency FB Bold', arial; color: white; font-size: x-large;">
							<li>Fundraiser</li>
							<li>Endava</li>
							<li>Gemini Solutions</li>
							<li>First Tech Challange</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div style="position: relative; height: 5vh; width: 100%; background-color: transparent;"></div>

		<div class="wrapper-registration" id="wrapper-registration" style="position:relative; height: 50vh; width:100%; margin:0; background-color: #df458d; font-family: 'Agency FB', arial;">
			<div style="position:relative; left: 50%; transform: translate(-50%, 0%); height: 20vh; width:100%; border:0px solid black; margin: 0vh 0vw 0 0vw;font-size:5vh;text-align:center; padding:6% 0 0 0; font-weight:bold"> Registrations begin january 26th! </div>
			<div style="position:relative; left: 50%; transform: translate(-50%, 0%); width:100%; border:0px solid black; margin: 0vh 0vw -5vh 0vw;font-size:2.5vh;text-align:center; "> <div class="subtitile text-centrat" style="font-weight:normal">In the meantime, subscribe to our newsletter, or check us out on <a href="#bottom-of-page" id="href" >social media</a>!</div> </div>
			<div id="wrapper-registration-buttons" style="position: absolute; bottom:-2vh; height: 23vh; width:100%;" >
				
				<form method="POST" class="form" style="display:visible; position:absolute; height:100%; width:100%; left:100%;" action="register_subscriber.php">
					<input type="text" id="email" class="email" name="email" placeholder="your e-mail..." style="position: absolute; top:30%; left: 50%; transform: translate(-50%, 0%); background-color:transparent; border:0.4vh solid black; border-radius: 2vw; color:white; height:30%; width:90%; font-size:3vh; padding: 0.3vh 1vw 0.3vh 1vw">
					<button type="submit" id="submit" class="registration-button" style="right:5%; height: 25%; width: 40%;"><div class="text-centrat">Submit</div></button>
					<div type="text" id="message" name="message" style="position: absolute; top:65%; left: 50%; transform: translate(-50%, 0%); background-color:transparent; color:black; height:30%; width:90%; font-size:2vh; padding: 0.3vh 1vw 0.3vh 1vw;"><?php echo $subscribemessage;?></div>
				</form>
				<div id="subscribe-btn" class="registration-button" style="top:0%;left: 50%; transform:translate(-50%, 0%); height:80%; width:80%;" onclick="showSubscribe()">
					<div class="text-centrat" style="text-decoration: none;">
						Subscribe
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

				var wrprRegBtn = document.getElementById('wrapper-registration-buttons');
			var subscribe = wrprRegBtn.getElementsByClassName('registration-button')[1]; 
			var subscribe_text = subscribe.getElementsByClassName('text-centrat')[0];
			var email = wrprRegBtn.getElementsByClassName('email')[0];
			var submit = wrprRegBtn.getElementsByClassName('registration-button')[0];
			var form = wrprRegBtn.getElementsByClassName('form')[0];

			function showSubscribe(){
				transitions.resize2D(
					new Dimension(subscribe, 40, "percent"),
               		new Dimension(subscribe, 25, "percent"),
                	tweenFunctions.easeOutExpo,
					700);
				transitions.slide2D(
					new Dimension(subscribe, 25.5, "percent"),
					new Dimension(subscribe, 0, "percent"),
					tweenFunctions.easeOutExpo,
					700);

				subscribe_text.innerHTML = "Back";

				transitions.slide2D(
					new Dimension(form, 0, "percent"),
					new Dimension(form, 0, "percent"),
					tweenFunctions.easeOutExpo,
					700);

				subscribe.setAttribute('onclick', 'hideSubscribe()');
					 
			}

			function hideSubscribe(){
				transitions.resize2D(
					new Dimension(subscribe, 80, "percent"),
               		new Dimension(subscribe, 80, "percent"),
                	tweenFunctions.easeOutExpo,
					700);
				transitions.slide2D(
					new Dimension(subscribe, 50, "percent"),
					new Dimension(subscribe, 0, "percent"),
					tweenFunctions.easeOutExpo,
					700);
				subscribe_text.innerHTML = "Subscribe";
				

				transitions.slide2D(
					new Dimension(form, 100, "percent"),
					new Dimension(form, 0, "percent"),
					tweenFunctions.easeOutExpo,
					700);

				subscribe.setAttribute('onclick', 'showSubscribe()');
					 
			}
		</script>

		<?php
			if($_SESSION['showsbs']){
				echo '<script>window.onload(showSubscribe());</script>';
				$_SESSION['showsbs']=false;
			} 
		?>

		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="javascript/form.js"></script>

    </body>