<?php
	$email=$_POST['txtemail'];
	$password=$_POST['txtpassword'];
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	echo("<head><title>Accesso</title><link rel='icon' href='Immagini/Microarea-Mago.net-Logo.ico'></head>");
	$tornaindietro="&nbsp;<a href='Login.html'>Torna alla pagina di accesso</a>";
	session_start();
	$stringa_query="SELECT Nome,Cognome,Email,Password,Bloccato FROM utenti WHERE Email='$email'";
	$risultato=$connessione->query($stringa_query);
	$riga=$risultato->fetch_assoc();
	if($risultato->num_rows<=0)
	{
		die("Questo utente non esiste.".$tornaindietro);
	}
	elseif(password_verify($password, $riga['Password'])===false)
	{
		die("La password è sbagliata.".$tornaindietro);
	}
	elseif($riga['Bloccato']==true)
	{
		die("Il tuo account è bloccato. Contatta l'amministratore.".$tornaindietro);
	}
	else
	{
		$_SESSION['Utente']=$riga['Nome']." ".$riga['Cognome'];
		$_SESSION['IDsessione']=session_id();
		header('Location: Recruitment.php');
	}
	if($risultato==false)
	{
		echo("<h1>Errore nell'accesso</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
?>