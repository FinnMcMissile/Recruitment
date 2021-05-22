<?php
	$posizione=$_POST['idposizione'];
	$nome=$_POST['txtposizione'];
	$requisiti=$_POST['txtrequisiti'];
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	require_once("Header.php");
	$tornaindietro="&nbsp;<a href='./Posizioni.php'>Torna indietro</a>";
	session_start();
	$comando="UPDATE posizioni SET Nome_posizione='$nome', Requisiti='$requisiti' WHERE ID_posizione='$posizione'";
	$risultato=$connessione->query($comando);
	if($risultato==false)
	{
		echo($headermodify."<h1>Errore nella Modifica</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	header('Location: ./Posizioni.php');
	$connessione->close();
?>