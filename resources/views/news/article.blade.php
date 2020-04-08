@extends('layouts.main')

@section('title') {{ $model->title }} @endsection

@section('content')
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3"> {{ $model->title }} </h1>
        </div>
    </div>
    @if($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $message }}</strong>
        </div>
    @endif

    <div class="container">
        <p> {{ $model->text_full }} </p>
        <h3>Комментарии ({{$model->count()}})</h3>
        <a href="#comments" data-toggle="collapse">Свернуть / развернуть</a>
        @include('news.comments')
        @auth()
            <h3 class="mt-3">Оставить комментарий</h3>
            @include('news.comment-form')
        @endauth


    </div> <!-- /container -->
@endsection

