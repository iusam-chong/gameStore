<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-07 10:17:39
  from '/Users/sam_chong/Documents/Github/gameStore/views/statement/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7d95c3657de7_52848165',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '06536b963e028589b5e9b84fc88dd76103bd8054' => 
    array (
      0 => '/Users/sam_chong/Documents/Github/gameStore/views/statement/page.tpl',
      1 => 1602065852,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f7d95c3657de7_52848165 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>this is statement</h1>

<?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['statement']->value, 's');
$_smarty_tpl->tpl_vars['s']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['s']->value) {
$_smarty_tpl->tpl_vars['s']->do_else = false;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>


<p><?php ob_start();
echo $_smarty_tpl->tpl_vars['s']->value['id'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
</p>
<p><?php ob_start();
echo $_smarty_tpl->tpl_vars['s']->value['user_id'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</p>
<p><?php ob_start();
echo $_smarty_tpl->tpl_vars['s']->value['bill_time'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
</p>
<p><?php ob_start();
echo $_smarty_tpl->tpl_vars['s']->value['product_id'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
</p>
<p><?php ob_start();
echo $_smarty_tpl->tpl_vars['s']->value['name'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
</p>
<p><?php ob_start();
echo $_smarty_tpl->tpl_vars['s']->value['quantity'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
</p>
<hr>

<?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;
}
}
