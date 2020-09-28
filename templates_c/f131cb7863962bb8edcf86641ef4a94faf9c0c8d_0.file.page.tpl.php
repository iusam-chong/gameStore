<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-28 15:15:06
  from 'C:\Users\ALPHA\Documents\Github\gameStore\views\register\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f71e1da74e7d3_34621863',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f131cb7863962bb8edcf86641ef4a94faf9c0c8d' => 
    array (
      0 => 'C:\\Users\\ALPHA\\Documents\\Github\\gameStore\\views\\register\\page.tpl',
      1 => 1601294230,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f71e1da74e7d3_34621863 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1><?php ob_start();
echo $_smarty_tpl->tpl_vars['userName']->value;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
, Welcome to register</h1>
<?php }
}
