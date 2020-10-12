<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-12 08:53:14
  from '/Users/sam_chong/Documents/Github/gameStore/views/membermanage/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f84197a0b47e5_96728121',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ad0d5eeb8c4ca0fcd21b7fbe6f539098a77f7a6f' => 
    array (
      0 => '/Users/sam_chong/Documents/Github/gameStore/views/membermanage/page.tpl',
      1 => 1602492792,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f84197a0b47e5_96728121 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="module" src="http://localhost:8888/gameStore/js/membermanage.js" defer><?php echo '</script'; ?>
>

<h1 class="text-center">會員管理</h1>
<hr>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="col-xs-2 text-center">會員編號</th>
                <th scope="col" class="col-xs-6">帳號名稱</th>
                <th scope="col" class="col-xs-2 text-center">註冊時間</th>
                <th scope="col" class="col-xs-2 text-center">狀態</th>
            </tr>
        </thead>
        <tbody>
            <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['members']->value, 'member');
$_smarty_tpl->tpl_vars['member']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['member']->value) {
$_smarty_tpl->tpl_vars['member']->do_else = false;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

            <tr>
                <td class="text-center" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['id'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
</td>
                <td style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['user_name'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</td>
                <td class="col-xs-1 text-center" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['reg_time'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
</td>
                <td class="col-xs-1 text-center" style="vertical-align: middle;">
                    <div class="elementContr">
                        <form>
                            <input type="hidden" name="userId" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['id'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
"></input>
                            <input type="hidden" name="status" id="status" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['enabled'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
"></input>

                            <?php ob_start();
if ($_smarty_tpl->tpl_vars['member']->value['enabled']) {
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>

                            <button type="submit" id="button" class="btn btn-success">啟用中</button>
                            <?php ob_start();
} else {
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>

                            <button type="submit" id="button" class="btn btn-danger">停用中</button>
                            <?php ob_start();
}
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>

                        </form>
                    </div>
                </td>
            </tr>
            <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>

        </tbody>
    </table>
</div><?php }
}
