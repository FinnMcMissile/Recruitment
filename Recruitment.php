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
		<nav class="navbar navbar-expand-sm bg-light navbar-light">
			<div class="container-fluid">
				<div class="pt-2 pb-3">
					<a class="navbar-brand" style="margin-right:2em" href="http://www.microarea.it/"><img src="Immagini/Microarea-Logo.png"></a>
					<a class="navbar-brand" href="http://www.mago4.com/"><img src="Immagini/Mago4-Logo.png" height="68"></a>
				</div>
				<div style="display: inline-flex">
					<span class="navbar-text">
						<?php
							echo("<i class='fa fa-user'></i> ".$_SESSION['Utente']);
						?>
					</span>
					<a href='Logout.php' class="nav-link underlined-link"><b>Disconnettiti</b>  <i class="fa fa-sign-out"></i></a>
				</div>
			</div>
		</nav>
		<div class="container">
			<div class="row mt-6">
				<div class="card col-md-4 offset-md-4">
					<div class="card-body">
						<div class="call-to-action">
							<h5 class="card-title">Lista candidati</h5>
							<a href="Lista_candidati.php"><img class="freccia" src="Immagini/Freccia_destra.svg"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="card col-md-4 offset-md-4">
					<div class="card-body">
						<div class="call-to-action">
							<h5 class="card-title">Inserisci un nuovo candidato</h5>
							<a href="Nuovo_candidato.php"><img class="freccia" src="Immagini/Freccia_destra.svg"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="card col-md-4 offset-md-4">
					<div class="card-body">
						<div class="call-to-action">
							<h5 class="card-title">Convoca un candidato</h5>
							<a href="Convoca_candidato.php"><img class="freccia" src="Immagini/Freccia_destra.svg"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="card col-md-4 offset-md-4">
					<div class="card-body">
						<div class="call-to-action">
							<h5 class="card-title">Esito colloqui</h5>
							<a href="Esito_colloqui.php"><img class="freccia" src="Immagini/Freccia_destra.svg"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="card col-md-4 offset-md-4">
					<div class="card-body">
						<div class="call-to-action">
							<h5 class="card-title">Esaminatori</h5>
							<a href="Esaminatori.php"><img class="freccia" src="Immagini/Freccia_destra.svg"></a>
						</div>
					</div>
				</div>
			</div>
			<div class="row mt-3">
				<div class="card col-md-4 offset-md-4">
					<div class="card-body">
						<div class="call-to-action">
							<h5 class="card-title">Posizioni</h5>
							<a href="Posizioni.php"><img class="freccia" src="Immagini/Freccia_destra.svg"></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>