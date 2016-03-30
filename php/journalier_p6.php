<?php
	session_start();
	
	/* Inclusions fonctions et classes */
	include("../classes/PointDeVente.class.php");
	include("fonctions_pago.php");
	testAuthentification();
	
	$bdd = load_localhost();
	
	$id_user=$_SESSION['id_user'];
	
	/* Recupération des variables du formulaire */
	$nb_pdv=htmlspecialchars($_POST['nb_pdv']);
	$nb_rdv=htmlspecialchars($_POST['nb_rdv']);
	$max=htmlspecialchars($_POST['max']);
	
	/* Valeur indicielles */
	$j=0;
	$h=0;
	
	/* Tableau reprogrammation */ 
	$pointDeVenteReprogrammes=array();
	
	for($i=0;$i<$max;$i++)
	{
		$pointDeVenteTraite= new PointDeVente($id_user,$bdd);
		
		$idPointDeVente=htmlspecialchars($_POST['id'][$i]);
		
		//On récupère les "radios"
		$statut=htmlspecialchars($_POST['statut'][$idPointDeVente]);
		
		$pointDeVenteTraite->setIdPartenaire($idPointDeVente);
		$pointDeVenteTraite->setStatut($statut);
		$pointDeVenteTraite->updateStatutPointDeVente();
		
		unset($pointDeVenteTraite);
		
		$reprogramme = getPartenaireStatut("PointDeVente",$idPointDeVente,$id_user,$bdd);
		if($reprogramme==2)
		{
			$pointDeVenteReprogrammes[$j]['id'] = $idPointDeVente;
			$pointDeVenteReprogrammes[$j]['nom'] = getPartenaireName("PointDeVente",$idPointDeVente,$id_user,$bdd);
			$j++;
		}
	}
	
	//Récupération de tous les noms partenaires
	$listeNomPointDeVente=array();
	$tableNomPointDeVente=getAllPartenaireName("PointDeVente",$id_user,$bdd);
	while($nomPointDeVente=$tableNomPointDeVente->fetch())
	{
		$listeNomPointDeVente[$h]['nom']=$nomPointDeVente['nom'];
		$h++;
	}
	$tableNomPointDeVente->closeCursor();
	
	/* Loading of SMARTY */
	require("../plugin/Smarty/Smarty.class.php"); 

	/* Création de l'objet SMARTY */
	$tpl = new Smarty(); 
	
	/* Assignation des variables pour récupération dans le fichier html*/
	$tpl->assign(array(
			'pointDeVenteReprogrammes' => $pointDeVenteReprogrammes,
			'nb_pdv' => $nb_pdv,
			'nb_rdv' => $nb_rdv,
			'listeNomPointDeVente' => $listeNomPointDeVente
			));
	
	/* Affichage de la page html */
	$tpl->display("../html/journalier_p6.html");
?>