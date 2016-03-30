<?php
/* Creation de graphique -> fonction utilisable que parce que les cases sont les mêmes sur chaque feuille */
function editChart($title,$max_colonne,$worksheet_name)
{
	/* Création graphique */
	$date_chiffre_restaurant=array(
        new \PHPExcel_Chart_DataSeriesValues('String', ''.$title.'!$J$1', NULL, 1),
        new \PHPExcel_Chart_DataSeriesValues('String', ''.$title.'!$K$1', NULL, 1),
        new \PHPExcel_Chart_DataSeriesValues('String', ''.$title.'!$L$1', NULL, 1)
        );
     
    $max_colonne=$max_colonne+2;
     
    $axe_x=array(
        new \PHPExcel_Chart_DataSeriesValues('String', ''.$title.'!$I$2:$I$'.$max_colonne.'', NULL, $max_colonne),
        );
     
    $axe_y=array(
                new \PHPExcel_Chart_DataSeriesValues('Number', ''.$title.'!$J$2:$J$'.$max_colonne.'', NULL, $max_colonne),
                new \PHPExcel_Chart_DataSeriesValues('Number', ''.$title.'!$K$2:$K$'.$max_colonne.'', NULL, $max_colonne),
                new \PHPExcel_Chart_DataSeriesValues('Number', ''.$title.'!$L$2:$L$'.$max_colonne.'', NULL, $max_colonne),
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
	
	$debut_trace=$max_colonne+8;
	$fin_trace=$max_colonne+14;
	$chart->setTopLeftPosition('I'.$debut_trace.'');
	$chart->setBottomRightPosition('O'.$fin_trace.'');
	$worksheet_name->addChart($chart); 	
}

	/* Création worksheet */
function setNewWorksheet($worksheet_name,$file_name,$worksheet_title,$style_entete,$table_data,$con,$rdv,$sgn,$table_date_data)
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
}		
?>

