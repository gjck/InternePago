<?php
	session_start();
	
	include("../classes/ComiteEntreprise.class.php");
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
		$rendezVousReprogramme->setNewRdv("ComiteEntreprise");
		
		unset($rendezVousReprogramme); 
	}

	
	//Nouveaux RDV Today
	$dateToday = getTheDate();
	
	$maxRdvToday = htmlspecialchars($_POST['maxRdvToday']);
	
	for($i=1;$i<=$maxRdvToday;$i++)
	{
		$comiteEntrepriseToday = new ComiteEntreprise($id_user,$bdd);
		
		//Récupération des données et mise à jour
		$nomComiteEntreprise=htmlspecialchars($_POST['nom_ce'][$i]);
		$choix=htmlspecialchars($_POST['choix'][$i]);
		
		$comiteEntrepriseToday -> setNom($nomComiteEntreprise);
		$comiteEntrepriseToday -> setStatut($choix);
		if(testExistence($nomComiteEntreprise,"ComiteEntreprise",$id_user,$bdd))
		{
			$comiteEntrepriseToday -> insertNewComiteEntreprise();
		}
		else
		{
			$idPartenaire = getPartenaireId("ComiteEntreprise",$nomComiteEntreprise,$id_user,$bdd);
			$comiteEntrepriseToday -> setIdPartenaire($idPartenaire);
			$comiteEntrepriseToday -> updateComiteEntreprise();
		}	

		unset ($comiteEntrepriseToday);
		
		$idPartenaire = getPartenaireId("ComiteEntreprise",$nomComiteEntreprise,$id_user,$bdd);
		
		$rendezVousToday= new RendezVous($bdd);
		
		// ATTENTION : Peut poser problème si deux restaurants ont le même nom, avec le même utilisateur
		$rendezVousToday ->setIdPartenaire($idPartenaire);
		$rendezVousToday ->setDateRdv($dateToday);
		$rendezVousToday ->setNewRdv("ComiteEntreprise");
		
		unset($rendezVousToday);
	}
		
	//Nouveaux rdv à venir
	$maxRdv = htmlspecialchars($_POST['maxRdv']);
	
	for($i=1;$i<=$maxRdv;$i++)
	{
		$nouveauComiteEntreprise = new ComiteEntreprise($id_user,$bdd);
		
		$nom_ComiteEntreprise = htmlspecialchars($_POST['nom_rdv_ce'][$i]);
		
		$nouveauComiteEntreprise-> setNom($nom_ComiteEntreprise);
		
		if(testExistence($nom_ComiteEntreprise,"ComiteEntreprise",$id_user,$bdd))
		{
			$nouveauComiteEntreprise -> insertNewComiteEntreprise();
		}
		
		unset($nouveauComiteEntreprise);
		
		$jour = htmlspecialchars($_POST['jour4'][$i]);
		$mois = htmlspecialchars($_POST['mois4'][$i]);
		$annee= htmlspecialchars($_POST['annee4'][$i]);
		$date_rdv=$annee."-".$mois."-".$jour;
		
		$idPartenaire = getPartenaireId("ComiteEntreprise",$nom_ComiteEntreprise,$id_user,$bdd);
		
		$newRdv = new RendezVous($bdd);
		
		$newRdv ->setIdPartenaire($idPartenaire);
		$newRdv ->setDateRdv($date_rdv);
		$newRdv ->setNewRdv("ComiteEntreprise");
		
		unset($newRdv);		
	}
	
	//Prise en charge des données CE
	$listePointDeVente=array();
	$i=0;
	$tablePointDeVente=getTodayEntries("PointDeVente",$bdd); //On obtient les identifiants des restaurants signés aujourd'hui
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