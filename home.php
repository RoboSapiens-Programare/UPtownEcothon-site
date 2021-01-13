<!DOCTYPE html>
<?php
	if (!isset ($_SESSION)) session_start();

	$_SESSION['ismobile'] = false;

	if(isset($_SESSION['subscribemsg']) && !empty($_SESSION['subscribemsg']) && $_SESSION['showsbs']){
		$subscribemessage = $_SESSION['subscribemsg'];
	} else {
		$subscribemessage = " ";
	}

	$showsbs = isset($_SESSION['showsbs']) ? $_SESSION['showsbs'] : false;
?>

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
				background: url(pictures/lamp.gif); 
				background-size: cover;
				background-position: center center;
				/* background-blend-mode: hue; */
				/* transform: rotate(90deg); */
				/* filter: grayscale(100%); */
				filter: blur(15px) hue-rotate(300deg);
			}
			.wrapper-bulina{
				position: relative;
				display: inline-block;
				width: 20%;
				height: 100%;
				background-color: transparent;
				/* margin-left: -0.4%; */
				/* border: 1px  solid blue; */
			}
			.buline-homepage{
				position: absolute;
				z-index: 100;
				top: 0;
				width: 6vw;
				height: 6vw;
				left: 0%;
				background-color: #d222d2;
				border-radius: 50%;
				font-size: 1.5vw;
			}
			.wrapper-lists{
				position: absolute;
				z-index: 100;
				bottom: 0;
				width: 100%;
				height: 70%;
				background-color: transparent;
				overflow-y: scroll;
				scrollbar-width: none;
			}
			.wrapper-lists::-webkit-scrollbar{
				display: none;
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
				color:white;
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
		</style>
	</head>

	<body id="home" style="background-color: #340634; margin: 0px; overflow-x:hidden;">
		<div id="language">
			<ul>
				<li style="border-right: 0.2vw solid white;">
					<a href="?lang=ro">
					ro
					</a>
				</li>
				<li style="padding-left: 0.4vw;">
					<a href="?lang=en">
					en
					</a>
				</li>
			</ul>
		</div>
    
		<div style="width: 100vw; height: 100vh; overflow: hidden">
			<div id="banner-homepage"></div>
			<div class="text-centrat" style="font-size: 3vw; width:100%; color: white"> Join us in the quest for building a better Bucharest! </div>
			<img src="pictures/LogoUTEAlb.png" style="z-index: 110; position: absolute; height:30%; top: 30%; left: 50%; transform: translate(-50%, -50%); mix-blend-mode:difference;" alt="UPtown Ecothon">
			<div style="background-color: transparent; width: 100%; height: 40%; bottom:0%; z-index:100; position: absolute">
				<div class="wrapper-bulina" style="margin: 0">
					<div class="buline-homepage" onmouseover="fadeicon(this)" onmouseleave="appearicon(this)">
						<a href="info.php">
							<div class="text-centrat" style="color: white; opacity: 0; z-index: 105;">Info</div>
							<img class="icon" id="info" src="icons/calendar.svg" alt="Info">
						</a>
					</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Agency FB Bold', arial; color: white; font-size: x-large;">
							<?php echo $content['Buline']['Info']; ?>
						</ul>
					</div>
				</div><div class="wrapper-bulina">
					<div class="buline-homepage" onmouseover="fadeicon(this)" onmouseleave="appearicon(this)">
						<a href="aboutus.php">
							<div class="text-centrat" style="color: white; opacity: 0;">About Us</div>
							<img class="icon" id="contact" src="icons/users.svg" alt="About Us">
						</a>
					</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Agency FB Bold', arial; color: white; font-size: x-large;">
							<?php echo $content['Buline']['About us']; ?>
						</ul>
					</div>
				</div><div class="wrapper-bulina">
					<div class="buline-homepage" onmouseover="fadeicon(this)" onmouseleave="appearicon(this)">
						<a href="problem.php">
							<div class="text-centrat" style="color: white; opacity: 0;">Got A Problem?</div>
							<img class="icon" id="help" src="icons/help.svg" alt="Got A Problem?">
						</a>
					</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Agency FB Bold', arial; color: white; font-size: x-large;">
							<?php echo $content['Buline']['Got a problem?']; ?>
						</ul>
					</div>
				</div><div class="wrapper-bulina">
					<div class="buline-homepage" onmouseover="fadeicon(this)" onmouseleave="appearicon(this)">
						<a href="event.php">
							<div class="text-centrat" style="color: white; opacity: 0;">Event</div>
							<img class="icon" id="event" src="icons/book.svg" alt="Event">
						</a>
					</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Agency FB Bold', arial; color: white; font-size: x-large;">
							<?php echo $content['Buline']['Event']; ?>
						</ul>
					</div>
				</div><div class="wrapper-bulina">
					<div class="buline-homepage" onmouseover="fadeicon(this)" onmouseleave="appearicon(this)">
						<a href="sponsors.php">
							<div class="text-centrat" style="color: white; opacity: 0;">Our Sponsors</div>
							<img class="icon" id="sponsors" src="icons/investment.svg" alt="Our Sponsors">
						</a>
					</div>
					<div class="wrapper-lists">
						<ul style="font-family: 'Agency FB Bold', arial; color: white; font-size: x-large;">
							<?php echo $content['Buline']['Our sponsors']; ?>
						</ul>
					</div>
				</div>
			</div>
		</div>

		<div class="wrapper-registration" id="wrapper-registration" style="position:relative; height: 50vh; width:100%; margin:0; background-color: #d222d2">
			<div style="position:relative; 
						left: 50%; 
						transform: translate(-50%, 0%);
						height: 20vh; width:90%; 
						border:0px solid black; 
						margin: 0vh 0vw -10vh 0vw;
						font-size:5vh;"> 
				<div class="text-centrat" style="border-bottom: 0.5vh dashed #00ff16">
					<?php echo $content['Registration']['Title']; ?>
				</div> 
			</div>
			
			<div style="position:relative;
						left: 50%; 
						transform: translate(-50%, 0%);
						height: 20vh; width:90%;
						border:0px solid black;
						margin: 0vh 0vw -10vh 0vw;font-size:2.5vh;"> 		
				<div class="subtitile text-centrat">
					<?php echo $content['Registration']['More']; ?>
					
				</div> 
			</div>

			<div id="wrapper-registration-buttons" style="position: absolute; bottom:-2vh; height: 23vh; width:100%;" >
				
				<form method="POST" class="form" style="display:visible; position:absolute; height:100%; width:100%; left:100%;" action="register_subscriber.php">
					<input type="text" id="email" class="email" name="email" placeholder="your e-mail..." style="position: absolute; top:0%; left: 50%; transform: translate(-50%, -20%); background-color:transparent; border:0.4vh solid black; border-radius: 2vw; color:white; height:30%; width:60%; font-size:3vh; padding: 0.3vh 1vw 0.3vh 1vw">
					<button type="submit" id="submit" class="registration-button" style="right:10%; height: 20%; width: 8%;"><div class="text-centrat">Submit</div></button>
					<div type="text" id="message" name="message" style="position: absolute; top:40%; left: 50%; transform: translate(-50%, 0%); background-color:transparent; color:black; height:30%; width:60%; font-size:2vh; padding: 0.3vh 1vw 0.3vh 1vw; font-family:sans-serif"><?php echo $subscribemessage;?></div>
				</form>
				<div id="subscribe-btn" class="registration-button" style="top:0%;left: 50%; transform:translate(-50%, 0%); height:80%; width:30%;" onclick="showSubscribe()">
					<div class="text-centrat" style="text-decoration: none; color:white;">
						Subscribe
					</div>
				</div>
			</div>
		</div>

		<div style="position:relative; height: 20vh; width: 100%; border:0px solid black; margin: 3vh 0vw -10vh 0vw;font-size:5vh;"> <div class="text-centrat" style="border-bottom: 0.5vh dashed #00ff16; color:white">Helpful Timeline =D</div> </div>

		<div class="sectiune-timeline">
			<div class="timeline">
				<div class="progress"></div>
				
				<div class="milestone" style="left: 0.5%;" onmouseover="showMeaning(this)" onmouseleave="hideMeaning(this)">
					<div class="text-centrat main"><?php echo $content['Timeline']['1 Title']?></div>
					<div class="text-centrat meaning" style="opacity: 0;"><?php echo $content['Timeline'][1]; ?> </div>
				</div>

				<div class="milestone" style="top:50%; left: 20%; transform: translate(-20%, -50%);" onmouseover="showMeaning(this)" onmouseleave="hideMeaning(this)">
					<div class="text-centrat main"><?php echo $content['Timeline']['2 Title']?></div>
					<div class="text-centrat meaning" style="opacity: 0;"><?php echo $content['Timeline'][2]; ?> </div>
				</div>

				<div class="milestone" style="top:50%; left: 40%; transform: translate(-40%, -50%);" onmouseover="showMeaning(this)" onmouseleave="hideMeaning(this)">
					<div class="text-centrat main"><?php echo $content['Timeline']['3 Title']?></div>
					<div class="text-centrat meaning" style="opacity: 0;"><?php echo $content['Timeline'][3]; ?> </div>
				</div>

				<div class="milestone" style="top:50%; left: 60%; transform: translate(-60%, -50%);" onmouseover="showMeaning(this)" onmouseleave="hideMeaning(this)">
					<div class="text-centrat main"><?php echo $content['Timeline']['4 Title']?></div>
					<div class="text-centrat meaning" style="opacity: 0;"><?php echo $content['Timeline'][4]; ?> </div>
				</div>

				<div class="milestone" style="top:50%; left: 80%; transform: translate(-80%, -50%);" onmouseover="showMeaning(this)" onmouseleave="hideMeaning(this)">
					<div class="text-centrat main"><?php echo $content['Timeline']['5 Title']?></div>
					<div class="text-centrat meaning" style="opacity: 0;"><?php echo $content['Timeline'][5]; ?> </div>
				</div>

				<div class="milestone" style="right: 0.5%;" onmouseover="showMeaning(this)" onmouseleave="hideMeaning(this)">
					<div class="text-centrat main"><?php echo $content['Timeline']['6 Title']?></div>
					<div class="text-centrat meaning" style="opacity: 0;"><?php echo $content['Timeline'][6]; ?> </div>
				</div>
			</div>

		</div>

	
		<?php include "elements/footer.html"; ?>	

		<script>

			function fadeicon(elem) {
            var icon = elem.getElementsByClassName('icon')[0];
            var text = elem.getElementsByClassName('text-centrat')[0];

            transitions.fadeOut(icon, tweenFunctions.easeOutExpo, 400);

            transitions.fadeIn(text, tweenFunctions.easeInExpo, 400);
			}

			function appearicon(elem) {
				var icon = elem.getElementsByClassName('icon')[0];
				var text = elem.getElementsByClassName('text-centrat')[0];

				transitions.fadeOut(text, tweenFunctions.easeOutExpo, 400);

				transitions.fadeIn(icon, tweenFunctions.easeInExpo, 400);

			}

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

			var wrprRegBtn = document.getElementById('wrapper-registration-buttons');
			var subscribe = wrprRegBtn.getElementsByClassName('registration-button')[1]; 
			var subscribe_text = subscribe.getElementsByClassName('text-centrat')[0];
			var email = wrprRegBtn.getElementsByClassName('email')[0];
			var submit = wrprRegBtn.getElementsByClassName('registration-button')[0];
			var form = wrprRegBtn.getElementsByClassName('form')[0];

			function showSubscribe(){
				transitions.resize2D(
					new Dimension(subscribe, 8, "percent"),
               		new Dimension(subscribe, 20, "percent"),
                	tweenFunctions.easeOutExpo,
					700);
				transitions.slide2D(
					new Dimension(subscribe, 14, "percent"),
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
					new Dimension(subscribe, 30, "percent"),
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
			if($showsbs){
				echo '<script>window.onload(showSubscribe());</script>';
				if(isset($_SESSION)) $_SESSION['showsbs']=false;
			} 
		?>
		<!-- <script>
			window.addEventListener('load', function() {
				// Do we have a #scroll in the URL hash?
				// if(window.location.hash && /#scroll/.test(window.location.hash)) {
				if(window.location.hash && (window.location.hash === '#scroll')) {
					// Scroll to the #scroll value
					window.scrollTo(0, window.location.hash.replace('#scroll=', ''));
				}

				
				// Get all <a> elements with data-remember-position attribute
				// var links = document.querySelectorAll('a[data-remember-position]');
				var submit = document.getElementById('submit');

				// if(links.length) {
					// Loop through the found links
					// for(var i = 0; i < links.length; i++) {
						// Listen for clicks
						// links[i].addEventListener('click', function(e) {
							submit.addEventListener('click', function(e) {
							// Prevent normal redirection
							e.preventDefault();

							// Redirect manually but put the current scroll value at the end
							window.location = this.href + '?scroll=' + window.scrollY;
						});
					// }
				// }
			});
		</script> -->

		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script src="javascript/form.js"></script>
		
	</body>

</html>