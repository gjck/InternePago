<?php /* Smarty version 3.1.24, created on 2016-02-19 15:07:28
         compiled from "/Applications/MAMP/htdocs/PAGO 2/html/indexe.html" */ ?>
<?php
/*%%SmartyHeaderCode:83606055056c721a0114746_13303733%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a20ba1fb05c6026282ce03d5240da2765a4fb965' => 
    array (
      0 => '/Applications/MAMP/htdocs/PAGO 2/html/indexe.html',
      1 => 1455890841,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '83606055056c721a0114746_13303733',
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56c721a012f134_56162088',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56c721a012f134_56162088')) {
function content_56c721a012f134_56162088 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '83606055056c721a0114746_13303733';
?>
<!DOCTYPE html>

<html>

		<head>

				<meta charset="utf-8" />

				<title> Gabrice Editions : plate-forme commerciale </title>

				<link rel="stylesheet" href="css/style.css" />

		</head>

		

		<body>

				<header>

					<div id="logo_header">
						<img src="img/logo/logo_gabrice.jpg" />	
					</div>

				</header>

				

				<h1 id="titre_accueil"> Connexion </h1>
	

				<section id="inscription">

							<form  method="post" action="php/connexion_pago.php">							
							<h2> <label for="pseudo" id="alignement_label">Identifiant :</label> <input type="text" name="pseudo" /> </h2>
							<h2> <label for="password" id="alignement_label">Mot de passe :</label> <input type="password" name="password" /> </h2>							
							<div id="bouton_connexion"><input type="submit" value="Connexion" /></div>
							</form>
							<br>

							<div id="connexion">
							<p><a href="" id="inscription"> Mot de passe oublié ? </a></p>
							</div>

				</section>


		</body>

</html>

<?php }
}
?>