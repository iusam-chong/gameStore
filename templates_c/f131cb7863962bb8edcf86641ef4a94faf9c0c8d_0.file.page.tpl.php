<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-15 17:37:06
  from 'C:\Users\ALPHA\Documents\Github\gameStore\views\register\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f886ca28b3265_99141603',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f131cb7863962bb8edcf86641ef4a94faf9c0c8d' => 
    array (
      0 => 'C:\\Users\\ALPHA\\Documents\\Github\\gameStore\\views\\register\\page.tpl',
      1 => 1602074799,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f886ca28b3265_99141603 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container" style="margin-top: 50px;">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="thumbnail">
                <div class="caption">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="user-name">帳號</label>
                            <input name="userName" maxlength="16" type="text" class="form-control" id="user-name" required="required" />
                        </div>
                        <span class="text-danger">
                            <p id="textUserNameErr"></p>
                        </span>
                        <div class="form-group">
                            <label for="pwd">密碼</label>
                            <input name="password" maxlength="16" type="password" class="form-control" id="pwd" required="required" />
                        </div>
                        <span class="text-danger">
                            <p id="textPasswordErr"></p>
                        </span>
                        <div class="form-group">
                            <label for="pwdconfirm">密碼確認</label>
                            <input name="passwordConfirm" maxlength="16" type="password" class="form-control" id="pwdconfirm" required="required" />
                        </div>
                        <span class="text-danger">
                            <p id="textPasswordConfirmErr"></p>
                        </span>
                        <button name="register" value="1" type="submit" class="btn btn-primary btn-block" id="btnSubmit">註冊</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php echo '<script'; ?>
 type="module" src="http://localhost:8888/gameStore/js/register.js" defer><?php echo '</script'; ?>
><?php }
}
