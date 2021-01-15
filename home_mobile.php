<!DOCTYPE html>

<?php
	if (!isset ($_SESSION)) session_start();

	$_SESSION['ismobile'] = false;
	$hassbs;
	$showemail;

	if(isset($_SESSION['hassbs']) && $_SESSION['hassbs']){
		$hassbs = true;
	} else if (isset($_SESSION['hassbs']) && $_SESSION['hassbs'] === false){
		$hassbs = false;
		$showemail = true;
	} else {
		$showemail = false;
		$hassbs = false;
	}
?>

<html style="scroll-behavior: smooth">
	<head>		
		<link rel="stylesheet" type="text/css" href="css/slideup.css">
		<link rel="stylesheet" type="text/css" href="css/basics.css">
		<link rel="stylesheet" type="text/css" href="css/footer.css">
		<link rel="stylesheet" type="text/css" href="css/progressbar.css">
		<link rel='stylesheet' type='text/css' href='css/sageatatlf.css'>	  

		<?php include "elements/header.php"; ?>

		<?php
			if($hassbs || $showemail){
				echo " <script>
				function Scrolldown() {
					window.location.hash = '#wrapper-registration';
				}

				window.onload  = Scrolldown;
				</script>
				";
			}
			
		?>

		<script>
			function validateForm(){
				var email = document.forms["newsletter"]["email"].value;
				const re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
				var isemail = re.test(String(email).toLowerCase());
				var message = document.getElementById('message');

				if(!isemail){
					document.getElementById('message').innerHTML = 'Please enter a valid email address';
					return false;
				}
			}
		</script>

		<style>
			#banner-homepage{
				position: relative; 
				top:0;
				width:100%; 
				height:100vh; 
				background: url(pictures/lamp.gif); 
				background-size: cover;
				background-position: center center;
				overflow:hidden;
				filter: blur(15px) hue-rotate(300deg);
			}
			.wrapper-bulina{
				position: relative;
				display: inline-block;
				width: 85%;
				height: 20%;
				background-color: transparent;
				margin-left: 5%;
				/* border: 1px  solid blue; */
			}
			.buline-homepage{
				position: absolute;
				z-index: 100;
				top: 0;
				width: 12vw;
				height: 12vw;
				left: 0%;
				background-color: #d222d2;
				border-radius: 50%;
			} 
			.buline-homepage img{
				filter: invert(100%);
				position: absolute;
			}
			.titlu-buline {
				position: absolute;
				height: 12vw;
				width: 100%;
				background-color: transparent;
				top: 0;
				left: 12vw;
				/* border: 1px solid blue; */
				font-family: 'Khand', sans-serif; 
				font-weight: bold;
				padding-left: 5%;
    			font-size: 10vw;
				color: white;
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
				color: #00ff16;
			}
			.registration-button{
				position:absolute; 
				top:0%;  
				/* transform: translate(0%, -50%);  */
				/* height: 20%; 
				width: 8%;  */
				border: 0.4vh solid #00ff16; 
				border-radius:2vw;
				font-size: 3vh;
				background-color:#340634;
				color: white;
			}
			.registration-button:hover{
				color:white;
				border: 0.5vh solid #00ff16; 
				cursor:pointer;
				background-color: transparent;
			}
			.registration-button:hover div{
				color:white;
				cursor:pointer;
			}
			.wrapper-lists ul {
				position: absolute;
				columns: 2;
				margin: 0;
				bottom: 10%;
				-webkit-columns: 2;
				-moz-columns: 2;
			}
		</style>

    </head>

	
    
	<body id="home" style="background-color: #340634; margin: 0px; overflow-x:hidden;" onload="updateTimeline();">			
        <?php include "elements/sageatatlf.html"?>
        
        <!-- <div style="width: 100vw; height: 100vh; overflow: hidden"> -->
			<div id="banner-homepage"></div>
			<div style=" position: absolute; top: 70%; left: 50%; transform: translate(-50%, -50%); 
						font-family: 'Khand', sans-serif; font-weight: bold; color: white; z-index: inherit; text-align: center; font-size: 4vw; width:100%"> Join us in the quest for building a better Bucharest! </div>
			<img src="pictures/LogoUTEAlb.png" style="z-index: 100; position: absolute; width: 80vw; width: 90vw; top: 50%; left: 50%; transform: translate(-50%, -50%); mix-blend-mode:difference;">
		<!-- </div>  -->

		<div style="position: relative; height: 5vh; width: 100%; background-color: transparent;"></div>
		<div class="sectiune-butoane">
			<div style="background-color: transparent; width: 100%; height: 100%; bottom:0%; top:0%; z-index:100; position: absolute">
				<div class="wrapper-bulina" style="margin: 0; margin-left: 5%;">
					<div class="buline-homepage">
						<a href="info.php">
							<div class="text-centrat" style="color: white; opacity: 0; z-index: 105;">Info</div>
							<img class="icon" id="info" style="height: 60%; width: 60%; left: 50%; top: 50%; transform: translate(-50%, -50%);" src="icons/calendar.svg" alt="Info">
						</a>
					</div>
					<div class="titlu-buline">Info</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Montserrat', sans-serif; font-weight: 400; color: white; font-size: 4vw; columns: 1; -webkit-columns: 1; -moz-columns: 1;">
							<?php echo $content['Buline']['Info']; ?>
						</ul>
					</div>
				</div>
				<div class="wrapper-bulina">
					<div class="buline-homepage">
						<a href="aboutus.php">
							<div class="text-centrat" style="color: white; opacity: 0;">About Us</div>
							<img class="icon" id="contact" style="height: 60%; width: 60%; left: 50%; top: 50%; transform: translate(-50%, -50%);" src="icons/users.svg" alt="About Us">
						</a>
					</div>
					<div class="titlu-buline">About us</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Montserrat', sans-serif; font-weight: 400; color: white; font-size: 4vw;">
							<?php echo $content['Buline']['About us']; ?>
						</ul>
					</div>
				</div>
				<div class="wrapper-bulina">
					<div class="buline-homepage">
						<a href="#">
							<div class="text-centrat" style="color: white; opacity: 0;">Got A Problem?</div>
							<img class="icon" id="help" style="height: 60%; width: 60%; left: 50%; top: 50%; transform: translate(-50%, -50%);" src="icons/help.svg" alt="Got A Problem?">
						</a>
					</div>
					<div class="titlu-buline">Got a problem?</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Montserrat', sans-serif; font-weight: 400; color: white; font-size: 4vw;">
							<?php echo $content['Buline']['Got a problem?']; ?>
						</ul>
					</div>
				</div>
				<div class="wrapper-bulina">
					<div class="buline-homepage">
						<a href="event.php">
							<div class="text-centrat" style="color: white; opacity: 0;">Event</div>
							<img class="icon" id="event" style="height: 60%; width: 60%; left: 50%; top: 50%; transform: translate(-50%, -50%);" src="icons/book.svg" alt="Event">
						</a>
					</div>
					<div class="titlu-buline">Event</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Montserrat', sans-serif; font-weight: 400; color: white; font-size: 4vw;">
							<?php echo $content['Buline']['Event']; ?>
						</ul>
					</div>
				</div>
				<div class="wrapper-bulina">
					<div class="buline-homepage">
						<a href="sponsors.php">
							<div class="text-centrat" style="color: white; opacity: 0;">Our Sponsors</div>
							<img class="icon" id="sponsors" style="height: 60%; width: 60%; left: 50%; top: 50%; transform: translate(-50%, -50%);" src="icons/investment.svg" alt="Our Sponsors">
						</a>
					</div>
					<div class="titlu-buline">Sponsors</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Montserrat', sans-serif; font-weight: 400; color: white; font-size: 4vw;">
							<?php echo $content['Buline']['Our sponsors']; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<div style="position: relative; height: 5vh; width: 100%; background-color: transparent;"></div>

		<div class="wrapper-registration" id="wrapper-registration" style="position:relative; height: 50vh; width:100%; margin:0; background-color: #d222d2; font-family: 'Khand', sans-serif;">
			<div style="position:relative; 
						left: 50%; 
						transform: translate(-50%, 0%); 
						height: 20vh; width:100%; 
						border:0px solid black;
						margin: 0vh 0vw 0 0vw;
						font-size:7.6vw;text-align:center; 
						padding:6% 0 0 0; 
						font-weight:bold"> 

				<?php echo $content['Registration']['Title']; ?>			
			</div>
			<div style="position:relative; 
						left: 50%; 
						transform: translate(-50%, 0%); 
						width:100%; border:0px solid black; 
						margin: 0vh 0vw -5vh 0vw;
						font-size:4vw;
						text-align:center; "> 
				<div class="subtitile text-centrat" style="font-weight:normal; width: 70%">
					<?php echo $content['Registration']['More']; ?>
				</div> 
			</div>

			<div id="wrapper-registration-buttons" style="position: absolute; bottom:-2vh; height: 23vh; width:100%;" >
				
				<!-- <form method="POST" class="form" style="display:visible; position:absolute; height:100%; width:100%; left:100%;" action="register_subscriber.php">
					<input type="text" id="email" class="email" name="email" placeholder="your e-mail..." style="position: absolute; top:30%; left: 50%; transform: translate(-50%, 0%); background-color:transparent; border:0.4vh solid black; border-radius: 2vw; color:white; height:30%; width:90%; font-size:3vh; padding: 0.3vh 1vw 0.3vh 1vw">
					<button type="submit" id="submit" class="registration-button" style="right:5%; height: 25%; width: 40%;"><div class="text-centrat">Submit</div></button>
					<div type="text" id="message" name="message" style="position: absolute; top:65%; left: 50%; transform: translate(-50%, 0%); background-color:transparent; color:black; height:30%; width:90%; font-size:2vh; padding: 0.3vh 1vw 0.3vh 1vw;"><?php echo $subscribemessage;?></div>
				</form>
				<div id="subscribe-btn" class="registration-button" style="top:0%;left: 50%; transform:translate(-50%, 0%); height:80%; width:80%;" onclick="showSubscribe()">
					<div class="text-centrat" style="text-decoration: none;">
						Subscribe
					</div>
				</div> -->
				<!-- <div id='subscribe-btn' class='registration-button' style='top:0%;left: 25.5%; transform:translate(-50%, 0%); height:25%; width:40%;'>
							<div class='text-centrat' style='text-decoration: none; color:white;'>
								Back
							</div>
						</div> -->

				<?php 
					if($hassbs){
						echo "
							<div id='subscribe-btn' style='border: 0.4vh solid #00ff16;	border-radius:2vw; font-size: 3vh; background-color:#340634; color: white;position:absolute; top:0%;left: 50%; transform:translate(-50%, 0%); height:80%; width:80%;'>
								<div class='text-centrat' style='text-decoration: none; color:white;'> 
									You have successfully subscribed to our newsletter ;D
								</div>
							</div>
						";
						// $_SESSION['hassbs'] = false;
						$showemail = false;
					} else if ($hassbs === false && $showemail) {
						echo "
						<form name='newsletter' method='POST' class='form' style='display:visible; position:absolute; height:100%; width:100%; left:0%;' onsubmit='return validateForm()' action='register_subscriber.php'>
							<input type='text' id='email' class='email' name='email' placeholder='your e-mail...' style='position: absolute; top:30%; left: 50%; transform: translate(-50%, 0%); background-color:transparent; border:0.4vh solid black; border-radius: 2vw; color:white; height:30%; width:90%; font-size:3vh; padding: 0.3vh 1vw 0.3vh 1vw'>
							<button type='submit' id='submit' class='registration-button' style='right:5%; height: 25%; width: 90%;'><div class='text-centrat'>Submit</div></button>
							<div type='text' id='message' name='message' style='position: absolute; top:65%; left: 50%; transform: translate(-50%, 0%); background-color:transparent; color:black; height:30%; width:90%; font-size:2vh; padding: 0.3vh 1vw 0.3vh 1vw;'>";
						echo $_SESSION['subscribemsg'];
						echo "	</div>
						</form>
						";
						$showemail = false;
						unset ($_SESSION['hassbs']);
					} else {
						echo "
						<form name='newsletter' method='POST' class='form' style='display:visible; position:absolute; height:100%; width:100%; left:0%;' onsubmit='return validateForm()' action='register_subscriber.php'>
							<input type='text' id='email' class='email' name='email' placeholder='your e-mail...' style='position: absolute; top:30%; left: 50%; transform: translate(-50%, 0%); background-color:transparent; border:0.4vh solid black; border-radius: 2vw; color:white; height:30%; width:90%; font-size:3vh; padding: 0.3vh 1vw 0.3vh 1vw'>
							<button type='submit' id='submit' class='registration-button' style='right:5%; height: 25%; width: 90%;'><div class='text-centrat'>Submit</div></button>
							<div type='text' id='message' name='message' style='position: absolute; top:65%; left: 50%; transform: translate(-50%, 0%); background-color:transparent; color:black; height:30%; width:90%; font-size:2vh; padding: 0.3vh 1vw 0.3vh 1vw;'>
							</div>
						</form>

						";
					}
				?>			
	
			</div>
		</div>

			<div style="position:relative; height: 20vh; width: 100%; border:0px solid black; margin: 3vh 0vw 5vh 0vw;font-size:8vw;"> <div class="text-centrat" style="border-bottom: 0.5vh dashed #00ff16; color:white">Helpful Timeline =D</div> </div>

			<div class="sectiune-timeline" id="timeline">
				<div class="timeline">
					<div class="progress"></div>
					
					<div class="milestone" style="top: 0.5%;" onclick="showMeaning(this)">
						<div class="text-centrat main"><?php echo $content['Timeline']['1 Title']?></div>
						<div><div class="text-centrat meaning" style="opacity: 0;"><?php echo $content['Timeline']['1']?></div></div>
					</div>

					<div class="milestone" style="top:20%; left: 50%; transform: translate(-50%, -20%);" onclick="showMeaning(this)">
						<div class="text-centrat main"><?php echo $content['Timeline']['2 Title']?></div>
						<div><div class="text-centrat meaning" style="opacity: 0;"><?php echo $content['Timeline']['2']?></div></div>
					</div>

					<div class="milestone" style="top:40%; left: 50%; transform: translate(-50%, -40%);" onclick="showMeaning(this)">
						<div class="text-centrat main"><?php echo $content['Timeline']['3 Title']?></div>
						<div class="text-centrat meaning" style="opacity: 0;"><?php echo $content['Timeline']['3']?></div>
					</div>

					<div class="milestone" style="top:60%; left: 50%; transform: translate(-50%, -60%);" onclick="showMeaning(this)">
						<div class="text-centrat main"><?php echo $content['Timeline']['4 Title']?></div>
						<div class="text-centrat meaning" style="opacity: 0;"><?php echo $content['Timeline']['4']?></div>
					</div>

					<div class="milestone" style="top:80%; left: 50%; transform: translate(-50%, -80%);" onclick="showMeaning(this)">
						<div class="text-centrat main"><?php echo $content['Timeline']['5 Title']?></div>
						<div class="text-centrat meaning" style="opacity: 0;"><?php echo $content['Timeline']['5']?></div>
					</div>

					<div class="milestone" style="top: 99.5%; left:50%; transform: translate(-50%, -99.5%)" onclick="showMeaning(this)">
						<div class="text-centrat main"><?php echo $content['Timeline']['6 Title']?></div>
						<div class="text-centrat meaning" style="opacity: 0;"><?php echo $content['Timeline']['6']?></div>
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

			function updateTimeline(){
				var currentTime = new Date();
				var milestoneTimes = [];

				//VARS
				milestoneTimes[0] = new Date('January 15, 2021 00:00:00');
				milestoneTimes[1] = new Date('January 26, 2021 00:00:00');
				milestoneTimes[2] = new Date('February 21, 2021 00:00:00');
				milestoneTimes[3] = new Date('February 22, 2021 00:00:00');
				milestoneTimes[4] = new Date('February 24, 2021 18:00:00');
				milestoneTimes[5] = new Date('February 26, 2021 18:00:00');
				var offsetLeft = 5;
				var offsetRight = 5;

				var maxHeight = 100 - offsetLeft - offsetRight;
				var progress = document.getElementById('timeline').getElementsByClassName('progress')[0];
				var step = maxHeight / (document.getElementById('timeline').getElementsByClassName('milestone').length - 1);
				var totalHeight = 0;

				for(let i = 0; i < 5; i++){
					if(currentTime > milestoneTimes[i]){
						let sectTime = currentTime - milestoneTimes[i];
						let maxSectTime = milestoneTimes[i + 1] - milestoneTimes[i];
						let sectPercentage = Math.min(sectTime, maxSectTime) * step / maxSectTime;
						totalHeight += sectPercentage;
					}
				}

				progress.style.height = offsetLeft + totalHeight + "%";
			}
		</script>

		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="javascript/form.js"></script>

    </body>