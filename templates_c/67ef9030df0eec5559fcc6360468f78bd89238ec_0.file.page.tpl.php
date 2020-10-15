<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-15 09:47:23
  from '/Users/sam_chong/Documents/Github/gameStore/views/memberstatement/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f881aab6d43e6_20691842',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '67ef9030df0eec5559fcc6360468f78bd89238ec' => 
    array (
      0 => '/Users/sam_chong/Documents/Github/gameStore/views/memberstatement/page.tpl',
      1 => 1602755241,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f881aab6d43e6_20691842 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="module" src="http://localhost:8888/gameStore/js/memberstatement.js" defer><?php echo '</script'; ?>
>
<h1 class="text-center">會員交易明細</h1>
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
                                    <td class="col-xs-2" style="vertical-align: middle;"><img style="width:50px;" src="http://localhost:8888/gameStore/show/image/<?php ob_start();
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

        <p class="text-center">窮鬼無交易紀錄</p>
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

                <li class="active"><a href="http://localhost:8888/gameStore/memberstatement/id/<?php ob_start();
echo $_smarty_tpl->tpl_vars['memberId']->value;
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>
/<?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>
</a></li>
            <?php ob_start();
} else {
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>

                <li><a href="http://localhost:8888/gameStore/memberstatement/id/<?php ob_start();
echo $_smarty_tpl->tpl_vars['memberId']->value;
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;?>
/<?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable23 = ob_get_clean();
echo $_prefixVariable23;?>
</a></li>
            <?php ob_start();
}
$_prefixVariable24 = ob_get_clean();
echo $_prefixVariable24;?>

        <?php ob_start();
}
}
$_prefixVariable25 = ob_get_clean();
echo $_prefixVariable25;?>

    </ul>
</div><?php }
}
