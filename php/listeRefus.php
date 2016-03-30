<?php
	session_start();
	
	require("../plugin/Smarty/Smarty.class.php");
	$tpl = new Smarty();
	
	include("fonctions_pago.php");
			
	$bdd=load_localhost();
		
	$id_user=$_SESSION['id_user'];
	
	$id_select_user	= $_POST['edition'];
	$typePartenaire=$_POST['typePartenaire'];
	
	testAuthentification();
		
	$listeRefus=array();
	$i=0;
	$tableRefus=getAllPartenaireInfo($typePartenaire,$id_select_user,$bdd);
	while($refus=$tableRefus->fetch())
	{
		if($refus['statut']==4)
		{
			$listeRefus[$i]['nom']=$refus['nom'];
			//echo $listeRefus[$i]['nom'];
			$i++;
		}
	}
	$tableRefus->closeCursor();
		
	$tpl->assign(array(
		'listeRefus'=>$listeRefus
				));
		
	$tpl->display("../html/listeRefus.html"); 
?>