<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-06 09:43:04
  from '/Users/sam_chong/Documents/Github/gameStore/views/productmanage/page.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f7c3c284af7b1_70031836',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '75fbefac16be76f58c85ef665f270d8da095a815' => 
    array (
      0 => '/Users/sam_chong/Documents/Github/gameStore/views/productmanage/page.tpl',
      1 => 1601976725,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f7c3c284af7b1_70031836 (Smarty_Internal_Template $_smarty_tpl) {
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
                                    <label class="btn btn-default btn-block productImgContr">
                                        <input class="productImg" id="productImg" name="productImg" type="file" hidden />
                                        <img class="productImgSrc" src="" />
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

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="col-xs-1">商品編號</th>
                <th scope="col" class="col-xs-2">預覽圖</th>
                <th scope="col" class="col-xs-4">名稱</th>
                <th scope="col" class="col-xs-2">價格</th>
                <th scope="col" class="col-xs-2">庫存</th>
                <th scope="col" class="col-xs-1">修改/刪除</th>
            </tr>
        </thead>
        <tbody>
            <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
$_prefixVariable1 = ob_get_clean();
echo $_prefixVariable1;?>

            <tr>
                <th scope="col" class="col-xs-1" style="vertical-align: middle;"> <?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable2 = ob_get_clean();
echo $_prefixVariable2;?>
</th>
                <td scope="col" class="col-xs-2" style="vertical-align: middle;"><img style="width:100px;" src="http://localhost:8888/gameStore/show/image/<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable3 = ob_get_clean();
echo $_prefixVariable3;?>
"></td>
                <td scope="col" class="col-xs-4" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['name'];
$_prefixVariable4 = ob_get_clean();
echo $_prefixVariable4;?>
</td>
                <td scope="col" class="col-xs-2" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['price'];
$_prefixVariable5 = ob_get_clean();
echo $_prefixVariable5;?>
</td>
                <td scope="col" class="col-xs-2" style="vertical-align: middle;"><?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['quantity'];
$_prefixVariable6 = ob_get_clean();
echo $_prefixVariable6;?>
</td>
                <td scope="col" class="col-xs-1" style="vertical-align: middle;">
                    <a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#editProduct<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable7 = ob_get_clean();
echo $_prefixVariable7;?>
">修改</a>
                    <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#deleteProduct<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable8 = ob_get_clean();
echo $_prefixVariable8;?>
">刪除</a>
                </td>
            </tr>
            <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable9 = ob_get_clean();
echo $_prefixVariable9;?>

        </tbody>
    </table>

    <?php ob_start();
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
$_smarty_tpl->tpl_vars['product']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->tpl_vars['product']->do_else = false;
$_prefixVariable10 = ob_get_clean();
echo $_prefixVariable10;?>

    <div class="modal fade" id="editProduct<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable11 = ob_get_clean();
echo $_prefixVariable11;?>
">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">修改商品</h4>
                </div>

                <div id="editProduct" class="editProduct">
                    <form method="post" action="" enctype="multipart/form-data" class="form-horizontal">
                        <div class="modal-body">

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productName">商品名稱:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="productName" name="productName" placeholder="輸入商品名稱" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['name'];
$_prefixVariable12 = ob_get_clean();
echo $_prefixVariable12;?>
">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productPrice">價格:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="productPrice" name="productPrice" placeholder="輸入商品價格" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['price'];
$_prefixVariable13 = ob_get_clean();
echo $_prefixVariable13;?>
">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productQuantity">數量:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="productQuantity" name="productQuantity" placeholder="輸入商品數量" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['quantity'];
$_prefixVariable14 = ob_get_clean();
echo $_prefixVariable14;?>
">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productDescription">描述:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="輸入商品說明" id="productDescription" name="productDescription" rows="3" style="resize:none;" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'><?php ob_start();
echo htmlspecialchars($_smarty_tpl->tpl_vars['product']->value['description']);
$_prefixVariable15 = ob_get_clean();
echo $_prefixVariable15;?>
</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productImg">圖片:</label>
                                <div class="col-sm-10">
                                    <label class="btn btn-default btn-block productImgContr">
                                        <input id="productImg" name="productImg" class="productImg" type="file" hidden />
                                        <img class="productImgSrc" src="http://localhost:8888/gameStore/show/image/<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable16 = ob_get_clean();
echo $_prefixVariable16;?>
" />
                                    </label>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="productId" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable17 = ob_get_clean();
echo $_prefixVariable17;?>
"></input>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-success">確認</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteProduct<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable18 = ob_get_clean();
echo $_prefixVariable18;?>
" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">刪除商品</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-2">
                            <img style="width:100px;" src="http://localhost:8888/gameStore/show/image/<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable19 = ob_get_clean();
echo $_prefixVariable19;?>
" />
                        </div>
                        <div class="col-sm-8 col-sm-offset-1">
                            <p> 商品編號：<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable20 = ob_get_clean();
echo $_prefixVariable20;?>
</p>
                            <p> 商品名稱：<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['name'];
$_prefixVariable21 = ob_get_clean();
echo $_prefixVariable21;?>
</p>
                            <p>進行此操作後資料將無法復原，請問確定刪除嗎?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer deleteProduct">
                    <form method="post" action="">
                        <input type="hidden" name="productId" value="<?php ob_start();
echo $_smarty_tpl->tpl_vars['product']->value['id'];
$_prefixVariable22 = ob_get_clean();
echo $_prefixVariable22;?>
"></input>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-success">確認</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <?php ob_start();
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
$_prefixVariable23 = ob_get_clean();
echo $_prefixVariable23;?>

</div><?php }
}
