<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-12 09:09:51
  from '/Users/sam_chong/Documents/Github/gameStore/views/statement/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f841d5fb00774_94289059',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '06536b963e028589b5e9b84fc88dd76103bd8054' => 
    array (
      0 => '/Users/sam_chong/Documents/Github/gameStore/views/statement/page.tpl',
      1 => 1602463025,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f841d5fb00774_94289059 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
    <h1 class="text-center">交易紀錄</h1>
    <hr>
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

        <table class="table table-striped" style="border:1px;">
                <h5>訂單日期 : <?php ob_start();
echo $_smarty_tpl->tpl_vars['o']->value['bill_time'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</h5>
                <thead>
                    <tr>
                        <th colspan="2" scope="col" class="col-xs-8">遊戲商品</th>
                        <th scope="col" class="col-xs-2 text-center">數量</th>
                        <th scope="col" class="col-xs-2 text-center">價格</th>
                    </tr>
                </thead>

            <tbody>
                <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orderDetails']->value, 'od');
$_smarty_tpl->tpl_vars['od']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['od']->value) {
$_smarty_tpl->tpl_vars['od']->do_else = false;
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>

                <?php ob_start();
if ($_smarty_tpl->tpl_vars['o']->value['id'] === $_smarty_tpl->tpl_vars['od']->value['id']) {
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>

                
                <tr>
                    <td class="col-xs-2" style="vertical-align: middle;"><img style="width:100px;" src="http://localhost:8888/gameStore/show/image/<?php ob_start();
echo $_smarty_tpl->tpl_vars['od']->value['product_id'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
"></td>
                    <td class="col-xs-6" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['od']->value['name'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
</td>
                    <td class="col-xs-2 text-center" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['od']->value['quantity'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
</td>
                    <td class="col-xs-2 text-center" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['od']->value['price'];
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
</td>
                </tr>
                <?php ob_start();
}
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>

                <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>

                <tr>
                    <td colspan="2" style="vertical-align: middle;"></td>
                    <td class="text-center" style="vertical-align: middle;"><h5>TOTAL : </h5></td>
                    <td class="text-center" style="vertical-align: middle;"><h5><?php ob_start();
echo $_smarty_tpl->tpl_vars['o']->value['total'];
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>
</h5></td>
                </tr>

            </tbody>
        </table>
        <br>
        <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>

    <?php ob_start();
} else {
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>

        <p class="text-center">查無交易</p>
    <?php ob_start();
}
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>

</div><?php }
}
