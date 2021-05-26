<?php
	$email=$_POST['txtemail'];
	$password=$_POST['txtpassword'];
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	require_once("Header.php");
	$tornaindietro="&nbsp;<a href='./Login.html'>Torna alla pagina di accesso</a>";
	session_start();
	$comando="SELECT Nome, Cognome, Email, Password, Bloccato, Operativo, Amministratore FROM utenti WHERE Email='$email'";
	$risultato=$connessione->query($comando);
	$riga=$risultato->fetch_assoc();
	if($risultato->num_rows<=0)
	{
		die($headerlogin."Questo utente non esiste.".$tornaindietro);
	}
	elseif(password_verify($password, $riga['Password'])===false)
	{
		die($headerlogin."La password è sbagliata.".$tornaindietro);
	}
	elseif($riga['Bloccato']==true)
	{
		die($headerlogin."Il tuo account è bloccato. Contatta l'amministratore.".$tornaindietro);
	}
	else if($riga['Operativo']==false&&$riga['Amministratore']==false)
	{
		die($headerlogin."Il tuo account non è abilitato all'accesso.".$tornaindietro);
	}
	else
	{
		$_SESSION['Utente']=$riga['Nome']." ".$riga['Cognome'];
		$_SESSION['IDsessione']=session_id();
		header('Location: ./Recruitment.php');
	}
	if($risultato==false)
	{
		echo($headerlogin."<h1>Errore nell'accesso</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
?>