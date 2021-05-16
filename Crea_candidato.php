<?php
	$nome=$_POST['txtnome'];
	$cognome=$_POST['txtcognome'];
	$telefono=$_POST['numtelefono'];
	$email=$_POST['txtemail'];
	$cv=str_replace("'","\'",$_POST['cvfilename']);
	$occupazione=$_POST['sceltaoccupazione'];
	$posizione=$_POST['sceltaposizione'];
	$tipocontratto=$_POST['txtcontratto'];
	$livello=$_POST['numlivello'];
	$ral=$_POST['numral'];
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	echo("<head><title>Registrazione</title><link rel='icon' href='Immagini/Microarea-Mago.net-Logo.ico'></head>");
	require_once("Header.php");
	$tornaindietro="&nbsp;<a href='./Nuovo_candidato.php'>Torna alla pagina di inserimento</a>";
	session_start();
	$stringa_query="SELECT 'Email' FROM candidati WHERE Email='$email'";
	$risultato=$connessione->query($stringa_query);
	if($risultato==false)
	{
		echo($headercreate."<h1>Errore nella registrazione</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	else if($risultato->num_rows>0)
	{
		die($headercreate1."L'utente con questa E-mail esiste già.".$tornaindietro);
	}
	$telefono=('+39 '.$telefono);
	$stringa_query="INSERT INTO candidati (Nome, Cognome, Telefono, Email, CV, Occupazione, ID_posizione, Tipo_contratto, Livello, RAL, Stato) VALUES('$nome','$cognome','$telefono','$email','$cv','$occupazione','$posizione','$tipocontratto','$livello','$ral','Colloquio da fissare')";
	$risultato=$connessione->query($stringa_query);
	if($risultato==false)
	{
		echo($headercreate."<h1>Errore nell'inserimento</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	header('Location: ./Lista_candidati.php');
	$connessione->close();
?>