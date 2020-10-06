<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-06 09:02:23
  from '/Users/sam_chong/Documents/Github/gameStore/views/adminbar.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7c329f896693_63363461',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ab4ec2d49404962ce276366270e6a76de4f7e472' => 
    array (
      0 => '/Users/sam_chong/Documents/Github/gameStore/views/adminbar.tpl',
      1 => 1601974605,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f7c329f896693_63363461 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="module" src="../gameStore/js/nav.js" defer><?php echo '</script'; ?>
>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse" id="liList">
            <ul class="nav navbar-nav" style="float:none; margin: 0 auto;display: table;table-layout: fixed;">
                                <li id="productmanage"><a href="../gameStore/productmanage">商品</a></li>
                <li id="membermanage"><a href="../gameStore/membermanage">會員</a></li>
                <li><a href="#">後台帳號管理</a></li>
            </ul>
        </div>
    </div><!-- /.container-fluid -->
</nav><?php }
}
