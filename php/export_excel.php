<?php 
session_start();

include("fonctions_pago.php");
require("Classes/PHPExcel.php");

$bdd=load_localhost();
		
$id_user=$_SESSION['id_user'];
$id_select_user=$_POST['id_select_user'];
$date1=$_POST['date'];

$prenom = getPrenom($id_user,$bdd);
$nom = getNom($id_user,$bdd);

$date2 = getTheDate();

$edition = getEdition($id_select_user,$bdd);

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

/* Donnée document excel */ 
$excel = new PHPExcel();

$excel->getProperties()
	  ->setCreator("Gauthier JENCZAK")
	  ->setLastModifiedBy("".$prenom." ".$nom."")
	  ->setTitle("Rapport passeport gourmand :".$edition."")
	  ->setSubject("Du : ".$date1." au ".$date2."")
	  ->setDescription("Fiche synthèse des rapports d'activité quotidiens");
	  
$style_entete = array(
    'font' => array('bold' => true, 'size' => 13,),
    'alignment' => array('horizontal' => \PHPExcel_Style_Alignment::HORIZONTAL_LEFT,),
);

// Gestion feuille restaurant 
	$con_res=$_POST['con'];
	$rdv_res=$_POST['rdv'];
	$sgn_res=$_POST['sgn'];

	/* DL des données et stockage en array */ 
	$donnee_restaurant=array();
	$i=0;
	$table_restaurant=getTableDataWithIdUser("nom_restaurant,rdv,signe,date","restaurants",$date1,$id_select_user,$bdd);
	while($restaurant=$table_restaurant->fetch())
	{
		$donnee_restaurant[$i]['date']=$restaurant['date'];
		//echo $donnee_restaurant[$i]['date'];
		$donnee_restaurant[$i]['nom']=$restaurant['nom_restaurant'];
		
		if($restaurant['rdv']==1) 
		{ 
			$donnee_restaurant[$i]['rdv']="Oui";
		}
		else
		{
			$donnee_restaurant[$i]['rdv']="Non";
		}
		
		if($restaurant['signe']==1)
		{	
			$donnee_restaurant[$i]['sgn']="Oui";
		}
		else
		{
			$donnee_restaurant[$i]['sgn']="Non";
		}	
		
		$i++;
	}
	$table_restaurant->closeCursor();

	list($tableau_restaurant,$max_restaurant)=getTableDateDonnee($i,$donnee_restaurant,"restaurants",$bdd);

	/* Création worksheet */
	$fiche_restaurant = $excel ->getSheet(0); 
	$fiche_restaurant ->setTitle("Restaurants");
	$fiche_restaurant ->setCellValue('A1','Date');
	$fiche_restaurant ->setCellValue('B1','Nom restaurant');
	$fiche_restaurant ->setCellValue('C1','Rendez-vous');
	$fiche_restaurant ->setCellValue('D1','Signé');
	$fiche_restaurant->getStyle('A1:D1')->applyFromArray($style_entete);
	$fiche_restaurant ->fromArray($donnee_restaurant,'','A2');
	$fiche_restaurant->getColumnDimension('A')->setAutoSize(true);
	$fiche_restaurant->getColumnDimension('B')->setAutoSize(true);
	$fiche_restaurant->getColumnDimension('C')->setAutoSize(true);
	$fiche_restaurant->getColumnDimension('D')->setAutoSize(true);
	$fiche_restaurant ->setCellValue('F1','Total Contact');
	$fiche_restaurant ->setCellValue('F2','Total RDV');
	$fiche_restaurant ->setCellValue('F3','Total Signé');
	$fiche_restaurant->getStyle('F1:F3')->applyFromArray($style_entete);
	$fiche_restaurant ->setCellValue('G1',''.$con_res.'');
	$fiche_restaurant ->setCellValue('G2',''.$rdv_res.'');
	$fiche_restaurant ->setCellValue('G3',''.$sgn_res.'');
	$fiche_restaurant->getStyle('G1:G3')->getFont()->setColor( new PHPExcel_Style_Color( PHPExcel_Style_Color::COLOR_RED));
	$fiche_restaurant->getColumnDimension('F')->setAutoSize(true);
	$fiche_restaurant->getColumnDimension('G')->setAutoSize(true);
	$fiche_restaurant ->setCellValue('I1','Date');
	$fiche_restaurant ->setCellValue('J1','Rendez-vous');
	$fiche_restaurant ->setCellValue('K1','Signé');
	$fiche_restaurant ->setCellValue('L1','Contacté');
	$fiche_restaurant ->fromArray($tableau_restaurant,'','I2');
	$fiche_restaurant->getColumnDimension('I')->setAutoSize(true);
	$fiche_restaurant->getColumnDimension('J')->setAutoSize(true);
	$fiche_restaurant->getColumnDimension('K')->setAutoSize(true);
	$fiche_restaurant->getColumnDimension('L')->setAutoSize(true);
	$fiche_restaurant->getStyle('I1:L1')->applyFromArray($style_entete);

	/* Création graphique */
	/*
	$date_chiffre_restaurant=array(
        new \PHPExcel_Chart_DataSeriesValues('String', 'Restaurants!$J$1', NULL, 1),
        new \PHPExcel_Chart_DataSeriesValues('String', 'Restaurants!$K$1', NULL, 1),
        new \PHPExcel_Chart_DataSeriesValues('String', 'Restaurants!$L$1', NULL, 1)
        );
     
    $max_restaurant=$max_restaurant+2;
     
    $axe_x=array(
        new \PHPExcel_Chart_DataSeriesValues('String', 'Restaurants!$I$2:$I$'.$max_restaurant.'', NULL, $max_restaurant),
        );
     
    $axe_y=array(
                new \PHPExcel_Chart_DataSeriesValues('Number', 'Restaurants!$J$2:$J$'.$max_restaurant.'', NULL, $max_restaurant),
                new \PHPExcel_Chart_DataSeriesValues('Number', 'Restaurants!$K$2:$K$'.$max_restaurant.'', NULL, $max_restaurant),
                new \PHPExcel_Chart_DataSeriesValues('Number', 'Restaurants!$L$2:$L$'.$max_restaurant.'', NULL, $max_restaurant),
            );
       
    $ds=new \PHPExcel_Chart_DataSeries(
                \PHPExcel_Chart_DataSeries::TYPE_LINECHART,
                \PHPExcel_Chart_DataSeries::GROUPING_STANDARD,
                range(0, count($axe_y)-1),
                $date_chiffre_restaurant,
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
	
	$debut_trace=$max_restaurant+8;
	$fin_trace=$max_restaurant+14;
	$chart->setTopLeftPosition('I'.$debut_trace.'');
	$chart->setBottomRightPosition('O'.$fin_trace.'');
	$fiche_restaurant->addChart($chart);
	*/       	               
	
//Gestion feuille point de vente 
	$con_pdv=$_POST['con_pdv'];
	$rdv_pdv=$_POST['rdv_pdv'];
	$sgn_pdv=$_POST['sgn_pdv'];

    //DL des données et stockage en array  
	$donnee_pdv=array();
	$i=0;
	$table_pdv=getTableDataWithIdUser("nom_pdv,rdv,signe,date","point_de_vente",$date1,$id_select_user,$bdd);
	while($pdv=$table_pdv->fetch())
	{
		$donnee_pdv[$i]['nom']=$pdv['nom_pdv'];
		$donnee_pdv[$i]['date']=$pdv['date'];
		
		if($pdv['rdv']==1) 
		{ 
			$donnee_pdv[$i]['rdv']="Oui";
		}
		else
		{
			$donnee_pdv[$i]['rdv']="Non";
		}
		
		if($pdv['signe']==1)
		{	
			$donnee_pdv[$i]['sgn']="Oui";
		}
		else
		{
			$donnee_pdv[$i]['sgn']="Non";
		}	
		$i++;
	}
	$table_pdv->closeCursor();
	
	list($tableau_pdv,$max_pdv)=getTableDateDonnee($i,$donnee_pdv,"point_de_vente",$bdd);

	$fiche_pdv=setNewWorksheet($excel,"PDV",$style_entete,$donnee_pdv,$con_pdv,$rdv_pdv,$sgn_pdv,$tableau_pdv,$max_pdv);
	
	//$chart_pdv=editChart("PDV",$max_pdv,$fiche_pdv);
	//$fiche_pdv->addChart($chart_pdv);
	
//Gestion feuille comités d'entreprise
	$con_ce=$_POST['con_ce'];
	$rdv_ce=$_POST['rdv_ce'];
	$sgn_ce=$_POST['sgn_ce'];

    //DL des données et stockage en array  
	$donnee_ce=array();
	$i=0;
	$table_ce=getTableDataWithIdUser("nom_ce,rdv,signe,date","comite_entreprise",$date1,$id_select_user,$bdd);
	while($ce=$table_ce->fetch())
	{
		$donnee_ce[$i]['nom']=$ce['nom_ce'];
		$donnee_ce[$i]['date']=$ce['date'];
		
		if($ce['rdv']==1) 
		{ 
			$donnee_ce[$i]['rdv']="Oui";
		}
		else
		{
			$donnee_ce[$i]['rdv']="Non";
		}
		
		if($ce['signe']==1)
		{	
			$donnee_ce[$i]['sgn']="Oui";
		}
		else
		{
			$donnee_ce[$i]['sgn']="Non";
		}	
		$i++;
	}
	$table_ce->closeCursor();
	
	list($tableau_ce,$max_ce)=getTableDateDonnee($i,$donnee_ce,"comite_entreprise",$bdd);

	//$fiche_ce=setNewWorksheet($excel,"CE",$style_entete,$donnee_ce,$con_ce,$rdv_ce,$sgn_ce,$tableau_ce);
	
//Gestion feuille organisme publicitaires
	$con_op=$_POST['con_op'];
	$rdv_op=$_POST['rdv_op'];
	$sgn_op=$_POST['sgn_op'];

    //DL des données et stockage en array  
	$donnee_op=array();
	$i=0;
	$table_op=getTableDataWithIdUser("nom_op,rdv,signe,date","publicite",$date1,$id_select_user,$bdd);
	while($op=$table_op->fetch())
	{
		$donnee_op[$i]['nom']=$op['nom_op'];
		$donnee_op[$i]['date']=$op['date'];
		
		if($op['rdv']==1) 
		{ 
			$donnee_op[$i]['rdv']="Oui";
		}
		else
		{
			$donnee_op[$i]['rdv']="Non";
		}
		
		if($op['signe']==1)
		{	
			$donnee_op[$i]['sgn']="Oui";
		}
		else
		{
			$donnee_op[$i]['sgn']="Non";
		}	
		$i++;
	}
	$table_op->closeCursor();
	
	list($tableau_op,$max_op)=getTableDateDonnee($i,$donnee_op,"publicite",$bdd);
	
	//$fiche_op=setNewWorksheet($excel,"OP",$style_entete,$donnee_op,$con_op,$rdv_op,$sgn_op,$tableau_op);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Rapport_PAGO_'.$edition.'.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');
// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0


$objWriter = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
$objWriter->setIncludeCharts(true);
$objWriter->save('Rapports/rapport_'.$edition.'.xlsx');
$objWriter->save('php://output');
exit;

?>