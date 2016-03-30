<?php /* Smarty version 3.1.24, created on 2016-02-26 11:23:50
         compiled from "/Applications/MAMP/htdocs/PAGO 2/html/listeRefus.html" */ ?>
<?php
/*%%SmartyHeaderCode:172434332256d027b6a0bc70_24678648%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '1f30f7dbfad0bec8383a443c136993077dd05d87' => 
    array (
      0 => '/Applications/MAMP/htdocs/PAGO 2/html/listeRefus.html',
      1 => 1456482228,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '172434332256d027b6a0bc70_24678648',
  'variables' => 
  array (
    'listeRefus' => 0,
    'refus' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56d027b6a2a863_93157333',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d027b6a2a863_93157333')) {
function content_56d027b6a2a863_93157333 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '172434332256d027b6a0bc70_24678648';
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

				<h1 id="titre_accueil_centre"> Liste détaillée des refus </h1>
				
				<section id="bloc_middle">
				<ul>
				<?php
$_from = $_smarty_tpl->tpl_vars['listeRefus']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['refus'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['refus']->_loop = false;
foreach ($_from as $_smarty_tpl->tpl_vars['refus']->value) {
$_smarty_tpl->tpl_vars['refus']->_loop = true;
$foreach_refus_Sav = $_smarty_tpl->tpl_vars['refus'];
?>
					<li><?php echo $_smarty_tpl->tpl_vars['refus']->value['nom'];?>
</li>
				<?php
$_smarty_tpl->tpl_vars['refus'] = $foreach_refus_Sav;
}
?>
				</ul>
				<br><a href="javascript:history.back()">Retourner à la page précédente</a>
				</section>
		</body>

</html>
<?php }
}
?>