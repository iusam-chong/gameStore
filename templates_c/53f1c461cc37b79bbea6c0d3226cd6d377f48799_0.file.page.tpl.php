<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-03 08:21:59
  from 'C:\Users\ALPHA\Documents\Github\gameStore\views\index\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f78188726cd46_33654380',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '53f1c461cc37b79bbea6c0d3226cd6d377f48799' => 
    array (
      0 => 'C:\\Users\\ALPHA\\Documents\\Github\\gameStore\\views\\index\\page.tpl',
      1 => 1601294230,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f78188726cd46_33654380 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1><?php ob_start();
echo $_smarty_tpl->tpl_vars['userName']->value;
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
, Welcome to index</h1>
<?php }
}
