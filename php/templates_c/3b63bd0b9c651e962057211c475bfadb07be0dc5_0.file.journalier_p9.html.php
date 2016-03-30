<?php /* Smarty version 3.1.24, created on 2016-02-24 15:54:37
         compiled from "/Applications/MAMP/htdocs/PAGO 2/html/journalier_p9.html" */ ?>
<?php
/*%%SmartyHeaderCode:209137343856cdc42d4d4030_99724444%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b63bd0b9c651e962057211c475bfadb07be0dc5' => 
    array (
      0 => '/Applications/MAMP/htdocs/PAGO 2/html/journalier_p9.html',
      1 => 1456321885,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '209137343856cdc42d4d4030_99724444',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56cdc42d4f4f59_77192804',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56cdc42d4f4f59_77192804')) {
function content_56cdc42d4f4f59_77192804 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '209137343856cdc42d4d4030_99724444';
?>
<!DOCTYPE html>

<html>

		<head>
				<meta charset="utf-8" />
				<title> Gabrice Editions : Etape 3 </title>
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

				<h1 id="titre_accueil_centre"> Etape 5 : Remarques éventuelles </h1>

				<section id="bloc_middle">
				
					<form method="post" action="journalier_p10.php">
						<p id="etp1"> Merci de donner vos remarques éventuelles</p>
							<p>
									<textarea name="rqs" rows="5" cols="90"> Indiquez vos remarques ici. </textarea>
							</p>
						<div>
							<input type="submit" value="Envoyer le rapport" id="validation_bouton"/>
						</div>
					</form>
					
				</section>
		</body>

</html>

<?php }
}
?>