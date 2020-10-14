<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-14 17:23:54
  from 'C:\Users\ALPHA\Documents\Github\gameStore\views\statement\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f87180a133362_74704054',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b274e1a38d0b8a00047db70c90bc45bc2b80d13e' => 
    array (
      0 => 'C:\\Users\\ALPHA\\Documents\\Github\\gameStore\\views\\statement\\page.tpl',
      1 => 1602675718,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f87180a133362_74704054 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="module" src="http://localhost:8888/gameStore/js/statement.js" defer><?php echo '</script'; ?>
>
<h1 class="text-center">交易紀錄</h1>
<hr>
<div class="container">
    <?php ob_start();
if ($_smarty_tpl->tpl_vars['order']->value) {
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

        <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['order']->value, 'o');
$_smarty_tpl->tpl_vars['o']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['o']->value) {
$_smarty_tpl->tpl_vars['o']->do_else = false;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>

            <div class="order">
                <table class="table">
                    
                    <thead>
                        <tr bgcolor="#003087" style="color: white;">
                            <th colspan="2" scope="col" class="col-xs-6 text-center">遊戲商品</th>
                            <th scope="col" class="col-xs-2 text-center">數量</th>
                            <th scope="col" class="col-xs-2 text-center">單價</th>
                            <th scope="col" class="col-xs-2 text-center">小計</th>
                        </tr>
                    </thead>
        
                    <tbody class="orderDetails">
                        <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orderDetails']->value, 'od');
$_smarty_tpl->tpl_vars['od']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['od']->value) {
$_smarty_tpl->tpl_vars['od']->do_else = false;
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>

                            <?php ob_start();
if ($_smarty_tpl->tpl_vars['o']->value['id'] === $_smarty_tpl->tpl_vars['od']->value['order_id']) {
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>

                
                                <tr class="statement">
                                    <td class="col-xs-2" style="vertical-align: middle;"><img style="width:100px;" src="http://localhost:8888/gameStore/show/image/<?php ob_start();
echo $_smarty_tpl->tpl_vars['od']->value['product_id'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
"></td>
                                    <td class="col-xs-4" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['od']->value['name'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
</td>
                                    <td class="col-xs-2 text-center quantity" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['od']->value['quantity'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
</td>
                                    <td class="col-xs-2 text-center price" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['od']->value['price'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
</td>
                                    <td class="col-xs-2 text-center subtotal" style="vertical-align: middle;">0</td>
                                </tr>
                            <?php ob_start();
}
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>

                        <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>

                        <tr>
                            <td colspan="3" style="vertical-align: middle;"><h5>訂單日期 : <?php ob_start();
echo $_smarty_tpl->tpl_vars['o']->value['bill_time'];
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
</h5></td>
                            <td class="text-center" style="vertical-align: middle;">
                                <h5>TOTAL :</h5>
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                <h5 class="total">0</h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
        <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>

        <hr>
    <?php ob_start();
} else {
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>

        <p class="text-center">查無交易</p>
    <?php ob_start();
}
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>

</div>


<div class="container text-center">
    <ul class="pagination">
        <?php ob_start();
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['pagination']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['pagination']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>

            <?php ob_start();
if ($_smarty_tpl->tpl_vars['currentPage']->value == $_smarty_tpl->tpl_vars['i']->value) {
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>

                <li class="active"><a href="http://localhost:8888/gameStore/statement/page/<?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>
</a></li>
            <?php ob_start();
} else {
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>

                <li><a href="http://localhost:8888/gameStore/statement/page/<?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;?>
</a></li>
            <?php ob_start();
}
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;?>

        <?php ob_start();
}
}
$_prefixVariable23 = ob_get_clean();
echo $_prefixVariable23;?>

    </ul>
</div><?php }
}
