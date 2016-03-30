<?php /* Smarty version 3.1.24, created on 2016-02-26 12:16:35
         compiled from "/Applications/MAMP/htdocs/PAGO 2/html/nav.html" */ ?>
<?php
/*%%SmartyHeaderCode:96699475056d034137c0a71_76100015%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '609d131e3b64d6390ca50450692f8d60c6033428' => 
    array (
      0 => '/Applications/MAMP/htdocs/PAGO 2/html/nav.html',
      1 => 1456485353,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '96699475056d034137c0a71_76100015',
  'variables' => 
  array (
    'admin' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_56d034137dade6_33680494',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_56d034137dade6_33680494')) {
function content_56d034137dade6_33680494 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '96699475056d034137c0a71_76100015';
?>
<float id="menu">
<a href="accueil.php"> Accueil </a>
</float>

<!--					
<float id="menu">
<a href=""> Mon Compte </a>
</float>
					
<float id="menu">
<a href=""> Contacts </a>
</float>
-->
					
<float id="menu">
<a href="deconnexion.php"> Déconnexion </a>
</float>
					
<?php if (isset($_smarty_tpl->tpl_vars['admin']->value) && $_smarty_tpl->tpl_vars['admin']->value == 0) {?>
<float id="menu">
<a href="administration.php"> Administration </a>
</float>
<?php }?>
					
<?php if (isset($_smarty_tpl->tpl_vars['admin']->value) && $_smarty_tpl->tpl_vars['admin']->value < 2) {?>
<float id="menu">
<a href="resultats.php"> Résultats </a>
</float>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['admin']->value) && ($_smarty_tpl->tpl_vars['admin']->value == 2 || $_smarty_tpl->tpl_vars['admin']->value == 0)) {?>
<float id="menu">
<a href="affichage_resultats.php"> Calendrier </a>
</float>
<?php }?>	<?php }
}
?>