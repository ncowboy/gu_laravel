@extends('layouts.main')

@section('title') {{ $article['title'] }} @endsection

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3"> {{ $article['title'] }} </h1>
        </div>
    </div>

    <div class="container">
        <p> {{ $article['text_full'] }} </p>

    </div> <!-- /container -->
@endsection

