<!DOCTYPE html>
<html>
	<head>
		<title></title>

		  <link rel="stylesheet" type="text/css" href="slideup.css">
		  <link rel="stylesheet" type="text/css" href="sageata.css">
	</head>
	<body>
		<div class="row">
			<div id="sageata" class="column" style="flex: 10%; background-color: #123123">
				<div id="menu" class="meniu">Meniu
					<a href="">Alta pagina</a>
					<a href="#content2">Inca o pagina</a>
				</div>
			</div>
		
			<div id="banner" class="column" style="flex: 90%; background-color: #75B33E">Banner</div>

		</div>

		

		<div id="content1" class="row">
			<div id="desc1" class="column" style="flex: 30vh; height: 80vh; background-color: #2A3151">Descriere primul content</div>
			<div id="imagine1" class="column" style="flex: 70vh; height: 80vh"></div>
		</div>
		<div id="content2" class="row">
			<div id="imagine2" class="column" style="flex: 70vh; height: 100vh"></div>
			<div id="desc2" class="column" style="flex: 30vh; background-color: #AA3151; height: 100vh">Descriere al doilea content</div>
		</div>

		<?php
			// for ($x = 0; $x < 2; $x++){
			// 	echo "<div id="content1">Content 1</div>";
			// }
		?>
	</body>
</html>