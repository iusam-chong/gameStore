<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-15 19:09:02
  from 'C:\Users\ALPHA\Documents\Github\gameStore\views\login\page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f88822e2bd3b4_94558748',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'fcfc10efffbd5b927c5038b5f33712bd91945eb6' => 
    array (
      0 => 'C:\\Users\\ALPHA\\Documents\\Github\\gameStore\\views\\login\\page.tpl',
      1 => 1602781740,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f88822e2bd3b4_94558748 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="container" style="top:30%; width:100%; position: absolute;">
    <div class="row">
        <div class="col-sm-4 col-sm-offset-4">
            <div class="panel panel-default center-block" style="width: 70%;">
                <div class="panel-body">
                    <h2 class="text-center">Login</h2><br>
                    <form>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control" placeholder="Username" name="userName" maxlength="16">
                        </div>
                        <div class="form-group input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" class="form-control" placeholder="Password" name="password" maxlength="16">
                        </div>
                        <button type="submit" class="btn btn-primary btn-block">登入</button>
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
