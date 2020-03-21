<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index()
    {
        return '
            <!doctype html>
            <html lang="ru">
              <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title> Новости: главная страница</title>
                <!-- Bootstrap core CSS -->
                 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
                    <style>
                      .bd-placeholder-img {
                        font-size: 1.125rem;
                        text-anchor: middle;
                        -webkit-user-select: none;
                        -moz-user-select: none;
                        -ms-user-select: none;
                        user-select: none;
                      }

                      @media (min-width: 768px) {
                        .bd-placeholder-img-lg {
                          font-size: 3.5rem;
                        }
                      }
                    </style>
              </head>
              <body>
                <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
                  <a class="navbar-brand" href="#">ТЫндекс.Новости</a>
                  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                  </button>

                  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav mr-auto">
                      <li class="nav-item active">
                        <a class="nav-link" href="/">Домой</a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Новости</a>
                        <div class="dropdown-menu" aria-labelledby="dropdown01">
                          <a class="dropdown-item" href="/news/category/1">Главные новости</a>
                          <a class="dropdown-item" href="/news/category/2">Политика</a>
                          <a class="dropdown-item" href="/news/category/3">Спорт</a>
                          <a class="dropdown-item" href="/news/category/4">Культура</a>
                        </div>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="/news/create">Предложить новость</a>
                      </li>
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                      <input class="form-control mr-sm-2" type="text" placeholder="Поиск по сайту" aria-label="Search">
                      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Найти</button>
                    </form>
                  </div>
                </nav>

                <main role="main">
                  <!-- Main jumbotron for a primary marketing message or call to action -->
                  <div class="jumbotron">
                    <div class="container">
                      <h1 class="display-3">Hello!</h1>
                      <p>Портал суперважных новостей о самом главном. Но это не точно.</p>
                      <p><a class="btn btn-primary btn-lg" href="/news/category/1" role="button">К главным новостям</a></p>
                    </div>
                  </div>

                  <div class="container">
                    <!-- Example row of columns -->
                    <div class="row">
                      <div class="col-md-4">
                        <h2>Политика</h2>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                        <p><a class="btn btn-secondary" href="/news/category/2" role="button">Перейти &raquo;</a></p>
                      </div>
                      <div class="col-md-4">
                        <h2>Спорт</h2>
                        <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
                        <p><a class="btn btn-secondary" href="/news/category/3" role="button">Перейти &raquo;</a></p>
                      </div>
                      <div class="col-md-4">
                        <h2>Культура</h2>
                        <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
                        <p><a class="btn btn-secondary" href="/news/category/4" role="button">Перейти &raquo;</a></p>
                      </div>
                    </div>

                    <hr>

                  </div> <!-- /container -->

                </main>

                <footer class="container">
                  <p>&copy; Company 2017-2019</p>
                </footer>
                <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
                <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
            </body>
            </html>
                ';
    }
}
