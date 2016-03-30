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
		
	$donnee_rqs=array();
	$i=0;
	$table_rqs=getTableDataWithIdUser("remarque,date","commentaire",$date,$id_select_user,$bdd);
	while($rqs=$table_rqs->fetch())
	{
		$donnee_rqs[$i]['rqs']=$rqs['remarque'];
		$donnee_rqs[$i]['date']=$rqs['date'];
		$i++;
	}
	$table_rqs->closeCursor();
		
	$tpl->assign(array(
		'admin' => $admin,
		'donnee_rqs'=> $donnee_rqs
				));
		
	$tpl->display("tpl/html/affichage_rqs.html"); 
?>