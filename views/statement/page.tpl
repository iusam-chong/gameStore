<div class="container">
    <h1 class="text-center">交易紀錄</h1>
    <hr>
    {{if $order}}
        {{foreach $order as $o}}
        <table class="table table-striped" style="border:1px;">
                <h5>訂單日期 : {{$o.bill_time}}</h5>
                <thead>
                    <tr>
                        <th colspan="2" scope="col" class="col-xs-8">遊戲商品</th>
                        <th scope="col" class="col-xs-2 text-center">數量</th>
                        <th scope="col" class="col-xs-2 text-center">價格</th>
                    </tr>
                </thead>

            <tbody>
                {{foreach $orderDetails as $od}}
                {{if $o.id === $od.id}}
                
                <tr>
                    <td class="col-xs-2" style="vertical-align: middle;"><img style="width:100px;" src="http://localhost:8888/gameStore/show/image/{{$od.product_id}}"></td>
                    <td class="col-xs-6" style="vertical-align: middle;">{{$od.name}}</td>
                    <td class="col-xs-2 text-center" style="vertical-align: middle;">{{$od.quantity}}</td>
                    <td class="col-xs-2 text-center" style="vertical-align: middle;">{{$od.price}}</td>
                </tr>
                {{/if}}
                {{/foreach}}
                <tr>
                    <td colspan="2" style="vertical-align: middle;"></td>
                    <td class="text-center" style="vertical-align: middle;"><h5>TOTAL : </h5></td>
                    <td class="text-center" style="vertical-align: middle;"><h5>{{$o.total}}</h5></td>
                </tr>

            </tbody>
        </table>
        <br>
        {{/foreach}}
    {{else if}}
        <p class="text-center">查無交易</p>
    {{/if}}
</div>