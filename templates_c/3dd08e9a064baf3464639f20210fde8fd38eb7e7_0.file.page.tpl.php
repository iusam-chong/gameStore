<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-14 09:14:32
  from '/Users/sam_chong/Documents/Github/gameStore/views/cart/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f86c17812fd96_27620147',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3dd08e9a064baf3464639f20210fde8fd38eb7e7' => 
    array (
      0 => '/Users/sam_chong/Documents/Github/gameStore/views/cart/page.tpl',
      1 => 1602666818,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f86c17812fd96_27620147 (Smarty_Internal_Template $_smarty_tpl) {
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
            <tr bgcolor="#003087" style="color: white;">
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
                    <div>
                        <form class="productQuantity">
                            <input type="hidden" name="productId" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
">
                            <select class="form-control center-block" name="quantity" class="selector" style="width:auto;">
                                <?php ob_start();
$_smarty_tpl->_assignInScope('flag', false);
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>


                                <?php ob_start();
if ($_smarty_tpl->tpl_vars['product']->value['total_quantity'] == 0) {
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>

                                <option value="delete" selected>product not exist</option>
                                <?php ob_start();
$_smarty_tpl->_assignInScope('flag', true);
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>

                                <?php ob_start();
} elseif ($_smarty_tpl->tpl_vars['product']->value['total_quantity'] < $_smarty_tpl->tpl_vars['product']->value['quantity']) {
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>

                                <option value="edit <?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['total_quantity'];
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
" selected>product not exist</option>
                                <?php ob_start();
}
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>


                                <?php ob_start();
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) min(ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['product']->value['total_quantity']+1 - (1) : 1-($_smarty_tpl->tpl_vars['product']->value['total_quantity'])+1)/abs($_smarty_tpl->tpl_vars['i']->step)),10);
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>

                                <?php ob_start();
if ($_smarty_tpl->tpl_vars['flag']->value) {
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>

                                <?php ob_start();
continue 1;
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>

                                <?php ob_start();
}
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>

                                <?php ob_start();
if ($_smarty_tpl->tpl_vars['product']->value['quantity'] === $_smarty_tpl->tpl_vars['i']->value) {
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>

                                <option value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>
" selected><?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>
</option>
                                <?php ob_start();
} else {
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>

                                <option value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;?>
</option>
                                <?php ob_start();
}
$_prefixVariable23 = ob_get_clean();
echo $_prefixVariable23;?>

                                <?php ob_start();
}
}
$_prefixVariable24 = ob_get_clean();
echo $_prefixVariable24;?>

                            </select>
                        </form>
                    </div>
                </td>
                <td class="text-center subtotal" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['price']*$_smarty_tpl->tpl_vars['product']->value['quantity'];
$_prefixVariable25 = ob_get_clean();
echo $_prefixVariable25;?>
</td>
                <td class="col-xs-2" style="vertical-align: middle;">
                    <form class="deleteFromCart">
                        <input type="hidden" name="productId" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable26 = ob_get_clean();
echo $_prefixVariable26;?>
"></input>
                        <button type="submit" class="btn btn-danger btn-block">刪除</button>
                    </form>
                </td>
            </tr>
            <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable27 = ob_get_clean();
echo $_prefixVariable27;?>

            <tr>
                <td colspan="4" style="vertical-align: middle;">
                    <h4 style="float:right">TOTAL:</h4>
                </td>
                <td colspan="1" style="vertical-align: middle;">
                    <h4 class="text-center" id="total"></h4>
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
$_prefixVariable28 = ob_get_clean();
echo $_prefixVariable28;?>


<p class="text-center">跟你的錢包一樣是空的</p>

<?php ob_start();
}
$_prefixVariable29 = ob_get_clean();
echo $_prefixVariable29;
}
}
