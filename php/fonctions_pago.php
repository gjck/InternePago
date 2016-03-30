<?php
function load_BDD($nom_hote, $nom_BDD, $login, $password)
{
	try
	{
		$bdd=new PDO('mysql:host='.$nom_hote.';dbname='.$nom_BDD.'',''.$login.'',''.$password.'', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
	}
	catch(Exception $e)
	{
		die('Erreur :' .$e -> getMessage());
	}

	return $bdd;
}

//connexion BDD locale
function load_localhost()
{
	$bdd=load_BDD("localhost","PAGO","root","root");
	return $bdd;
}

function load_online_BDD()
{
	//$bdd=load_BDD();
	//return $bdd;
}

function load_pago()
{
	$bdd=load_BDD("db607310662.db.1and1.com","db607310662","dbo607310662","Pago34?");
	return $bdd;
}

//Fonctions de bases
function testAuthentification()
{
	if(!isset($_SESSION['id_user']))
	{
   		header('Location: ../html/id_invalides.html');
   		exit();
	}
}

function testAdmin($admin,$niveau_administration)
{
	if($admin>$niveau_administration)
	{
   		header('Location: tpl/html/id_invalides.html');
   		exit();
	}
}

function getAdminStatut($id_user,$bdd)
{
	$req = $bdd->prepare('SELECT administrateur FROM users WHERE id = :id_user');
	$req->execute(array(
			'id_user' => $id_user));

	$resultat = $req->fetch();

	$req->closeCursor();

	return $administrateur=$resultat['administrateur'];
}

function getIdEdition($nomEdition,$bdd)
{
	$req = $bdd->prepare('SELECT id FROM users WHERE edition = :edition');
	$req->execute(array(
			'edition' => $nomEdition));

	$resultat = $req->fetch();

	$req->closeCursor();

	return $id=$resultat['id'];
}

function getTheDate()
{
	$annee = date('Y');
	$mois = date('m');
	$jour = date('d');

	/* Format SQL : DATE / Forme : YYYY-MM-JJ */
	$date= $annee."-".$mois."-".$jour;

	return $date;
}

//Fonctions de test
function testExistence($nomTeste,$typePartenaire,$idUser,$bdd) //Partenaire
{
	$name_Exist = $bdd->prepare('SELECT nom FROM '.$typePartenaire.' WHERE nom = :nom AND idUser=:idUser');
	//On recupère les noms de la bdd ou les noms son egal au nom passé par le formulaire
	$name_Exist->bindValue('nom', $nomTeste, PDO::PARAM_STR); //Association de la var testée
	$name_Exist->bindValue('idUser', $idUser);
	$name_Exist->execute();

	$nameINbdd = $name_Exist->rowCount();
	//Rowcount permet de sortir le nombre de valeur que t'as requête renvoi, que l'on rentre dans la variable pseudoINbdd (ou autre )

	if($nameINbdd == 0) //Si la requête renvoi 0, le pseudo n'existe pas dans la base, sinon le pseudo existe.
	{
		return 1;
	}
	else
	{
		return 0;
	}
}

function testExistenceRdv($typePartenaire,$idPartenaire,$dateRdv,$bdd) //Rdv
{
	$rdv_Exist = $bdd->prepare('SELECT id FROM rdv'.$typePartenaire.' WHERE idPartenaire = :idPartenaire AND dateRdv=:dateRdv');
	//On recupère les noms de la bdd ou les noms son egal au nom passé par le formulaire
	$rdv_Exist->bindValue('idPartenaire', $idPartenaire, PDO::PARAM_STR); //Association de la var testée
	$rdv_Exist->bindValue('dateRdv', $dateRdv);
	$rdv_Exist->execute();

	$rdvINbdd = $rdv_Exist->rowCount();
	//Rowcount permet de sortir le nombre de valeur que t'as requête renvoi, que l'on rentre dans la variable pseudoINbdd (ou autre )

	if($rdvINbdd == 0) //Si la requête renvoi 0, le rdv n'existe pas dans la base, sinon le pseudo existe.
	{
		return 1;
	}
	else
	{
		return 0;
	}
}

//Fonctions de gestion des base de données
function getTableData($nom_colonne,$nom_table,$nom_condition,$condition,$bdd)
{
	$req = $bdd->prepare('SELECT '.$nom_colonne.' FROM '.$nom_table.' WHERE '.$nom_condition.' = :condition');
	$req->execute(array(
			'condition' => $condition));

	return $req;
}

//Fonctions utilisées pour le formulaire
// On récupère les identifiants des partenaires (restaurants, ce, pdv ou pub) qui ont été prévus pour la journée
function getTodayEntries($typePartenaire,$bdd)
{
	$date=getTheDate();

	$req = $bdd->prepare('SELECT idPartenaire FROM rdv'.$typePartenaire.' WHERE dateRdv=:date');
	$req->execute(array(
			'date'=> $date));

	return $req;
}

function getPartenaireName($typePartenaire,$idPartenaire,$idUser,$bdd)
{
	$req = $bdd->prepare('SELECT nom FROM '.$typePartenaire.' WHERE id=:idPartenaire AND idUser=:idUser');
	$req->execute(array(
			'idPartenaire'=>$idPartenaire,
			'idUser'=>$idUser));
	while($partenaire=$req->fetch())
	{
		$nom=$partenaire['nom'];
	}
	$req->closeCursor();

	if(isset($nom))
	{
		return $nom;
	}
}

function getAllPartenaireName($typePartenaire,$idUser,$bdd)
{
	$req = $bdd->prepare('SELECT nom FROM '.$typePartenaire.' WHERE idUser=:idUser');
	$req->execute(array(
			'idUser'=>$idUser));
	return $req;
}

function getAllPartenaireInfo($typePartenaire,$idUser,$bdd)
{
	$req = $bdd->prepare('SELECT id,nom,statut,type FROM '.$typePartenaire.' WHERE idUser=:idUser');
	$req->execute(array(
			'idUser'=>$idUser));
	return $req;
}

function getPartenaireStatut($typePartenaire,$idPartenaire,$idUser,$bdd)
{
	$req = $bdd->prepare('SELECT statut FROM '.$typePartenaire.' WHERE id=:idPartenaire AND idUser=:idUser');
	$req->execute(array(
			'idPartenaire'=>$idPartenaire,
			'idUser'=>$idUser));
	while($partenaire=$req->fetch())
	{
		$statut=$partenaire['statut'];
	}
	$req->closeCursor();

	return $statut;
}

function writeType($typePartenaire,$typeRecu)
{
	if($typePartenaire=="Restaurant")
	{
		switch($typeRecu)
		{
			case 1 :
			$type="Restaurant";
			break;

			case 2 :
			$type="Hôtel";
			break;

			case 3 :
			$type="Caviste";
			break;

			case 4 :
			$type="Beauté / Spa";
			break;

			case 5 :
			$type="Loisirs";
			break;

			default :
			$type="Autre";
			break;
		}
	}
	else if($typePartenaire=="PointDeVente")
	{
		switch($typeRecu)
		{
			case 1 :
			$type="Comité d'entreprise";
			break;

			case 2 :
			$type="Point de vente";
			break;

			default :
			$type="Autre";
			break;
		}
	}
	else if($typePartenaire=="Publicite")
	{
			$type="Organisme publicitaire";
	}
	else
	{
			$type="Autre";
	}

	return $type;
}

function getPartenaireId($typePartenaire,$nomPartenaire,$idUser,$bdd)
{
	$req = $bdd->prepare('SELECT id FROM '.$typePartenaire.' WHERE nom=:nomPartenaire AND idUser=:idUser');
	$req->execute(array(
			'nomPartenaire'=>$nomPartenaire,
			'idUser'=>$idUser));
	while($partenaire=$req->fetch())
	{
		$id=$partenaire['id'];
	}
	$req->closeCursor();

	return $id;
}

//Fonction utilisées pour la page de récapitulatif du raport quotidien
function recapitulatifEntréeDuJour($typePartenaire,$idUser,$bdd)
{
	$date=getTheDate();

	$req = $bdd->prepare('SELECT nom,statut,type FROM '.$typePartenaire.' WHERE (cree_le=:date OR modifie_le=:date) AND idUser=:idUser');
	$req->execute(array(
			'date'=> $date,
			'idUser' => $idUser
			));

	$listeRecapPartenaire=array();
	$i=0;

	while($partenaire=$req->fetch())
	{
		$listeRecapPartenaire[$i]['nom']=$partenaire['nom'];

		switch($partenaire['statut'])
		{
			case 1 :
			$listeRecapPartenaire[$i]['statut']="Signé";
			break;

			case 2 :
			$listeRecapPartenaire[$i]['statut']="Reprogrammé";
			break;

			case 3 :
			$listeRecapPartenaire[$i]['statut']="Non rencontré";
			break;

			case 4 :
			$listeRecapPartenaire[$i]['statut']="Refus définitif";
			break;

			case 5 :
			$listeRecapPartenaire[$i]['statut']="En attente de réponse";
			break;

			default :
			$listeRecapPartenaire[$i]['statut']="N/A";
			break;
		}

		if($typePartenaire=="Restaurant")
		{
			switch($partenaire['type'])
			{
				case 1 :
				$listeRecapPartenaire[$i]['type']="Restaurant";
				break;

				case 2 :
				$listeRecapPartenaire[$i]['type']="Hôtel";
				break;

				case 3 :
				$listeRecapPartenaire[$i]['type']="Caviste";
				break;

				case 4 :
				$listeRecapPartenaire[$i]['type']="Beauté / Spa";
				break;

				case 5 :
				$listeRecapPartenaire[$i]['type']="Loisirs";
				break;

				default :
				$listeRecapPartenaire[$i]['type']="Autre";
				break;
			}
		}
		else if($typePartenaire=="PointDeVente")
		{
			switch($partenaire['type'])
			{
				case 1 :
				$listeRecapPartenaire[$i]['type']="Comité d'entreprise";
				break;

				case 2 :
				$listeRecapPartenaire[$i]['type']="Point de vente";
				break;

				default :
				$listeRecapPartenaire[$i]['type']="Autre";
				break;
			}
		}
		else if($typePartenaire=="Publicite")
		{
				$listeRecapPartenaire[$i]['type']="Organisme publicitaire";
		}
		else
		{
				$listeRecapPartenaire[$i]['type']="Autre";
		}

		$i++;
	}

	$req->closeCursor();

	return $listeRecapPartenaire;
}

function recapitulatifRdvDuJour($typePartenaire,$idUser,$bdd)
{
	$date=getTheDate();

	$req = $bdd->prepare('SELECT idPartenaire,dateRdv FROM rdv'.$typePartenaire.' WHERE (cree_le=:date OR modifie_le=:date)');
	$req->execute(array(
			'date'=> $date,
			'idUser' => $idUser
			));

	$listeRecapPartenaire=array();
	$i=0;

	while($partenaire=$req->fetch())
	{
		if(null!==getPartenaireName($typePartenaire,$partenaire['idPartenaire'],$idUser,$bdd))
		{
			$listeRecapPartenaire[$i]['nom']=getPartenaireName($typePartenaire,$partenaire['idPartenaire'],$idUser,$bdd);
			$listeRecapPartenaire[$i]['rdv']=$partenaire['dateRdv'];
			$i++;
		}
	}

	$req->closeCursor();

	return $listeRecapPartenaire;
}

//Fonction utilisées pour la page résultat
function obtenirRendezVousJournée($typePartenaire, $date, $idEdition, $bdd)
{
	$req = $bdd->prepare('SELECT idPartenaire,dateRdv FROM rdv'.$typePartenaire.' WHERE dateRdv=:date');
	$req->execute(array(
			'date'=> $date
			));

	$listeRdvJournee=array();
	$i=0;

	while($partenaire=$req->fetch())
	{
		if(null!==getPartenaireName($typePartenaire,$partenaire['idPartenaire'],$idEdition,$bdd))
		{
			$listeRdvJournee[$date][$i]['nom']=getPartenaireName($typePartenaire,$partenaire['idPartenaire'],$idEdition,$bdd);
			$listeRdvJournee[$date][$i]['statut']=getPartenaireStatut($typePartenaire,$partenaire['idPartenaire'],$idEdition,$bdd);
			$i++;
		}
	}

	$req->closeCursor();

	return $listeRdvJournee;
}

//Fonctions qui donne le jour que l'on est
function quelJour($jour,$mois,$annee)
{
	$c = (int)((14 - $mois)/12) ;
	//echo $c;

	$a = $annee - $c;
	//echo $a;

	$m = $mois + 12*$c - 2;
	//echo $m;

	$j = ( $jour + $a + (int)($a/4) - (int)($a/100) + (int)($a/400) + (int)((31*$m)/12) ) % 7;
	//echo $j;

	return $j;
}

function isBisextile($annee)
{
	if( $annee % 4 == 0)
	{
		if( $annee % 100 == 0)
		{
			//echo "1";
			return 0;
		}
		else
		{
			//echo "2";
			return 1;
		}
	}
	else if( $annee % 400 == 0)
	{
		//echo "3";
		return 1;
	}
	else
	{
		//echo "4";
		return 0;
	}
}

function testConformiteDate($jour,$mois,$annee)
{
	if($mois==3 || $mois==5 || $mois==7 || $mois==10)
	{
		if($jour < 1)
		{
			$jour=30+$jour;
			$mois=$mois-1;
		}
		else if($jour > 31)
		{
			$jour=$jour-31;
			$mois=$mois+1;
		}
		else
		{
			$jour=$jour;
		}
	}
	else if($mois==4 || $mois==6 || $mois==9 || $mois==11)
	{
		if($jour < 1)
		{
			$jour=31+$jour;
			$mois=$mois-1;
		}
		else if($jour > 31)
		{
			$jour=$jour-30;
			$mois=$mois+1;
		}
		else
		{
			$jour=$jour;
		}
	}
	else if($mois==8)
	{
		if($jour < 1)
		{
			$jour=31+$jour;
			$mois=$mois-1;
		}
		else if($jour > 31)
		{
			$jour=$jour-31;
			$mois=$mois+1;
		}
		else
		{
			$jour=$jour;
		}
	}
	else if($mois==12)
	{
		if($jour < 1)
		{
			$jour=30+$jour;
			$mois=$mois-1;
		}
		else if($jour > 31)
		{
			$jour=$jour-31;
			$mois=1;
			$annee=$annee+1;
		}
		else
		{
			$jour=$jour;
		}
	}
	else if($mois==1)
	{
		if($jour < 1)
		{
			$jour=31+$jour;
			$mois=12;
			$annee=$annee-1;
		}
		else if($jour > 31)
		{
			$jour=$jour-31;
			$mois=$mois+1;
		}
		else
		{
			$jour=$jour;
		}
	}
	else if($mois==2)
	{
		if(isBisextile($annee))
		{
			if($jour < 1)
			{
				$jour=31+$jour;
				$mois=$mois-1;
			}
			else if($jour > 29)
			{
				$jour=$jour-29;
				$mois=$mois+1;
			}
			else
			{
				$jour=$jour;
			}
		}
		else
		{
			if($jour < 1)
			{
				$jour=31+$jour;
				$mois=$mois-1;
			}
			else if($jour > 28)
			{
				$jour=$jour-28;
				$mois=$mois+1;
			}
			else
			{
				$jour=$jour;
			}
		}
	}
	else
	{
		echo "Ce mois n'existe pas";
		exit();
	}

	$date= $annee."-".$mois."-".$jour;
	return $date;
}

//Autres fonctions
/* Crée un tableau trié en fonction de la date et des occurences */
function getTableDateDonnee($max,$table_a_trier,$table_concernee,$bdd)
{
	$table=$table_a_trier;

	/* Stockage des dates différentes dans un tableau*/
	$max2=0;
	$b=-1;
	$date_precedente=0;

	$tableau_date=array();

	if($max!=0)
	{
		for($a=0;$a<=$max-1;$a++)
		{
			$date_testee=$table[$a]['date'];

			if($date_testee==$date_precedente)
			{
				//echo "1.".$date_testee."\n       \t";
				$b=$b;
				$tableau_date[$b]['date']=$date_testee;
			}
			else
			{
				//echo "2.".$date_testee."\n       \t";
				$b=$b+1;
				$tableau_date[$b]['date']=$date_testee;
			}

			$date_precedente=$date_testee;
			$max2=$b;
		}


		/* Stockage des données liées aux dates */
		for($c=0;$c<=$max2;$c++)
		{
			$signe_date=0;
			$rdv_date=0;
			$con_date=0;

			$tri_date=getTableData("signe,rdv",$table_concernee,"date",$tableau_date[$c]['date'],$bdd);
			while($donnee_fct_date=$tri_date->fetch())
			{
				if($donnee_fct_date['rdv']==1)
				{
					$rdv_date++;
					$tableau_date[$c]['rdv']=$rdv_date;
				}
				else
				{
					$tableau_date[$c]['rdv']=$rdv_date;
				}

				if($donnee_fct_date['signe']==1)
				{
					$signe_date++;
					$tableau_date[$c]['signe']=$signe_date;
				}
				else
				{
					$tableau_date[$c]['signe']=$signe_date;
				}

				$con_date=$con_date+1;
				$tableau_date[$c]['con']=$con_date;
			}
			$tri_date->closeCursor();
		}
	}
	else
	{
		$tableau_date[0]['date']=" ";
		$tableau_date[0]['rdv']=" ";
		$tableau_date[0]['signe']=" ";
		$tableau_date[0]['con']=" ";
		$max2=0;
	}
	return array($tableau_date,$max2);
}

/* Fonction de comparaison de date*/

function compareTodayToLastRapport($id_user,$bdd)
{
	$today=getTheDate();

	$date_last_rapport=getTableData("last_rapport","users","id",$id_user,$bdd);
	while($compared_date=$date_last_rapport->fetch())
	{
		$tested_date=$compared_date['last_rapport'];
	}
	$date_last_rapport->closeCursor();

	if($today==$tested_date)
	{
		return 1;
	}
	else
	{
		return 0;
	}
}
/*
function testLastRapportDate($table_testee,$id_user,$bdd)
{
	$today=getTheDate();

	$last_update = $bdd->prepare('SELECT date FROM '.$table_testee.' WHERE id_user = :id_user ORDER BY id DESC LIMIT 1');
	$last_update->execute(array(
				'id_user' => $id_user));
	while($find_last_update=$last_update->fetch())
	{
		$date_last_update=$find_last_update['date'];
	}
	$last_update->closeCursor();

	if($today==$date_last_update)
	{
		return 1;
	}
	else
	{
		return 0;
	}
}
*/

/* Cette fonction suit un schema bien précis -> n'est pas réutilisable comme telle */
/*
function setNewWorksheet($file_name,$worksheet_title,$style_entete,$table_data,$con,$rdv,$sgn,$table_date_data,$max_colonne)
{
	$worksheet_name = new \PHPExcel_Worksheet($file_name, ''.$worksheet_title.'');
	$file_name->addSheet($worksheet_name, 0);

	$worksheet_name ->setTitle($worksheet_title);
	$worksheet_name ->setCellValue('A1','Date');
	$worksheet_name ->setCellValue('B1','Nom');
	$worksheet_name ->setCellValue('C1','Rendez-vous');
	$worksheet_name ->setCellValue('D1','Signé');
	$worksheet_name->getStyle('A1:D1')->applyFromArray($style_entete);
	$worksheet_name ->fromArray($table_data,'','A2');
	$worksheet_name->getColumnDimension('A')->setAutoSize(true);
	$worksheet_name->getColumnDimension('B')->setAutoSize(true);
	$worksheet_name->getColumnDimension('C')->setAutoSize(true);
	$worksheet_name->getColumnDimension('D')->setAutoSize(true);
	$worksheet_name ->setCellValue('F1','Total Contact');
	$worksheet_name ->setCellValue('F2','Total RDV');
	$worksheet_name ->setCellValue('F3','Total Signé');
	$worksheet_name->getStyle('F1:F3')->applyFromArray($style_entete);
	$worksheet_name ->setCellValue('G1',''.$con.'');
	$worksheet_name ->setCellValue('G2',''.$rdv.'');
	$worksheet_name ->setCellValue('G3',''.$sgn.'');
	$worksheet_name->getStyle('G1:G3')->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_RED));
	$worksheet_name->getColumnDimension('F')->setAutoSize(true);
	$worksheet_name->getColumnDimension('G')->setAutoSize(true);
	$worksheet_name ->setCellValue('I1','Date');
	$worksheet_name ->setCellValue('J1','Rendez-vous');
	$worksheet_name ->setCellValue('K1','Signé');
	$worksheet_name ->setCellValue('L1','Contacté');
	$worksheet_name ->fromArray($table_date_data,'','I2');
	$worksheet_name->getColumnDimension('I')->setAutoSize(true);
	$worksheet_name->getColumnDimension('J')->setAutoSize(true);
	$worksheet_name->getColumnDimension('K')->setAutoSize(true);
	$worksheet_name->getColumnDimension('L')->setAutoSize(true);
	$worksheet_name->getStyle('I1:L1')->applyFromArray($style_entete);

	// Création graphique
	$table_date_data=array(
        new \PHPExcel_Chart_DataSeriesValues('String', ''.$worksheet_title.'!$J$1', NULL, 1),
        new \PHPExcel_Chart_DataSeriesValues('String', ''.$worksheet_title.'!$K$1', NULL, 1),
        new \PHPExcel_Chart_DataSeriesValues('String', ''.$worksheet_title.'!$L$1', NULL, 1)
        );

    $max_colonne=$max_colonne+2;

    $axe_x=array(
        new \PHPExcel_Chart_DataSeriesValues('String', ''.$worksheet_title.'!$I$2:$I$'.$max_colonne.'', NULL, $max_colonne),
        );

    $axe_y=array(
                new \PHPExcel_Chart_DataSeriesValues('Number', ''.$worksheet_title.'!$J$2:$J$'.$max_colonne.'', NULL, $max_colonne),
                new \PHPExcel_Chart_DataSeriesValues('Number', ''.$worksheet_title.'!$K$2:$K$'.$max_colonne.'', NULL, $max_colonne),
                new \PHPExcel_Chart_DataSeriesValues('Number', ''.$worksheet_title.'!$L$2:$L$'.$max_colonne.'', NULL, $max_colonne),
            );

    $ds=new \PHPExcel_Chart_DataSeries(
                \PHPExcel_Chart_DataSeries::TYPE_LINECHART,
                \PHPExcel_Chart_DataSeries::GROUPING_STANDARD,
                range(0, count($axe_y)-1),
                $table_date_data,
                $axe_x,
                $axe_y
            	);

    $graphique=new \PHPExcel_Chart_PlotArea(NULL, array($ds));
	$legende=new \PHPExcel_Chart_Legend(\PHPExcel_Chart_Legend::POSITION_RIGHT, NULL, false);
	$title=new \PHPExcel_Chart_Title('Evolution des signatures en fonction de la date');

	$chart= new \PHPExcel_Chart(
                    'chart1',
                    $title,
                    $legende,
                    $graphique,
                    true,
                    0,
                    NULL,
                    NULL
                    );

	$debut_trace=$max_colonne+8;
	$fin_trace=$max_colonne+14;
	$chart->setTopLeftPosition('I'.$debut_trace.'');
	$chart->setBottomRightPosition('O'.$fin_trace.'');
	$worksheet_name->addChart($chart);
}
*/
?>
