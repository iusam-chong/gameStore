<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-13 19:38:50
  from 'C:\Users\ALPHA\Documents\Github\gameStore\views\adminmanage\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f85e62a85e295_83466155',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '595c818509f5a416160c8cc3a1780fa0839d6702' => 
    array (
      0 => 'C:\\Users\\ALPHA\\Documents\\Github\\gameStore\\views\\adminmanage\\page.tpl',
      1 => 1602610728,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f85e62a85e295_83466155 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="module" src="http://localhost:8888/gameStore/js/adminmanage.js" defer><?php echo '</script'; ?>
>
<?php ob_start();
if ($_smarty_tpl->tpl_vars['employeeAuth']->value) {
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

<div class="container">
        <div class="row" style="display: flex; align-items: center;">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h1 class="text-center">後台帳號管理</h1>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-success btn-block" data-toggle="modal" data-target="#newAccount" style="float:right; margin-top: 10px;">新增後台帳號</button>
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
            <tr bgcolor="#003087" style="color: white;">
                <th scope="col" class="col-xs-1 text-center">管理者編號</th>
                <th scope="col" class="col-xs-3">帳號名稱</th>
                <th scope="col" class="col-xs-2 text-center">創建時間</th>
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
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>

            <tr>
                <td class="text-center" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['id'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
</td>
                <td style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['user_name'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
</td>
                <td class="text-center" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['reg_time'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
</td>
                <td class="text-center" style="vertical-align: middle;">
                    <?php ob_start();
if ($_smarty_tpl->tpl_vars['userId']->value === $_smarty_tpl->tpl_vars['admin']->value['id']) {
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>

                    <button class="btn btn-primary" disabled>啟用中</button>
                    <?php ob_start();
} else {
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>

                    <div class="enabledContr">
                        <form>
                            <input type="hidden" name="userId" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['id'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
">
                            <input type="hidden" name="enabledStatus" class="status" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['enabled'];
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>
">
                            <?php ob_start();
if ($_smarty_tpl->tpl_vars['admin']->value['enabled']) {
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>

                            <button type="submit" class="btn btn-success">啟用中</button>
                            <?php ob_start();
} else {
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>

                            <button type="submit" class="btn btn-danger">停用中</button>
                            <?php ob_start();
}
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>

                        </form>
                    </div>
                    <?php ob_start();
}
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>

                </td>
                <td class="text-center" style="vertical-align: middle;">
                    <div class="productContr">
                        <form>
                            <input type="hidden" name="userId" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['id'];
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>
">
                            <input type="hidden" name="productStatus" class="status" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['product'];
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>
">
                            <?php ob_start();
if ($_smarty_tpl->tpl_vars['admin']->value['product']) {
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>

                            <button type="submit" class="btn btn-success">已授權</button>
                            <?php ob_start();
} else {
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>

                            <button type="submit" class="btn btn-danger">未授權</button>
                            <?php ob_start();
}
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>

                        </form>
                    </div>
                </td>
                <td class="text-center" style="vertical-align: middle;">
                    <div class="memberContr">
                        <form>
                            <input type="hidden" name="userId" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['id'];
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>
">
                            <input type="hidden" name="memberStatus" class="status" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['member'];
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>
">
                            <?php ob_start();
if ($_smarty_tpl->tpl_vars['admin']->value['member']) {
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;?>

                            <button type="submit" class="btn btn-success">已授權</button>
                            <?php ob_start();
} else {
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;?>

                            <button type="submit" class="btn btn-danger">未授權</button>
                            <?php ob_start();
}
$_prefixVariable23 = ob_get_clean();
echo $_prefixVariable23;?>

                        </form>
                    </div>
                </td>
                <td class="text-center" style="vertical-align: middle;">
                    <?php ob_start();
if ($_smarty_tpl->tpl_vars['userId']->value === $_smarty_tpl->tpl_vars['admin']->value['id']) {
$_prefixVariable24 = ob_get_clean();
echo $_prefixVariable24;?>

                    <button class="btn btn-primary" disabled>已授權</button>
                    <?php ob_start();
} else {
$_prefixVariable25 = ob_get_clean();
echo $_prefixVariable25;?>

                    <div class="employeeContr">
                        <form>
                            <input type="hidden" name="userId" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['id'];
$_prefixVariable26 = ob_get_clean();
echo $_prefixVariable26;?>
">
                            <input type="hidden" name="employeeStatus" class="status" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['admin']->value['employee'];
$_prefixVariable27 = ob_get_clean();
echo $_prefixVariable27;?>
">
                            <?php ob_start();
if ($_smarty_tpl->tpl_vars['admin']->value['employee']) {
$_prefixVariable28 = ob_get_clean();
echo $_prefixVariable28;?>

                            <button type="submit" class="btn btn-success">已授權</button>
                            <?php ob_start();
} else {
$_prefixVariable29 = ob_get_clean();
echo $_prefixVariable29;?>

                            <button type="submit" class="btn btn-danger">未授權</button>
                            <?php ob_start();
}
$_prefixVariable30 = ob_get_clean();
echo $_prefixVariable30;?>

                        </form>
                    </div>
                    <?php ob_start();
}
$_prefixVariable31 = ob_get_clean();
echo $_prefixVariable31;?>

                </td>
            </tr>
            <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable32 = ob_get_clean();
echo $_prefixVariable32;?>

        </tbody>
    </table>
</div>
<?php ob_start();
} else {
$_prefixVariable33 = ob_get_clean();
echo $_prefixVariable33;?>

<h1 class="text-center">後台帳號管理</h1>
<hr>
<p class="text-center">無權限查閱</p>
<?php ob_start();
}
$_prefixVariable34 = ob_get_clean();
echo $_prefixVariable34;
}
}
