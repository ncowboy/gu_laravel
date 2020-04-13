@csrf
<div class="form-group">
    <label for="exampleFormControlSelect1">Категория</label>
    <select name="category_id" class="form-control" id="exampleFormControlSelect1">
        @foreach($categories as $key => $value)
            <option value="{{$key}}" @if ($model->category_id == $key) selected @endif> {{$value}}</option>
        @endforeach
    </select>
</div>
@if($errors->has('category_id'))
    <div class="alert alert-danger">
        @foreach($errors->get('category_id') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="form-group">
    <label for="exampleFormControlSelect2">Автор</label>
    <select name="author_id" class="form-control" id="exampleFormControlSelect2">
        @foreach($authors as $key => $value)
            <option value="{{$key}}" @if ($model->author_id == $key) selected @endif>{{$value}}</option>
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
    <label for="exampleFormControlInput1">Заголовок</label>
    <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
           placeholder="Заголовок новости" value="{{$model->title}}">
</div>
@if($errors->has('title'))
    <div class="alert alert-danger">
        @foreach($errors->get('title') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="form-group">
    <label for="exampleFormControlTextarea1">Короткиий текст новости</label>
    <textarea name="text_short" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$model->text_short}}</textarea>
</div>
@if($errors->has('text_short'))
    <div class="alert alert-danger">
        @foreach($errors->get('text_short') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="form-group">
    <label for="exampleFormControlTextarea1">Полный текст новости</label>
    <textarea name="text_full" class="form-control" id="exampleFormControlTextarea1" rows="7">{{$model->text_full}}</textarea>
</div>
@if($errors->has('text_full'))
    <div class="alert alert-danger">
        @foreach($errors->get('text_full') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
        @endforeach
    </div>
@endif
<div class="form-group form-check">
    <label for="exampleFormControlSelect222">Активность</label>
    <select name="active" class="form-control" id="exampleFormControlSelect3">
        <option value="1" @if ($model->active == 1) selected @endif>Да</option>
        <option value="0" @if ($model->active == 0) selected @endif>Нет</option>
    </select>
</div>
@if($errors->has('active'))
    <div class="alert alert-danger">
        @foreach($errors->get('active') as $error)
            <p style="margin-bottom: 0;">{{ $error }}</p>
        @endforeach
    </div>
@endif
<button type="submit" class="btn btn-primary">Отправить</button>
