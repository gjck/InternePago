<?php
	session_start();
	
	/* Inclusions fonctions et classes */
	include("../classes/Restaurant.class.php");
	include("fonctions_pago.php");
	testAuthentification();
	
	$bdd = load_localhost();
	
	$id_user=$_SESSION['id_user'];
	
	/* Recupération des variables du formulaire */
	$nb_restaurateurs=htmlspecialchars($_POST['nb_restaurateurs']);
	$nb_rdv=htmlspecialchars($_POST['nb_rdv']);
	$max=htmlspecialchars($_POST['max']);
	
	/* Valeur indicielles */
	$j=0;
	$h=0;
	
	/* Tableau reprogrammation */ 
	$restaurantsReprogrammes=array();
	
	for($i=0;$i<$max;$i++)
	{
		$restaurantTraite= new Restaurant($id_user,$bdd);
		
		$idRestaurant=htmlspecialchars($_POST['id'][$i]);
		//echo htmlspecialchars($_POST['id'][$i]);
		
		//On récupère les "radios"
		$statut=htmlspecialchars($_POST['statut'][$idRestaurant]);
		//echo $statut;
		
		$restaurantTraite->setIdPartenaire($idRestaurant);
		$restaurantTraite->setStatut($statut);
		$restaurantTraite->updateStatutRestaurant();
		
		unset($restaurantTraite);
		
		$reprogramme = getPartenaireStatut("Restaurant",$idRestaurant,$id_user,$bdd);
		if($reprogramme==2)
		{
			$restaurantsReprogrammes[$j]['id'] = $idRestaurant;
			$restaurantsReprogrammes[$j]['nom'] = getPartenaireName("Restaurant",$idRestaurant,$id_user,$bdd);
			$j++;
		}
	}
	
	//Récupération de tous les noms partenaires
	$listeNomRestaurant=array();
	$tableNomRestaurants=getAllPartenaireName("Restaurant",$id_user,$bdd);
	while($nomRestaurants=$tableNomRestaurants->fetch())
	{
		$listeNomRestaurants[$h]['nom']=$nomRestaurants['nom'];
		$h++;
	}
	$tableNomRestaurants->closeCursor();
	
	/* Loading of SMARTY */
	require("../plugin/Smarty/Smarty.class.php"); 

	/* Création de l'objet SMARTY */
	$tpl = new Smarty(); 
	
	/* Assignation des variables pour récupération dans le fichier html*/
	$tpl->assign(array(
			'restaurantsReprogrammes' => $restaurantsReprogrammes,
			'nb_restaurateurs' => $nb_restaurateurs,
			'nb_rdv' => $nb_rdv,
			'listeNomRestaurants' => $listeNomRestaurants
			));
	
	/* Affichage de la page html */
	$tpl->display("../html/journalier_p2.html");
?>