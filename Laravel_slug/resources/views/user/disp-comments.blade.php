@foreach($cs as $c)
<div class="card w-75">
    <div class="card-body">
      <h5 class="card-title">{{$c->user_id }} - {{$c->created_at}} </h5>
      <p class="card-text">{{$c->content}}</p>
    </div>
</div>
@endforeach
