<?php /* Smarty version 3.1.24, created on 2016-03-16 16:21:57
         compiled from "/Applications/MAMP/htdocs/PAGO 2/html/journalier_p5.html" */ ?>
<?php
/*%%SmartyHeaderCode:62038945456e97a15106cb2_82140336%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'cd9cb30ec4555d31f98aec22335a4f787ffe4ff9' => 
    array (
      0 => '/Applications/MAMP/htdocs/PAGO 2/html/journalier_p5.html',
      1 => 1458140953,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '62038945456e97a15106cb2_82140336',
  'variables' => 
  array (
    'listePointDeVente' => 0,
    'pdv' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56e97a15148ab1_21895742',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e97a15148ab1_21895742')) {
function content_56e97a15148ab1_21895742 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '62038945456e97a15106cb2_82140336';
?>
<!DOCTYPE html>

<html>

		<head>
				<meta charset="utf-8" />
				<title> Gabrice Editions : Etape 1 </title>
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

				<h1 id="titre_accueil_centre"> Etape 2 : Les distributeurs </h1>

				<section id="bloc_middle">
					<form method="post" action="journalier_p6.php">
						<p> Vos rendez-vous quotidiens étaient les suivants, merci de mettre leur statut à jour : </p>
						<table>
							<tr>
								<th> Nom point de vente </th>
								<th> Non rencontré </th>
								<th> Signé </th>
								<th> Refus </th>
								<th> Reprogrammé </th>
								<th> En attente de réponse </th>
							</tr>
							<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(0, null, 0);?>
							<?php
$_from = $_smarty_tpl->tpl_vars['listePointDeVente']->value;
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
				 				<td> <input type="radio" name="statut[<?php echo $_smarty_tpl->tpl_vars['pdv']->value['id'];?>
]" value="nonRencontre" checked/></td>
				 				<td> <input type="radio" name="statut[<?php echo $_smarty_tpl->tpl_vars['pdv']->value['id'];?>
]" value="signe" id="signe"/></td>
				 				<td> <input type="radio" name="statut[<?php echo $_smarty_tpl->tpl_vars['pdv']->value['id'];?>
]" value="refus" id="refus"/></td>
				 				<td> <input type="radio" name="statut[<?php echo $_smarty_tpl->tpl_vars['pdv']->value['id'];?>
]" value="reprogramme" id="reprogramme"/></td>
								<td> <input type="radio" name="statut[<?php echo $_smarty_tpl->tpl_vars['pdv']->value['id'];?>
]" value="attenteReponse" id="attenteReponse"/></td>
				 				<input type="hidden" name="id[<?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['pdv']->value['id'];?>
"/>
				 			</tr>
							<?php
$_smarty_tpl->tpl_vars['pdv'] = $foreach_pdv_Sav;
}
?>
						</table>
						<p> Avez-vous rencontré d'autres distributeurs aujourd'hui, si oui, combien?
						<float id="question"><input type="number" min=0 max=50 name="nb_pdv"/></p>
						<p> Combien de rendez-vous avez vous prévus avec des distributeurs dans les jours à venir?
						<float id="question"><input type="number" min=0 max=50 name="nb_rdv"/></p>
						<input type="hidden" name="max" value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"/>
						<p><input type="submit" value="Passer à l'étape suivante" id="validation_bouton"/></float></p>
					</form>
				</section>
		</body>

</html>
<?php }
}
?>