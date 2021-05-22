<?php
	$esaminatore=$_GET['idesaminatore'];
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	require_once("Header.php");
	$tornaindietro="&nbsp;<a href='./Esaminatori.php'>Torna indietro</a>";
	session_start();
	$comando="SELECT ID_esaminatore FROM esaminatori WHERE ID_esaminatore='$esaminatore'";
	$risultato=$connessione->query($comando);
	if($risultato->num_rows>0)
	{
		$comando="DELETE FROM esaminatori WHERE ID_esaminatore='$esaminatore'";
		$risultato=$connessione->query($comando);
	}
	else if($risultato==false)
	{
		echo($headerpositiondelete."<h1>Errore nella cancellazione</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	header('Location: ./Esaminatori.php');
	$connessione->close();
?>