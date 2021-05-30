<?php
	$posizione=$_POST['txtposizione'];
	$requisiti=$_POST['txtrequisiti'];
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	require_once("Header.php");
	$tornaindietro="&nbsp;<a href='./Nuova_posizione.php'>Torna alla pagina di inserimento</a>";
	session_start();
	$comando="SELECT Nome_posizione FROM posizioni WHERE Nome_posizione='$posizione'";
	$risultato=$connessione->query($comando);
	if($risultato==false)
	{
		echo($headerposition."<h1>Errore nell'inserimento</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	elseif($risultato->num_rows>0)
	{
		die($headerposition."Questa posizione esiste già.".$tornaindietro);
	}
	$comando="INSERT INTO posizioni (Nome_posizione, Requisiti) VALUES('$posizione','$requisiti')";
	$risultato=$connessione->query($comando);
	if($risultato==false)
	{
		echo($headerposition."<h1>Errore nell'inserimento</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	header('Location: ./Posizioni.php');
	$connessione->close();
?>