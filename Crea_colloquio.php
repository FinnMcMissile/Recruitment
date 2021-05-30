<?php
	$candidato=$_POST['sceltacandidato'];
	$utente=$_POST['sceltautente'];
	$data=$_POST['sceltadata'];
	$ora=$_POST['sceltaora'];
	$metodo=$_POST['sceltametodo'];
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	require_once("Header.php");
	$tornaindietro="&nbsp;<a href='./Convoca_candidato.php'>Torna alla pagina di inserimento</a>";
	session_start();
	$comando="SELECT ID_candidato, Data, Ora FROM colloqui WHERE ID_candidato='$candidato' AND Data='$data' AND Ora='$ora'";
	$risultato=$connessione->query($comando);
	if($risultato==false)
	{
		echo($headerposition."<h1>Errore nell'inserimento</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	elseif($risultato->num_rows>0)
	{
		die($headerint."Il colloquio per questo candidato esiste già.".$tornaindietro);
	}
	$comando="INSERT INTO colloqui (ID_candidato, ID_utente, Data, Ora, Metodo_colloquio) VALUES('$candidato','$utente','$data','$ora','$metodo')";
	$risultato=$connessione->query($comando);
	if($risultato==false)
	{
		echo($headerint."<h1>Errore nell'inserimento</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	header('Location: ./Colloqui.php');
	$connessione->close();
?>