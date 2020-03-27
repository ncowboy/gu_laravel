@extends('layouts.main')

@section('title') добавление новости @endsection

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Добавление новости</h1>
        </div>
    </div>

    <div class="container">
        @if($message = Session::get('success'))
            <div class="alert alert-success alert-block">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>{{ $message }}</strong>
            </div>
        @endif
        <form method="post" action="{{route('news::create')}}">
            @csrf
            <div class="form-group">
                <label for="exampleFormControlSelect1">Категория</label>
                <select name="category" class="form-control" id="exampleFormControlSelect1">
                    <option value="2">Политика</option>
                    <option value="3">Культура</option>
                    <option value="4">Спорт</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Заголовок</label>
                <input type="text" name="article_header" class="form-control" id="exampleFormControlInput1"
                       placeholder="Заголовок новости">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Короткиий текст новости</label>
                <textarea name="text_short" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Полный текст новости</label>
                <textarea name="text_full" class="form-control" id="exampleFormControlTextarea1" rows="7"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
        <hr>

    </div> <!-- /container -->
@endsection
