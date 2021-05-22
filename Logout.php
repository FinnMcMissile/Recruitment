<?php
	session_start();
	if(isset($_SESSION['IDsessione']))
	{
		unset($_SESSION['IDsessione']);
		session_destroy();
	}
	header('Location: ./Login.html');
?>