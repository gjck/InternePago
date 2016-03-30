<?php
include("fonctions_pago.php");
$bdd = load_localhost();

$reorganised_table=array();

$i=0;

$printed_table=getTableData("id, prenom","users","administrateur",2,$bdd);
while($analysed_table=$printed_table->fetch())
{			
	$reorganised_table[$i]['id_user']= $analysed_table['id'];
	$reorganised_table[$i]['prenom']= $analysed_table['prenom'];
	$reorganised_table[$i]['signatures']=0;
	
	$compteur_signature=0;
	
	$signature_restaurants=getTableData("signe","restaurants","id_user",$analysed_table['id'],$bdd);
	while($table_restaurants_signes=$signature_restaurants->fetch())
	{
		if(isset($table_restaurants_signes['signe']) && $table_restaurants_signes['signe']==1)
		{
			$compteur_signature=$compteur_signature+1;
			$reorganised_table[$i]['signatures']=$compteur_signature;
		}
		else
		{
			$compteur_signature=$compteur_signature+0;
			$reorganised_table[$i]['signatures']=$compteur_signature;
		}
	}
	$signature_restaurants->closeCursor();	
	
	//echo "ID : ".$reorganised_table[$i]['id_user'];
	//echo "/ Prenom :".$reorganised_table[$i]['prenom'];
	//echo "/ Signature:".$reorganised_table[$i]['signatures']."/n";
	
	$i++;
}
$printed_table->closeCursor();

$max=$i;
//echo $max;

$axe_y=array();
$axe_x=array();

for($j=0;$j<=$max-1;$j++)
{
	//echo "Je suis dans la boucle for";
	$axe_y[$j]=$reorganised_table[$j]['signatures'];
	$axe_x[$j]=$reorganised_table[$j]['prenom'];
}

//JPGraph
include ("../plugin/jpgraph/src/jpgraph.php");
include ("../plugin/jpgraph/src/jpgraph_bar.php");

// Construction du conteneur
// Spécification largeur et hauteur
$graph = new Graph(400,250);

// Réprésentation linéaire
$graph->SetScale("textlin");

// Fixer les marges
$graph->img->SetMargin(40,30,25,40);

// Création du graphique histogramme
$bplot = new BarPlot($axe_y);

// Spécification des couleurs des barres
$bplot->SetFillColor(array('red', 'green', 'blue'));

// Afficher les valeurs pour chaque barre
$bplot->value->Show();
// Fixer l'aspect de la police
$bplot->value->SetFont(FF_ARIAL,FS_NORMAL,9);
// Modifier le rendu de chaque valeur
$bplot->value->SetFormat('%d signatures');

// Ajouter les barres au conteneur
$graph->Add($bplot);

// Le titre
$graph->title->Set("Nombre de signatures par personne");
$graph->title->SetFont(FF_FONT1,FS_BOLD);

// Titre pour l'axe horizontal(axe x) et vertical (axe y)
$graph->xaxis->title->Set("Prenom du responsable d'edition");
$graph->yaxis->title->Set("Nombre de signatures");

$graph->yaxis->title->SetFont(FF_FONT1,FS_BOLD);
$graph->xaxis->title->SetFont(FF_FONT1,FS_BOLD);

// Légende pour l'axe horizontal
$graph->xaxis->SetTickLabels($axe_x);

// Afficher le graphique
$graph->Stroke();

?>

