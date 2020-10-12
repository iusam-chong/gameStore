<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-12 09:09:52
  from '/Users/sam_chong/Documents/Github/gameStore/views/cart/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f841d60cefa44_14118447',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3dd08e9a064baf3464639f20210fde8fd38eb7e7' => 
    array (
      0 => '/Users/sam_chong/Documents/Github/gameStore/views/cart/page.tpl',
      1 => 1602119498,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f841d60cefa44_14118447 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="module" src="http://localhost:8888/gameStore/js/cart.js" defer><?php echo '</script'; ?>
>
<h1 class="text-center">購物車</h1>
<hr>

<?php ob_start();
if ($_smarty_tpl->tpl_vars['carts']->value) {
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>


<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th colspan="2" scope="col" class="col-xs-7 text-center">遊戲商品</th>
                <th scope="col" class="col-xs-2 text-center">價格</th>
                <th scope="col" class="col-xs-2 text-center">數量</th>
                <th scope="col" class="col-xs-1"></th>
            </tr>
        </thead>
        <tbody>
            <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carts']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>

            <tr>
                <td class="col-xs-2" style="vertical-align: middle;"><img style="width:100px;" src="http://localhost:8888/gameStore/show/image/<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
"></td>
                <td class="col-xs-5" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['name'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
</td>
                <td class="col-xs-2 text-center" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['price'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
</td>
                <td class="col-xs-1 text-center" style="vertical-align: middle;">1</td>
                <td class="col-xs-2" style="vertical-align: middle;">
                    <form method="POST" class="deleteFromCart">
                        <input type="hidden" name="productId" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
"></input>
                        <button class="btn btn-danger btn-block">刪除</button>
                    </form>
                </td>
            </tr>
            <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>

            <tr>
                <td colspan="2" style="vertical-align: middle;">
                    <h4 style="float:right">TOTAL:</h4>
                </td>
                <td colspan="1" style="vertical-align: middle;">
                    <h4 class="text-center"><?php ob_start();
echo $_smarty_tpl->tpl_vars['total']->value;
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
</h4>
                </td>
                <td colspan="2">
                    <div id="bill">
                        <form method="POST">
                            <button class="btn btn-primary btn-block">購買</button>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

<?php ob_start();
} else {
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>


<p class="text-center">跟你的錢包一樣是空的</p>

<?php ob_start();
}
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;
}
}
