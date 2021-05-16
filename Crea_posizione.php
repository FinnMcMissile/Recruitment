<?php
	$posizione=$_POST['txtposizione'];
	$requisiti=$_POST['txtrequisiti'];
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	echo("<head><title>Registrazione</title><link rel='icon' href='Immagini/Microarea-Mago.net-Logo.ico'></head>");
	require_once("Header.php");
	$tornaindietro="&nbsp;<a href='./Posizioni.php'>Torna alla pagina di inserimento</a>";
	session_start();
	$stringa_query="SELECT 'Nome_posizione' FROM posizioni WHERE Nome_posizione='$posizione'";
	$risultato=$connessione->query($stringa_query);
	if($risultato==false)
	{
		echo($headercreate."<h1>Errore nell'inserimento</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	else if($risultato->num_rows>0)
	{
		die($headercreate2."Questa posizione esiste già.".$tornaindietro);
	}
	$stringa_query="INSERT INTO posizioni (Nome_posizione, Requisiti) VALUES('$posizione','$requisiti')";
	$risultato=$connessione->query($stringa_query);
	if($risultato==false)
	{
		echo($headercreate."<h1>Errore nell'inserimento</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	header('Location: ./Posizioni.php');
	$connessione->close();
?>