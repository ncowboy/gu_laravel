@csrf
<div class="form-group">
    <label for="exampleFormControlSelect2">Автор</label>
    <select name="author_id" class="form-control" id="exampleFormControlSelect2">
        @foreach($authors as $key => $value)
            <option value="{{$key}}">{{$value}}</option>
        @endforeach
    </select>
</div>
@if($errors->has('author_id'))
    <div class="alert alert-danger">
        @foreach($errors->get('author_id') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="form-group">
    <label for="exampleFormControlSelect1">Новость</label>
    <select name="article_id" class="form-control" id="exampleFormControlSelect1">
        @foreach($articles as $key => $value)
            <option value="{{$key}}">{{$value}}</option>
        @endforeach
    </select>
</div>
@if($errors->has('article_id'))
    <div class="alert alert-danger">
        @foreach($errors->get('article_id') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
        @endforeach
    </div>
@endif

<div class="form-group">
    <label for="exampleFormControlTextarea1">Комментарий</label>
    <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="7">{{$model->comment}}</textarea>
</div>
@if($errors->has('comment'))
    <div class="alert alert-danger">
        @foreach($errors->get('comment') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
        @endforeach
    </div>
@endif

<button type="submit" class="btn btn-primary">Отправить</button>
