<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-12 09:09:53
  from '/Users/sam_chong/Documents/Github/gameStore/views/shop/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f841d61404d49_79992501',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '93ea4304854a4e424b6fcfb59d212f41c152ea5f' => 
    array (
      0 => '/Users/sam_chong/Documents/Github/gameStore/views/shop/page.tpl',
      1 => 1602486554,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f841d61404d49_79992501 (Smarty_Internal_Template $_smarty_tpl) {
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
                        <?php ob_start();
if ($_smarty_tpl->tpl_vars['userCart']->value) {
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>

                            <?php ob_start();
$_smarty_tpl->_assignInScope('flag', true);
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>

                            <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['userCart']->value, 'cart');
$_smarty_tpl->tpl_vars['cart']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['cart']->value) {
$_smarty_tpl->tpl_vars['cart']->do_else = false;
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>

                                <?php ob_start();
if ($_smarty_tpl->tpl_vars['cart']->value['product_id'] === $_smarty_tpl->tpl_vars['product']->value['id']) {
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>

                                    <p><button type="submit" id="<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
" class="btn btn-primary btn-block" disabled>已加入購物車</button></p>
                                    <?php ob_start();
$_smarty_tpl->_assignInScope('flag', false);
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>

                                    <?php ob_start();
break 1;
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>

                                <?php ob_start();
}
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>

                            <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>

                            <?php ob_start();
if ($_smarty_tpl->tpl_vars['flag']->value) {
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>

                                <p><button type="submit" id="<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>
" class="btn btn-primary btn-block">TWD <?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['price'];
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>
 <span class="glyphicon glyphicon-shopping-cart"></span></button></p>
                            <?php ob_start();
}
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>

                        <?php ob_start();
} else {
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>

                            <p><button type="submit" id="<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>
" class="btn btn-primary btn-block">TWD <?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['price'];
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>
 <span class="glyphicon glyphicon-shopping-cart"></span></button></p>
                        <?php ob_start();
}
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;?>

                    </form>
                </div>
            </div>
        </div>
        <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;?>

    </div>
</div>
<hr>

<div class="container text-center">
    <ul class="pagination">
        <?php ob_start();
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['pagination']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['pagination']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;
$_prefixVariable23 = ob_get_clean();
echo $_prefixVariable23;?>

        <?php ob_start();
if ($_smarty_tpl->tpl_vars['currentPage']->value == $_smarty_tpl->tpl_vars['i']->value) {
$_prefixVariable24 = ob_get_clean();
echo $_prefixVariable24;?>

        <li class="active"><a href="http://localhost:8888/gameStore/shop/page/<?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable25 = ob_get_clean();
echo $_prefixVariable25;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable26 = ob_get_clean();
echo $_prefixVariable26;?>
</a></li>
        <?php ob_start();
} else {
$_prefixVariable27 = ob_get_clean();
echo $_prefixVariable27;?>

        <li><a href="http://localhost:8888/gameStore/shop/page/<?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable28 = ob_get_clean();
echo $_prefixVariable28;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable29 = ob_get_clean();
echo $_prefixVariable29;?>
</a></li>
        <?php ob_start();
}
$_prefixVariable30 = ob_get_clean();
echo $_prefixVariable30;?>

        <?php ob_start();
}
}
$_prefixVariable31 = ob_get_clean();
echo $_prefixVariable31;?>

    </ul>
</div><?php }
}
