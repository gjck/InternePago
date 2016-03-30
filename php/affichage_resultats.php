<?php
	session_start();

	include("fonctions_pago.php");

	$bdd=load_localhost();

	$id_user=$_SESSION['id_user'];

	//Si on passe par un choix (en fonction admin) ou non (en fonction utilisateur)
	if (isset($_POST['choixEdition']))
	{
		$nomEdition=$_POST['choixEdition'];
		$edition=getIdEdition($nomEdition,$bdd);
	}
	else
	{
		$edition=$id_user;
	}

	$today=getTheDate();

	$admin=getAdminStatut($id_user,$bdd);

	testAuthentification();

	//Restaurants

	$annee = date('Y');
	$mois = date('m');
	$jour = date('d');

	$listeJourneeRestaurant=array();
	$dateConforme=array();

	$j=quelJour($jour,$mois,$annee); //Position dans la semaine (0:Dimanche / Samedi:6)
	//echo $j."     ";

	$debut=$jour-$j+1; //On se positionne au lundi
	//echo $debut."     ";

	for($i=0;$i<5;$i++)
	{
		$journeeTraitee=$debut+$i;
		//echo $journeeTraitee."      ";
		$dateConforme[$i]=testConformiteDate($journeeTraitee,$mois,$annee);
		//echo $dateConforme."        ";
		$listeJourneeRestaurant[$i]=obtenirRendezVousJournée("Restaurant", $dateConforme[$i], $edition, $bdd);
	}

	// -- Liste des statut
	$listeStatutRestaurant=array();
	$tableStatutRestaurant=getAllPartenaireInfo("Restaurant",$edition,$bdd);
	$j=0;
	while($statutRestaurant=$tableStatutRestaurant->fetch())
	{
		$listeStatutRestaurant[$j]['statut']=$statutRestaurant['statut'];
		$listeStatutRestaurant[$j]['type']= writeType("Restaurant",$statutRestaurant['type']);
		$listeStatutRestaurant[$j]['nom']=$statutRestaurant['nom'];
		$listeStatutRestaurant[$j]['id']=$statutRestaurant['id'];
		$j++;
	}
	$tableStatutRestaurant->closeCursor();

	//PointDeVente

	$annee = date('Y');
	$mois = date('m');
	$jour = date('d');

	$listeJourneePointDeVente=array();
	$dateConforme=array();

	$j=quelJour($jour,$mois,$annee); //Position dans la semaine (0:Dimanche / Samedi:6)
	//echo $j."     ";

	$debut=$jour-$j+1; //On se positionne au lundi
	//echo $debut."     ";

	for($i=0;$i<5;$i++)
	{
		$journeeTraitee=$debut+$i;
		//echo $journeeTraitee."      ";
		$dateConforme[$i]=testConformiteDate($journeeTraitee,$mois,$annee);
		//echo $dateConforme."        ";
		$listeJourneePointDeVente[$i]=obtenirRendezVousJournée("PointDeVente", $dateConforme[$i], $edition, $bdd);
	}

	// -- Liste des statut
	$listeStatutPointDeVente=array();
	$tableStatutPointDeVente=getAllPartenaireInfo("PointDeVente",$edition,$bdd);
	$j=0;
	while($statutPointDeVente=$tableStatutPointDeVente->fetch())
	{
		$listeStatutPointDeVente[$j]['statut']=$statutPointDeVente['statut'];
		$listeStatutPointDeVente[$j]['type']= writeType("PointDeVente",$statutPointDeVente['type']);
		$listeStatutPointDeVente[$j]['nom']=$statutPointDeVente['nom'];
		$listeStatutPointDeVente[$j]['id']=$statutPointDeVente['id'];
		$j++;
	}
	$tableStatutPointDeVente->closeCursor();

	//Publicite

	$annee = date('Y');
	$mois = date('m');
	$jour = date('d');

	$listeJourneePublicite=array();
	$dateConforme=array();

	$j=quelJour($jour,$mois,$annee); //Position dans la semaine (0:Dimanche / Samedi:6)
	//echo $j."     ";

	$debut=$jour-$j+1; //On se positionne au lundi
	//echo $debut."     ";

	for($i=0;$i<5;$i++)
	{
		$journeeTraitee=$debut+$i;
		//echo $journeeTraitee."      ";
		$dateConforme[$i]=testConformiteDate($journeeTraitee,$mois,$annee);
		//echo $dateConforme."        ";
		$listeJourneePublicite[$i]=obtenirRendezVousJournée("Publicite", $dateConforme[$i], $edition, $bdd);
	}

	// -- Liste des statut
	$listeStatutPublicite=array();
	$tableStatutPublicite=getAllPartenaireInfo("Publicite",$edition,$bdd);
	$j=0;
	while($statutPublicite=$tableStatutPublicite->fetch())
	{
		$listeStatutPublicite[$j]['statut']=$statutPublicite['statut'];
		$listeStatutPublicite[$j]['nom']=$statutPublicite['nom'];
		$listeStatutPublicite[$j]['id']=$statutPublicite['id'];
		$j++;
	}
	$tableStatutPublicite->closeCursor();

	//Smarty

	require("../plugin/Smarty/Smarty.class.php");

	$tpl = new Smarty();

	$tpl->assign(array(
				'admin' => $admin,
				'edition' => $edition,
				'listeRestaurant'=>$listeJourneeRestaurant,
				'listeStatutRestaurant'=>$listeStatutRestaurant,
				'listePointDeVente'=>$listeJourneePointDeVente,
				'listeStatutPointDeVente'=>$listeStatutPointDeVente,
				'listePublicite'=>$listeJourneePublicite,
				'listeStatutPublicite'=>$listeStatutPublicite,
				));

	$tpl->display("../html/affichage_resultats.html");

?>
