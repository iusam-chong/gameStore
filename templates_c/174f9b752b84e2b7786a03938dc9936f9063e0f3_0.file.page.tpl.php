<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-12 08:45:01
  from '/Users/sam_chong/Documents/Github/gameStore/views/index/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f84178d92b127_55088135',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '174f9b752b84e2b7786a03938dc9936f9063e0f3' => 
    array (
      0 => '/Users/sam_chong/Documents/Github/gameStore/views/index/page.tpl',
      1 => 1602118871,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f84178d92b127_55088135 (Smarty_Internal_Template $_smarty_tpl) {
?>
<h1><?php ob_start();
echo $_smarty_tpl->tpl_vars['userName']->value;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
 ，welcome</h1>
<?php }
}
