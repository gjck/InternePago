<?php /* Smarty version 3.1.24, created on 2016-02-25 17:52:42
         compiled from "/Applications/MAMP/htdocs/PAGO 2/html/resultats.html" */ ?>
<?php
/*%%SmartyHeaderCode:33965154356cf315a20ecf9_84766747%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3da7a8207b09414444c7a7e88fe00e94ea9a9baf' => 
    array (
      0 => '/Applications/MAMP/htdocs/PAGO 2/html/resultats.html',
      1 => 1456393658,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '33965154356cf315a20ecf9_84766747',
  'variables' => 
  array (
    'edition' => 0,
    'listeEdition' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56cf315a22c465_11605977',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56cf315a22c465_11605977')) {
function content_56cf315a22c465_11605977 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '33965154356cf315a20ecf9_84766747';
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

				<h1 id="titre_accueil_centre"> Résultats </h1>
				
				<section id="bloc_middle">
				<h2> Edition à consulter </h2>
					<form method="post" action="affichage_resultats.php">
						<p>Edition : 
							<select name="choixEdition">
							<?php
$_from = $_smarty_tpl->tpl_vars['edition']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['listeEdition'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['listeEdition']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['listeEdition']->value) {
$_smarty_tpl->tpl_vars['listeEdition']->_loop = true;
$foreach_listeEdition_Sav = $_smarty_tpl->tpl_vars['listeEdition'];
?>
								<option> <?php echo $_smarty_tpl->tpl_vars['listeEdition']->value['nom'];?>
 </option>
							<?php
$_smarty_tpl->tpl_vars['listeEdition'] = $foreach_listeEdition_Sav;
}
?>
							</select>
						</p>
						<input type="submit" value="Consulter les résultats" id="validation_bouton"/>
					</form> 
				</section>

		</body>

</html>

<?php }
}
?>