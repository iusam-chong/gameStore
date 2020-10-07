<script type="module" src="http://localhost:8888/gameStore/js/cart.js" defer></script>
<h1 class="text-center">購物車</h1>
<hr>

{{if $carts}}

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th colspan="2" scope="col" class="col-xs-7 text-center">遊戲商品</th>
                <th scope="col" class="col-xs-2 text-center">價格</th>
                <th scope="col" class="col-xs-2 text-center">數量</th>
                <th scope="col" class="col-xs-1"></th>
            </tr>
        </thead>
        <tbody>
            {{foreach $carts as $product}}
            <tr>
                <td class="col-xs-2" style="vertical-align: middle;"><img style="width:100px;" src="http://localhost:8888/gameStore/show/image/{{$product.id}}"></td>
                <td class="col-xs-5" style="vertical-align: middle;">{{$product.name}}</td>
                <td class="col-xs-2 text-center" style="vertical-align: middle;">{{$product.price}}</td>
                <td class="col-xs-1 text-center" style="vertical-align: middle;">1</td>
                <td class="col-xs-2" style="vertical-align: middle;">
                    <form method="POST" class="deleteFromCart">
                        <input type="hidden" name="productId" value="{{$product.id}}"></input>
                        <button class="btn btn-danger btn-block">刪除</button>
                    </form>
                </td>
            </tr>
            {{/foreach}}
            <tr>
                <td colspan="2" style="vertical-align: middle;">
                    <h4 style="float:right">TOTAL:</h4>
                </td>
                <td colspan="1" style="vertical-align: middle;">
                    <h4 class="text-center">{{$total}}</h4>
                </td>
                <td colspan="2">
                    <div id="bill">
                        <form method="POST">
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