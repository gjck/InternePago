<?php
	session_start();

	$id_user=$_SESSION['id_user'];

	$typePartenaire=$_POST['typePartenaire'];
	$idUser=$_POST['edition'];
	$idPartenaire=$_POST['idPartenaire'];
	$nouveauType=$_POST['nouveauType'];

	include("../classes/Restaurant.class.php");
	include("../classes/PointDeVente.class.php");
	include("../classes/ComiteEntreprise.class.php");
	include("../classes/Publicite.class.php");
	include("fonctions_pago.php");

	testAuthentification();
	$bdd=load_localhost();

	$admin=getAdminStatut($id_user,$bdd);

	switch($typePartenaire)
	{
		case "Restaurant" :
			$restaurant = new Restaurant($idUser,$bdd);
			$restaurant->setIdPartenaire($idPartenaire);
			$restaurant->setType($nouveauType);
			$restaurant->updateTypeRestaurant();
			unset($restaurant);
		break;

		case "PointDeVente" :
			$pointDeVente = new PointDeVente($idUser,$bdd);
			$pointDeVente->setIdPartenaire($idPartenaire);
			$pointDeVente->setType($nouveauType);
			$pointDeVente->updateTypePointDeVente();
			unset($pointDeVente);
		break;

		case "Publicite" :
			$publicite = new Publicite($idUser,$bdd);
			$publicite->setIdPartenaire($idPartenaire);
			$publicite->setType($nouveauType);
			unset($publicite);
		break;

		default:
			echo "ERREUR";
			exit();
		break;
	}

	//Smarty
	include_once("../plugin/Smarty/Smarty.class.php");

	$tpl = new Smarty();

	$tpl->assign(array(
			'admin'=>$admin
			));

	$tpl->display("../html/modificationStatutPartenaire.html");
?>
