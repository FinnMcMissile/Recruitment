<!DOCTYPE>
<html>
	<head>
		<title>Nuovo utente</title>
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
		<div class="container">
			<div class="row">
				<div class="offset-md-1 mt-2 col-md-2 backbuttons">
					<a href="./Utenti.php" class="backlink"><img src="Immagini/Back.svg" class="back"></a>
					<a href="./Recruitment.php"><img src="Immagini/Home.svg" class="home"></a>
				</div>
				<div class="col-md-6 mt-2">
				<form method="post" action="./Crea_utente.php">
					<div class="card">
						<div class="card-body">
							<div class="mb-3 row">
								<label for="nome" class="col-sm-2 col-form-label label-right">Nome</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="nome" name="txtnome" required>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="cognome" class="col-sm-2 col-form-label label-right">Cognome</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="cognome" name="txtcognome" required>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="email" class="col-sm-2 col-form-label label-right">E-mail</label>
								<div class="col-sm-10">
									<input type="email" class="form-control" id="email" name="txtemail" required>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="password" class="col-sm-2 col-form-label label-right">Password</label>
								<div class="col-sm-10">
									<input type="password" class="form-control" id="password" name="txtpassword" required>
									<div class="form-text">La lunghezza della password deve essere compresa tra gli 8 e i 20 caratteri.</div>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="telefono" class="col-sm-2 col-form-label label-right">Telefono</label>
								<div class="col-sm-10">
									<input type="tel" class="form-control" id="telefono" name="numtelefono" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" placeholder="123 456 7890" required>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="tipo" class="col-sm-2 col-form-label label-right">Tipo</label>
								<div class="col-sm-10">
									<select class="form-control" id="tipo" name="tipo" required>
										<option value="">--Seleziona--</option>
										<option value="Operativo">Operativo</option>
										<option value="Esaminatore">Esaminatore</option>
										<option value="Amministratore">Amministratore</option>
									</select>
								</div>
							</div>
							<div class="mb-3">
								<div class="form-check form-check-inline offset-md-2 no-margin">
									<label class="form-check-label" for="bloccato">Bloccato</label>
									<input class="form-check-input" type="checkbox" id="bloccato" name="bloccato">
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