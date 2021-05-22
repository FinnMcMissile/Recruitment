<!DOCTYPE>
<html>
	<head>
		<title>Esaminatori</title>
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
			<div class="offset-md-1 mt-2">
				<a href="./Recruitment.php"><img src="Immagini/Back.svg" class="back"></a>
				<a href="./Nuovo_esaminatore.php">Aggiungi <i class="fa fa-user-plus"></i></a>
			</div>
			<div class="col-md-8 offset-md-2 mt-2">
				<table class="table">
					<thead>
						<tr>
							<th scope="col">Nome</th>
							<th scope="col">Cognome</th>
							<th scope="col">E-mail</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
							if(mysqli_connect_errno())
							{
								die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
							}
							$stringa_query="SELECT * FROM esaminatori";
							$risultato=$connessione->query($stringa_query);
							while($riga=$risultato->fetch_assoc())
							{
								echo("<tr><td scope='row'>".$riga['Nome']."</td><td>".$riga['Cognome']."</td><td>".$riga['Email']."</td><td class='no-border'><a href='Modifica_esaminatore.php?idesaminatore=".$riga['ID_esaminatore']."'><i class='fa fa-pencil'></i></a></td><td class='no-border'><a href='Elimina_esaminatore.php?idesaminatore=".$riga['ID_esaminatore']."'><i class='fa fa-trash'></i></a></td></tr>");
							}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</body>
</html>