<h1>this is statement</h1>

{{foreach $statement as $s}}

<p>{{$s.id}}</p>
<p>{{$s.user_id}}</p>
<p>{{$s.bill_time}}</p>
<p>{{$s.product_id}}</p>
<p>{{$s.name}}</p>
<p>{{$s.quantity}}</p>
<hr>

{{/foreach}}