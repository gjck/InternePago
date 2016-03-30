<?php
	session_start();
	
	include("fonctions_pago.php");
	
	$password = htmlspecialchars($_POST['password']);
	$pseudo= htmlspecialchars($_POST['pseudo']);

	$bdd=load_localhost();

	$req = $bdd->prepare('SELECT id FROM users WHERE pseudo = :pseudo AND password = :password');
	$req->execute(array(
			'pseudo' => $pseudo,
			'password' => $password));

	$resultat = $req->fetch();

	if (!$resultat)
	{
		header('Location: ../html/id_invalides.html');
		exit();
	}
	else
	{
		$_SESSION['id_user']=$resultat['id'];
		header('Location: accueil.php');
	}
?>