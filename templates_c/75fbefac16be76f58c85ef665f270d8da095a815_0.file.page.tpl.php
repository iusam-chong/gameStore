<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-05 09:47:41
  from '/Users/sam_chong/Documents/Github/gameStore/views/productmanage/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7aebbd99c254_63263975',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75fbefac16be76f58c85ef665f270d8da095a815' => 
    array (
      0 => '/Users/sam_chong/Documents/Github/gameStore/views/productmanage/page.tpl',
      1 => 1601891253,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f7aebbd99c254_63263975 (Smarty_Internal_Template $_smarty_tpl) {
echo '<script'; ?>
 type="module" src="http://localhost:8888/gameStore/js/productmanage.js" defer><?php echo '</script'; ?>
>
<div class="container">
    <div class="row">
        <div class="col-lg-4 col-lg-offset-4">
            <h1 class="text-center">商品管理</h1>
            <button class="btn btn-success btn-block" data-toggle="modal" data-target="#newProduct">新增商品</button>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="newProduct">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">新增商品</h4>
                </div>

                <div id="newProduct">
                    <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productName">商品名稱:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="productName" name="productName" placeholder="輸入商品名稱">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productPrice">價格:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="productPrice" name="productPrice" placeholder="輸入商品價格">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productQuantity">數量:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="productQuantity" name="productQuantity" placeholder="輸入商品數量">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productDescription">描述:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="輸入商品說明" id="productDescription" name="productDescription" rows="3" style="resize:none;" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'></textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productImg">圖片:</label>
                                <div class="col-sm-10">
                                    <label class="btn btn-default btn-block">
                                        <input id="productImg" name="productImg" type="file" hidden />
                                        <img id="productImgSrc" src="" />
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-success">確認</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>

<?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

    <p>name:<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['name'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
<p>
    <p>price:<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['price'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
<p>
    <p>quantity:<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['quantity'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
<p>
    <p>description:<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['description'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
<p>
    <img id="productImgSrc" src="<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['image'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
" />
<?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;
}
}
