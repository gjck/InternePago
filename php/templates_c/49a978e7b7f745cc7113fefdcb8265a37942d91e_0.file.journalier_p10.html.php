<?php /* Smarty version 3.1.24, created on 2016-03-16 16:22:46
         compiled from "/Applications/MAMP/htdocs/PAGO 2/html/journalier_p10.html" */ ?>
<?php
/*%%SmartyHeaderCode:205898225256e97a463c2360_97254323%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '49a978e7b7f745cc7113fefdcb8265a37942d91e' => 
    array (
      0 => '/Applications/MAMP/htdocs/PAGO 2/html/journalier_p10.html',
      1 => 1458141644,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '205898225256e97a463c2360_97254323',
  'variables' => 
  array (
    'recapRestaurant' => 0,
    'res' => 0,
    'recapRdvRestaurant' => 0,
    'rdvRes' => 0,
    'recapPointDeVente' => 0,
    'pdv' => 0,
    'recapRdvPointDeVente' => 0,
    'rdvPdv' => 0,
    'recapPublicite' => 0,
    'pub' => 0,
    'recapRdvPublicite' => 0,
    'rdvPub' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56e97a46444022_91931801',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e97a46444022_91931801')) {
function content_56e97a46444022_91931801 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '205898225256e97a463c2360_97254323';
?>
<!DOCTYPE html>

<html>

		<head>
				<meta charset="utf-8" />
				<title> Gabrice Editions : Etape 2 </title>
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

				<h1 id="titre_accueil_centre"> Recapitulatif</h1>

				<section id="bloc_middle">
					<form method="post" action="journalier_p11.php">
						<h2> Récapitulatif des entrées d'aujourd'hui </h2>
						<p> Vous avez fini le questionnaire, voici vos entrées quotidiennes. </p>
						<p> Vous pourrez les modifier après avoir cliquer sur "Finaliser le questionnaire". </p>

						<h3> Nouveaux contacts partenaire</h3>
						<table id="jour_p1">
							<tr>
								<th> Partenaire </th>
								<th> Type </th>
								<th> Statut </th>

							</tr>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(0, null, 0);?>
						<?php
$_from = $_smarty_tpl->tpl_vars['recapRestaurant']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['res'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['res']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['res']->value) {
$_smarty_tpl->tpl_vars['res']->_loop = true;
$foreach_res_Sav = $_smarty_tpl->tpl_vars['res'];
?>
							<tr>
								<td> <?php echo $_smarty_tpl->tpl_vars['res']->value['nom'];?>
 </td>
								<td> <?php echo $_smarty_tpl->tpl_vars['res']->value['type'];?>
 </td>
								<td> <?php echo $_smarty_tpl->tpl_vars['res']->value['statut'];?>
 </td>
				 			</tr>
						<?php
$_smarty_tpl->tpl_vars['res'] = $foreach_res_Sav;
}
?>
						</table>

						<h3> Nouveaux rendez-vous partenaire</h3>
						<table id="jour_p1">
							<tr>
								<th> Partenaire </th>
								<th> Date rendez-vous </th>
							</tr>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(0, null, 0);?>
						<?php
$_from = $_smarty_tpl->tpl_vars['recapRdvRestaurant']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['rdvRes'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['rdvRes']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rdvRes']->value) {
$_smarty_tpl->tpl_vars['rdvRes']->_loop = true;
$foreach_rdvRes_Sav = $_smarty_tpl->tpl_vars['rdvRes'];
?>
							<tr>
								<td> <?php echo $_smarty_tpl->tpl_vars['rdvRes']->value['nom'];?>
 </td>
								<td> <?php echo $_smarty_tpl->tpl_vars['rdvRes']->value['rdv'];?>
 </td>
				 			</tr>
						<?php
$_smarty_tpl->tpl_vars['rdvRes'] = $foreach_rdvRes_Sav;
}
?>
						</table>

						<h3> Nouveaux contacts disitributeurs</h3>
						<table id="jour_p1">
							<tr>
								<th> Distributeur </th>
								<th> Type </th>
								<th> Statut </th>
							</tr>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(0, null, 0);?>
						<?php
$_from = $_smarty_tpl->tpl_vars['recapPointDeVente']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['pdv'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['pdv']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['pdv']->value) {
$_smarty_tpl->tpl_vars['pdv']->_loop = true;
$foreach_pdv_Sav = $_smarty_tpl->tpl_vars['pdv'];
?>
							<tr>
								<td> <?php echo $_smarty_tpl->tpl_vars['pdv']->value['nom'];?>
 </td>
								<td> <?php echo $_smarty_tpl->tpl_vars['pdv']->value['type'];?>
 </td>
								<td> <?php echo $_smarty_tpl->tpl_vars['pdv']->value['statut'];?>
 </td>
				 			</tr>
						<?php
$_smarty_tpl->tpl_vars['pdv'] = $foreach_pdv_Sav;
}
?>
						</table>

						<h3> Nouveaux rendez-vous points de vente</h3>
						<table id="jour_p1">
							<tr>
								<th> Point de vente </th>
								<th> Date rendez-vous </th>
							</tr>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(0, null, 0);?>
						<?php
$_from = $_smarty_tpl->tpl_vars['recapRdvPointDeVente']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['rdvPdv'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['rdvPdv']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rdvPdv']->value) {
$_smarty_tpl->tpl_vars['rdvPdv']->_loop = true;
$foreach_rdvPdv_Sav = $_smarty_tpl->tpl_vars['rdvPdv'];
?>
							<tr>
								<td> <?php echo $_smarty_tpl->tpl_vars['rdvPdv']->value['nom'];?>
 </td>
								<td> <?php echo $_smarty_tpl->tpl_vars['rdvPdv']->value['rdv'];?>
 </td>
				 			</tr>
						<?php
$_smarty_tpl->tpl_vars['rdvPdv'] = $foreach_rdvPdv_Sav;
}
?>
						</table>

						<h3> Nouveaux contacts publicite</h3>
						<table id="jour_p1">
							<tr>
								<th> Organisme publicitaire </th>
								<th> Statut </th>
							</tr>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(0, null, 0);?>
						<?php
$_from = $_smarty_tpl->tpl_vars['recapPublicite']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['pub'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['pub']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['pub']->value) {
$_smarty_tpl->tpl_vars['pub']->_loop = true;
$foreach_pub_Sav = $_smarty_tpl->tpl_vars['pub'];
?>
							<tr>
								<td> <?php echo $_smarty_tpl->tpl_vars['pub']->value['nom'];?>
 </td>
								<td> <?php echo $_smarty_tpl->tpl_vars['pub']->value['statut'];?>
 </td>
				 			</tr>
						<?php
$_smarty_tpl->tpl_vars['pub'] = $foreach_pub_Sav;
}
?>
						</table>

						<h3> Nouveaux rendez-vous publicite</h3>
						<table id="jour_p1">
							<tr>
								<th> Organisme publicitaire </th>
								<th> Date rendez-vous </th>
							</tr>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(0, null, 0);?>
						<?php
$_from = $_smarty_tpl->tpl_vars['recapRdvPublicite']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['rdvPub'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['rdvPub']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['rdvPub']->value) {
$_smarty_tpl->tpl_vars['rdvPub']->_loop = true;
$foreach_rdvPub_Sav = $_smarty_tpl->tpl_vars['rdvPub'];
?>
							<tr>
								<td> <?php echo $_smarty_tpl->tpl_vars['rdvPub']->value['nom'];?>
 </td>
								<td> <?php echo $_smarty_tpl->tpl_vars['rdvPub']->value['rdv'];?>
 </td>
				 			</tr>
						<?php
$_smarty_tpl->tpl_vars['rdvPub'] = $foreach_rdvPub_Sav;
}
?>
						</table>

						<p>
						<div>
						<input type="submit" value="Finaliser rapport" id="validation_bouton"/>
						</div>
						</p>

					</form>
				</section>
		</body>

</html>
<?php }
}
?>