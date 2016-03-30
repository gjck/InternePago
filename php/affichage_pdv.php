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
		
	$donnee_pdv=array();
	$i=0;
	$table_pdv=getTableDataWithIdUser("nom_pdv,rdv,signe","point_de_vente",$date,$id_select_user,$bdd);
	while($pdv=$table_pdv->fetch())
	{
		$donnee_pdv[$i]['nom']=$pdv['nom_pdv'];
		$donnee_pdv[$i]['rdv']=$pdv['rdv'];
		$donnee_pdv[$i]['sgn']=$pdv['signe'];
		$i++;
	}
	$table_pdv->closeCursor();
		
	$tpl->assign(array(
		'admin' => $admin,
		'donnee_pdv'=> $donnee_pdv
				));
		
	$tpl->display("tpl/html/affichage_pdv.html"); 
?>