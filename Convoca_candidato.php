<!DOCTYPE>
<html>
	<head>
		<title>Convoca candidato</title>
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
			<div class="offset-md-2 mt-2">
				<a href="./Recruitment.php"><img src="Immagini/Back.svg" class="back"></a>
			</div>
			<div class="col-md-6 offset-md-3 mt-2">
				<form method="post" action="./Crea_colloquio.php">
					<div class="card">
						<div class="card-body">
							<div class="mb-3 row">
								<label for="candidato" class="col-sm-3 col-form-label label-right">Candidato</label>
								<div class="col-sm-9">
									<select class="form-control" id="candidato" name="sceltacandidato" required>
										<option value="">--Seleziona--</option>
										<?php
											$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
											if(mysqli_connect_errno())
											{
												die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
											}
											$stringa_query="SELECT ID_candidato, Nome, Cognome FROM candidati";
											$risultato=$connessione->query($stringa_query);
											while($riga=$risultato->fetch_assoc())
											{
												echo("<option value='".$riga['ID_candidato']."'>".$riga['Nome']." ".$riga['Cognome']."</option>");
											}
										?>
									</select>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="esaminatore" class="col-sm-3 col-form-label label-right">Esaminatore</label>
								<div class="col-sm-9">
									<select class="form-control" id="esminatore" name="sceltaesaminatore" required>
										<option value="">--Seleziona--</option>
										<?php
											$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
											if(mysqli_connect_errno())
											{
												die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
											}
											$stringa_query="SELECT ID_esaminatore, Nome, Cognome FROM esaminatori";
											$risultato=$connessione->query($stringa_query);
											while($riga=$risultato->fetch_assoc())
											{
												echo("<option value='".$riga['ID_esaminatore']."'>".$riga['Nome']." ".$riga['Cognome']."</option>");
											}
										?>
									</select>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="data" class="col-sm-3 col-form-label label-right">Data</label>
								<div class="col-sm-9">
									<input type="date" class="form-control" id="data" name="sceltadata" required>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="ora" class="col-sm-3 col-form-label label-right">Ora</label>
								<div class="col-sm-9">
									<input type="time" class="form-control" id="ora" name="sceltaora" required>
								</div>
							</div>
							<div class="form-group mb-3 row">
								<label for="metodo" class="col-sm-3 col-form-label label-right">Metodo colloquio</label>
								<div class="col-sm-9">
									<select class="form-control" id="metodo" name="sceltametodo" required>
										<option value="">--Seleziona--</option>
										<option value="In presenza">In presenza</option>
										<option value="Skype">Skype</option>
										<option value="Teams">Teams</option>
										<option value="Zoom">Zoom</option>
										<option value="Altro">Altro</option>
									</select>
								</div>
							</div>
							<div>
								<input type="submit" name="pulsanteinvia" value="Aggiungi" class="btn btn-primary">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>