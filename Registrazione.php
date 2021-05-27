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
	require_once("Header.php");
	$tornaindietro="&nbsp;<a href='./Registrazione.html'>Torna alla pagina di registrazione</a>";
	session_start();
	$lunghezza_password=mb_strlen($password);
	if($lunghezza_password<8||$lunghezza_password>20)
	{
		die($headerregister."La lunghezza della password deve essere compresa tra gli 8 e i 20 caratteri.".$tornaindietro);
	}
	$password_hash=password_hash($password, PASSWORD_BCRYPT);
	$comando="SELECT 'Email' FROM utenti WHERE Email='$email'";
	$risultato=$connessione->query($comando);
	if($risultato==false)
	{
		echo($headerregister."<h1>Errore nella registrazione</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	else if($risultato->num_rows>0)
	{
		die($headerregister."L'utente con questa E-mail esiste già.".$tornaindietro);
	}
	$comando="INSERT INTO utenti (Nome, Cognome, Email, Password, Telefono, Bloccato) VALUES('$nome','$cognome','$email','$password_hash','$telefono',true)";
	$risultato=$connessione->query($comando);
	if($risultato==false)
	{
		echo($headerregister."<h1>Errore nella registrazione</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	header('Location: ./Login.html');
	$connessione->close();
?>