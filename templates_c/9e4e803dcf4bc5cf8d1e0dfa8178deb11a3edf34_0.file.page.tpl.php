<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-28 08:57:41
  from '/Users/sam_chong/Documents/Github/gameStore/views/login/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f71a585e06e60_66306944',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9e4e803dcf4bc5cf8d1e0dfa8178deb11a3edf34' => 
    array (
      0 => '/Users/sam_chong/Documents/Github/gameStore/views/login/page.tpl',
      1 => 1601278504,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f71a585e06e60_66306944 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container">
    <div class="row">
        <div class="col-sm-6 col-sm-offset-3">
            <div class="thumbnail">
                <div class="caption">
                    <form method="post" action="">
                        <div class="form-group">
                            <label for="userName">帳號</label>
                            <input name="textUserName" maxlength="16" type="text" class="form-control" id="userName">
                        </div>
                        <div class="form-group">
                            <label for="password">密碼</label>
                            <input name="textPassword" maxlength="16" type="password" class="form-control" id="password">
                        </div>
                        <button name="login" value="1" type="submit" class="btn btn-primary btn-block">登入</button>
                    </form>
                </div>
            </div>
        </div>
    </div> <!-- ./row -->
</div> <!-- ./container -->
<?php echo '<script'; ?>
 src="http://localhost:8888/gameStore/js/login.js" defer><?php echo '</script'; ?>
><?php }
}
