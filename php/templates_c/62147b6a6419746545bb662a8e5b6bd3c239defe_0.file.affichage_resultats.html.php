<?php /* Smarty version 3.1.24, created on 2016-03-16 16:47:55
         compiled from "/Applications/MAMP/htdocs/PAGO 2/html/affichage_resultats.html" */ ?>
<?php
/*%%SmartyHeaderCode:194032428756e9802b5f4a26_63089569%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '62147b6a6419746545bb662a8e5b6bd3c239defe' => 
    array (
      0 => '/Applications/MAMP/htdocs/PAGO 2/html/affichage_resultats.html',
      1 => 1458143272,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '194032428756e9802b5f4a26_63089569',
  'variables' => 
  array (
    'listeRestaurant' => 0,
    'key1' => 0,
    'key2' => 0,
    'res' => 0,
    'listeStatutRestaurant' => 0,
    'restaurant' => 0,
    'cpt1' => 0,
    'cpt2' => 0,
    'edition' => 0,
    'listePointDeVente' => 0,
    'listeStatutPointDeVente' => 0,
    'listePublicite' => 0,
    'listeStatutPublicite' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56e9802b7e4fb2_72798256',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e9802b7e4fb2_72798256')) {
function content_56e9802b7e4fb2_72798256 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '194032428756e9802b5f4a26_63089569';
?>
<!DOCTYPE html>

<html>

		<head>
				<meta charset="utf-8" />
				<title> Gabrice Editions : Resultats </title>
				<link rel="stylesheet" href="../css/style.css" />
		</head>


		<body>
				<header>
					<div id="logo_header">
						<img src="../img/logo/logo_gabrice.jpg" />
					</div>
				</header>

				<nav>
					<?php echo $_smarty_tpl->getSubTemplate ('../html/nav.html', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0);
?>

				</nav>

				<h1 id="titre_accueil_centre"> Resultats </h1>

			<section id="Restaurant">
				<section id="resultatBlocGauche">
				<h2> Partenaires </h2>

				<p> Affichage des rendez-vous des prochains jours </p>

					<table id="affCalendrierResultat">
					<tr>
						<th id="dateResultat"> Date du rendez-vous </th>
						<th> Rendez-vous de la journée </th>
						<th> Reprogrammé </th>
						<th> Non rencontré </th>
						<th> En attente de réponse </th>
					</tr>

					<tr>
					<!-- La suite de foreach permet de sortir le tableau-->
					<?php
$_from = $_smarty_tpl->tpl_vars['listeRestaurant']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item1'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item1']->_loop = false;
$_smarty_tpl->tpl_vars['key1'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
$_smarty_tpl->tpl_vars['item1']->_loop = true;
$foreach_item1_Sav = $_smarty_tpl->tpl_vars['item1'];
?>
						<tr>
							<?php
$_from = $_smarty_tpl->tpl_vars['listeRestaurant']->value[$_smarty_tpl->tpl_vars['key1']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item2'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item2']->_loop = false;
$_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
$_smarty_tpl->tpl_vars['item2']->_loop = true;
$foreach_item2_Sav = $_smarty_tpl->tpl_vars['item2'];
?>
								<td id="dateResultat"><?php echo $_smarty_tpl->tpl_vars['key2']->value;?>
</td>
								<!--RDV-->
								<td>
									<ul>
									<?php
$_from = $_smarty_tpl->tpl_vars['listeRestaurant']->value[$_smarty_tpl->tpl_vars['key1']->value][$_smarty_tpl->tpl_vars['key2']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['res'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['res']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
$_smarty_tpl->tpl_vars['res']->_loop = true;
$foreach_res_Sav = $_smarty_tpl->tpl_vars['res'];
?>
											<li><?php echo $_smarty_tpl->tpl_vars['res']->value['nom'];?>
</li>
									<?php
$_smarty_tpl->tpl_vars['res'] = $foreach_res_Sav;
}
?>
									<ul>
								</td>
								<!--Reprogrammé-->
								<td>
									<ul>
									<?php
$_from = $_smarty_tpl->tpl_vars['listeRestaurant']->value[$_smarty_tpl->tpl_vars['key1']->value][$_smarty_tpl->tpl_vars['key2']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['res'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['res']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
$_smarty_tpl->tpl_vars['res']->_loop = true;
$foreach_res_Sav = $_smarty_tpl->tpl_vars['res'];
?>
											<?php if ($_smarty_tpl->tpl_vars['res']->value['statut'] == 2) {?>
											<li><?php echo $_smarty_tpl->tpl_vars['res']->value['nom'];?>
</li>
											<?php }?>
									<?php
$_smarty_tpl->tpl_vars['res'] = $foreach_res_Sav;
}
?>
									<ul>
								</td>
								<!--Non rencontré-->
								<td>
									<ul>
									<?php
$_from = $_smarty_tpl->tpl_vars['listeRestaurant']->value[$_smarty_tpl->tpl_vars['key1']->value][$_smarty_tpl->tpl_vars['key2']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['res'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['res']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
$_smarty_tpl->tpl_vars['res']->_loop = true;
$foreach_res_Sav = $_smarty_tpl->tpl_vars['res'];
?>
											<?php if ($_smarty_tpl->tpl_vars['res']->value['statut'] == 3) {?>
											<li><?php echo $_smarty_tpl->tpl_vars['res']->value['nom'];?>
</li>
											<?php }?>
									<?php
$_smarty_tpl->tpl_vars['res'] = $foreach_res_Sav;
}
?>
									<ul>
								</td>
								<!--En attente de réponse-->
								<td>
									<ul>
									<?php
$_from = $_smarty_tpl->tpl_vars['listeRestaurant']->value[$_smarty_tpl->tpl_vars['key1']->value][$_smarty_tpl->tpl_vars['key2']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['res'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['res']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
$_smarty_tpl->tpl_vars['res']->_loop = true;
$foreach_res_Sav = $_smarty_tpl->tpl_vars['res'];
?>
											<?php if ($_smarty_tpl->tpl_vars['res']->value['statut'] == 5) {?>
											<li><?php echo $_smarty_tpl->tpl_vars['res']->value['nom'];?>
</li>
											<?php }?>
									<?php
$_smarty_tpl->tpl_vars['res'] = $foreach_res_Sav;
}
?>
									<ul>
								</td>
							<?php
$_smarty_tpl->tpl_vars['item2'] = $foreach_item2_Sav;
}
?>
						</tr>
					<?php
$_smarty_tpl->tpl_vars['item1'] = $foreach_item1_Sav;
}
?>

					</table>

				</section>

				<section id="resultatBlocHautDroite">
				<h3> Liste des partenaires signés à date : </h3>
					<section id="listeSigneResultat">
					<ul>
						<?php $_smarty_tpl->tpl_vars['cpt1'] = new Smarty_Variable(0, null, 0);?>
						<?php $_smarty_tpl->tpl_vars['cpt2'] = new Smarty_Variable(0, null, 0);?>
						<?php
$_from = $_smarty_tpl->tpl_vars['listeStatutRestaurant']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['restaurant'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['restaurant']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['restaurant']->value) {
$_smarty_tpl->tpl_vars['restaurant']->_loop = true;
$foreach_restaurant_Sav = $_smarty_tpl->tpl_vars['restaurant'];
?>
							<?php if ($_smarty_tpl->tpl_vars['restaurant']->value['statut'] == 1) {?>
							<li><?php echo $_smarty_tpl->tpl_vars['restaurant']->value['nom'];?>
 (<?php echo $_smarty_tpl->tpl_vars['restaurant']->value['type'];?>
)</li>
							<?php $_smarty_tpl->tpl_vars['cpt1'] = new Smarty_Variable($_smarty_tpl->tpl_vars['cpt1']->value+1, null, 0);?>
							<?php } elseif ($_smarty_tpl->tpl_vars['restaurant']->value['statut'] == 4) {?>
							<?php $_smarty_tpl->tpl_vars['cpt2'] = new Smarty_Variable($_smarty_tpl->tpl_vars['cpt2']->value+1, null, 0);?>
							<?php }?>
						<?php
$_smarty_tpl->tpl_vars['restaurant'] = $foreach_restaurant_Sav;
}
?>
					</ul>
					</section>

					<h3> Recapitulatif signatures et refus</h3>
					<table>
						<tr>
							<th>Nombre de partenaires signés </th>
							<td><?php echo $_smarty_tpl->tpl_vars['cpt1']->value;?>
</td>
						</tr>
						<tr>
							<th>Nombre de refus définitif</th>
							<td><?php echo $_smarty_tpl->tpl_vars['cpt2']->value;?>
</td>
						</tr>
					</table>
					<h3> Plus de détails </h3>
					<form method="post" action="listeRefus.php" id="formRefus">
						<p> Liste des refus : </p>
						<input type="hidden" name="edition" value="<?php echo $_smarty_tpl->tpl_vars['edition']->value;?>
" />
						<input type="hidden" name="typePartenaire" value="Restaurant" />
						<input type="submit" value="Voir les refus"/>
					</form>
					<!--
					<form action="affichageDuréePlusLongue.php">
					</form>
					-->
				</section>

				<section id="resultatModificationBlocBas">
				<h3> Modification des entrées </h3>
				<form method="post" action="modificationStatutPartenaire.php" id="formModification" >
					<p> Modification statut partenaire : <p>
					<select name="idPartenaire">
						<?php
$_from = $_smarty_tpl->tpl_vars['listeStatutRestaurant']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['restaurant'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['restaurant']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['restaurant']->value) {
$_smarty_tpl->tpl_vars['restaurant']->_loop = true;
$foreach_restaurant_Sav = $_smarty_tpl->tpl_vars['restaurant'];
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['restaurant']->value['id'];?>
"/> <?php echo $_smarty_tpl->tpl_vars['restaurant']->value['nom'];?>
 </option>
						<?php
$_smarty_tpl->tpl_vars['restaurant'] = $foreach_restaurant_Sav;
}
?>
					</select>
					<select name="nouveauStatut">
						<option value="signe"> Signé </option>
						<option value="reprogramme"> Reprogrammé </option>
						<option value="nonRencontre"> Non rencontré </option>
						<option value="refus"> Refus définitif </option>
					</select>
					<input type="hidden" name="typePartenaire" value="Restaurant" />
					<input type="hidden" name="edition" value="<?php echo $_smarty_tpl->tpl_vars['edition']->value;?>
" />
					<input type="submit" value="Changer statut"/>
				</form>
				<form method="post" action="modificationTypePartenaire.php" id="formModification" >
					<p> Modification type partenaire : <p>
					<select name="idPartenaire">
						<?php
$_from = $_smarty_tpl->tpl_vars['listeStatutRestaurant']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['restaurant'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['restaurant']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['restaurant']->value) {
$_smarty_tpl->tpl_vars['restaurant']->_loop = true;
$foreach_restaurant_Sav = $_smarty_tpl->tpl_vars['restaurant'];
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['restaurant']->value['id'];?>
"/> <?php echo $_smarty_tpl->tpl_vars['restaurant']->value['nom'];?>
 </option>
						<?php
$_smarty_tpl->tpl_vars['restaurant'] = $foreach_restaurant_Sav;
}
?>
					</select>
					<select name="nouveauType">
						<option value="1"> Restaurant </option>
						<option value="2"> Hôtel </option>
						<option value="3"> Caviste </option>
						<option value="4"> Beauté / Spa </option>
						<option value="5"> Loisirs </option>
						<option value="0"> Autre </option>
					</select>
					<input type="hidden" name="typePartenaire" value="Restaurant" />
					<input type="hidden" name="edition" value="<?php echo $_smarty_tpl->tpl_vars['edition']->value;?>
" />
					<input type="submit" value="Changer statut"/>
				</form>

				<!--
				<br>
				<form method="post" action="modificationDateRdv.php" id="formModification" >
					<p> A quelle date est le rendez vous que vous souhaitez reprogrammé : <p>
					<select name="dateConsultee">
					<?php
$_from = $_smarty_tpl->tpl_vars['listeRestaurant']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item1'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item1']->_loop = false;
$_smarty_tpl->tpl_vars['key1'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
$_smarty_tpl->tpl_vars['item1']->_loop = true;
$foreach_item1_Sav = $_smarty_tpl->tpl_vars['item1'];
?>
							<?php
$_from = $_smarty_tpl->tpl_vars['listeRestaurant']->value[$_smarty_tpl->tpl_vars['key1']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item2'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item2']->_loop = false;
$_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
$_smarty_tpl->tpl_vars['item2']->_loop = true;
$foreach_item2_Sav = $_smarty_tpl->tpl_vars['item2'];
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['key2']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['key2']->value;?>
</option>
							<?php
$_smarty_tpl->tpl_vars['item2'] = $foreach_item2_Sav;
}
?>
					<?php
$_smarty_tpl->tpl_vars['item1'] = $foreach_item1_Sav;
}
?>
					</select>
					<input type="hidden" name="typePartenaire" value="Restaurant" />
					<input type="hidden" name="edition" value="<?php echo $_smarty_tpl->tpl_vars['edition']->value;?>
" />
					<input type="submit" value="Afficher rendez-vous"/>
				</form>
				-->
				</section>
			</section>
			<br>

			<section id="PointDeVente">
				<section id="resultatBlocGauche">
				<h2> Distributeurs </h2>

				<p> Affichage des rendez-vous des prochains jours </p>

					<table id="affCalendrierResultat">
					<tr>
						<th id="dateResultat"> Date du rendez-vous </th>
						<th> Rendez-vous de la journée </th>
						<th> Reprogrammé </th>
						<th> Non rencontré </th>
						<th> En attente de réponse </th>
					</tr>

					<tr>
					<!-- La suite de foreach permet de sortir le tableau-->
					<?php
$_from = $_smarty_tpl->tpl_vars['listePointDeVente']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item1'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item1']->_loop = false;
$_smarty_tpl->tpl_vars['key1'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
$_smarty_tpl->tpl_vars['item1']->_loop = true;
$foreach_item1_Sav = $_smarty_tpl->tpl_vars['item1'];
?>
						<tr>
							<?php
$_from = $_smarty_tpl->tpl_vars['listePointDeVente']->value[$_smarty_tpl->tpl_vars['key1']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item2'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item2']->_loop = false;
$_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
$_smarty_tpl->tpl_vars['item2']->_loop = true;
$foreach_item2_Sav = $_smarty_tpl->tpl_vars['item2'];
?>
								<td id="dateResultat"><?php echo $_smarty_tpl->tpl_vars['key2']->value;?>
</td>
								<!--RDV-->
								<td>
									<ul>
									<?php
$_from = $_smarty_tpl->tpl_vars['listePointDeVente']->value[$_smarty_tpl->tpl_vars['key1']->value][$_smarty_tpl->tpl_vars['key2']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['res'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['res']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
$_smarty_tpl->tpl_vars['res']->_loop = true;
$foreach_res_Sav = $_smarty_tpl->tpl_vars['res'];
?>
											<li><?php echo $_smarty_tpl->tpl_vars['res']->value['nom'];?>
</li>
									<?php
$_smarty_tpl->tpl_vars['res'] = $foreach_res_Sav;
}
?>
									<ul>
								</td>
								<!--Reprogrammé-->
								<td>
									<ul>
									<?php
$_from = $_smarty_tpl->tpl_vars['listePointDeVente']->value[$_smarty_tpl->tpl_vars['key1']->value][$_smarty_tpl->tpl_vars['key2']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['res'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['res']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
$_smarty_tpl->tpl_vars['res']->_loop = true;
$foreach_res_Sav = $_smarty_tpl->tpl_vars['res'];
?>
											<?php if ($_smarty_tpl->tpl_vars['res']->value['statut'] == 2) {?>
											<li><?php echo $_smarty_tpl->tpl_vars['res']->value['nom'];?>
</li>
											<?php }?>
									<?php
$_smarty_tpl->tpl_vars['res'] = $foreach_res_Sav;
}
?>
									<ul>
								</td>
								<!--Non rencontré-->
								<td>
									<ul>
									<?php
$_from = $_smarty_tpl->tpl_vars['listePointDeVente']->value[$_smarty_tpl->tpl_vars['key1']->value][$_smarty_tpl->tpl_vars['key2']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['res'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['res']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
$_smarty_tpl->tpl_vars['res']->_loop = true;
$foreach_res_Sav = $_smarty_tpl->tpl_vars['res'];
?>
											<?php if ($_smarty_tpl->tpl_vars['res']->value['statut'] == 3) {?>
											<li><?php echo $_smarty_tpl->tpl_vars['res']->value['nom'];?>
</li>
											<?php }?>
									<?php
$_smarty_tpl->tpl_vars['res'] = $foreach_res_Sav;
}
?>
									<ul>
								</td>
								<!--En attente de réponse-->
								<td>
									<ul>
									<?php
$_from = $_smarty_tpl->tpl_vars['listePointDeVente']->value[$_smarty_tpl->tpl_vars['key1']->value][$_smarty_tpl->tpl_vars['key2']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['res'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['res']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
$_smarty_tpl->tpl_vars['res']->_loop = true;
$foreach_res_Sav = $_smarty_tpl->tpl_vars['res'];
?>
											<?php if ($_smarty_tpl->tpl_vars['res']->value['statut'] == 5) {?>
											<li><?php echo $_smarty_tpl->tpl_vars['res']->value['nom'];?>
</li>
											<?php }?>
									<?php
$_smarty_tpl->tpl_vars['res'] = $foreach_res_Sav;
}
?>
									<ul>
								</td>
							<?php
$_smarty_tpl->tpl_vars['item2'] = $foreach_item2_Sav;
}
?>
						</tr>
					<?php
$_smarty_tpl->tpl_vars['item1'] = $foreach_item1_Sav;
}
?>

					</table>

				</section>

				<section id="resultatBlocHautDroite">
				<h3> Liste des distributeurs signés à date : </h3>
					<section id="listeSigneResultat">
					<ul>
						<?php $_smarty_tpl->tpl_vars['cpt1'] = new Smarty_Variable(0, null, 0);?>
						<?php $_smarty_tpl->tpl_vars['cpt2'] = new Smarty_Variable(0, null, 0);?>
						<?php
$_from = $_smarty_tpl->tpl_vars['listeStatutPointDeVente']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['restaurant'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['restaurant']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['restaurant']->value) {
$_smarty_tpl->tpl_vars['restaurant']->_loop = true;
$foreach_restaurant_Sav = $_smarty_tpl->tpl_vars['restaurant'];
?>
							<?php if ($_smarty_tpl->tpl_vars['restaurant']->value['statut'] == 1) {?>
							<li><?php echo $_smarty_tpl->tpl_vars['restaurant']->value['nom'];?>
 (<?php echo $_smarty_tpl->tpl_vars['restaurant']->value['type'];?>
)</li>
							<?php $_smarty_tpl->tpl_vars['cpt1'] = new Smarty_Variable($_smarty_tpl->tpl_vars['cpt1']->value+1, null, 0);?>
							<?php } elseif ($_smarty_tpl->tpl_vars['restaurant']->value['statut'] == 4) {?>
							<?php $_smarty_tpl->tpl_vars['cpt2'] = new Smarty_Variable($_smarty_tpl->tpl_vars['cpt2']->value+1, null, 0);?>
							<?php }?>
						<?php
$_smarty_tpl->tpl_vars['restaurant'] = $foreach_restaurant_Sav;
}
?>
					</ul>
					</section>

					<h3> Recapitulatif signatures et refus</h3>
					<table>
						<tr>
							<th>Nombre de distributeurs signés </th>
							<td><?php echo $_smarty_tpl->tpl_vars['cpt1']->value;?>
</td>
						</tr>
						<tr>
							<th>Nombre de refus définitif</th>
							<td><?php echo $_smarty_tpl->tpl_vars['cpt2']->value;?>
</td>
						</tr>
					</table>
					<h3> Plus de détails </h3>
					<form method="post" action="listeRefus.php" id="formRefus">
						<p> Liste des refus : </p>
						<input type="hidden" name="edition" value="<?php echo $_smarty_tpl->tpl_vars['edition']->value;?>
" />
						<input type="hidden" name="typePartenaire" value="PointDeVente" />
						<input type="submit" value="Voir les refus"/>
					</form>
					<!--
					<form action="affichageDuréePlusLongue.php">
					</form>
					-->
				</section>

				<section id="resultatModificationBlocBas">
				<h3> Modification des entrées </h3>
				<form method="post" action="modificationStatutPartenaire.php" id="formModification" >
					<p> Modification statut distributeur : <p>
					<select name="idPartenaire">
						<?php
$_from = $_smarty_tpl->tpl_vars['listeStatutPointDeVente']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['restaurant'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['restaurant']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['restaurant']->value) {
$_smarty_tpl->tpl_vars['restaurant']->_loop = true;
$foreach_restaurant_Sav = $_smarty_tpl->tpl_vars['restaurant'];
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['restaurant']->value['id'];?>
"/> <?php echo $_smarty_tpl->tpl_vars['restaurant']->value['nom'];?>
 </option>
						<?php
$_smarty_tpl->tpl_vars['restaurant'] = $foreach_restaurant_Sav;
}
?>
					</select>
					<select name="nouveauStatut">
						<option value="signe"> Signé </option>
						<option value="reprogramme"> Reprogrammé </option>
						<option value="nonRencontre"> Non rencontré </option>
						<option value="refus"> Refus définitif </option>
					</select>
					<input type="hidden" name="typePartenaire" value="PointDeVente" />
					<input type="hidden" name="edition" value="<?php echo $_smarty_tpl->tpl_vars['edition']->value;?>
" />
					<input type="submit" value="Changer statut"/>
				</form>

				<form method="post" action="modificationTypePartenaire.php" id="formModification" >
					<p> Modification type distributeur : <p>
					<select name="idPartenaire">
						<?php
$_from = $_smarty_tpl->tpl_vars['listeStatutPointDeVente']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['restaurant'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['restaurant']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['restaurant']->value) {
$_smarty_tpl->tpl_vars['restaurant']->_loop = true;
$foreach_restaurant_Sav = $_smarty_tpl->tpl_vars['restaurant'];
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['restaurant']->value['id'];?>
"/> <?php echo $_smarty_tpl->tpl_vars['restaurant']->value['nom'];?>
 </option>
						<?php
$_smarty_tpl->tpl_vars['restaurant'] = $foreach_restaurant_Sav;
}
?>
					</select>
					<select name="nouveauType">
						<option value="1"> Comité d'entreprise </option>
						<option value="2"> Point de vente </option>
						<option value="0"> Autre </option>
					</select>
					<input type="hidden" name="typePartenaire" value="PointDeVente" />
					<input type="hidden" name="edition" value="<?php echo $_smarty_tpl->tpl_vars['edition']->value;?>
" />
					<input type="submit" value="Changer statut"/>
				</form>
				<!--
				<br>
				<form method="post" action="modificationDateRdv.php" id="formModification" >
					<p> A quelle date est le rendez vous que vous souhaitez reprogrammé : <p>
					<select name="dateConsultee">
					<?php
$_from = $_smarty_tpl->tpl_vars['listeRestaurant']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item1'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item1']->_loop = false;
$_smarty_tpl->tpl_vars['key1'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
$_smarty_tpl->tpl_vars['item1']->_loop = true;
$foreach_item1_Sav = $_smarty_tpl->tpl_vars['item1'];
?>
							<?php
$_from = $_smarty_tpl->tpl_vars['listeRestaurant']->value[$_smarty_tpl->tpl_vars['key1']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item2'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item2']->_loop = false;
$_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
$_smarty_tpl->tpl_vars['item2']->_loop = true;
$foreach_item2_Sav = $_smarty_tpl->tpl_vars['item2'];
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['key2']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['key2']->value;?>
</option>
							<?php
$_smarty_tpl->tpl_vars['item2'] = $foreach_item2_Sav;
}
?>
					<?php
$_smarty_tpl->tpl_vars['item1'] = $foreach_item1_Sav;
}
?>
					</select>
					<input type="hidden" name="typePartenaire" value="PointDeVente" />
					<input type="hidden" name="edition" value="<?php echo $_smarty_tpl->tpl_vars['edition']->value;?>
" />
					<input type="submit" value="Afficher rendez-vous"/>
				</form>
				-->
				</section>
			</section>
			<br>


			<section id="Publicite">
				<section id="resultatBlocGauche">
				<h2> Publicite </h2>

				<p> Affichage des rendez-vous des prochains jours </p>

					<table id="affCalendrierResultat">
					<tr>
						<th id="dateResultat"> Date du rendez-vous </th>
						<th> Rendez-vous de la journée </th>
						<th> Reprogrammé </th>
						<th> Non rencontré </th>
						<th> En attente de réponse </th>
					</tr>

					<tr>
					<!-- La suite de foreach permet de sortir le tableau-->
					<?php
$_from = $_smarty_tpl->tpl_vars['listePublicite']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item1'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item1']->_loop = false;
$_smarty_tpl->tpl_vars['key1'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
$_smarty_tpl->tpl_vars['item1']->_loop = true;
$foreach_item1_Sav = $_smarty_tpl->tpl_vars['item1'];
?>
						<tr>
							<?php
$_from = $_smarty_tpl->tpl_vars['listePublicite']->value[$_smarty_tpl->tpl_vars['key1']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item2'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item2']->_loop = false;
$_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
$_smarty_tpl->tpl_vars['item2']->_loop = true;
$foreach_item2_Sav = $_smarty_tpl->tpl_vars['item2'];
?>
								<td id="dateResultat"><?php echo $_smarty_tpl->tpl_vars['key2']->value;?>
</td>
								<!--RDV-->
								<td>
									<ul>
									<?php
$_from = $_smarty_tpl->tpl_vars['listePublicite']->value[$_smarty_tpl->tpl_vars['key1']->value][$_smarty_tpl->tpl_vars['key2']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['res'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['res']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
$_smarty_tpl->tpl_vars['res']->_loop = true;
$foreach_res_Sav = $_smarty_tpl->tpl_vars['res'];
?>
											<li><?php echo $_smarty_tpl->tpl_vars['res']->value['nom'];?>
</li>
									<?php
$_smarty_tpl->tpl_vars['res'] = $foreach_res_Sav;
}
?>
									<ul>
								</td>
								<!--Reprogrammé-->
								<td>
									<ul>
									<?php
$_from = $_smarty_tpl->tpl_vars['listePublicite']->value[$_smarty_tpl->tpl_vars['key1']->value][$_smarty_tpl->tpl_vars['key2']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['res'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['res']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
$_smarty_tpl->tpl_vars['res']->_loop = true;
$foreach_res_Sav = $_smarty_tpl->tpl_vars['res'];
?>
											<?php if ($_smarty_tpl->tpl_vars['res']->value['statut'] == 2) {?>
											<li><?php echo $_smarty_tpl->tpl_vars['res']->value['nom'];?>
</li>
											<?php }?>
									<?php
$_smarty_tpl->tpl_vars['res'] = $foreach_res_Sav;
}
?>
									<ul>
								</td>
								<!--Non rencontré-->
								<td>
									<ul>
									<?php
$_from = $_smarty_tpl->tpl_vars['listePublicite']->value[$_smarty_tpl->tpl_vars['key1']->value][$_smarty_tpl->tpl_vars['key2']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['res'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['res']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
$_smarty_tpl->tpl_vars['res']->_loop = true;
$foreach_res_Sav = $_smarty_tpl->tpl_vars['res'];
?>
											<?php if ($_smarty_tpl->tpl_vars['res']->value['statut'] == 3) {?>
											<li><?php echo $_smarty_tpl->tpl_vars['res']->value['nom'];?>
</li>
											<?php }?>
									<?php
$_smarty_tpl->tpl_vars['res'] = $foreach_res_Sav;
}
?>
									<ul>
								</td>
								<!--En attente de réponse-->
								<td>
									<ul>
									<?php
$_from = $_smarty_tpl->tpl_vars['listePublicite']->value[$_smarty_tpl->tpl_vars['key1']->value][$_smarty_tpl->tpl_vars['key2']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['res'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['res']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
$_smarty_tpl->tpl_vars['res']->_loop = true;
$foreach_res_Sav = $_smarty_tpl->tpl_vars['res'];
?>
											<?php if ($_smarty_tpl->tpl_vars['res']->value['statut'] == 5) {?>
											<li><?php echo $_smarty_tpl->tpl_vars['res']->value['nom'];?>
</li>
											<?php }?>
									<?php
$_smarty_tpl->tpl_vars['res'] = $foreach_res_Sav;
}
?>
									<ul>
								</td>
							<?php
$_smarty_tpl->tpl_vars['item2'] = $foreach_item2_Sav;
}
?>
						</tr>
					<?php
$_smarty_tpl->tpl_vars['item1'] = $foreach_item1_Sav;
}
?>

					</table>

				</section>

				<section id="resultatBlocHautDroite">
				<h3> Liste des organismes publicitaire signés à date : </h3>
					<section id="listeSigneResultat">
					<ul>
						<?php $_smarty_tpl->tpl_vars['cpt1'] = new Smarty_Variable(0, null, 0);?>
						<?php $_smarty_tpl->tpl_vars['cpt2'] = new Smarty_Variable(0, null, 0);?>
						<?php
$_from = $_smarty_tpl->tpl_vars['listeStatutPublicite']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['restaurant'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['restaurant']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['restaurant']->value) {
$_smarty_tpl->tpl_vars['restaurant']->_loop = true;
$foreach_restaurant_Sav = $_smarty_tpl->tpl_vars['restaurant'];
?>
							<?php if ($_smarty_tpl->tpl_vars['restaurant']->value['statut'] == 1) {?>
							<li><?php echo $_smarty_tpl->tpl_vars['restaurant']->value['nom'];?>
</li>
							<?php $_smarty_tpl->tpl_vars['cpt1'] = new Smarty_Variable($_smarty_tpl->tpl_vars['cpt1']->value+1, null, 0);?>
							<?php } elseif ($_smarty_tpl->tpl_vars['restaurant']->value['statut'] == 4) {?>
							<?php $_smarty_tpl->tpl_vars['cpt2'] = new Smarty_Variable($_smarty_tpl->tpl_vars['cpt2']->value+1, null, 0);?>
							<?php }?>
						<?php
$_smarty_tpl->tpl_vars['restaurant'] = $foreach_restaurant_Sav;
}
?>
					</ul>
					</section>

					<h3> Recapitulatif signatures et refus</h3>
					<table>
						<tr>
							<th>Nombre d'organismes publicitaires signés </th>
							<td><?php echo $_smarty_tpl->tpl_vars['cpt1']->value;?>
</td>
						</tr>
						<tr>
							<th>Nombre de refus définitif</th>
							<td><?php echo $_smarty_tpl->tpl_vars['cpt2']->value;?>
</td>
						</tr>
					</table>
					<h3> Plus de détails </h3>
					<form method="post" action="listeRefus.php" id="formRefus">
						<p> Liste des refus : </p>
						<input type="hidden" name="edition" value="<?php echo $_smarty_tpl->tpl_vars['edition']->value;?>
" />
						<input type="hidden" name="typePartenaire" value="Publicite" />
						<input type="submit" value="Voir les refus"/>
					</form>
					<!--
					<form action="affichageDuréePlusLongue.php">
					</form>
					-->
				</section>

				<section id="resultatModificationBlocBas">
				<h3> Modification des entrées </h3>
				<form method="post" action="modificationStatutPartenaire.php" id="formModification" >
					<p> Modification statut organisme publicitaire : <p>
					<select name="idPartenaire">
						<?php
$_from = $_smarty_tpl->tpl_vars['listeStatutPublicite']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['restaurant'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['restaurant']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['restaurant']->value) {
$_smarty_tpl->tpl_vars['restaurant']->_loop = true;
$foreach_restaurant_Sav = $_smarty_tpl->tpl_vars['restaurant'];
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['restaurant']->value['id'];?>
"/> <?php echo $_smarty_tpl->tpl_vars['restaurant']->value['nom'];?>
 </option>
						<?php
$_smarty_tpl->tpl_vars['restaurant'] = $foreach_restaurant_Sav;
}
?>
					</select>
					<select name="nouveauStatut">
						<option value="signe"> Signé </option>
						<option value="reprogramme"> Reprogrammé </option>
						<option value="nonRencontre"> Non rencontré </option>
						<option value="refus"> Refus définitif </option>
					</select>
					<input type="hidden" name="typePartenaire" value="Publicite" />
					<input type="hidden" name="edition" value="<?php echo $_smarty_tpl->tpl_vars['edition']->value;?>
" />
					<input type="submit" value="Changer statut"/>
				</form>
				<!--
				<br>
				<form method="post" action="modificationDateRdv.php" id="formModification" >
					<p> A quelle date est le rendez vous que vous souhaitez reprogrammé : <p>
					<select name="dateConsultee">
					<?php
$_from = $_smarty_tpl->tpl_vars['listeRestaurant']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item1'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item1']->_loop = false;
$_smarty_tpl->tpl_vars['key1'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key1']->value => $_smarty_tpl->tpl_vars['item1']->value) {
$_smarty_tpl->tpl_vars['item1']->_loop = true;
$foreach_item1_Sav = $_smarty_tpl->tpl_vars['item1'];
?>
							<?php
$_from = $_smarty_tpl->tpl_vars['listeRestaurant']->value[$_smarty_tpl->tpl_vars['key1']->value];
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['item2'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['item2']->_loop = false;
$_smarty_tpl->tpl_vars['key2'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key2']->value => $_smarty_tpl->tpl_vars['item2']->value) {
$_smarty_tpl->tpl_vars['item2']->_loop = true;
$foreach_item2_Sav = $_smarty_tpl->tpl_vars['item2'];
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['key2']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['key2']->value;?>
</option>
							<?php
$_smarty_tpl->tpl_vars['item2'] = $foreach_item2_Sav;
}
?>
					<?php
$_smarty_tpl->tpl_vars['item1'] = $foreach_item1_Sav;
}
?>
					</select>
					<input type="hidden" name="typePartenaire" value="Publicite" />
					<input type="hidden" name="edition" value="<?php echo $_smarty_tpl->tpl_vars['edition']->value;?>
" />
					<input type="submit" value="Afficher rendez-vous"/>
				</form>
				-->
				</section>
			</section>
			<br>
		</body>

</html>
<?php }
}
?>