<?php
	$nome=$_POST['txtnome'];
	$cognome=$_POST['txtcognome'];
	$email=$_POST['txtemail'];
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	require_once("Header.php");
	$tornaindietro="&nbsp;<a href='./Nuovo_esaminatore.php'>Torna alla pagina di inserimento</a>";
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
	$comando="INSERT INTO esaminatori (Nome, Cognome, Email) VALUES('$nome','$cognome','$email')";
	$risultato=$connessione->query($comando);
	if($risultato==false)
	{
		echo($headerex."<h1>Errore nell'inserimento</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	header('Location: ./Esaminatori.php');
	$connessione->close();
?>