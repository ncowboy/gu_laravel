@extends('layouts.main')

@section('title') {{ $model->name }} @endsection

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3"> {{ $model->name}}</h1>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            @foreach($news as $value)
                <div class="col-md-4 d-flex flex-column justify-content-between">
                    <h2>{{ $value->title }}</h2>
                    <p>{{ $value->text_short }} </p>
                    <p><a class="btn btn-primary" href="{{ route('news::article', ['id' => $value->id]) }}"
                          role="button">Подробнее &raquo;</a></p>
                </div>
            @endforeach
        </div>
        {{$news->links()}}
        <hr>
    </div> <!-- /container -->
@endsection

