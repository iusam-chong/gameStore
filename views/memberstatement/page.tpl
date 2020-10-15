<script type="module" src="http://localhost:8888/gameStore/js/memberstatement.js" defer></script>
<div class="container">
    <div class="row" style="display: flex; align-items: center;">
        <div class="col-lg-2">
            <a type="button" class="btn btn-danger" href="http://localhost:8888/gameStore/membermanage" style="float:left; margin-top: 10px;">返回</a>

        </div>
        <div class="col-lg-8">
            <h1 class="text-center" style="margin-top: 10px;"> 會員交易明細</h1>
        </div>
        <div class="col-lg-2" style="float:right; margin-top: 10px;">
            <table class="table table-condensed">
                <tr>
                    <td style="border:none;">會員編號 :</td>
                    <td style="border:none;">{{$member.id}}</td>
                </tr>
                <tr>
                    <td style="border:none;">賬號名稱 :</td>
                    <td style="border:none;">{{$member.user_name}}</td>
                </tr>
            </table>
        </div>
    </div>
</div>
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
                                    <td class="col-xs-2" style="vertical-align: middle;"><img style="width:50px;" src="http://localhost:8888/gameStore/show/image/{{$od.product_id}}"></td>
                                    <td class="col-xs-4" style="vertical-align: middle;">{{$od.name}}</td>
                                    <td class="col-xs-2 text-center quantity" style="vertical-align: middle;">{{$od.quantity}}</td>
                                    <td class="col-xs-2 text-center price" style="vertical-align: middle;">{{$od.price}}</td>
                                    <td class="col-xs-2 text-center subtotal" style="vertical-align: middle;">0</td>
                                </tr>
                            {{/if}}
                        {{/foreach}}
                        <tr>
                            <td colspan="3" style="vertical-align: middle;">
                                <h5>訂單日期 : {{$o.bill_time}}</h5>
                            </td>
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
        <hr>
    {{else if}}
        <p class="text-center">窮鬼無交易紀錄</p>
    {{/if}}
</div>


<div class="container text-center">
    <ul class="pagination">
        {{for $i=1 to $pagination}}
            {{if $currentPage == $i}}
                <li class="active"><a href="http://localhost:8888/gameStore/memberstatement/id/{{$member.id}}/{{$i}}">{{$i}}</a></li>
            {{else}}
                <li><a href="http://localhost:8888/gameStore/memberstatement/id/{{$member.id}}/{{$i}}">{{$i}}</a></li>
            {{/if}}
        {{/for}}
    </ul>
</div>