<?php
	$posizione=$_GET['idposizione'];
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	require_once("Header.php");
	$tornaindietro="&nbsp;<a href='./Posizioni.php'>Torna indietro</a>";
	session_start();
	$comando="SELECT ID_posizione FROM posizioni WHERE ID_posizione='$posizione'";
	$risultato=$connessione->query($comando);
	if($risultato->num_rows>0)
	{
		$comando="DELETE FROM posizioni WHERE ID_posizione='$posizione'";
		$risultato=$connessione->query($comando);
	}
	else if($risultato==false)
	{
		echo($headerdelete."<h1>Errore nella cancellazione</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	header('Location: ./Posizioni.php');
	$connessione->close();
?>