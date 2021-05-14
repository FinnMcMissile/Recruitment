<!DOCTYPE>
<html>
	<head>
		<title>Microarea's recruitment 👨‍💻</title>
		<link rel="icon" href="Immagini/Microarea-Mago.net-Logo.ico">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
		<link rel="stylesheet" href="Recruitment.css">
	</head>
	<body>
		<?php
			session_start();
			if(!isset($_SESSION['IDsessione']))
			{
				header('Location: Login.html');
				die();
			}
		?>
		<div class="banner">
			<a style="margin-right:2em" href="http://www.microarea.it/"><img src="Immagini/Microarea-Logo.png"></a>
			<a href="http://www.mago4.com/"><img src="Immagini/Mago4-Logo.png" height="68"></a>
		</div>
		<!--Codice-->
	</body>
</html>