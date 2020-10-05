<script type="module" src="http://localhost:8888/gameStore/js/productmanage.js" defer></script>
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

{{foreach $products as $product}}
    <p>name:{{$product.name}}<p>
    <p>price:{{$product.price}}<p>
    <p>quantity:{{$product.quantity}}<p>
    <p>description:{{$product.description}}<p>
    <img id="productImgSrc" src="{{$product.image}}" />
{{/foreach}}