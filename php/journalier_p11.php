<?php
	session_start();
	$idUser=$_SESSION['id_user'];
	
	include("fonctions_pago.php");
	testAuthentification();
	
	$bdd=load_localhost();
	
	$date=getTheDate();
	
	$req = $bdd->prepare('UPDATE users SET last_rapport = :last_rapport WHERE id = :id_user');
	$req->execute(array(
	'last_rapport'=>$date,
	'id_user'=>$idUser
	));	
	
	header('Location: accueil.php');
?>