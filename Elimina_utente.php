<?php
	$utente=$_GET['idutente'];
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	require_once("Header.php");
	$tornaindietro="&nbsp;<a href='./Utenti.php'>Torna indietro</a>";
	session_start();
	$comando="SELECT ID_utente FROM utenti WHERE ID_utente='$utente'";
	$risultato=$connessione->query($comando);
	if($risultato->num_rows>0)
	{
		$comando="DELETE FROM utenti WHERE ID_utente='$utente'";
		$risultato=$connessione->query($comando);
	}
	elseif($risultato==false)
	{
		echo($$headeruserdelete."<h1>Errore nella cancellazione</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	header('Location: ./Utenti.php');
	$connessione->close();
?>