<?php
	$nome=$_POST['txtnome'];
	$cognome=$_POST['txtcognome'];
	$telefono=$_POST['numtelefono'];
	$email=$_POST['txtemail'];
	$cv=$_POST['cvfilename'];
	$occupazione=$_POST['sceltaoccupazione'];
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	echo("<head><title>Registrazione</title><link rel='icon' href='Immagini/Microarea-Mago.net-Logo.ico'></head>");
	$tornaindietro="&nbsp;<a href='Nuovo_candidato.php'>Torna alla pagina di inserimento</a>";
	session_start();
	$stringa_query="SELECT 'Email' FROM candidati WHERE Email='$email'";
	$risultato=$connessione->query($stringa_query);
	if($risultato==false)
	{
		echo("<h1>Errore nella registrazione</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	else if($risultato->num_rows>0)
	{
		die("L'utente con questa E-mail esiste già.".$tornaindietro);
	}
	if(substr($telefono, 0, 3)!=='+39')
	{
		$telefono=('+39 '.$telefono);
	}
	//$stringa_query="INSERT INTO candidati (Nome, Cognome, Telefono, Email, CV, Occupazione) VALUES('$nome','$cognome','$telefono','$email','$cv','$occupazione')";
	$stringa_query="INSERT INTO candidati (Nome, Cognome, Telefono, Email, Occupazione) VALUES('$nome','$cognome','$telefono','$email','$occupazione')";
	$risultato=$connessione->query($stringa_query);
	if($risultato==false)
	{
		echo("<h1>Errore nell'inserimento</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	header('Location: Recruitment.php');
	$connessione->close();
?>