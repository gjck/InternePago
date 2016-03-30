<?php
	session_start();
	
	$id_user=$_SESSION['id_user'];
	
	$typePartenaire=$_POST['typePartenaire'];
	$idUser=$_POST['edition'];
	$idPartenaire=$_POST['idPartenaire'];
	$nouveauStatut=$_POST['nouveauStatut'];
	
	include("../classes/Restaurant.class.php");
	include("../classes/PointDeVente.class.php");
	include("../classes/ComiteEntreprise.class.php");
	include("../classes/Publicite.class.php");
	include("fonctions_pago.php");
	
	testAuthentification();
	$bdd=load_localhost();
	
	$admin=getAdminStatut($id_user,$bdd);
	
	//echo $idUser;
	//echo $idPartenaire;
	//echo $nouveauStatut;
	
	switch($typePartenaire)
	{
		case "Restaurant" :
			$restaurant = new Restaurant($idUser,$bdd);
			$restaurant->setIdPartenaire($idPartenaire);
			$restaurant->setStatut($nouveauStatut);
			$restaurant->updateStatutRestaurant();
			unset($restaurant);
		break;
		
		case "PointDeVente" :
			$pointDeVente = new PointDeVente($idUser,$bdd);
			$pointDeVente->setIdPartenaire($idPartenaire);
			$pointDeVente->setStatut($nouveauStatut);
			$pointDeVente->updateStatutPointDeVente();
			unset($pointDeVente);
		break;
		
		case "ComiteEntreprise" :
			$comiteEntreprise = new ComiteEntreprise($idUser,$bdd);
			$comiteEntreprise->setIdPartenaire($idPartenaire);
			$comiteEntreprise->setStatut($nouveauStatut);
			$comiteEntreprise->updateStatutComiteEntreprise();
			unset($comiteEntreprise); 
		break;
		
		case "Publicite" :
			$publicite = new Publicite($idUser,$bdd);
			$publicite->setIdPartenaire($idPartenaire);
			$publicite->setStatut($nouveauStatut);
			$publicite->updateStatutPublicite();
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