<h1>member manage</h1>

{{foreach $members as $member}}
    <p>{{$member.id}}</p>
    <p>{{$member.user_name}}</p>
    <p>{{$member.enabled}}</p>
    <hr>
{{/foreach}}