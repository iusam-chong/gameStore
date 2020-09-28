<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-28 14:17:00
  from 'C:\Users\ALPHA\Documents\Github\gameStore\views\navbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f71d43c7df114_82705140',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'db6cbd157cd1ce610a706de6b2a328e278250aed' => 
    array (
      0 => 'C:\\Users\\ALPHA\\Documents\\Github\\gameStore\\views\\navbar.tpl',
      1 => 1601294230,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f71d43c7df114_82705140 (Smarty_Internal_Template $_smarty_tpl) {
?><nav class="navbar navbar-default">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home">留言板</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="home">全部<span class="sr-only">(current)</span></a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php ob_start();
if ($_smarty_tpl->tpl_vars['loginStatus']->value) {
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

                <form id="logout" method="post" action=""></form>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php ob_start();
echo $_smarty_tpl->tpl_vars['userName']->value;
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
 <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#"><button type="submit" form="logout" name="logout" class="btn btn-link btn-block">登出</button></a></li>
                    </ul>
                </li>
                <?php ob_start();
} else {
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>

                <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> 登入</a></li>
                <li><a href="register"><span class="glyphicon glyphicon-user"></span> 註冊</a></li>
                <?php ob_start();
}
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>

            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav><?php }
}
