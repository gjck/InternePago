<?php
	session_start();
	
	include("fonctions_pago.php");
	require("tpl/Smarty.class.php");
	
	$bdd=load_localhost();
	
	$id_user=$_SESSION['id_user'];
	$admin=getAdminStatut($id_user,$bdd);
	
	testAuthentification();
	testAdmin($admin,0);
	
	$tpl = new Smarty();

	$tpl->assign(array(
			'admin' => $admin
			));

	$tpl->display("tpl/html/administration.html");
?>

