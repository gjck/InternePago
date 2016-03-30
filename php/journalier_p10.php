<?php
	session_start();

	include("fonctions_pago.php");
	testAuthentification();

	$bdd=load_localhost();

	$idUser=$_SESSION['id_user'];
	$rqs=htmlspecialchars($_POST['rqs']);

	$date=getTheDate();

	$req = $bdd->prepare('INSERT INTO commentaire(remarque, id_user, cree_le)
							  	VALUES(:remarque, :id_user, :cree_le)');
	$req->execute(array(
	   		 'remarque' => $rqs,
	   		 'id_user' => $idUser,
	   		 'cree_le' => $date
	   		 ));

	$req->closeCursor();

	//Construction du récapitulatif

	//Restaurant
	$recapRestaurant=recapitulatifEntréeDuJour("Restaurant",$idUser,$bdd);
	$recapRdvRestaurant=recapitulatifRdvDuJour("Restaurant",$idUser,$bdd);

	//PointDeVente
	$recapPointDeVente=recapitulatifEntréeDuJour("PointDeVente",$idUser,$bdd);
	$recapRdvPointDeVente=recapitulatifRdvDuJour("PointDeVente",$idUser,$bdd);

	//Publicite
	$recapPublicite=recapitulatifEntréeDuJour("Publicite",$idUser,$bdd);
	$recapRdvPublicite=recapitulatifRdvDuJour("Publicite",$idUser,$bdd);

	//Smarty
	require("../plugin/Smarty/Smarty.class.php");

	$tpl = new Smarty();

	$tpl->assign(array(
				'recapRestaurant'=>$recapRestaurant,
				'recapRdvRestaurant'=> $recapRdvRestaurant,
				'recapPointDeVente'=>$recapPointDeVente,
				'recapRdvPointDeVente'=> $recapRdvPointDeVente,
				'recapPublicite'=>$recapPublicite,
				'recapRdvPublicite'=> $recapRdvPublicite,
				));

	$tpl->display("../html/journalier_p10.html");
?>
