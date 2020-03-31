@extends('layouts.main')

@section('title') главная страница @endsection

@section('content')
    @dump($news)
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Hello!</h1>
            <p>Портал суперважных новостей о самом главном. Но это не точно.</p>
            <p><a class="btn btn-primary btn-lg" href="{{ route('news::category', ['id' => 1]) }}" role="button">К главным новостям</a></p>
        </div>
    </div>

    <div class="container">
        <!-- Example row of columns -->
        <div class="row">
            <div class="col-md-4">
                <h2>Политика</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor
                    mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna
                    mollis euismod. Donec sed odio dui. </p>
                <p><a class="btn btn-secondary" href="{{ route('news::category', ['id' => 2]) }}" role="button">Перейти &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Спорт</h2>
                <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor
                    mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna
                    mollis euismod. Donec sed odio dui. </p>
                <p><a class="btn btn-secondary" href="{{ route('news::category', ['id' => 3]) }}" role="button">Перейти &raquo;</a></p>
            </div>
            <div class="col-md-4">
                <h2>Культура</h2>
                <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula
                    porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh,
                    ut fermentum massa justo sit amet risus.</p>
                <p><a class="btn btn-secondary" href="{{ route('news::category', ['id' => 4]) }}" role="button">Перейти &raquo;</a></p>
            </div>
        </div>

        <hr>

    </div> <!-- /container -->
@endsection
