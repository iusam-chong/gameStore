<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-07 12:52:49
  from 'C:\Users\ALPHA\Documents\Github\gameStore\views\index\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7dba219df596_71330435',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '53f1c461cc37b79bbea6c0d3226cd6d377f48799' => 
    array (
      0 => 'C:\\Users\\ALPHA\\Documents\\Github\\gameStore\\views\\index\\page.tpl',
      1 => 1602074799,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f7dba219df596_71330435 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1><?php ob_start();
echo $_smarty_tpl->tpl_vars['userName']->value;
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
 ，歡迎頁</h1>
<?php }
}
