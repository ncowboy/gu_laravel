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
                <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                    <option>Выберите категорию</option>
                    @foreach($categories as $key => $value)
                        <option
                            value="{{$key}}"
                            @if($model->category_id == $key) selected @endif>
                            {{$value}}
                        </option>
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
                <label for="exampleFormControlInput1">Заголовок</label>
                <input type="text" name="title" class="form-control" id="exampleFormControlInput1"
                       value="{{$model->title}}"
                       placeholder="Заголовок новости">
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
                <textarea name="text_short" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
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
                <textarea name="text_full" class="form-control" id="exampleFormControlTextarea1" rows="7"></textarea>
            </div>
            @if($errors->has('text_full'))
                <div class="alert alert-danger">
                    @foreach($errors->get('text_full') as $error)
                        <p style="margin-bottom: 0;">{{ $error }}</p>
                    @endforeach
                </div>
            @endif
            <input type="hidden" name="active" value="0">
            <input type="hidden" name="author_id" value="1">
            <button type="submit" class="btn btn-primary">Отправить</button>
        </form>
        <hr>

    </div> <!-- /container -->
@endsection
