<?php
	session_start();

	include("../classes/Restaurant.class.php");
	include("../classes/RendezVous.class.php");
	include("fonctions_pago.php");
	testAuthentification();

	$id_user=$_SESSION['id_user'];
	$bdd=load_localhost();

	//Rendez-vous reprogrammés
	$maxReprog = htmlspecialchars($_POST['maxReprog']);

	for($i=0;$i<$maxReprog;$i++)
	{
		$rendezVousReprogramme = new RendezVous($bdd);

		//On récupère la date et on la met au bon format
		$jour=htmlspecialchars($_POST['jour2'][htmlspecialchars($_POST['RP'][$i])]);
		$mois=htmlspecialchars($_POST['mois2'][htmlspecialchars($_POST['RP'][$i])]);
		$annee=htmlspecialchars($_POST['annee2'][htmlspecialchars($_POST['RP'][$i])]);
		$date_rdv=$annee."-".$mois."-".$jour;

		//On enregistre les modifications
		// Màj ID restaurant
		$rendezVousReprogramme->setIdPartenaire(htmlspecialchars($_POST['RP'][$i]));
		// Màj Date RDV
		$rendezVousReprogramme->setDateRdv($date_rdv);

		// Enregistrement du rdv en BDD
		$rendezVousReprogramme->setNewRdv("Restaurant");

		unset($rendezVousReprogramme);
	}


	//Nouveaux RDV Today
	$dateToday = getTheDate();

	$maxRdvToday = htmlspecialchars($_POST['maxRdvToday']);

	for($i=1;$i<=$maxRdvToday;$i++)
	{
		$restaurantToday = new Restaurant($id_user,$bdd);

		//Récupération des données et mise à jour
		$nomRestaurant=htmlspecialchars($_POST['nom_res'][$i]);
		$choix=htmlspecialchars($_POST['choix'][$i]);
		//echo $choix;
		$type=htmlspecialchars($_POST['type'][$i]);
		//echo $type;

		$restaurantToday -> setNom($nomRestaurant);
		$restaurantToday -> setStatut($choix);
		$restaurantToday -> setType($type);
		//$test = testExistence($nomRestaurant,"Restaurant",$id_user,$bdd);
		//echo $test;
		if(testExistence($nomRestaurant,"Restaurant",$id_user,$bdd))
		{
			$restaurantToday -> insertNewRestaurant();
			//echo "if";
		}
		else
		{
			$idPartenaire = getPartenaireId("Restaurant",$nomRestaurant,$id_user,$bdd);
			$restaurantToday -> setIdPartenaire($idPartenaire);
			$restaurantToday -> updateRestaurant();
			//echo "else";
		}

		unset ($restaurantToday);

		$idPartenaire = getPartenaireId("Restaurant",$nomRestaurant,$id_user,$bdd);

		$rendezVousToday= new RendezVous($bdd);

		// ATTENTION : Peut poser problème si deux restaurants ont le même nom, avec le même utilisateur
		$rendezVousToday ->setIdPartenaire($idPartenaire);
		$rendezVousToday ->setDateRdv($dateToday);
		$rendezVousToday ->setNewRdv("Restaurant");

		unset($rendezVousToday);
	}

	//Nouveaux rdv à venir
	$maxRdv = htmlspecialchars($_POST['maxRdv']);

	for($i=1;$i<=$maxRdv;$i++)
	{
		$nouveauRestaurant = new Restaurant($id_user,$bdd);

		$nom_restaurant = htmlspecialchars($_POST['nom_rdv_res'][$i]);
		$typeRes = htmlspecialchars($_POST['typeRes'][$i]);

		$nouveauRestaurant -> setNom($nom_restaurant);
		$nouveauRestaurant -> setType($typeRes);

		if(testExistence($nom_restaurant,"Restaurant",$id_user,$bdd))
		{
			$nouveauRestaurant -> insertNewRestaurant();
		}

		unset($nouveauRestaurant);

		$jour = htmlspecialchars($_POST['jour4'][$i]);
		$mois = htmlspecialchars($_POST['mois4'][$i]);
		$annee= htmlspecialchars($_POST['annee4'][$i]);
		$date_rdv=$annee."-".$mois."-".$jour;

		$idPartenaire = getPartenaireId("Restaurant",$nom_restaurant,$id_user,$bdd);

		$newRdv = new RendezVous($bdd);

		$newRdv ->setIdPartenaire($idPartenaire);
		$newRdv ->setDateRdv($date_rdv);
		$newRdv ->setNewRdv("Restaurant");

		unset($newRdv);
	}

	//Prise en charge des données CE
	$listePointDeVente=array();
	$i=0;
	$tablePointDeVente=getTodayEntries("PointDeVente",$bdd);
	while($pointDeVente=$tablePointDeVente->fetch())
	{
		$listePointDeVente[$i]['id']=$pointDeVente['idPartenaire'];
		$listePointDeVente[$i]['nom']=getPartenaireName("PointDeVente",$pointDeVente['idPartenaire'],$id_user,$bdd);
		$i++;
	}
	$tablePointDeVente->closeCursor();
	
	/* Loading of SMARTY */
	require("../plugin/Smarty/Smarty.class.php");

	/* Création de l'objet SMARTY */
	$tpl = new Smarty();

	$tpl->assign(array(
			'listePointDeVente'=>$listePointDeVente
			));

	/* Affichage de la page html */
	$tpl->display("../html/journalier_p5.html");
?>
