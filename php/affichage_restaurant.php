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
		
	$donnee_restaurant=array();
	$i=0;
	$table_restaurant=getTableDataWithIdUser("nom_restaurant,rdv,signe","restaurants",$date,$id_select_user,$bdd);
	$table_restaurant=getTableData5Days($nom_colonne,$nom_table,$nom_condition,$condition,$bdd);
	while($restaurant=$table_restaurant->fetch())
	{
		$donnee_restaurant[$i]['nom']=$restaurant['nom_restaurant'];
		$donnee_restaurant[$i]['rdv']=$restaurant['rdv'];
		$donnee_restaurant[$i]['sgn']=$restaurant['signe'];
		$i++;
	}
	$table_restaurant->closeCursor();
		
	$tpl->assign(array(
		'admin' => $admin,
		'donnee_restaurant'=> $donnee_restaurant
				));
		
	$tpl->display("tpl/html/affichage_restaurant.html"); 
?>