<script type="module" src="http://localhost:8888/gameStore/js/shop.js" defer></script>
<h1 class="text-center">遊戲商店</h1>
<hr>

<div class="container">
    <div class="row">
        {{foreach $products as $product}}
        <div class="col-sm-4 col-md-3">
            <div class="thumbnail">
                <img src="http://localhost:8888/gameStore/show/image/{{$product.id}}">
                <div class="caption">
                    <h4 class="text-center">{{$product.name}}</h4>

                    {{if $product.quantity === 0}}
                    <p><button class="btn btn-danger btn-block" disabled>商品已售完</button></p>
                    {{else}}
                    <form method="POST">
                        <input type="hidden" name="productId" value="{{$product.id}}"></input>
                        {{if $userCart}}
                        {{$flag = true}}
                        {{foreach $userCart as $cart}}
                        {{if $cart.product_id === $product.id}}
                        <p><button type="submit" id="{{$product.id}}" class="btn btn-primary btn-block" disabled>已加入購物車</button></p>
                        {{$flag = false}}
                        {{break}}
                        {{/if}}
                        {{/foreach}}
                        {{if $flag}}
                        <p><button type="submit" id="{{$product.id}}" class="btn btn-primary btn-block">TWD {{$product.price}} <span class="glyphicon glyphicon-shopping-cart"></span></button></p>
                        {{/if}}
                        {{else}}
                        <p><button type="submit" id="{{$product.id}}" class="btn btn-primary btn-block">TWD {{$product.price}} <span class="glyphicon glyphicon-shopping-cart"></span></button></p>
                        {{/if}}
                    </form>
                    {{/if}}
                </div>
            </div>
        </div>
        {{/foreach}}
    </div>
</div>
<hr>

<div class="container text-center">
    <ul class="pagination">
        {{for $i=1 to $pagination}}
        {{if $currentPage == $i}}
        <li class="active"><a href="http://localhost:8888/gameStore/shop/page/{{$i}}">{{$i}}</a></li>
        {{else}}
        <li><a href="http://localhost:8888/gameStore/shop/page/{{$i}}">{{$i}}</a></li>
        {{/if}}
        {{/for}}
    </ul>
</div>