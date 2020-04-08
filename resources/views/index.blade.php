<?php
/**
 * @var $news \App\models\News[]
 */
?>

@extends('layouts.main')

@section('title') главная страница @endsection

@section('content')
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Hello!</h1>
            <p>Портал суперважных новостей о самом главном. Но это не точно.</p>
            <p><a class="btn btn-primary btn-lg" href="{{ route('news::category', ['id' => $mainCategoryId]) }}"
                  role="button">К
                    главным новостям</a></p>
        </div>
    </div>

    <div class="container">
        <h2 class="text-center mb-3">Категории новостей</h2>
        <div class="row">
            @if(!empty($categories))
                @foreach($categories as $item)
                    <div class="col-md-4 d-flex flex-column justify-content-between">
                        <h3>{{$item->name}}</h3>
                        <p>{{$item->description}}</p>
                        <p><a class="btn btn-secondary" href="{{ route('news::category', ['id' => $item->id]) }}"
                              role="button">Перейти
                                &raquo;</a></p>
                    </div>
                @endforeach
            @endif
        </div>

        <hr>
        <h2 class="text-center mb-3">
            Случайные новости
        </h2>
        <div class="row">
            @if(!empty($news))
                @foreach($news as $item)
                    <div class="col-md-3 d-flex flex-column justify-content-between">
                        <h3>{{$item->title}}</h3>
                        <p>{{$item->text_short}}</p>
                        <p><a class="btn btn-primary" href="{{ route('news::article', ['id' => $item->id]) }}"
                              role="button">Подробнее »</a></p>
                    </div>

                @endforeach
            @endif
        </div>

    </div> <!-- /container -->
@endsection
