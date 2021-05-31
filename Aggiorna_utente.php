<?php
	$utente=$_POST['idutente'];
	$nome=$_POST['txtnome'];
	$cognome=$_POST['txtcognome'];
	$email=$_POST['txtemail'];
	$telefono=$_POST['numtel'];
	$tipo=$_POST['tipo'];
	$bloccato=$_POST['bloccato']=="on"?true:false;
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	require_once("Header.php");
	$tornaindietro="&nbsp;<a href='./Utenti.php'>Torna indietro</a>";
	session_start();
	$comando="SELECT Email FROM utenti WHERE Email='$email'";
	$risultato=$connessione->query($comando);
	if($risultato==false)
	{
		echo($headerusermodify."<h1>Errore nell'inserimento</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	$comando="UPDATE utenti SET Nome='$nome', Cognome='$cognome', Email='$email', Telefono='$telefono', Tipo='$tipo', Bloccato='$bloccato' WHERE ID_utente='$utente'";
	$risultato=$connessione->query($comando);
	if($risultato==false)
	{
		echo($$headerusermodify."<h1>Errore nella modifica</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	header('Location: ./Utenti.php');
	$connessione->close();
?>