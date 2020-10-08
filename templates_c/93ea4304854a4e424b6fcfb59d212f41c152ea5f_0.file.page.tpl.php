<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-08 01:10:08
  from '/Users/sam_chong/Documents/Github/gameStore/views/shop/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7e66f05ea836_59996718',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93ea4304854a4e424b6fcfb59d212f41c152ea5f' => 
    array (
      0 => '/Users/sam_chong/Documents/Github/gameStore/views/shop/page.tpl',
      1 => 1602056847,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f7e66f05ea836_59996718 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="module" src="http://localhost:8888/gameStore/js/shop.js" defer><?php echo '</script'; ?>
>
<h1 class="text-center">遊戲商店</h1>
<hr>

<div class="container">
    <div class="row">
        <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

        <div class="col-sm-4 col-md-3">
            <div class="thumbnail">
                <img src="http://localhost:8888/gameStore/show/image/<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
">
                <div class="caption">
                    <h4 class="text-center"><?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['name'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</h4>
                    <form method="POST">
                        <input type="hidden" name="productId" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
"></input>
                        <p><button type="submit" id="<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
" class="btn btn-primary btn-block">TWD <?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['price'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
 <span class="glyphicon glyphicon-shopping-cart"></span></button></p>
                    </form>
                </div>
            </div>
        </div>
        <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>

    </div>
</div><?php }
}
