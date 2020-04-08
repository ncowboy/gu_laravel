@extends('layouts.admin.main')

@section('content')
    <h1>Редактирование новости</h1>
    <form method="post" action="{{route('admin::news::update', ['model' => $model])}}">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlSelect1">Категория</label>
            <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                @foreach($categories as $key => $value)
                    <option value="{{$key}}" @if ($model->category()->name == $value) selected @endif> {{$value}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlSelect2">Автор</label>
            <select name="author_id" class="form-control" id="exampleFormControlSelect2">
                @foreach($authors as $key => $value)
                    <option value="{{$key}}" @if ($model->user()->name == $value) selected @endif>{{$value}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">Заголовок</label>
            <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                   placeholder="Заголовок новости" value="{{$model->title}}">
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Короткиий текст новости</label>
            <textarea name="text_short" class="form-control" id="exampleFormControlTextarea1" rows="3">{{$model->text_short}}</textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlTextarea1">Полный текст новости</label>
            <textarea name="text_full" class="form-control" id="exampleFormControlTextarea1" rows="7">{{$model->text_full}}</textarea>
        </div>
        <div class="form-group form-check">
            <label for="exampleFormControlSelect222">Активность</label>
            <select name="active" class="form-control" id="exampleFormControlSelect3">
                <option value="1" @if ($model->active == 1) selected @endif>Да</option>
                <option value="0" @if ($model->active == 0) selected @endif>Нет</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Отправить</button>
    </form>
@endsection
