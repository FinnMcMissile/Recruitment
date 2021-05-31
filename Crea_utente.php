<?php
	$nome=$_POST['txtnome'];
	$cognome=$_POST['txtcognome'];
	$email=$_POST['txtemail'];
	$password=$_POST['txtpassword'];
	$telefono=$_POST['numtelefono'];
	$tipo=$_POST['tipo'];
	$bloccato=$_POST['bloccato']=="on"?true:false;
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	require_once("Header.php");
	$tornaindietro="&nbsp;<a href='./Nuovo_utente.php'>Torna alla pagina di inserimento</a>";
	session_start();
	$lunghezza_password=mb_strlen($password);
	if($lunghezza_password<8||$lunghezza_password>20)
	{
		die($headeruser."La lunghezza della password deve essere compresa tra gli 8 e i 20 caratteri.".$tornaindietro);
	}
	$password_hash=password_hash($password, PASSWORD_BCRYPT);
	$comando="SELECT Email FROM utenti WHERE Email='$email'";
	$risultato=$connessione->query($comando);
	if($risultato==false)
	{
		echo($headeruser."<h1>Errore nell'inserimento</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	elseif($risultato->num_rows>0)
	{
		die($headeruser."Questo utente esiste già.".$tornaindietro);
	}
	$comando="INSERT INTO utenti (Nome, Cognome, Email, Password, Telefono, Tipo, Bloccato) VALUES('$nome','$cognome','$email','$password_hash','$telefono','$tipo','$bloccato')";
	$risultato=$connessione->query($comando);
	if($risultato==false)
	{
		echo($headeruser."<h1>Errore nell'inserimento</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	header('Location: ./Utenti.php');
	$connessione->close();
?>