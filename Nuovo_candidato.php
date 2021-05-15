<!DOCTYPE>
<html>
	<head>
		<title>Nuovo candidato</title>
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
		<a href="./Recruitment.php"><img src="Immagini/Back.svg" class="back"></a>
		<div class="container">
			<div class="container">
				<div id="register-container" class="col-md-8 offset-md-2 mt-8">
					<form method="post" action="Crea_candidato.php">
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
									<label for="telefono" class="col-sm-2 col-form-label label-right">Telefono</label>
									<div class="col-sm-10">
										<input type="tel" class="form-control" id="telefono" name="numtelefono" pattern="[0-9]{3} [0-9]{3} [0-9]{4}" placeholder="123 456 7890" required>
									</div>
								</div>
								<div class="mb-3 row">
									<label for="email" class="col-sm-2 col-form-label label-right">E-mail</label>
									<div class="col-sm-10">
										<input type="email" class="form-control" id="email" name="txtemail" required>
									</div>
								</div>
								<div class="mb-3 row">
									<label for="password" class="col-sm-2 col-form-label label-right">CV</label>
									<div class="col-sm-10">
										<input type="file" class="form-control" id="cv" name="cvfilename" required>
									</div>
								</div>
								<div class="form-group mb-3 row">
									<label for="occupazione" class="col-sm-2 col-form-label label-right">Occupazione</label>
									<div class="col-sm-10">
										<select class="form-control" id="occupazione" name="sceltaoccupazione" required>
											<option value="Select_one"></option>
											<option value="Occupato t.i.">Occupato a tempo indeterminato</option>
											<option value="Occupato t.d.">Occupato a tempo determinato</option>
											<option value="Disoccupato">Disoccupato</option>
										</select>
									</div>
								</div>
								<div>
									<input type="submit" name="pulsanteinvia" value="Richiedi l'accesso" class="btn btn-primary">
									<div class="form-text mt-3"><b>NB: l'account deve essere approvato dagli amministratori prima di poter essere utilizzato.</b></div>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>