<?php
	$candidato=$_GET['idcandidato'];
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	require_once("Header.php");
	$tornaindietro="&nbsp;<a href='./Lista_candidati.php'>Torna indietro</a>";
	session_start();
	$comando="SELECT ID_candidato FROM candidati WHERE ID_candidato='$candidato'";
	$risultato=$connessione->query($comando);
	if($risultato->num_rows>0)
	{
		$comando="DELETE FROM candidati WHERE ID_candidato='$candidato'";
		$risultato=$connessione->query($comando);
	}
	else if($risultato==false)
	{
		echo($headerpositiondelete."<h1>Errore nella cancellazione</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	header('Location: ./Lista_candidati.php');
	$connessione->close();
?>