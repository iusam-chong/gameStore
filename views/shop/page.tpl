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
                    <form method="POST">
                        <input type="hidden" name="productId" value="{{$product.id}}"></input>
                        <p><button type="submit" id="{{$product.id}}" class="btn btn-primary btn-block">TWD {{$product.price}} <span class="glyphicon glyphicon-shopping-cart"></span></button></p>
                    </form>
                </div>
            </div>
        </div>
        {{/foreach}}
    </div>
</div>