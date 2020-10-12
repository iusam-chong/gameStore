<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-12 09:43:19
  from '/Users/sam_chong/Documents/Github/gameStore/views/adminmanage/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f842537307962_73446006',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '876fb0f25260ca0812852b09778dd29a208d6b77' => 
    array (
      0 => '/Users/sam_chong/Documents/Github/gameStore/views/adminmanage/page.tpl',
      1 => 1602495797,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f842537307962_73446006 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="module" src="http://localhost:8888/gameStore/js/adminmanage.js" defer><?php echo '</script'; ?>
>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <h1 class="text-center">後台帳號管理</h1>
            <button class="btn btn-success btn-block" data-toggle="modal" data-target="#newAccount">新增後台帳號</button>
        </div>
    </div>

    <div class="modal fade" id="newAccount">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">新增後台帳號</h4>
                </div>

                <div id="newAccount">
                    <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="userName">帳號:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="userName" name="userName" placeholder="輸入後台帳號名稱">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="password">密碼:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="password" name="password" placeholder="輸入密碼">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="passwordComfrim">密碼確認:</label>
                                <div class="col-sm-10">
                                    <input type="password" class="form-control" id="passwordComfrim" name="passwordComfrim" placeholder="輸入密碼確認">
                                </div>
                            </div>

                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-success">送出</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<hr>

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="col-xs-1 text-center">管理者編號</th>
                <th scope="col" class="col-xs-3">帳號名稱</th>
                <th scope="col" class="col-xs-2 text-center">註冊時間</th>
                <th scope="col" class="col-xs-1 text-center">狀態</th>
                <th scope="col" class="col-xs-1 text-center">商品管理權限</th>
                <th scope="col" class="col-xs-1 text-center">會員管理權限</th>
                <th scope="col" class="col-xs-1 text-center">後台帳號管理</th>
            </tr>
        </thead>
        <tbody>
            <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['admins']->value, 'admin');
$_smarty_tpl->tpl_vars['admin']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['admin']->value) {
$_smarty_tpl->tpl_vars['admin']->do_else = false;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

            <tr>
                <td class="text-center" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['id'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
</td>
                <td style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['user_name'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</td>
                <td class="text-center" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['reg_time'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
</td>
                <td class="text-center" style="vertical-align: middle;">
                    <div class="enabledContr">
                        <form>
                            <input type="hidden" name="userId" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['id'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
">
                            <input type="hidden" name="enabledStatus" class="status" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['enabled'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
">
                            <?php ob_start();
if ($_smarty_tpl->tpl_vars['admin']->value['enabled']) {
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>

                            <button type="submit" class="btn btn-success">啟用中</button>
                            <?php ob_start();
} else {
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>

                            <button type="submit" class="btn btn-danger">停用中</button>
                            <?php ob_start();
}
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>

                        </form>
                    </div>
                </td>
                <td class="text-center" style="vertical-align: middle;">
                    <div class="productContr">
                        <form>
                            <input type="hidden" name="userId" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['id'];
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>
">
                            <input type="hidden" name="productStatus" class="status" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['product'];
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
">
                            <?php ob_start();
if ($_smarty_tpl->tpl_vars['admin']->value['product']) {
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>

                            <button type="submit" class="btn btn-success">已授權</button>
                            <?php ob_start();
} else {
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>

                            <button type="submit" class="btn btn-danger">未授權</button>
                            <?php ob_start();
}
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>

                        </form>
                    </div>
                </td>
                <td class="text-center" style="vertical-align: middle;">
                    <div class="memberContr">
                        <form>
                            <input type="hidden" name="userId" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['id'];
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>
">
                            <input type="hidden" name="memberStatus" class="status" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['member'];
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>
">
                            <?php ob_start();
if ($_smarty_tpl->tpl_vars['admin']->value['member']) {
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>

                            <button type="submit" class="btn btn-success">已授權</button>
                            <?php ob_start();
} else {
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>

                            <button type="submit" class="btn btn-danger">未授權</button>
                            <?php ob_start();
}
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>

                        </form>
                    </div>
                </td>
                <td class="text-center" style="vertical-align: middle;">
                    <div class="employeeContr">
                        <form>
                            <input type="hidden" name="userId" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['id'];
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>
">
                            <input type="hidden" name="employeeStatus" class="status" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['employee'];
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;?>
">
                            <?php ob_start();
if ($_smarty_tpl->tpl_vars['admin']->value['employee']) {
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;?>

                            <button type="submit" class="btn btn-success">已授權</button>
                            <?php ob_start();
} else {
$_prefixVariable23 = ob_get_clean();
echo $_prefixVariable23;?>

                            <button type="submit" class="btn btn-danger">未授權</button>
                            <?php ob_start();
}
$_prefixVariable24 = ob_get_clean();
echo $_prefixVariable24;?>

                        </form>
                    </div>
                </td>
            </tr>
            <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable25 = ob_get_clean();
echo $_prefixVariable25;?>

        </tbody>
    </table>
</div><?php }
}
