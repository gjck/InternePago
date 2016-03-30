<?php
	session_start();
	
	require("tpl/Smarty.class.php");
	$tpl = new Smarty();
	
	include("fonctions_pago.php");
			
	$bdd=load_localhost();
		
	$id_user=$_SESSION['id_user'];
	
	$id_select_user	= $_POST['id_select_user'];
	$date=$_POST['date'];
	$admin=$_POST['admin'];
	
	testAuthentification();
	testAdmin($admin,1);
		
	$donnee_ce=array();
	$i=0;
	$table_ce=getTableDataWithIdUser("nom_ce,rdv,signe","comite_entreprise",$date,$id_select_user,$bdd);
	while($ce=$table_ce->fetch())
	{
		$donnee_ce[$i]['nom']=$ce['nom_ce'];
		$donnee_ce[$i]['rdv']=$ce['rdv'];
		$donnee_ce[$i]['sgn']=$ce['signe'];
		$i++;
	}
	$table_ce->closeCursor();
		
	$tpl->assign(array(
		'admin' => $admin,
		'donnee_ce'=> $donnee_ce
				));
		
	$tpl->display("tpl/html/affichage_ce.html"); 
?>