<?php
	session_start();
	
	include("../classes/Publicite.class.php");
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
		$rendezVousReprogramme->setNewRdv("Publicite");
		
		unset($rendezVousReprogramme); 
	}

	
	//Nouveaux RDV Today
	$dateToday = getTheDate();
	
	$maxRdvToday = htmlspecialchars($_POST['maxRdvToday']);
	
	for($i=1;$i<=$maxRdvToday;$i++)
	{
		$publiciteToday = new Publicite($id_user,$bdd);
		
		//Récupération des données et mise à jour
		$nomPublicite=htmlspecialchars($_POST['nom_pub'][$i]);
		$choix=htmlspecialchars($_POST['choix'][$i]);
		
		$publiciteToday -> setNom($nomPublicite);
		$publiciteToday -> setStatut($choix);
		if(testExistence($nomPublicite,"Publicite",$id_user,$bdd))
		{
			$publiciteToday -> insertNewPublicite();
		}
		else
		{
			$idPartenaire = getPartenaireId("Publicite",$nomPublicite,$id_user,$bdd);
			$publiciteToday -> setIdPartenaire($idPartenaire);
			$publiciteToday -> updatePublicite();
		}	

		unset ($publiciteToday);
		
		$idPartenaire = getPartenaireId("Publicite",$nomPublicite,$id_user,$bdd);
		
		$rendezVousToday= new RendezVous($bdd);
		
		// ATTENTION : Peut poser problème si deux restaurants ont le même nom, avec le même utilisateur
		$rendezVousToday ->setIdPartenaire($idPartenaire);
		$rendezVousToday ->setDateRdv($dateToday);
		$rendezVousToday ->setNewRdv("Publicite");
		
		unset($rendezVousToday);
	}
		
	//Nouveaux rdv à venir
	$maxRdv = htmlspecialchars($_POST['maxRdv']);
	
	for($i=1;$i<=$maxRdv;$i++)
	{
		$nouveauPublicite = new Publicite($id_user,$bdd);
		
		$nom_Publicite = htmlspecialchars($_POST['nom_rdv_pub'][$i]);
		
		$nouveauPublicite-> setNom($nom_Publicite);
		
		if(testExistence($nom_Publicite,"Publicite",$id_user,$bdd))
		{
			$nouveauPublicite -> insertNewPublicite();
		}
		
		unset($nouveauPublicite);
		
		$jour = htmlspecialchars($_POST['jour4'][$i]);
		$mois = htmlspecialchars($_POST['mois4'][$i]);
		$annee= htmlspecialchars($_POST['annee4'][$i]);
		$date_rdv=$annee."-".$mois."-".$jour;
		
		$idPartenaire = getPartenaireId("Publicite",$nom_Publicite,$id_user,$bdd);
		
		$newRdv = new RendezVous($bdd);
		
		$newRdv ->setIdPartenaire($idPartenaire);
		$newRdv ->setDateRdv($date_rdv);
		$newRdv ->setNewRdv("Publicite");
		
		unset($newRdv);		
	}
	
	/* Loading of SMARTY */
	require("../plugin/Smarty/Smarty.class.php"); 

	/* Création de l'objet SMARTY */
	$tpl = new Smarty(); 
	
	/* Affichage de la page html */
	$tpl->display("../html/journalier_p9.html");
?>