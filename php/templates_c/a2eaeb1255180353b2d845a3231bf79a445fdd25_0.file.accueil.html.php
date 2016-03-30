<?php /* Smarty version 3.1.24, created on 2016-02-25 17:53:56
         compiled from "/Applications/MAMP/htdocs/PAGO 2/html/accueil.html" */ ?>
<?php
/*%%SmartyHeaderCode:22196510856cf31a47debb4_56748737%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a2eaeb1255180353b2d845a3231bf79a445fdd25' => 
    array (
      0 => '/Applications/MAMP/htdocs/PAGO 2/html/accueil.html',
      1 => 1456419234,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '22196510856cf31a47debb4_56748737',
  'variables' => 
  array (
    'booleen' => 0,
    'admin' => 0,
    'id_user' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56cf31a480b996_85305359',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56cf31a480b996_85305359')) {
function content_56cf31a480b996_85305359 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '22196510856cf31a47debb4_56748737';
?>
<!DOCTYPE html>

<html>

		<head>
				<meta charset="utf-8" />
				<title> Gabrice Editions : Acceuil </title>
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

				<h1 id="titre_accueil_centre"> Que voulez vous faire ?  </h1>

				<section id="bloc_middle">
				<h2> Rédaction d'un rapport <h2>
					<!--<div id="rapport">
					<a href="journalier_p1.php"><img src="../img/icones/rapport.png" /></a>		
					</div>-->
					<?php if ($_smarty_tpl->tpl_vars['booleen']->value == 1) {?>
						<?php if ($_smarty_tpl->tpl_vars['admin']->value == 2) {?>
							<div id="rapport">
							<a href="affichage_resultats.php"><img src="../img/icones/resultats.jpg" /></a>		
							</div>
						<?php } else { ?>
							<div id="rapport">
							<a href="resultats.php"><img src="../img/icones/resultats.jpg" /></a>		
							</div>
						<?php }?>	
					<?php } else { ?>
					<div id="rapport">
					<a href="journalier_p1.php"><img src="../img/icones/rapport.png" /></a>		
					</div>
					<?php }?>
					
				<!--	<div id="rapport">
					<a href=""><img src="img/icones/rapport.png" /></a>		
					</div> -->
					
				</section>
				
				<?php if ($_smarty_tpl->tpl_vars['admin']->value == 0) {?>
				<section id="bloc_middle">
				<br>
				RESULTATS DES TESTS <br>
				ID_USER : <?php echo $_smarty_tpl->tpl_vars['id_user']->value;?>

				</section>
				<?php }?>
		</body>

</html>

<?php }
}
?>