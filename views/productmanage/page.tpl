<script type="module" src="http://localhost:8888/gameStore/js/productmanage.js" defer></script>
{{if $productAuth}}
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
            {{foreach $products as $product}}
            <tr>
                <th scope="col" class="col-xs-1" style="vertical-align: middle;"> {{$product.id}}</th>
                <td scope="col" class="col-xs-2" style="vertical-align: middle;"><img style="width:100px;" src="http://localhost:8888/gameStore/show/image/{{$product.id}}"></td>
                <td scope="col" class="col-xs-4" style="vertical-align: middle;">{{$product.name}}</td>
                <td scope="col" class="col-xs-2" style="vertical-align: middle;">{{$product.price}}</td>
                <td scope="col" class="col-xs-2" style="vertical-align: middle;">{{$product.quantity}}</td>
                <td scope="col" class="col-xs-1" style="vertical-align: middle;">
                    <a href="#" class="btn btn-info btn-block" data-toggle="modal" data-target="#editProduct{{$product.id}}">修改</a>
                    <a href="#" class="btn btn-danger btn-block" data-toggle="modal" data-target="#deleteProduct{{$product.id}}">刪除</a>
                </td>
            </tr>
            {{/foreach}}
        </tbody>
    </table>

    {{foreach $products as $product}}
    <div class="modal fade" id="editProduct{{$product.id}}">
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
                                    <input type="text" class="form-control" id="productName" name="productName" placeholder="輸入商品名稱" value="{{$product.name}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productPrice">價格:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="productPrice" name="productPrice" placeholder="輸入商品價格" value="{{$product.price}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productQuantity">數量:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="productQuantity" name="productQuantity" placeholder="輸入商品數量" value="{{$product.quantity}}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productDescription">描述:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="輸入商品說明" id="productDescription" name="productDescription" rows="3" style="resize:none;" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'>{{$product.description|htmlspecialchars}}</textarea>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productImg">圖片:</label>
                                <div class="col-sm-10">
                                    <label class="btn btn-default btn-block productImgContr">
                                        <input id="productImg" name="productImg" class="productImg" type="file" hidden />
                                        <img class="productImgSrc" src="http://localhost:8888/gameStore/show/image/{{$product.id}}" />
                                    </label>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="productId" value="{{$product.id}}"></input>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-success">確認</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="deleteProduct{{$product.id}}" role="dialog">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">刪除商品</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-sm-2">
                            <img style="width:100px;" src="http://localhost:8888/gameStore/show/image/{{$product.id}}" />
                        </div>
                        <div class="col-sm-8 col-sm-offset-1">
                            <p> 商品編號：{{$product.id}}</p>
                            <p> 商品名稱：{{$product.name}}</p>
                            <p>進行此操作後資料將無法復原，請問確定刪除嗎?</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer deleteProduct">
                    <form method="post" action="">
                        <input type="hidden" name="productId" value="{{$product.id}}"></input>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                        <button type="submit" class="btn btn-success">確認</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{/foreach}}
</div>
{{else}}
<h1 class="text-center">商品管理</h1>
<hr>
<p class="text-center">無權限查閱</p>
{{/if}}