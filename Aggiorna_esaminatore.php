<?php
	$esaminatore=$_POST['idesaminatore'];
	$nome=$_POST['txtnome'];
	$cognome=$_POST['txtcognome'];
	$email=$_POST['txtemail'];
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	require_once("Header.php");
	$tornaindietro="&nbsp;<a href='./Esaminatori.php'>Torna indietro</a>";
	session_start();
	$comando="SELECT Email FROM esaminatori WHERE Email='$email'";
	$risultato=$connessione->query($comando);
	if($risultato==false)
	{
		echo($headerposition."<h1>Errore nell'inserimento</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	else if($risultato->num_rows>0)
	{
		die($headerex."Questo esaminatore esiste già.".$tornaindietro);
	}
	$comando="UPDATE esaminatori SET Nome='$nome', Cognome='$cognome', Email='$email' WHERE ID_esaminatore='$esaminatore'";
	$risultato=$connessione->query($comando);
	if($risultato==false)
	{
		echo($headerpositionmodify."<h1>Errore nella modifica</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	header('Location: ./Esaminatori.php');
	$connessione->close();
?>