<?php
	session_start();

	include("../classes/PointDeVente.class.php");
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
		$rendezVousReprogramme->setNewRdv("PointDeVente");

		unset($rendezVousReprogramme);
	}


	//Nouveaux RDV Today
	$dateToday = getTheDate();

	$maxRdvToday = htmlspecialchars($_POST['maxRdvToday']);

	for($i=1;$i<=$maxRdvToday;$i++)
	{
		$pointDeVenteToday = new PointDeVente($id_user,$bdd);

		//Récupération des données et mise à jour
		$nomPointDeVente=htmlspecialchars($_POST['nom_pdv'][$i]);
		$choix=htmlspecialchars($_POST['choix'][$i]);
		$type=htmlspecialchars($_POST['type'][$i]);

		$pointDeVenteToday -> setNom($nomPointDeVente);
		$pointDeVenteToday -> setStatut($choix);
		$pointDeVenteToday -> setType($type);
		if(testExistence($nomPointDeVente,"PointDeVente",$id_user,$bdd))
		{
			$pointDeVenteToday -> insertNewPointDeVente();
		}
		else
		{
			$idPartenaire = getPartenaireId("PointDeVente",$nomPointDeVente,$id_user,$bdd);
			$pointDeVenteToday -> setIdPartenaire($idPartenaire);
			$pointDeVenteToday -> updatePointDeVente();
		}

		unset ($pointDeVenteToday);

		$idPartenaire = getPartenaireId("PointDeVente",$nomPointDeVente,$id_user,$bdd);

		$rendezVousToday= new RendezVous($bdd);

		// ATTENTION : Peut poser problème si deux restaurants ont le même nom, avec le même utilisateur
		$rendezVousToday ->setIdPartenaire($idPartenaire);
		$rendezVousToday ->setDateRdv($dateToday);
		$rendezVousToday ->setNewRdv("PointDeVente");

		unset($rendezVousToday);
	}

	//Nouveaux rdv à venir
	$maxRdv = htmlspecialchars($_POST['maxRdv']);

	for($i=1;$i<=$maxRdv;$i++)
	{
		$nouveauPointDeVente = new PointDeVente($id_user,$bdd);

		$nom_PointDeVente = htmlspecialchars($_POST['nom_rdv_pdv'][$i]);
		$typeDis=htmlspecialchars($_POST['typeDis'][$i]);

		$nouveauPointDeVente -> setNom($nom_PointDeVente);
		$nouveauPointDeVente -> setType($typeDis);

		if(testExistence($nom_PointDeVente,"PointDeVente",$id_user,$bdd))
		{
			$nouveauPointDeVente -> insertNewPointDeVente();
		}

		unset($nouveauPointDeVente);

		$jour = htmlspecialchars($_POST['jour4'][$i]);
		$mois = htmlspecialchars($_POST['mois4'][$i]);
		$annee= htmlspecialchars($_POST['annee4'][$i]);
		$date_rdv=$annee."-".$mois."-".$jour;

		$idPartenaire = getPartenaireId("PointDeVente",$nom_PointDeVente,$id_user,$bdd);

		$newRdv = new RendezVous($bdd);

		$newRdv ->setIdPartenaire($idPartenaire);
		$newRdv ->setDateRdv($date_rdv);
		$newRdv ->setNewRdv("PointDeVente");

		unset($newRdv);
	}

	//Prise en charge des données CE
	$listePublicite=array();
	$i=0;
	$tablePublicite=getTodayEntries("Publicite",$bdd); //On obtient les identifiants des restaurants signés aujourd'hui
	while($publicite=$tablePublicite->fetch())
	{
		$listePublicite[$i]['id']=$publicite['idPartenaire'];
		$listePublicite[$i]['nom']=getPartenaireName("Publicite",$publicite['idPartenaire'],$id_user,$bdd);
		$i++;
	}
	$tablePublicite->closeCursor();


	/* Loading of SMARTY */
	require("../plugin/Smarty/Smarty.class.php");

	/* Création de l'objet SMARTY */
	$tpl = new Smarty();

	$tpl->assign(array(
			'listePublicite'=>$listePublicite
			));

	/* Affichage de la page html */
	$tpl->display("../html/journalier_p7.html");
?>
