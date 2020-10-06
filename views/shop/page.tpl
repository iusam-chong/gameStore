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

                    <p><a href="#" class="btn btn-primary btn-block">TWD {{$product.price}} <span class="glyphicon glyphicon-shopping-cart"></span></a></p>
                </div>
            </div>
        </div>
        {{/foreach}}
    </div>
</div>