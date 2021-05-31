<?php
	$candidato=$_POST['idcandidato'];
	$nome=$_POST['txtnome'];
	$cognome=$_POST['txtcognome'];
	$telefono=$_POST['numtelefono'];
	$email=$_POST['txtemail'];
	if($_POST['cvnewfile']!="")
	{
		$cv=str_replace("'","\'",$_POST['cvnewfile']);
	}
	else
	{
		$cv=str_replace("'","\'",$_POST['cvfilename']);
	}
	$occupazione=$_POST['sceltaoccupazione'];
	$posizione=$_POST['sceltaposizione'];
	$tipocontratto=$_POST['txtcontratto'];
	$livello=$_POST['numlivello'];
	$ral=$_POST['numral'];
	$stato=$_POST['sceltastato'];
	$connessione=new mysqli('localhost','root','','db-azienda_sviluppo_software');
	if(mysqli_connect_errno())
	{
		die("<h1>Errore in MySQL o in phpMyAdmin</h1>");
	}
	require_once("Header.php");
	$tornaindietro="&nbsp;<a href='./Lista_candidati.php'>Torna indietro</a>";
	session_start();
	if(substr(strtolower($cv), -4)!=".pdf")
	{
		die($headerappmodify."Il CV deve essere in formato PDF.".$tornaindietro);
	}
	$comando="UPDATE candidati SET Nome='$nome', Cognome='$cognome', Telefono='$telefono', Email='$email', CV='$cv', Occupazione='$occupazione', Tipo_contratto='$tipocontratto', Livello='$livello', RAL='$ral', Stato='$stato' WHERE ID_candidato='$candidato'";
	$risultato=$connessione->query($comando);
	if($risultato==false)
	{
		echo($headerappmodify."<h1>Errore nella modifica</h1>");
		die("Qualcosa è andato storto.".$tornaindietro);
	}
	header('Location: ./Lista_candidati.php');
	$connessione->close();
?>