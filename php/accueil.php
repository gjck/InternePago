<?php
	$booleen=0;
	
	session_start();
	
	include("fonctions_pago.php");
	require("../plugin/Smarty/Smarty.class.php");
	
	testAuthentification();
	
	$bdd=load_localhost();
	
	$id_user=$_SESSION['id_user'];
	$admin=getAdminStatut($id_user,$bdd);
	$booleen=compareTodayToLastRapport($id_user,$bdd);
	
	$tpl = new Smarty();

	$tpl->assign(array(
			'admin' => $admin,
			'id_user' => $id_user,
			'booleen' => $booleen));

	$tpl->display("../html/accueil.html");
?>

