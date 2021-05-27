<?php
	$header="<!DOCTYPE>
	<html>
		<head>
			<title>%titolo%</title>
			<link rel='icon' href='Immagini/Microarea-Mago.net-Logo.ico'>
			<link href='//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
			<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css' rel='stylesheet' integrity='sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6' crossorigin='anonymous'>
			<link rel='stylesheet' href='Recruitment.css'>
		</head>
		<body>
			<nav class='navbar navbar-expand-sm bg-light navbar-light'>
				<div class='container-fluid'>
					<div class='pt-2 pb-3'>
						<a class='navbar-brand' style='margin-right:2em' href='http://www.microarea.it/'><img src='Immagini/Microarea-Logo.png'></a>
						<a class='navbar-brand' href='http://www.mago4.com/'><img src='Immagini/Mago4-Logo.png' height='68'></a>
					</div>
					%php%
				</div>
			</nav>
		</body>
	</html>";
	$php="<!--PHP DA SISTEMARE-->
	<div style='display: inline-flex'>
		<a href='Logout.php' class='nav-link underlined-link'><b>Disconnettiti</b>  <i class='fa fa-sign-out'></i></a>
	</div>";
	$headerlogin=str_replace("%titolo%","Accesso",$header);
	$headerregister=str_replace("%titolo%","Registrazione",$header);
	
	$headerapp=str_replace("%titolo%","Nuovo candidato",str_replace("%php%",$php,$header));
	$headerappmodify=str_replace("%titolo%","Modifica candidato",str_replace("%php%",$php,$header));
	//$headerappdelete=str_replace("%titolo%","Eliminazione candidato",str_replace("%php%",$php,$header));
	
	$headerint=str_replace("%titolo%","Nuovo colloquio",str_replace("%php%",$php,$header));
	//$headerintres=str_replace("%titolo%","Esito colloquio",str_replace("%php%",$php,$header));
	//$headerint*?*=str_replace("%titolo%","Nuovo utente",str_replace("%php%",$php,$header));
	
	$headeruser=str_replace("%titolo%","Nuovo utente",str_replace("%php%",$php,$header));
	//$headerusermodify=str_replace("%titolo%","Modifica utente",str_replace("%php%",$php,$header));
	//$headeruserdelete=str_replace("%titolo%","Eliminazione utente",str_replace("%php%",$php,$header));
	
	$headerposition=str_replace("%titolo%","Nuova posizione",str_replace("%php%",$php,$header));
	$headerpositionmodify=str_replace("%titolo%","Modifica posizione",str_replace("%php%",$php,$header));
	$headerpositiondelete=str_replace("%titolo%","Eliminazione posizione",str_replace("%php%",$php,$header));
?>