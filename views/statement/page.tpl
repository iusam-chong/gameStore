<h1>this is statement</h1>

{* {{foreach $order}}

<p>{{$s.id}}</p>
<p>{{$s.user_id}}</p>
<p>{{$s.bill_time}}</p>
<p>{{$s.product_id}}</p>
<p>{{$s.name}}</p>
<p>{{$s.quantity}}</p>
<hr>

{{/foreach}} *}

{{foreach $order as $o}}
    
    <h1>{{$o.bill_time}}</h1>
    {{foreach $orderDetail as $od}}
        {{if $o.id === $od.id}}
            <p>{{$od.name}}</p>
            <p>{{$od.quantity}}</p>
            <img src="http://localhost:8888/gameStore/show/image/{{$od.id}}">
        {{/if}}
    {{/foreach}}
    <h4>{{$o.total}}</h4>
    <hr>
{{/foreach}}


{* 
<*assign var="i" value=0*> 
<*foreach from=$r_article item=row*> 
   <div class="scont stecont<*$i*>"> 
      <ul> 
         <*foreach from=$row item=r*> 
            <li> 
            <*$r['title']*><a href="article.php?aid=<*$r['id']*>" target="_blank">【線上閱讀】</a> <a href="<*$r['attachment']*>" target="_blank">【下載】</a> 
            </li> 
         <*/foreach*> 
      </ul> 
   </div> 
   <*$i = $i + 1*> 
<*/foreach*> 
*}