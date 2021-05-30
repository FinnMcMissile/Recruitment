<!DOCTYPE>
<html>
	<head>
		<title>Nuovo candidato</title>
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
		<a href="./Recruitment.php"><img src="Immagini/Back.svg" class="back"></a>
		<div class="container">
			<div id="create-container" class="col-md-6 offset-md-3 mt-2">
				<form method="post" action="./Crea_candidato.php">
					<div class="card">
						<div class="card-body">
							<div class="mb-3 row">
								<label for="nome" class="col-sm-3 col-form-label label-right">Nome</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="nome" name="txtnome" required>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="cognome" class="col-sm-3 col-form-label label-right">Cognome</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="cognome" name="txtcognome" required>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="telefono" class="col-sm-3 col-form-label label-right">Telefono</label>
								<div class="col-sm-9">
									<input type="tel" class="form-control" id="telefono" name="numtelefono" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" placeholder="123 456 7890" required>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="email" class="col-sm-3 col-form-label label-right">E-mail</label>
								<div class="col-sm-9">
									<input type="email" class="form-control" id="email" name="txtemail" required>
								</div>
							</div>
							<div class="form-group mb-3 row">
								<label for="posizione" class="col-sm-3 col-form-label label-right">Posizione</label>
								<div class="col-sm-9">
									<select class="form-control" id="posizione" name="sceltaposizione" required>
										<option value="">--Seleziona--</option>
										<?php
											$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
											if(mysqli_connect_errno())
											{
												die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
											}
											$stringa_query="SELECT ID_posizione, Nome_posizione FROM posizioni";
											$risultato=$connessione->query($stringa_query);
											while($riga=$risultato->fetch_assoc())
											{
												echo("<option value='".$riga['ID_posizione']."'>".$riga['Nome_posizione']."</option>");
											}
										?>
									</select>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="cv" class="col-sm-3 col-form-label label-right">CV</label>
								<div class="col-sm-9">
									<input type="file" accept="application/pdf" class="form-control" id="cv" name="cvfilename" required>
								</div>
							</div>
							<div class="form-group mb-3 row">
								<label for="occupazione" class="col-sm-3 col-form-label label-right">Occupazione</label>
								<div class="col-sm-9">
									<select class="form-control" id="occupazione" name="sceltaoccupazione" required>
										<option value="">--Seleziona--</option>
										<option value="Occupato t.i.">Occupato a tempo indeterminato</option>
										<option value="Occupato t.d.">Occupato a tempo determinato</option>
										<option value="Disoccupato">Disoccupato</option>
									</select>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="contratto" class="col-sm-3 col-form-label label-right">Tipo contratto</label>
								<div class="col-sm-9">
									<input type="text" class="form-control" id="contratto" name="txtcontratto" required>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="livello" class="col-sm-3 col-form-label label-right">Livello</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" id="livello" name="numlivello" required>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="ral" class="col-sm-3 col-form-label label-right">RAL</label>
								<div class="col-sm-9">
									<input type="number" class="form-control" id="ral" name="numral" required>
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