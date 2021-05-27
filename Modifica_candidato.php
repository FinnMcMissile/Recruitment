<!DOCTYPE>
<html>
	<head>
		<title>Modifica candidato</title>
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
		<?php
			$candidato=$_GET['idcandidato'];
			$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
			if(mysqli_connect_errno())
			{
				die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
			}
			$stringa_query="SELECT * FROM candidati WHERE ID_candidato='$candidato'";
			$risultato=$connessione->query($stringa_query);
			$riga=$risultato->fetch_assoc();
		?>
		<div class="container">
			<div class="offset-md-2 mt-2">
				<a href="./Lista_candidati.php"><img src="Immagini/Back.svg" class="back"></a>
				<a href="./Recruitment.php"><img src="Immagini/Home.svg" class="back"></a>
			</div>
			<div class="col-md-6 offset-md-3 mt-2">
				<form method="post" action="./Aggiorna_candidato.php">
					<div class="card">
						<div class="card-body">
							<div class="mb-3 row" style="display: none">
								<label for="id" class="col-sm-3 col-form-label label-right">ID posizione</label>
								<div class="col-sm-9">
									<?php
										echo("<input type='text' class='form-control' id='id' name='idcandidato' value='".$riga['ID_candidato']."' readonly>");
									?>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="nome" class="col-sm-3 col-form-label label-right">Nome</label>
								<div class="col-sm-9">
									<?php
										echo("<input type='text' class='form-control' id='nome' name='txtnome' value='".$riga['Nome']."' required>");
									?>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="cognome" class="col-sm-3 col-form-label label-right">Cognome</label>
								<div class="col-sm-9">
									<?php
										echo("<input type='text' class='form-control' id='cognome' name='txtcognome' value='".$riga['Cognome']."' required>");
									?>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="telefono" class="col-sm-3 col-form-label label-right">Telefono</label>
								<div class="col-sm-9">
									<?php
										echo("<input type='tel' class='form-control' id='telefono' name='numtelefono' value='".$riga['Telefono']."' pattern='[0-9]{3} [0-9]{3} [0-9]{4}' placeholder='123 456 7890' required>");
									?>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="email" class="col-sm-3 col-form-label label-right">E-mail</label>
								<div class="col-sm-9">
									<?php
										echo("<input type='email' class='form-control' id='email' name='txtemail' value='".$riga['Email']."' required>");
									?>
								</div>
							</div>
							<div class="form-group mb-3 row">
								<label for="posizione" class="col-sm-3 col-form-label label-right">Posizione</label>
								<div class="col-sm-9">
									<select class="form-control" id="posizione" name="sceltaposizione" required>
										<?php
											$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
											if(mysqli_connect_errno())
											{
												die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
											}
											$stringa_query="SELECT ID_posizione, Nome_posizione FROM posizioni";
											$result=$connessione->query($stringa_query);
											while($row=$result->fetch_assoc())
											{
												echo($op=$riga['ID_posizione']==$row['ID_posizione']?"<option value='".$row['ID_posizione']."' selected>".$row['Nome_posizione']."</option>":"<option value='".$row['ID_posizione']."'>".$row['Nome_posizione']."</option>");
											}
										?>
									</select>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="cv" class="col-sm-3 col-form-label label-right">CV</label>
								<div class="col-sm-9" style="display:none" id="fileinput">
									<div class="input-group">
										<input type="file" class="form-control" id="cv" name="cvnewfile">
										<button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('fileinput').style.display='none';document.getElementById('filedesc').style.display='block'"><i class="fa fa-times"></i></button>
									</div>
								</div>
								<div class="col-sm-9" id="filedesc">
									<div class="input-group">
										<?php
											$cv=str_replace("'","&#39",$riga['CV']);
											echo "<input type='text' class='form-control' id='cv' name='cvfilename' value='".$cv."' readonly>";
										?>
										<button class="btn btn-outline-secondary" type="button" onclick="document.getElementById('fileinput').style.display='block';document.getElementById('filedesc').style.display='none'"><i class="fa fa-pencil"></i></button>
									</div>
								</div>
							</div>
							<div class="form-group mb-3 row">
								<label for="occupazione" class="col-sm-3 col-form-label label-right">Occupazione</label>
								<div class="col-sm-9">
									<select class="form-control" id="occupazione" name="sceltaoccupazione" required>
										<?php
											echo($op=$riga['Occupazione']=="Occupato t.i."?"<option value='Occupato t.i.' selected>Occupato a tempo indeterminato</option>":"<option value='Occupato t.i.'>Occupato a tempo indeterminato</option>");
											echo($op=$riga['Occupazione']=="Occupato t.d."?"<option value='Occupato t.d.' selected>Occupato a tempo determinato</option>":"<option value='Occupato t.d.'>Occupato a tempo determinato</option>");
											echo($op=$riga['Occupazione']=="Disoccupato"?"<option value='Disoccupato' selected>Disoccupato</option>":"<option value='Disoccupato'>Disoccupato</option>");
										?>
									</select>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="contratto" class="col-sm-3 col-form-label label-right">Tipo contratto</label>
								<div class="col-sm-9">
									<?php
										echo("<input type='text' class='form-control' id='contratto' name='txtcontratto' value='".$riga['Tipo_contratto']."' required>");
									?>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="livello" class="col-sm-3 col-form-label label-right">Livello</label>
								<div class="col-sm-9">
									<?php
										echo("<input type='number' class='form-control' id='livello' name='numlivello' value='".$riga['Livello']."' required>");
									?>
								</div>
							</div>
							<div class="mb-3 row">
								<label for="ral" class="col-sm-3 col-form-label label-right">RAL</label>
								<div class="col-sm-9">
									<?php
										echo("<input type='number' class='form-control' id='ral' name='numral' value='".$riga['RAL']."' required>");
									?>
								</div>
							</div>
							<div class="form-group mb-3 row">
								<label for="stato" class="col-sm-3 col-form-label label-right">Stato</label>
								<div class="col-sm-9">
									<select class="form-control" id="stato" name="sceltastato" required>
										<?php
											echo($op=$riga['Stato']=="Colloquio da fissare"?"<option value='Colloquio da fissare' selected>Colloquio da fissare</option>":"<option value='Colloquio da fissare'>Colloquio da fissare</option>");
											echo($op=$riga['Stato']=="Secondo colloquio da fissare"?"<option value='Secondo colloquio da fissare' selected>Secondo colloquio da fissare</option>":"<option value='Secondo colloquio da fissare'>Secondo colloquio da fissare</option>");
											echo($op=$riga['Stato']=="Preparare offerta"?"<option value='Preparare offerta' selected>Preparare offerta</option>":"<option value='Preparare offerta'>Preparare offerta</option>");
											echo($op=$riga['Stato']=="Scartato"?"<option value='Scartato' selected>Scartato</option>":"<option value='Scartato'>Scartato</option>");
										?>
									</select>
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
	</body>
</html>