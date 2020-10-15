<script type="module" src="http://localhost:8888/gameStore/js/productmanage.js" defer></script>
{{if $productAuth}}
    <div class="container">
        <div class="row" style="display: flex; align-items: center;">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <h1 class="text-center">商品管理</h1>
            </div>
            <div class="col-lg-2">
                <button class="btn btn-success btn-block" data-toggle="modal" data-target="#newProduct" style="float:right; margin-top: 10px;">新增商品</button>
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
                                    <input type="text" class="form-control productName" id="productName" name="productName" placeholder="輸入商品名稱" required>
                                    <p class="text-danger"></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productPrice">價格:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control productPrice" id="productPrice" name="productPrice" placeholder="輸入商品價格" required>
                                    <p class="text-danger"></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productQuantity">數量:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control productQuantity" id="productQuantity" name="productQuantity" placeholder="輸入商品數量" required>
                                    <p class="text-danger"></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productDescription">描述:</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" placeholder="輸入商品說明" id="productDescription" name="productDescription" rows="3" style="resize:none;" oninput='this.style.height = "";this.style.height = this.scrollHeight + "px"'></textarea>
                                    <p class="text-danger"></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productImg">圖片:</label>
                                <div class="col-sm-10">
                                    <label class="btn btn-default btn-block productImgContr">
                                        <input class="productImg newImg" id="productImg" name="productImg" type="file" hidden />
                                        <img class="productImgSrc" style="width:100%;" />
                                        <p class="text-danger"></p>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-success submitBtn" disabled>確認</button>
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
            <tr bgcolor="#003087" style="color: white;">
                <th scope="col" class="col-xs-1 text-center">編號</th>
                <th scope="col" class="col-xs-2 text-center">預覽圖</th>
                <th scope="col" class="col-xs-4">名稱</th>
                <th scope="col" class="col-xs-2 text-center">價格</th>
                <th scope="col" class="col-xs-2 text-center">庫存</th>
                <th scope="col" class="col-xs-1 text-center"></th>
            </tr>
        </thead>
        <tbody>
            {{foreach $products as $product}}
            {{if $product.quantity < 10}}
            <tr class="danger">
                {{else}}
            <tr>
                {{/if}}
                <th class="text-center" style="vertical-align: middle;"> {{$product.id}}</th>
                <td class="text-center" style="vertical-align: middle;"><img style="width:100px;" src="http://localhost:8888/gameStore/show/image/{{$product.id}}"></td>
                <td style="vertical-align: middle;">{{$product.name}}</td>
                <td class="text-center" style="vertical-align: middle;">{{$product.price}}</td>
                <td class="text-center" style="vertical-align: middle;">{{$product.quantity}}</td>
                <td class="text-center" style="vertical-align: middle;">
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
                                    <input type="text" class="form-control productName" id="productName" name="productName" placeholder="輸入商品名稱" value="{{$product.name}}">
                                    <p class="text-danger"></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productPrice">價格:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control productPrice" id="productPrice" name="productPrice" placeholder="輸入商品價格" value="{{$product.price}}">
                                    <p class="text-danger"></p>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="control-label col-sm-2" for="productQuantity">數量:</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control productQuantity" id="productQuantity" name="productQuantity" placeholder="輸入商品數量" value="{{$product.quantity}}">
                                    <p class="text-danger"></p>
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
                                        <input id="productImg" name="productImg" class="productImg editImg" type="file" hidden />
                                        <img class="spareImg hidden" style="width:100%;" src="http://localhost:8888/gameStore/show/image/{{$product.id}}" />
                                        <img class="productImgSrc" style="width:100%;" src="http://localhost:8888/gameStore/show/image/{{$product.id}}" />
                                        <p class="text-danger"></p>
                                    </label>
                                </div>
                            </div>
                        </div>

                        <input type="hidden" name="productId" value="{{$product.id}}"></input>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">取消</button>
                            <button type="submit" class="btn btn-success submitBtn">確認</button>
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

<div class="container text-center">
    <ul class="pagination">
        {{for $i=1 to $pagination}}
        {{if $currentPage == $i}}
        <li class="active"><a href="http://localhost:8888/gameStore/productmanage/page/{{$i}}">{{$i}}</a></li>
        {{else}}
        <li><a href="http://localhost:8888/gameStore/productmanage/page/{{$i}}">{{$i}}</a></li>
        {{/if}}
        {{/for}}
    </ul>
</div>
{{else}}
<h1 class="text-center">商品管理</h1>
<hr>
<p class="text-center">無權限查閱</p>
{{/if}}