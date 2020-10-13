<script type="module" src="http://localhost:8888/gameStore/js/statement.js" defer></script>
<h1 class="text-center">交易紀錄</h1>
<hr>
<div class="container">
    {{if $order}}
        {{foreach $order as $o}}
            <div class="order">
                <table class="table">
                    
                    <thead>
                        <tr bgcolor="#003087" style="color: white;">
                            <th colspan="2" scope="col" class="col-xs-6 text-center">遊戲商品</th>
                            <th scope="col" class="col-xs-2 text-center">數量</th>
                            <th scope="col" class="col-xs-2 text-center">單價</th>
                            <th scope="col" class="col-xs-2 text-center">小計</th>
                        </tr>
                    </thead>
        
                    <tbody class="orderDetails">
                        {{foreach $orderDetails as $od}}
                            {{if $o.id === $od.order_id}}
                
                                <tr class="statement">
                                    <td class="col-xs-2" style="vertical-align: middle;"><img style="width:100px;" src="http://localhost:8888/gameStore/show/image/{{$od.product_id}}"></td>
                                    <td class="col-xs-4" style="vertical-align: middle;">{{$od.name}}</td>
                                    <td class="col-xs-2 text-center quantity" style="vertical-align: middle;">{{$od.quantity}}</td>
                                    <td class="col-xs-2 text-center price" style="vertical-align: middle;">{{$od.price}}</td>
                                    <td class="col-xs-2 text-center subtotal" style="vertical-align: middle;">0</td>
                                </tr>
                            {{/if}}
                        {{/foreach}}
                        <tr>
                            <td colspan="3" style="vertical-align: middle;"><h5>訂單日期 : {{$o.bill_time}}</h5></td>
                            <td class="text-center" style="vertical-align: middle;">
                                <h5>TOTAL :</h5>
                            </td>
                            <td class="text-center" style="vertical-align: middle;">
                                <h5 class="total">0</h5>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <br>
        {{/foreach}}
    {{else if}}
        <p class="text-center">查無交易</p>
    {{/if}}
</div>
<hr>

<div class="container text-center">
    <ul class="pagination">
        {{for $i=1 to $pagination}}
            {{if $currentPage == $i}}
                <li class="active"><a href="http://localhost:8888/gameStore/statement/page/{{$i}}">{{$i}}</a></li>
            {{else}}
                <li><a href="http://localhost:8888/gameStore/statement/page/{{$i}}">{{$i}}</a></li>
            {{/if}}
        {{/for}}
    </ul>
</div>