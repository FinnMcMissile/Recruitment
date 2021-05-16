<?php
	$nome=$_POST['txtnome'];
	$cognome=$_POST['txtcognome'];
	$email=$_POST['txtemail'];
	$password=$_POST['txtpassword'];
	$telefono=$_POST['numtelefono'];
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	echo("<head><title>Registrazione</title><link rel='icon' href='Immagini/Microarea-Mago.net-Logo.ico'></head>");
	require_once("Header.php");
	$tornaindietro="&nbsp;<a href='./Registrazione.html'>Torna alla pagina di registrazione</a>";
	session_start();
	$lunghezza_password=mb_strlen($password);
	if($lunghezza_password<8||$lunghezza_password>20)
	{
		die($headerregister."La lunghezza della password deve essere compresa tra gli 8 e i 20 caratteri.".$tornaindietro);
	}
	$password_hash=password_hash($password, PASSWORD_BCRYPT);
	$stringa_query="SELECT 'Email' FROM utenti WHERE Email='$email'";
	$risultato=$connessione->query($stringa_query);
	if($risultato==false)
	{
		echo($headerregister."<h1>Errore nella registrazione</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	else if($risultato->num_rows>0)
	{
		die($headerregister."L'utente con questa E-mail esiste già.".$tornaindietro);
	}
	if(substr($telefono, 0, 3)!=='+39')
	{
		$telefono=('+39 '.$telefono);
	}
	$stringa_query="INSERT INTO utenti (Nome, Cognome, Email, Password, Telefono, Bloccato) VALUES('$nome','$cognome','$email','$password_hash','$telefono',true)";
	$risultato=$connessione->query($stringa_query);
	if($risultato==false)
	{
		echo($headerregister."<h1>Errore nella registrazione</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	header('Location: ./Login.html');
	$connessione->close();
?>