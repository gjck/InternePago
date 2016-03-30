<?php /* Smarty version 3.1.24, created on 2016-02-26 11:49:24
         compiled from "/Applications/MAMP/htdocs/PAGO 2/html/modificationStatutPartenaire.html" */ ?>
<?php
/*%%SmartyHeaderCode:129214797656d02db4d2a440_62660383%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'e04630ab6b1321faaaac6116e51481cc1c247fef' => 
    array (
      0 => '/Applications/MAMP/htdocs/PAGO 2/html/modificationStatutPartenaire.html',
      1 => 1456483759,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '129214797656d02db4d2a440_62660383',
  'variables' => 
  array (
    'admin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56d02db4d52263_19997884',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d02db4d52263_19997884')) {
function content_56d02db4d52263_19997884 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '129214797656d02db4d2a440_62660383';
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

				<h1 id="titre_accueil_centre"> Modification effectuée </h1>
				
				<section id="bloc_middle">
				<p> La modification a été effectuée </p>
						<?php if ($_smarty_tpl->tpl_vars['admin']->value == 2) {?>
							<div id="rapport">
							<p><a href="affichage_resultats.php">Retourner aux resultats</a></p>		
							</div>
						<?php } else { ?>
							<div id="rapport">
							<p><a href="resultats.php">Retourner aux resultats</a></p>		
							</div>
						<?php }?>
				</section>
		</body>

</html>
<?php }
}
?>