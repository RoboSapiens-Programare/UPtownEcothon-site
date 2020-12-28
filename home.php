<!DOCTYPE html>
<html style="scroll-behavior: smooth">
	<head>

		  <link rel="stylesheet" type="text/css" href="css/slideup.css">
		  <link rel="stylesheet" type="text/css" href="css/sageata.css">
		  <link rel="stylesheet" type="text/css" href="css/basics.css">
		  <link rel="stylesheet" type="text/css" href="css/footer.css">
		  <link rel="stylesheet" type="text/css" href="css/progressbar.css">
				  
		<?php include 'elements/header.php'; ?>

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
				width: 20%;
				height: 100%;
				background-color: transparent;
				margin-left: -0.4%;
				/* border: 1px  solid blue; */
			}
			.buline-homepage{
				position: absolute;
				z-index: 100;
				top: 0;
				width: 6vw;
				height: 6vw;
				left: 0%;
				background-color: purple;
				border-radius: 50%;
			}
		</style>

	</head>
	<body style="background-color: #e7df68; margin: 0px; overflow-x:visible;">
    
		<?php 
			include "elements/sageata.html";
		?>	

		<div style="width: 100vw; height: 100vh; overflow: visible">
			<div id="banner-homepage"></div>
			<div class="text-centrat" style="font-size: 3vw; width:100%"> Join us in the quest for building a better Bucharest! </div>
			<img src="pictures/LogoUTE.png" style="z-index: 110; position: absolute; height:30%; top: 30%; left: 50%; transform: translate(-50%, -50%);">
			<div style="background-color: transparent; width: 100%; height: 40%; bottom:0%; z-index:100; position: absolute">
				<div class="wrapper-bulina" style="margin: 0">
					<div class="buline-homepage">
						<a href="info.php">
							<div class="text-centrat" style="color: white; opacity: 0; z-index: 105;">Info</div>
							<img class="icon" id="info" src="icons/calendar.svg" alt="Info">
						</a>
					</div>
				</div>
				<div class="wrapper-bulina">
					<div class="buline-homepage">
						<a href="aboutus.php">
							<div class="text-centrat" style="color: white; opacity: 0;">About Us</div>
							<img class="icon" id="contact" src="icons/users.svg" alt="About Us">
						</a>
					</div>
				</div>
				<div class="wrapper-bulina">
					<div class="buline-homepage">
						<a href="#">
							<div class="text-centrat" style="color: white; opacity: 0;">Got A Problem?</div>
							<img class="icon" id="help" src="icons/help.svg" alt="Got A Problem?">
						</a>
					</div>
				</div>
				<div class="wrapper-bulina">
					<div class="buline-homepage">
						<a href="event.php">
							<div class="text-centrat" style="color: white; opacity: 0;">Event</div>
							<img class="icon" id="event" src="icons/book.svg" alt="Event">
						</a>
					</div>
				</div>
				<div class="wrapper-bulina">
					<div class="buline-homepage">
						<a href="sponsors.php">
							<div class="text-centrat" style="color: white; opacity: 0;">Our Sponsors</div>
							<img class="icon" id="sponsors" src="icons/investment.svg" alt="Our Sponsors">
						</a>
					</div>
				</div>
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