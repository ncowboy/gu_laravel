@extends('layouts.main')

@section('title') {{ $categoryName }} @endsection

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3"> {{ $categoryName }}</h1>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            @foreach($news as $value)
                <div class="col-md-4">
                    <h2>{{ $value['title'] }}</h2>
                    <p>{{ $value['text_short'] }} </p>
                    <p><a class="btn btn-secondary" href="{{ route('news::article', ['id' => $value['id']]) }}"
                          role="button">Подробнее &raquo;</a></p>
                </div>
            @endforeach
        </div>
        <hr>
    </div> <!-- /container -->
@endsection

