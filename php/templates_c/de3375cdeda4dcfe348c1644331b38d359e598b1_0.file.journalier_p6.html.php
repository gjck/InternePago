<?php /* Smarty version 3.1.24, created on 2016-03-16 16:22:02
         compiled from "/Applications/MAMP/htdocs/PAGO 2/html/journalier_p6.html" */ ?>
<?php
/*%%SmartyHeaderCode:116672523756e97a1a2d5de1_52986045%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'de3375cdeda4dcfe348c1644331b38d359e598b1' => 
    array (
      0 => '/Applications/MAMP/htdocs/PAGO 2/html/journalier_p6.html',
      1 => 1458140954,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '116672523756e97a1a2d5de1_52986045',
  'variables' => 
  array (
    'nb_pdv' => 0,
    'nb_rdv' => 0,
    'listeNomPointDeVente' => 0,
    'listeNom' => 0,
    'max' => 0,
    'max_rdv' => 0,
    'pointDeVenteReprogrammes' => 0,
    'pdv' => 0,
    'cpt' => 0,
    'i' => 0,
    'cpt2' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56e97a1a3e30d5_70237194',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e97a1a3e30d5_70237194')) {
function content_56e97a1a3e30d5_70237194 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '116672523756e97a1a2d5de1_52986045';
?>
<!DOCTYPE html>

<html>

		<head>
				<meta charset="utf-8" />
				<title> Gabrice Editions : Etape 1 </title>
				<link rel="stylesheet" href="../css/style.css" />

				<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  				<?php echo '<script'; ?>
 src="//code.jquery.com/jquery-1.10.2.js"><?php echo '</script'; ?>
>
  				<?php echo '<script'; ?>
 src="//code.jquery.com/ui/1.11.4/jquery-ui.js"><?php echo '</script'; ?>
>

  				<?php if ($_smarty_tpl->tpl_vars['nb_pdv']->value == 0 || $_smarty_tpl->tpl_vars['nb_pdv']->value < 0) {?>
					<?php if ($_smarty_tpl->tpl_vars['nb_pdv']->value < 0) {?>
					<?php $_smarty_tpl->tpl_vars['max'] = new Smarty_Variable(0, null, 0);?>
					<?php }?>
				<?php } else { ?>
					<?php if ($_smarty_tpl->tpl_vars['nb_pdv']->value < 50) {?>
					<?php $_smarty_tpl->tpl_vars['max'] = new Smarty_Variable($_smarty_tpl->tpl_vars['nb_pdv']->value, null, 0);?>
					<?php } else { ?>
					<?php $_smarty_tpl->tpl_vars['max'] = new Smarty_Variable(50, null, 0);?>
					<?php }?>
				<?php }?>

				<?php if ($_smarty_tpl->tpl_vars['nb_rdv']->value == 0 || $_smarty_tpl->tpl_vars['nb_rdv']->value < 0) {?>
				<?php if ($_smarty_tpl->tpl_vars['nb_rdv']->value < 0) {?>
					<?php $_smarty_tpl->tpl_vars['max_rdv'] = new Smarty_Variable(0, null, 0);?>
				<?php }?>
				<?php } else { ?>
					<?php if ($_smarty_tpl->tpl_vars['nb_rdv']->value < 50) {?>
					<?php $_smarty_tpl->tpl_vars['max_rdv'] = new Smarty_Variable($_smarty_tpl->tpl_vars['nb_rdv']->value, null, 0);?>
					<?php } else { ?>
					<?php $_smarty_tpl->tpl_vars['max_rdv'] = new Smarty_Variable(50, null, 0);?>
					<?php }?>
				<?php }?>

  				
  				<?php echo '<script'; ?>
>
  					$(function()
  					{
    					var availableTags =
    						[
    							
    							<?php
$_from = $_smarty_tpl->tpl_vars['listeNomPointDeVente']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['listeNom'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['listeNom']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['listeNom']->value) {
$_smarty_tpl->tpl_vars['listeNom']->_loop = true;
$foreach_listeNom_Sav = $_smarty_tpl->tpl_vars['listeNom'];
?>
      						 		"<?php echo $_smarty_tpl->tpl_vars['listeNom']->value['nom'];?>
",
      							<?php
$_smarty_tpl->tpl_vars['listeNom'] = $foreach_listeNom_Sav;
}
?>
      							
    						];

    						var maxIte1=<?php echo $_smarty_tpl->tpl_vars['max']->value;?>
;
    						var maxIte2=<?php echo $_smarty_tpl->tpl_vars['max_rdv']->value;?>
;

    						for(var iter1=1; iter1<=maxIte1; iter1++)
    						{
    							$( "#tags"+iter1 ).autocomplete
    							({
      								source: availableTags
    							});
    						}

    						for(var iter2=1; iter2<=maxIte2; iter2++)
    						{
    							$( "#tags2"+iter2 ).autocomplete
    							({
      								source: availableTags
    							});
    						}

  					});
  				<?php echo '</script'; ?>
>
  				
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

				<h1 id="titre_accueil_centre"> Etape 2 : Les distributeurs </h1>

				<section id="bloc_middle">

					<form method="post" action="journalier_p7.php">
						<h2> Rendez-vous reprogrammés </h2>
						<p> Merci d'indiquer la date à laquelle vous avez prévu de revoir ces distributeurs </p>
						<table id="table1">
							<tr>
								<th> Nom distributeur </th>
								<th> Date pour reprogrammation </th>
							</tr>
						<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(0, null, 0);?>
						<?php
$_from = $_smarty_tpl->tpl_vars['pointDeVenteReprogrammes']->value;
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
								<td>  <select name="jour2[<?php echo $_smarty_tpl->tpl_vars['pdv']->value['id'];?>
]"> <?php $_smarty_tpl->tpl_vars['cpt'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['cpt']->step = 1;$_smarty_tpl->tpl_vars['cpt']->total = (int) ceil(($_smarty_tpl->tpl_vars['cpt']->step > 0 ? 31+1 - (1) : 1-(31)+1)/abs($_smarty_tpl->tpl_vars['cpt']->step));
if ($_smarty_tpl->tpl_vars['cpt']->total > 0) {
for ($_smarty_tpl->tpl_vars['cpt']->value = 1, $_smarty_tpl->tpl_vars['cpt']->iteration = 1;$_smarty_tpl->tpl_vars['cpt']->iteration <= $_smarty_tpl->tpl_vars['cpt']->total;$_smarty_tpl->tpl_vars['cpt']->value += $_smarty_tpl->tpl_vars['cpt']->step, $_smarty_tpl->tpl_vars['cpt']->iteration++) {
$_smarty_tpl->tpl_vars['cpt']->first = $_smarty_tpl->tpl_vars['cpt']->iteration == 1;$_smarty_tpl->tpl_vars['cpt']->last = $_smarty_tpl->tpl_vars['cpt']->iteration == $_smarty_tpl->tpl_vars['cpt']->total;?> <option value="<?php echo $_smarty_tpl->tpl_vars['cpt']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['cpt']->value;?>
 </option> <?php }} ?> </select>
									  <select name="mois2[<?php echo $_smarty_tpl->tpl_vars['pdv']->value['id'];?>
]"> <?php $_smarty_tpl->tpl_vars['cpt'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['cpt']->step = 1;$_smarty_tpl->tpl_vars['cpt']->total = (int) ceil(($_smarty_tpl->tpl_vars['cpt']->step > 0 ? 12+1 - (1) : 1-(12)+1)/abs($_smarty_tpl->tpl_vars['cpt']->step));
if ($_smarty_tpl->tpl_vars['cpt']->total > 0) {
for ($_smarty_tpl->tpl_vars['cpt']->value = 1, $_smarty_tpl->tpl_vars['cpt']->iteration = 1;$_smarty_tpl->tpl_vars['cpt']->iteration <= $_smarty_tpl->tpl_vars['cpt']->total;$_smarty_tpl->tpl_vars['cpt']->value += $_smarty_tpl->tpl_vars['cpt']->step, $_smarty_tpl->tpl_vars['cpt']->iteration++) {
$_smarty_tpl->tpl_vars['cpt']->first = $_smarty_tpl->tpl_vars['cpt']->iteration == 1;$_smarty_tpl->tpl_vars['cpt']->last = $_smarty_tpl->tpl_vars['cpt']->iteration == $_smarty_tpl->tpl_vars['cpt']->total;?> <option value="<?php echo $_smarty_tpl->tpl_vars['cpt']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['cpt']->value;?>
 </option> <?php }} ?> </select>
									  <select name="annee2[<?php echo $_smarty_tpl->tpl_vars['pdv']->value['id'];?>
]"> <?php $_smarty_tpl->tpl_vars['cpt'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['cpt']->step = 1;$_smarty_tpl->tpl_vars['cpt']->total = (int) ceil(($_smarty_tpl->tpl_vars['cpt']->step > 0 ? 2060+1 - (2016) : 2016-(2060)+1)/abs($_smarty_tpl->tpl_vars['cpt']->step));
if ($_smarty_tpl->tpl_vars['cpt']->total > 0) {
for ($_smarty_tpl->tpl_vars['cpt']->value = 2016, $_smarty_tpl->tpl_vars['cpt']->iteration = 1;$_smarty_tpl->tpl_vars['cpt']->iteration <= $_smarty_tpl->tpl_vars['cpt']->total;$_smarty_tpl->tpl_vars['cpt']->value += $_smarty_tpl->tpl_vars['cpt']->step, $_smarty_tpl->tpl_vars['cpt']->iteration++) {
$_smarty_tpl->tpl_vars['cpt']->first = $_smarty_tpl->tpl_vars['cpt']->iteration == 1;$_smarty_tpl->tpl_vars['cpt']->last = $_smarty_tpl->tpl_vars['cpt']->iteration == $_smarty_tpl->tpl_vars['cpt']->total;?> <option value="<?php echo $_smarty_tpl->tpl_vars['cpt']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['cpt']->value;?>
 </option> <?php }} ?> </select>
								</td>
				 				<input type="hidden" name="RP[<?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['pdv']->value['id'];?>
"/>
				 			</tr>
						<?php
$_smarty_tpl->tpl_vars['pdv'] = $foreach_pdv_Sav;
}
?>
						<input type="hidden" name="maxReprog" value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
" />
						</table>

						<h2> Nouveau rendez vous aujourd'hui </h2>
						<p> Merci d'indiquer les distributerus que vous avez vu aujourd'hui sans les avoir déclarés plus tôt </p>
						<?php if ($_smarty_tpl->tpl_vars['nb_pdv']->value == 0 || $_smarty_tpl->tpl_vars['nb_pdv']->value < 0) {?>
						<?php if ($_smarty_tpl->tpl_vars['nb_pdv']->value < 0) {?> <?php $_smarty_tpl->tpl_vars['max'] = new Smarty_Variable(0, null, 0);?> <?php }?>
						<p> Vous n'avez pas rencontré de distributeurs supplémentaires aujourd'hui, vous pouvez passer à l'étape suivante </p>
						<?php } else { ?>
						<?php if ($_smarty_tpl->tpl_vars['nb_pdv']->value < 50) {?>
						<?php $_smarty_tpl->tpl_vars['max'] = new Smarty_Variable($_smarty_tpl->tpl_vars['nb_pdv']->value, null, 0);?>
						<?php } else { ?>
						<?php $_smarty_tpl->tpl_vars['max'] = new Smarty_Variable(50, null, 0);?>
						<?php }?>
						<table id="table1">
							<tr>
								<th> Nom distributeur </th>
								<th> Type </th>
								<th> Signé </th>
								<th> En attente de réponse </th>
								<th> Refus </th>
							</tr>
							<?php $_smarty_tpl->tpl_vars['cpt'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['cpt']->step = 1;$_smarty_tpl->tpl_vars['cpt']->total = (int) ceil(($_smarty_tpl->tpl_vars['cpt']->step > 0 ? $_smarty_tpl->tpl_vars['max']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['max']->value)+1)/abs($_smarty_tpl->tpl_vars['cpt']->step));
if ($_smarty_tpl->tpl_vars['cpt']->total > 0) {
for ($_smarty_tpl->tpl_vars['cpt']->value = 1, $_smarty_tpl->tpl_vars['cpt']->iteration = 1;$_smarty_tpl->tpl_vars['cpt']->iteration <= $_smarty_tpl->tpl_vars['cpt']->total;$_smarty_tpl->tpl_vars['cpt']->value += $_smarty_tpl->tpl_vars['cpt']->step, $_smarty_tpl->tpl_vars['cpt']->iteration++) {
$_smarty_tpl->tpl_vars['cpt']->first = $_smarty_tpl->tpl_vars['cpt']->iteration == 1;$_smarty_tpl->tpl_vars['cpt']->last = $_smarty_tpl->tpl_vars['cpt']->iteration == $_smarty_tpl->tpl_vars['cpt']->total;?>
							<tr>
								<td> <input type="text" name="nom_pdv[<?php echo $_smarty_tpl->tpl_vars['cpt']->value;?>
]" size="40" id="tags<?php echo $_smarty_tpl->tpl_vars['cpt']->value;?>
"/> </td>
								<td> <select name="type[<?php echo $_smarty_tpl->tpl_vars['cpt']->value;?>
]" > <option value="1"> Comité d'entreprise </option>
																								 <option value="2"> Point de vente </option>
																							   <option value="0"> Autre </option>
										 </select> </td>
				 				<td> <input type="radio" name="choix[<?php echo $_smarty_tpl->tpl_vars['cpt']->value;?>
]" value="signe" id="signe" checked/></td>
								<td> <input type="radio" name="choix[<?php echo $_smarty_tpl->tpl_vars['cpt']->value;?>
]" value="attenteReponse" id="attenteReponse"/></td>
				 				<td> <input type="radio" name="choix[<?php echo $_smarty_tpl->tpl_vars['cpt']->value;?>
]" value="refus" id="refus"/></td>
				 			</tr>
				 			<?php }} ?>
						</table>
						<?php }?>
						<input type="hidden" name="maxRdvToday" value="<?php echo $_smarty_tpl->tpl_vars['max']->value;?>
" />

						<h2> Nouveau rendez vous prévus </h2>
						<p> Merci d'indiquer les rendez-vous prévus dans la semaine </p>
						<?php if ($_smarty_tpl->tpl_vars['nb_rdv']->value == 0 || $_smarty_tpl->tpl_vars['nb_rdv']->value < 0) {?>
						<?php if ($_smarty_tpl->tpl_vars['nb_rdv']->value < 0) {?> <?php $_smarty_tpl->tpl_vars['max_rdv'] = new Smarty_Variable(0, null, 0);?> <?php }?>
						<p> Vous n'avez pas de rendez-vous prévus dans la semaine </p>
						<?php } else { ?>
						<?php if ($_smarty_tpl->tpl_vars['nb_rdv']->value < 50) {?>
						<?php $_smarty_tpl->tpl_vars['max_rdv'] = new Smarty_Variable($_smarty_tpl->tpl_vars['nb_rdv']->value, null, 0);?>
						<?php } else { ?>
						<?php $_smarty_tpl->tpl_vars['max_rdv'] = new Smarty_Variable(50, null, 0);?>
						<?php }?>
						<table id="table1">
							<tr>
								<th> Nom distributeur </th>
								<th> Type </th>
								<th> Date du rendez-vous </th>
							</tr>
							<?php $_smarty_tpl->tpl_vars['cpt2'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['cpt2']->step = 1;$_smarty_tpl->tpl_vars['cpt2']->total = (int) ceil(($_smarty_tpl->tpl_vars['cpt2']->step > 0 ? $_smarty_tpl->tpl_vars['max_rdv']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['max_rdv']->value)+1)/abs($_smarty_tpl->tpl_vars['cpt2']->step));
if ($_smarty_tpl->tpl_vars['cpt2']->total > 0) {
for ($_smarty_tpl->tpl_vars['cpt2']->value = 1, $_smarty_tpl->tpl_vars['cpt2']->iteration = 1;$_smarty_tpl->tpl_vars['cpt2']->iteration <= $_smarty_tpl->tpl_vars['cpt2']->total;$_smarty_tpl->tpl_vars['cpt2']->value += $_smarty_tpl->tpl_vars['cpt2']->step, $_smarty_tpl->tpl_vars['cpt2']->iteration++) {
$_smarty_tpl->tpl_vars['cpt2']->first = $_smarty_tpl->tpl_vars['cpt2']->iteration == 1;$_smarty_tpl->tpl_vars['cpt2']->last = $_smarty_tpl->tpl_vars['cpt2']->iteration == $_smarty_tpl->tpl_vars['cpt2']->total;?>
							<tr>
								<td> <input type="text" name="nom_rdv_pdv[<?php echo $_smarty_tpl->tpl_vars['cpt2']->value;?>
]" size="40" id="tags2<?php echo $_smarty_tpl->tpl_vars['cpt2']->value;?>
"/>  </td>
								<td> <select name="typeDis[<?php echo $_smarty_tpl->tpl_vars['cpt2']->value;?>
]" > <option value="1"> Comité d'entreprise </option>
																								 			<option value="2"> Point de vente </option>
																							   			<option value="0"> Autre </option>
										 </select> </td>
				 				<td> <select name="jour4[<?php echo $_smarty_tpl->tpl_vars['cpt2']->value;?>
]"> <?php $_smarty_tpl->tpl_vars['cpt'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['cpt']->step = 1;$_smarty_tpl->tpl_vars['cpt']->total = (int) ceil(($_smarty_tpl->tpl_vars['cpt']->step > 0 ? 31+1 - (1) : 1-(31)+1)/abs($_smarty_tpl->tpl_vars['cpt']->step));
if ($_smarty_tpl->tpl_vars['cpt']->total > 0) {
for ($_smarty_tpl->tpl_vars['cpt']->value = 1, $_smarty_tpl->tpl_vars['cpt']->iteration = 1;$_smarty_tpl->tpl_vars['cpt']->iteration <= $_smarty_tpl->tpl_vars['cpt']->total;$_smarty_tpl->tpl_vars['cpt']->value += $_smarty_tpl->tpl_vars['cpt']->step, $_smarty_tpl->tpl_vars['cpt']->iteration++) {
$_smarty_tpl->tpl_vars['cpt']->first = $_smarty_tpl->tpl_vars['cpt']->iteration == 1;$_smarty_tpl->tpl_vars['cpt']->last = $_smarty_tpl->tpl_vars['cpt']->iteration == $_smarty_tpl->tpl_vars['cpt']->total;?> <option value="<?php echo $_smarty_tpl->tpl_vars['cpt']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['cpt']->value;?>
 </option> <?php }} ?> </select>
									 <select name="mois4[<?php echo $_smarty_tpl->tpl_vars['cpt2']->value;?>
]"> <?php $_smarty_tpl->tpl_vars['cpt'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['cpt']->step = 1;$_smarty_tpl->tpl_vars['cpt']->total = (int) ceil(($_smarty_tpl->tpl_vars['cpt']->step > 0 ? 12+1 - (1) : 1-(12)+1)/abs($_smarty_tpl->tpl_vars['cpt']->step));
if ($_smarty_tpl->tpl_vars['cpt']->total > 0) {
for ($_smarty_tpl->tpl_vars['cpt']->value = 1, $_smarty_tpl->tpl_vars['cpt']->iteration = 1;$_smarty_tpl->tpl_vars['cpt']->iteration <= $_smarty_tpl->tpl_vars['cpt']->total;$_smarty_tpl->tpl_vars['cpt']->value += $_smarty_tpl->tpl_vars['cpt']->step, $_smarty_tpl->tpl_vars['cpt']->iteration++) {
$_smarty_tpl->tpl_vars['cpt']->first = $_smarty_tpl->tpl_vars['cpt']->iteration == 1;$_smarty_tpl->tpl_vars['cpt']->last = $_smarty_tpl->tpl_vars['cpt']->iteration == $_smarty_tpl->tpl_vars['cpt']->total;?> <option value="<?php echo $_smarty_tpl->tpl_vars['cpt']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['cpt']->value;?>
 </option> <?php }} ?> </select>
									 <select name="annee4[<?php echo $_smarty_tpl->tpl_vars['cpt2']->value;?>
]"> <?php $_smarty_tpl->tpl_vars['cpt'] = new Smarty_Variable;$_smarty_tpl->tpl_vars['cpt']->step = 1;$_smarty_tpl->tpl_vars['cpt']->total = (int) ceil(($_smarty_tpl->tpl_vars['cpt']->step > 0 ? 2060+1 - (2016) : 2016-(2060)+1)/abs($_smarty_tpl->tpl_vars['cpt']->step));
if ($_smarty_tpl->tpl_vars['cpt']->total > 0) {
for ($_smarty_tpl->tpl_vars['cpt']->value = 2016, $_smarty_tpl->tpl_vars['cpt']->iteration = 1;$_smarty_tpl->tpl_vars['cpt']->iteration <= $_smarty_tpl->tpl_vars['cpt']->total;$_smarty_tpl->tpl_vars['cpt']->value += $_smarty_tpl->tpl_vars['cpt']->step, $_smarty_tpl->tpl_vars['cpt']->iteration++) {
$_smarty_tpl->tpl_vars['cpt']->first = $_smarty_tpl->tpl_vars['cpt']->iteration == 1;$_smarty_tpl->tpl_vars['cpt']->last = $_smarty_tpl->tpl_vars['cpt']->iteration == $_smarty_tpl->tpl_vars['cpt']->total;?> <option value="<?php echo $_smarty_tpl->tpl_vars['cpt']->value;?>
"> <?php echo $_smarty_tpl->tpl_vars['cpt']->value;?>
 </option> <?php }} ?> </select>	</td>
				 			</tr>
				 			<?php }} ?>
						</table>
						<?php }?>
						<input type="hidden" name="maxRdv" value="<?php echo $_smarty_tpl->tpl_vars['max_rdv']->value;?>
" />

						<p>
						<div>
						<input type="submit" value="Passer à l'étape suivante" id="validation_bouton"/>
						</div>
						</p>

					</form>

				</section>
		</body>

</html>
<?php }
}
?>