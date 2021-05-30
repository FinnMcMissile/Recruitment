<!DOCTYPE>
<html>
	<head>
		<title>Esito colloquio</title>
		<link rel="icon" href="Immagini/Microarea-Mago.net-Logo.ico">
		<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
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
		<?php
			$colloquio=$_GET['idcolloquio'];
			$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
			if(mysqli_connect_errno())
			{
				die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
			}
			$stringa_query="SELECT ID_colloquio, Data, Ora, Candidati.Nome AS Nome_candidato, Candidati.Cognome AS Cognome_candidato, Utenti.Nome AS Nome_esaminatore, Utenti.Cognome AS Cognome_esminatore, Metodo_colloquio FROM colloqui JOIN Candidati ON Colloqui.ID_candidato=Candidati.ID_candidato JOIN Utenti ON Colloqui.ID_utente=Utenti.ID_utente WHERE ID_colloquio='$colloquio'";
			$risultato=$connessione->query($stringa_query);
			$riga=$risultato->fetch_assoc();
		?>
		<div class="container">
			<div class="offset-md-1 mt-2">
				<a href="./Colloqui.php"><img src="Immagini/Back.svg" class="back"></a>
				<a href="./Recruitment.php"><img src="Immagini/Home.svg" class="back"></a>
			</div>
			<div class="col-md-6 offset-md-3 mt-2">
				<form method="post" action="./Aggiorna_colloquio.php">
					<div class="card">
						<div class="card-body">
							<div class="mb-3 row" style="display: none">
								<label for="id" class="col-sm-3 col-form-label label-right">ID colloquio</label>
								<div class="col-sm-9">
									<?php
										echo("<input type='text' class='form-control' id='id' name='idcolloquio' value='".$riga['ID_colloquio']."' readonly>");
									?>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="candidato" class="col-sm-3 col-form-label label-right">Candidato</label>
								<div class="col-sm-9">
									<?php
										echo("<input type='text' class='form-control' id='candidato' name='candidato' value='".$riga['Nome_candidato']." ".$riga['Cognome_candidato']."' readonly>");
									?>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="utente" class="col-sm-3 col-form-label label-right">Esaminatore</label>
								<div class="col-sm-9">
									<?php
										echo("<input type='text' class='form-control' id='candidato' name='candidato' value='".$riga['Nome_esaminatore']." ".$riga['Cognome_esminatore']."' readonly>");
									?>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="data" class="col-sm-3 col-form-label label-right">Data</label>
								<div class="col-sm-9">
									<?php
										echo("<input type='date' class='form-control' id='data' name='data' value='".$riga['Data']."' readonly>");
									?>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="ora" class="col-sm-3 col-form-label label-right">Ora</label>
								<div class="col-sm-9">
									<?php
										echo("<input type='time' class='form-control' id='ora' name='ora' value='".$riga['Ora']."' readonly>");
									?>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="metodo" class="col-sm-3 col-form-label label-right">Metodo colloquio</label>
								<div class="col-sm-9">
									<?php
										echo("<input type='text' class='form-control' id='metodo' name='metodo' value='".$riga['Metodo_colloquio']."' readonly>");
									?>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="metodo" class="col-sm-3 col-form-label label-right">Esito</label>
								<div class="col-sm-9 mt-2" style="display: inline-flex">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="esito" id="positivo" value="Positivo" required>
										<label class="form-check-label" for="positivo">
											Positivo
										</label>
									</div>
									<div class="form-check ms-2">
										<input class="form-check-input" type="radio" name="esito" id="negativo" value="Negativo" required>
										<label class="form-check-label" for="negativo">
											Negativo
										</label>
									</div>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="descrizione" class="col-sm-3 col-form-label label-right">Note</label>
								<div class="col-sm-9">
									<textarea class="form-control" id="note" name="txtnote"></textarea>
								</div>
							</div>
							<div>
								<input type="submit" name="pulsanteinvia" value="Conferma" class="btn btn-primary">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</body>
</html>