<!DOCTYPE>
<html>
	<head>
		<title>Modifica posizione</title>
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
			$posizione=$_GET['idposizione'];
			$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
			if(mysqli_connect_errno())
			{
				die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
			}
			$stringa_query="SELECT ID_posizione, Nome_posizione, Requisiti FROM posizioni WHERE ID_posizione='$posizione'";
			$risultato=$connessione->query($stringa_query);
			$riga=$risultato->fetch_assoc();
		?>
		<div class="container">
			<div class="row">
				<div class="offset-md-1 mt-2 col-md-2 backbuttons">
					<a href="./Posizioni.php"><img src="Immagini/Back.svg" class="back"></a>
					<a href="./Recruitment.php"><img src="Immagini/Home.svg" class="home"></a>
				</div>
				<div class="col-md-6 mt-2">
					<form method="post" action="./Aggiorna_posizione.php">
						<div class="card">
							<div class="card-body">
								<div class="mb-3 row" style="display: none">
									<label for="id" class="col-sm-3 col-form-label label-right">ID posizione</label>
									<div class="col-sm-9">
										<?php
											echo("<input type='text' class='form-control' id='id' name='idposizione' value='".$riga['ID_posizione']."' readonly>");
										?>
									</div>
								</div>
								<div class="mb-3 row">
									<label for="nome" class="col-sm-3 col-form-label label-right">Nome posizione</label>
									<div class="col-sm-9">
										<?php
											echo("<input type='text' class='form-control' id='nome' name='txtposizione' value='".$riga['Nome_posizione']."' required>");
										?>
									</div>
								</div>
								<div class="mb-3 row">
									<label for="requisiti" class="col-sm-3 col-form-label label-right">Requisiti</label>
									<div class="col-sm-9">
										<?php
											echo("<textarea class='form-control' id='requisiti' name='txtrequisiti' required>".$riga['Requisiti']."</textarea>");
										?>
									</div>
								</div>
								<div>
									<input type="submit" name="pulsanteinvia" value="Aggiorna" class="btn btn-primary">
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>