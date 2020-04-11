<form method="post" action="{{route('news::leave-comment')}}">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlSelect1">Текст</label>
        <textarea name="comment" rows="5" class="form-control"></textarea>
    </div>
    <input type="hidden" name="author_id" value="{{Auth::id()}}">
    <input type="hidden" name="article_id" value="{{$model->id}}">
    <button type="submit" class="btn btn-primary">Отправить</button>
</form>
