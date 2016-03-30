<?php
	session_start();
	
	/* Inclusions fonctions et classes */
	include("../classes/ComiteEntreprise.class.php");
	include("fonctions_pago.php");
	testAuthentification();
	
	$bdd = load_localhost();
	
	$id_user=$_SESSION['id_user'];
	
	/* Recupération des variables du formulaire */
	$nb_ce=htmlspecialchars($_POST['nb_ce']);
	$nb_rdv=htmlspecialchars($_POST['nb_rdv_ce']);
	$max=htmlspecialchars($_POST['max']);
	
	/* Valeur indicielles */
	$j=0;
	$h=0;
	
	/* Tableau reprogrammation */ 
	$comiteEntrepriseReprogrammes=array();
	
	for($i=0;$i<$max;$i++)
	{
		$comiteEntrepriseTraite= new ComiteEntreprise($id_user,$bdd);
		
		$idComiteEntreprise=htmlspecialchars($_POST['id'][$i]);
		//echo htmlspecialchars($_POST['id'][$i]);
		
		//On récupère les "radios"
		$statut=htmlspecialchars($_POST['statut'][$idComiteEntreprise]);
		//echo $statut;
		
		$comiteEntrepriseTraite->setIdPartenaire($idComiteEntreprise);
		$comiteEntrepriseTraite->setStatut($statut);
		$comiteEntrepriseTraite->updateStatutComiteEntreprise();
		
		unset($comiteEntrepriseTraite);
		
		$reprogramme = getPartenaireStatut("ComiteEntreprise",$idComiteEntreprise,$id_user,$bdd);
		if($reprogramme==2)
		{
			$comiteEntrepriseReprogrammes[$j]['id'] = $idComiteEntreprise;
			$comiteEntrepriseReprogrammes[$j]['nom'] = getPartenaireName("ComiteEntreprise",$idComiteEntreprise,$id_user,$bdd);
			$j++;
		}
	}
	
	//Récupération de tous les noms partenaires
	$listeNomComiteEntreprise=array();
	$tableNomComiteEntreprise=getAllPartenaireName("ComiteEntreprise",$id_user,$bdd);
	while($nomComiteEntreprise=$tableNomComiteEntreprise->fetch())
	{
		$listeNomComiteEntreprise[$h]['nom']=$nomComiteEntreprise['nom'];
		$h++;
	}
	$tableNomComiteEntreprise->closeCursor();
	
	/* Loading of SMARTY */
	require("../plugin/Smarty/Smarty.class.php"); 

	/* Création de l'objet SMARTY */
	$tpl = new Smarty(); 
	
	/* Assignation des variables pour récupération dans le fichier html*/
	$tpl->assign(array(
			'comiteEntrepriseReprogrammes' => $comiteEntrepriseReprogrammes,
			'nb_ce' => $nb_ce,
			'nb_rdv' => $nb_rdv,
			'listeNomComiteEntreprise' => $listeNomComiteEntreprise
			));
	
	/* Affichage de la page html */
	$tpl->display("../html/journalier_p4.html");
?>