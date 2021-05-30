<?php
	$colloquio=$_POST['idcolloquio'];
	$esito=$_POST['esito'];
	$note=$_POST['txtnote'];
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	require_once("Header.php");
	$tornaindietro="&nbsp;<a href='./Esito_colloquio.php'>Torna indietro</a>";
	session_start();
	$comando="UPDATE colloqui SET Esito='$esito', Note='$note' WHERE ID_colloquio='$colloquio'";
	$risultato=$connessione->query($comando);
	if($risultato==false)
	{
		echo($headerintres."<h1>Errore nella modifica</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	header('Location: ./Colloqui.php');
	$connessione->close();
?>