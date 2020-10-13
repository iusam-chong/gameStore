<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-13 09:40:26
  from '/Users/sam_chong/Documents/Github/gameStore/views/cart/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f85760a5e3541_33631599',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3dd08e9a064baf3464639f20210fde8fd38eb7e7' => 
    array (
      0 => '/Users/sam_chong/Documents/Github/gameStore/views/cart/page.tpl',
      1 => 1602582005,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f85760a5e3541_33631599 (Smarty_Internal_Template $_smarty_tpl) {
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
                <th colspan="2" scope="col" class="col-xs-5 text-center">遊戲商品</th>
                <th scope="col" class="col-xs-2 text-center">單價</th>
                <th scope="col" class="col-xs-2 text-center">數量</th>
                <th scope="col" class="col-xs-2 text-center">小計</th>
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
                <td style="vertical-align: middle;"><img style="width:100px;" src="http://localhost:8888/gameStore/show/image/<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
"></td>
                <td style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['name'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
</td>
                <td class="text-center price" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['price'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
</td>
                <td class="text-center" style="vertical-align: middle;">
                    <div class="productQuantity">
                        <form action="#">
                            <input type="hidden" name="productId" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
">
                            <select class="form-control center-block" name="quantity" class="selector" style="width:auto;">
                                <?php ob_start();
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) min(ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['product']->value['total_quantity']+1 - (1) : 1-($_smarty_tpl->tpl_vars['product']->value['total_quantity'])+1)/abs($_smarty_tpl->tpl_vars['i']->step)),10);
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>

                                <?php ob_start();
if ($_smarty_tpl->tpl_vars['product']->value['quantity'] === $_smarty_tpl->tpl_vars['i']->value) {
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>

                                <option value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
" selected><?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
</option>
                                <?php ob_start();
} else {
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>

                                <option value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>
</option>
                                <?php ob_start();
}
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>

                                <?php ob_start();
}
}
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>

                            </select>
                        </form>
                    </div>
                </td>
                <td class="text-center subtotal" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['price']*$_smarty_tpl->tpl_vars['product']->value['quantity'];
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>
</td>
                <td class="col-xs-2" style="vertical-align: middle;">
                    <form class="deleteFromCart">
                        <input type="hidden" name="productId" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>
"></input>
                        <button class="btn btn-danger btn-block">刪除</button>
                    </form>
                </td>
            </tr>
            <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>

            <tr>
                <td colspan="4" style="vertical-align: middle;">
                    <h4 style="float:right">TOTAL:</h4>
                </td>
                <td colspan="1" style="vertical-align: middle;">
                    <h4 class="text-center" id="total"><?php ob_start();
echo $_smarty_tpl->tpl_vars['total']->value;
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>
</h4>
                </td>
                <td colspan="1">
                    <div id="bill">
                        <form>
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
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>


<p class="text-center">跟你的錢包一樣是空的</p>

<?php ob_start();
}
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;
}
}
