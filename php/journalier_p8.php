<?php
	session_start();
	
	/* Inclusions fonctions et classes */
	include("../classes/Publicite.class.php");
	include("fonctions_pago.php");
	testAuthentification();
	
	$bdd = load_localhost();
	
	$id_user=$_SESSION['id_user'];
	
	/* Recupération des variables du formulaire */
	$nb_pub=htmlspecialchars($_POST['nb_pub']);
	$nb_rdv=htmlspecialchars($_POST['nb_rdv']);
	$max=htmlspecialchars($_POST['max']);
	
	/* Valeur indicielles */
	$j=0;
	$h=0;
	
	/* Tableau reprogrammation */ 
	$publiciteReprogrammes=array();
	
	for($i=0;$i<$max;$i++)
	{
		$publiciteTraite= new Publicite($id_user,$bdd);
		
		$idPublicite=htmlspecialchars($_POST['id'][$i]);
		
		//On récupère les "radios"
		$statut=htmlspecialchars($_POST['statut'][$idPublicite]);
		
		$publiciteTraite->setIdPartenaire($idPublicite);
		$publiciteTraite->setStatut($statut);
		$publiciteTraite->updateStatutPublicite();
		
		unset($publiciteTraite);
		
		$reprogramme = getPartenaireStatut("Publicite",$idPublicite,$id_user,$bdd);
		if($reprogramme==2)
		{
			$publiciteReprogrammes[$j]['id'] = $idPublicite;
			$publiciteReprogrammes[$j]['nom'] = getPartenaireName("Publicite",$idPublicite,$id_user,$bdd);
			$j++;
		}
	}
	
	//Récupération de tous les noms partenaires
	$listeNomPublicite=array();
	$tableNomPublicite=getAllPartenaireName("Publicite",$id_user,$bdd);
	while($nomPublicite=$tableNomPublicite->fetch())
	{
		$listeNomPublicite[$h]['nom']=$nomPublicite['nom'];
		$h++;
	}
	$tableNomPublicite->closeCursor();
	
	/* Loading of SMARTY */
	require("../plugin/Smarty/Smarty.class.php"); 

	/* Création de l'objet SMARTY */
	$tpl = new Smarty(); 
	
	/* Assignation des variables pour récupération dans le fichier html*/
	$tpl->assign(array(
			'publiciteReprogrammes' => $publiciteReprogrammes,
			'nb_pub' => $nb_pub,
			'nb_rdv' => $nb_rdv,
			'listeNomPublicite' => $listeNomPublicite
			));
	
	/* Affichage de la page html */
	$tpl->display("../html/journalier_p8.html");
?>