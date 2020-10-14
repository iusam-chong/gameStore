<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-14 17:23:45
  from 'C:\Users\ALPHA\Documents\Github\gameStore\views\membermanage\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f8718012f8788_70978772',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '15844d83d15f5ba30293667ad50320ddb634cf48' => 
    array (
      0 => 'C:\\Users\\ALPHA\\Documents\\Github\\gameStore\\views\\membermanage\\page.tpl',
      1 => 1602675718,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f8718012f8788_70978772 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="module" src="http://localhost:8888/gameStore/js/membermanage.js" defer><?php echo '</script'; ?>
>

<h1 class="text-center">會員管理</h1>
<hr>
<?php ob_start();
if ($_smarty_tpl->tpl_vars['memberAuth']->value) {
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

<div class="container">
    <table class="table">
        <thead>
            <tr bgcolor="#003087" style="color: white;">
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
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>

            <tr>
                <td class="text-center" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['id'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</td>
                <td style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['user_name'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
</td>
                <td class="col-xs-1 text-center" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['reg_time'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
</td>
                <td class="col-xs-1 text-center" style="vertical-align: middle;">
                    <div class="elementContr">
                        <form>
                            <input type="hidden" name="userId" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['id'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
"></input>
                            <input type="hidden" name="status" id="status" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['member']->value['enabled'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
"></input>

                            <?php ob_start();
if ($_smarty_tpl->tpl_vars['member']->value['enabled']) {
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>

                            <button type="submit" id="button" class="btn btn-success">啟用中</button>
                            <?php ob_start();
} else {
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>

                            <button type="submit" id="button" class="btn btn-danger">停用中</button>
                            <?php ob_start();
}
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>

                        </form>
                    </div>
                </td>
            </tr>
            <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>

        </tbody>
    </table>
</div>

<div class="container text-center">
    <ul class="pagination">
        <?php ob_start();
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['pagination']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['pagination']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>

        <?php ob_start();
if ($_smarty_tpl->tpl_vars['currentPage']->value == $_smarty_tpl->tpl_vars['i']->value) {
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>

        <li class="active"><a href="http://localhost:8888/gameStore/membermanage/page/<?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>
</a></li>
        <?php ob_start();
} else {
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>

        <li><a href="http://localhost:8888/gameStore/membermanage/page/<?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>
"><?php ob_start();
echo $_smarty_tpl->tpl_vars['i']->value;
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>
</a></li>
        <?php ob_start();
}
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>

        <?php ob_start();
}
}
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>

    </ul>
</div>
<?php ob_start();
} else {
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;?>

<p class="text-center">無權限查閱</p>
<?php ob_start();
}
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;
}
}
