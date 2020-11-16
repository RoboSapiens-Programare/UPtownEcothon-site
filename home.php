<?php
	session_start();

	$displaylogin = true;
	if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
		$welcomemsg = "Hi, " . $_SESSION['username'] . "!";
		$displaylogin = false;
	}
	
?>

<!DOCTYPE html>
<html>
	<head>
		<title></title>

		  <link rel="stylesheet" type="text/css" href="css/slideup.css">
		  <link rel="stylesheet" type="text/css" href="css/sageata.css">
		  <link rel="stylesheet" type="text/css" href="css/bottom.css">

		  <link href="https://allfont.net/allfont.css?fonts=agency-fb-bold" rel="stylesheet" type="text/css" />
		  <meta name="viewport" content="width=device-width, initial-scale=1.0"> 

	</head>

	<body style="background-color:beige">
    
		<div class="meniu">
			<div id="meniu-full" id="meniu-full" style="display:block;">
				<div id="cerc-logo-full">
					<div  id="logo-meniu-full" >
						<div id="sageata-meniu-TOP" z-index="3">
							<img src="pictures/1sageataUTE.png" alt="logo arrow" style="width: inherit; height:inherit">
						</div>
						<div id="town-TOP">
							<img src="pictures/1townUTE.png" alt="logo town" style="width: inherit; height:inherit">
						</div>
						<div id="cothon-TOP">
							<img src="pictures/1cothonUTE.png" alt="logo cothon" style="width: inherit; height:inherit">
						</div>
					</div>
				</div>

				<div class="cerc-text">
					<li><a href="#">Home</a></li>
					<li><a href="#">Descriere Eveniment</a></li>
					<li><a href="#">Despre Noi</a></li>
					<li><a href="#">Inscriere</a></li>
					<li><a href="#">Informatii</a></li>
					<li><a href="#">Got A Problem?</a></li>
					<li><a href="#">Our Sponsors</a></li>
				</div>

			</div>
		
			<div id="meniu-scroll" style="display:none; position: fixed; z-index: 1;" >
				<div id="cerc-sageata-scroll">
					<div id="sageata-meniu-scroll" >
						<img class="sageata" src="pictures/1sageataUTE.png" alt="logo arrow" style="height:100%; position:absolute; left: 15%">
					</div>
				</div>
			</div>

		</div>	


		<!-- <div class="row">
			<div id="sageata" class="column" style="flex: 10%; background-color: #123123">
				<div id="menu" class="meniu">Meniu
					<a href="">Alta pagina</a>
					<a href="#content2">Inca o pagina</a>
				</div>
			</div>
		
			<div id="banner" class="column" style="flex: 90%; background-color: #75B33E">Banner</div>

		</div> -->

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

		<div id="bottom-of-page" class="row" style="overflow:hidden;">
		
			<div id="logouri" class="column" style="overflow:hidden; flex:70%; height:30vw">
				<ul style="display: inline;">
					<li style="border-right: 3px solid black;">
						<img src="pictures/logo v3.png" alt="logo robosabiens" style="padding-right: 0px;">	
						<img src="pictures/robosapiens copy usa.png" alt="text robosapiens" style="padding-left: 0px;">
					</li>
					<li><img src="pictures/logo-header-web.png" alt="FTC/Natie prin educatie/BRD" style="padding-left:1vw; border-right: none;"></li>
				</ul>
			</div>

			<div id="contact" class="column" style="overflow:hidden; flex:40%; height:30vw">
				<div id="cerc-contact" ></div>

				<div>
					<p>
						Contact <br> Pagini <br> Login <br> Chestii
					</p>
				</div>
				
				
			</div>
		
		
		</div>


	</body>

		

</html>