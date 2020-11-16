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

	<body style="background-color:#75667c">
    
		<?php include "elements/sageata.html"; ?>	

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