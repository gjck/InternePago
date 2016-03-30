<?php
	session_start();

	include("fonctions_pago.php");
	testAuthentification();

	$bdd=load_localhost();

	$id_user=$_SESSION['id_user'];
	$today=getTheDate();

	$listeRestaurants=array();
	$i=0;
	$table_restaurant=getTodayEntries("Restaurant",$bdd); //On obtient les identifiants des restaurants signés aujourd'hui
	while($restaurant=$table_restaurant->fetch())
	{
		if(getPartenaireName("Restaurant",$restaurant['idPartenaire'],$id_user,$bdd)!==null)
		{
			$listeRestaurants[$i]['id']=$restaurant['idPartenaire'];
			$listeRestaurants[$i]['nom']=getPartenaireName("Restaurant",$restaurant['idPartenaire'],$id_user,$bdd);
			$i++;
		}
	}
	$table_restaurant->closeCursor();

	require("../plugin/Smarty/Smarty.class.php");

	$tpl = new Smarty();

	$tpl->assign(array(
			'listeRestaurants' => $listeRestaurants,
			'max' => $i
			));

	$tpl->display("../html/journalier_p1.html");
?>
