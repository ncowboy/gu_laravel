@extends('layouts.admin.main')

@section('content')
    <h1>Редактирование комментария</h1>

    <form method="post" action="{{route('admin::comments::update', ['model' => $model])}}">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlSelect2">Автор</label>
            <select name="author_id" class="form-control" id="exampleFormControlSelect2">
                @foreach($authors as $key => $value)
                    <option value="{{$key}}" @if ($model->author()->name == $value) selected @endif>{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect1">Новость</label>
            <select name="article_id" class="form-control" id="exampleFormControlSelect1">
                @foreach($articles as $key => $value)
                    <option value="{{$key}}" @if ($model->article()->id == $key) selected @endif>{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Комментарий</label>
            <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" rows="7">{{$model->comment}}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection
