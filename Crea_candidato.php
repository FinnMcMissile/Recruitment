<?php
	$nome=$_POST['txtnome'];
	$cognome=$_POST['txtcognome'];
	$telefono=$_POST['numtelefono'];
	$email=$_POST['txtemail'];
	$posizione=$_POST['sceltaposizione'];
	$cv=str_replace("'","\'",$_POST['cvfilename']);
	$occupazione=$_POST['sceltaoccupazione'];
	$tipocontratto=$_POST['txtcontratto'];
	$livello=$_POST['numlivello'];
	$ral=$_POST['numral'];
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	require_once("Header.php");
	$tornaindietro="&nbsp;<a href='./Nuovo_candidato.php'>Torna alla pagina di inserimento</a>";
	session_start();
	$comando="SELECT Email FROM candidati WHERE Email='$email'";
	$risultato=$connessione->query($comando);
	if($risultato==false)
	{
		echo($headerapp."<h1>Errore nella registrazione</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	elseif($risultato->num_rows>0)
	{
		die($headerapp."L'utente con questa E-mail esiste già.".$tornaindietro);
	}
	if(substr(strtolower($cv), -4)!=".pdf")
	{
		die($headerapp."Il CV deve essere in formato PDF.".$tornaindietro);
	}
	$comando="INSERT INTO candidati (Nome, Cognome, Telefono, Email, ID_posizione, CV, Occupazione, Tipo_contratto, Livello, RAL, Stato) VALUES('$nome','$cognome','$telefono','$email','$posizione','$cv','$occupazione','$tipocontratto','$livello','$ral','Colloquio da fissare')";
	$risultato=$connessione->query($comando);
	if($risultato==false)
	{
		echo($headerapp."<h1>Errore nell'inserimento</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	header('Location: ./Lista_candidati.php');
	$connessione->close();
?>