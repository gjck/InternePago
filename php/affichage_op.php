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
		
	$donnee_op=array();
	$i=0;
	$table_op=getTableDataWithIdUser("nom_op,rdv,signe","publicite",$date,$id_select_user,$bdd);
	while($op=$table_op->fetch())
	{
		$donnee_op[$i]['nom']=$op['nom_op'];
		$donnee_op[$i]['rdv']=$op['rdv'];
		$donnee_op[$i]['sgn']=$op['signe'];
		$i++;
	}
	$table_op->closeCursor();
		
	$tpl->assign(array(
		'admin' => $admin,
		'donnee_op'=> $donnee_op
				));
		
	$tpl->display("tpl/html/affichage_op.html"); 
?>