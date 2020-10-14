<script type="module" src="http://localhost:8888/gameStore/js/cart.js" defer></script>
<h1 class="text-center">購物車</h1>
<hr>

{{if $carts}}

<div class="container">
    <table class="table">
        <thead>
            <tr bgcolor="#003087" style="color: white;">
                <th colspan="2" scope="col" class="col-xs-5 text-center">遊戲商品</th>
                <th scope="col" class="col-xs-2 text-center">單價</th>
                <th scope="col" class="col-xs-2 text-center">數量</th>
                <th scope="col" class="col-xs-2 text-center">小計</th>
                <th scope="col" class="col-xs-1"></th>
            </tr>
        </thead>
        <tbody>
            {{foreach $carts as $product}}
            <tr>
                <td style="vertical-align: middle;"><img style="width:100px;" src="http://localhost:8888/gameStore/show/image/{{$product.id}}"></td>
                <td style="vertical-align: middle;">{{$product.name}}</td>
                <td class="text-center price" style="vertical-align: middle;">{{$product.price}}</td>
                <td class="text-center" style="vertical-align: middle;">
                    <div>
                        <form class="productQuantity">
                            <input type="hidden" name="productId" value="{{$product.id}}">
                            <select class="form-control center-block" name="quantity" class="selector" style="width:auto;">
                                {{$flag = false}}

                                {{if $product.total_quantity == 0}}
                                <option value="delete" selected>product not exist</option>
                                {{$flag = true}}
                                {{elseif $product.total_quantity < $product.quantity}}
                                <option value="edit {{$product.total_quantity}}" selected>product not exist</option>
                                {{/if}}

                                {{for $i=1 to $product.total_quantity max=10}}
                                {{if $flag}}
                                {{continue}}
                                {{/if}}
                                {{if $product.quantity === $i}}
                                <option value="{{$i}}" selected>{{$i}}</option>
                                {{else}}
                                <option value="{{$i}}">{{$i}}</option>
                                {{/if}}
                                {{/for}}
                            </select>
                        </form>
                    </div>
                </td>
                <td class="text-center subtotal" style="vertical-align: middle;">{{$product.price * $product.quantity}}</td>
                <td class="col-xs-2" style="vertical-align: middle;">
                    <form class="deleteFromCart">
                        <input type="hidden" name="productId" value="{{$product.id}}"></input>
                        <button type="submit" class="btn btn-danger btn-block">刪除</button>
                    </form>
                </td>
            </tr>
            {{/foreach}}
            <tr>
                <td colspan="4" style="vertical-align: middle;">
                    <h4 style="float:right">TOTAL:</h4>
                </td>
                <td colspan="1" style="vertical-align: middle;">
                    <h4 class="text-center" id="total"></h4>
                </td>
                <td colspan="1">
                    <div id="bill">
                        <form>
                            <button class="btn btn-primary btn-block">購買</button>
                        </form>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>

{{else}}

<p class="text-center">跟你的錢包一樣是空的</p>

{{/if}}