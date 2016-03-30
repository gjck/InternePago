<?php
	session_start();
	
	include("fonctions_pago.php");
	
	$bdd=load_localhost();
	
	$id_user=$_SESSION['id_user'];
	$admin=getAdminStatut($id_user,$bdd);
	
	testAuthentification();
	testAdmin($admin,1);

	require("../plugin/Smarty/Smarty.class.php");
	
	$tpl = new Smarty();
	
	$i=0;
	$req = $bdd->prepare('SELECT id,edition FROM users WHERE administrateur = 2');
	$req->execute();
	
	$edition=array();
	$i=0;
	
	while($data=$req->fetch())
	{
		$edition[$i]['nom']=$data['edition'];
		$edition[$i]['id']=$data['edition'];
		$i++;
	}
	
	$req->closeCursor();
	
	$tpl->assign(array(
			'admin' => $admin,
			'edition'=>$edition
			));

	$tpl->display("../html/resultats.html");
?>

