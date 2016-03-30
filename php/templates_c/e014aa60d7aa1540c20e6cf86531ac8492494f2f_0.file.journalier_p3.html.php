<?php /* Smarty version 3.1.24, created on 2016-03-15 13:47:17
         compiled from "/Applications/MAMP/htdocs/PAGO 2/html/journalier_p3.html" */ ?>
<?php
/*%%SmartyHeaderCode:86285389456e804557ea226_85545556%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e014aa60d7aa1540c20e6cf86531ac8492494f2f' => 
    array (
      0 => '/Applications/MAMP/htdocs/PAGO 2/html/journalier_p3.html',
      1 => 1458045756,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '86285389456e804557ea226_85545556',
  'variables' => 
  array (
    'listeComiteEntreprise' => 0,
    'ce' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56e80455826520_23730963',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e80455826520_23730963')) {
function content_56e80455826520_23730963 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '86285389456e804557ea226_85545556';
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

				<h1 id="titre_accueil_centre"> Etape 2 : Les comités d'entreprises </h1>

				<section id="bloc_middle">
					<form method="post" action="journalier_p4.php">
						<p> Vos rendez-vous quotidiens avec des comités d'entreprises étaient les suivants, merci de mettre leur statut à jour : </p>
						<table>
							<tr>
								<th> Nom de l'entreprise </th>
								<th> Non rencontré </th>
								<th> Signé </th>
								<th> Refus </th>
								<th> Reprogrammé </th>
								<th> En attente de réponse </th>
							</tr>
							<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(0, null, 0);?>
							<?php
$_from = $_smarty_tpl->tpl_vars['listeComiteEntreprise']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['ce'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['ce']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['ce']->value) {
$_smarty_tpl->tpl_vars['ce']->_loop = true;
$foreach_ce_Sav = $_smarty_tpl->tpl_vars['ce'];
?>
							<tr>
								<td> <?php echo $_smarty_tpl->tpl_vars['ce']->value['nom'];?>
  </td>
				 				<td> <input type="radio" name="statut[<?php echo $_smarty_tpl->tpl_vars['ce']->value['id'];?>
]" value="nonRencontre" checked/></td>
				 				<td> <input type="radio" name="statut[<?php echo $_smarty_tpl->tpl_vars['ce']->value['id'];?>
]" value="signe" id="signe"/></td>
				 				<td> <input type="radio" name="statut[<?php echo $_smarty_tpl->tpl_vars['ce']->value['id'];?>
]" value="refus" id="refus"/></td>
				 				<td> <input type="radio" name="statut[<?php echo $_smarty_tpl->tpl_vars['ce']->value['id'];?>
]" value="reprogramme" id="reprogramme"/></td>
								<td> <input type="radio" name="statut[<?php echo $_smarty_tpl->tpl_vars['ce']->value['id'];?>
]" value="attenteReponse" id="attenteReponse"/></td>
				 				<input type="hidden" name="id[<?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['ce']->value['id'];?>
"/>
				 			</tr>
							<?php
$_smarty_tpl->tpl_vars['ce'] = $foreach_ce_Sav;
}
?>
						</table>
						<p> Avez-vous rencontré d'autres comités d'entreprises aujourd'hui, si oui, combien?
						<float id="question"><input type="number" min=0 max=50 name="nb_ce"/></p>
						<p> Combien de rendez-vous avec des comités d'entreprise avez-vous prévus cette semaine?
						<float id="question"><input type="number" min=0 max=50 name="nb_rdv_ce"/></p>
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