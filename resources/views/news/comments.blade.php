<div class="collapse show" id="comments">
    @foreach($comments as $item)
        <hr>
        <div class="media">
            <div class="media-body">
                <h4 class="media-heading">{{$item->created_at}} от пользователя {{$item->author()->email}}</h4>
                {{$item->comment}}
            </div>
        </div>
    @endforeach
</div>
