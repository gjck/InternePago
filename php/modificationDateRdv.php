<?php
	session_start();
	
	$id_user=$_SESSION['id_user'];
	
	$dateConsultee=$_POST['dateConsultee'];
	$idUser=$_POST['edition'];
	$idPartenaire=$_POST['idPartenaire'];
	
	testAuthentification();
	$bdd=load_localhost();
	
	//Recupérer les données -id -> nom 
	//Meme processus que reprogrammation
	
	//Smarty
	include_once("../plugin/Smarty/Smarty.class.php");
	
	$tpl = new Smarty();
	
	$tpl->assign(array(
			'admin'=>$admin
			));

	$tpl->display("../html/modificationStatutPartenaire.html");
	
?>	