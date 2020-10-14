<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-14 08:55:25
  from '/Users/sam_chong/Documents/Github/gameStore/views/header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f86bcfd978090_33544033',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1abac32afb548eac07e1a1f2d34de0526076c5cd' => 
    array (
      0 => '/Users/sam_chong/Documents/Github/gameStore/views/header.tpl',
      1 => 1602037588,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f86bcfd978090_33544033 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php ob_start();
echo $_smarty_tpl->tpl_vars['title']->value;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>
</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js" defer><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js" defer><?php echo '</script'; ?>
>
    </head>
<body><?php }
}
