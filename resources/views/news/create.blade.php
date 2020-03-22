@extends('layouts.main')

@section('title') добавление новости @endsection

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Добавление новости</h1>
        </div>
    </div>

    <div class="container">
        <form>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Категория</label>
                <select class="form-control" id="exampleFormControlSelect1">
                    <option>Политика</option>
                    <option>Культура</option>
                    <option>Спорт</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlInput1">Заголовок</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Заголовок новости">
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Короткиий текст новости</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Полный текст новости</label>
                <textarea class="form-control" id="exampleFormControlTextarea1" rows="7"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
        <hr>

    </div> <!-- /container -->
@endsection
