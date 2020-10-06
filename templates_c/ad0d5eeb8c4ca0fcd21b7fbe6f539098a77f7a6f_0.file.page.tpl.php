<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-06 09:21:06
  from '/Users/sam_chong/Documents/Github/gameStore/views/membermanage/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7c37022c3d37_23144788',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad0d5eeb8c4ca0fcd21b7fbe6f539098a77f7a6f' => 
    array (
      0 => '/Users/sam_chong/Documents/Github/gameStore/views/membermanage/page.tpl',
      1 => 1601976064,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f7c37022c3d37_23144788 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>member manage</h1>

<?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['members']->value, 'member');
$_smarty_tpl->tpl_vars['member']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['member']->value) {
$_smarty_tpl->tpl_vars['member']->do_else = false;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

    <p><?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['id'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
</p>
    <p><?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['user_name'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</p>
    <p><?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['enabled'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
</p>
    <hr>
<?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;
}
}
