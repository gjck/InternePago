<?php /* Smarty version 3.1.24, created on 2016-03-15 13:47:44
         compiled from "/Applications/MAMP/htdocs/PAGO 2/html/journalier_p7.html" */ ?>
<?php
/*%%SmartyHeaderCode:7346677856e80470acd9f1_75283679%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'c866cb8b8ae69b67d55a2a686dbbe0b92b7fd944' => 
    array (
      0 => '/Applications/MAMP/htdocs/PAGO 2/html/journalier_p7.html',
      1 => 1458045936,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '7346677856e80470acd9f1_75283679',
  'variables' => 
  array (
    'listePublicite' => 0,
    'pub' => 0,
    'i' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56e80470b0ee43_97720467',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56e80470b0ee43_97720467')) {
function content_56e80470b0ee43_97720467 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '7346677856e80470acd9f1_75283679';
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

				<h1 id="titre_accueil_centre"> Etape 4 : Publicité </h1>

				<section id="bloc_middle">
					<form method="post" action="journalier_p8.php">
						<p> Vos rendez-vous quotidiens étaient les suivants, merci de mettre leur statut à jour : </p>
						<table>
							<tr>
								<th> Nom organisme publicitaire </th>
								<th> Non rencontré </th>
								<th> Signé </th>
								<th> Refus </th>
								<th> Reprogrammé </th>
								<th> En attente de réponse </th>
							</tr>
							<?php $_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(0, null, 0);?>
							<?php
$_from = $_smarty_tpl->tpl_vars['listePublicite']->value;
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
				 				<td> <input type="radio" name="statut[<?php echo $_smarty_tpl->tpl_vars['pub']->value['id'];?>
]" value="nonRencontre" checked/></td>
				 				<td> <input type="radio" name="statut[<?php echo $_smarty_tpl->tpl_vars['pub']->value['id'];?>
]" value="signe" id="signe"/></td>
				 				<td> <input type="radio" name="statut[<?php echo $_smarty_tpl->tpl_vars['pub']->value['id'];?>
]" value="refus" id="refus"/></td>
				 				<td> <input type="radio" name="statut[<?php echo $_smarty_tpl->tpl_vars['pub']->value['id'];?>
]" value="reprogramme" id="reprogramme"/></td>
								<td> <input type="radio" name="statut[<?php echo $_smarty_tpl->tpl_vars['pub']->value['id'];?>
]" value="attenteReponse" id="attenteReponse"/></td>
				 				<input type="hidden" name="id[<?php echo $_smarty_tpl->tpl_vars['i']->value++;?>
]" value="<?php echo $_smarty_tpl->tpl_vars['pub']->value['id'];?>
"/>
				 			</tr>
							<?php
$_smarty_tpl->tpl_vars['pub'] = $foreach_pub_Sav;
}
?>
						</table>
						<p> Avez-vous rencontré d'autres organismes publicitaires aujourd'hui, si oui, combien?
						<float id="question"><input type="number" min=0 max=50 name="nb_pub"/></p>
						<p> Combien de rendez-vous avez vous prévus cette semaine?
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