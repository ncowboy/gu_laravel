<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NewsController extends Controller
{
    private $news = [
        1 => [
            'id' => 1,
            'category_id' => 1,
            'title' => 'Новость 1',
            'text_short' => 'Текст новости',
            'text_full' => 'Полный текст новости'
        ],
        2 => [
            'id' => 2,
            'category_id' => 1,
            'title' => 'Новость 2',
            'text_short' => 'Текст новости',
            'text_full' => 'Полный текст новости'
        ],
        3 => [
            'id' => 3,
            'category_id' => 1,
            'title' => 'Новость 3',
            'text_short' => 'Текст новости',
            'text_full' => 'Полный текст новости'
        ],
        4 => [
            'id' => 4,
            'category_id' => 2,
            'title' => 'Новость 4',
            'text_short' => 'Текст новости',
            'text_full' => 'Полный текст новости'
        ],
        5 =>
            ['id' => 5,
                'category_id' => 2,
                'title' => 'Новость 5',
                'text_short' => 'Текст новости',
                'text_full' => 'Полный текст новости'
            ],
        6 =>
            ['id' => 6,
                'category_id' => 2,
                'title' => 'Новость 6',
                'text_short' => 'Текст новости',
                'text_full' => 'Полный текст новости'
            ],
        7 =>
            ['id' => 7,
                'category_id' => 3,
                'title' => 'Новость 7',
                'text_short' => 'Текст новости',
                'text_full' => 'Полный текст новости'
            ],
        8 =>
            ['id' => 8,
                'category_id' => 3,
                'title' => 'Новость 8',
                'text_short' => 'Текст новости',
                'text_full' => 'Полный текст новости'
            ],
        9 =>
            ['id' => 9,
                'category_id' => 3,
                'title' => 'Новость 9',
                'text_short' => 'Текст новости',
                'text_full' => 'Полный текст новости'
            ],
        10 =>
            ['id' => 10,
                'category_id' => 4,
                'title' => 'Новость 10',
                'text_short' => 'Текст новости',
                'text_full' => 'Полный текст новости'
            ],
        11 =>
            ['id' => 11,
                'category_id' => 4,
                'title' => 'Новость 11',
                'text_short' => 'Текст новости',
                'text_full' => 'Полный текст новости'
            ],
        12 =>
            ['id' => 12,
                'category_id' => 4,
                'title' => 'Новость 12',
                'text_short' => 'Текст новости',
                'text_full' => 'Полный текст новости'
            ],

    ];

    private $categories = [
        1 => 'Главные новости',
        2 => 'Политика',
        3 => 'Спорт',
        4 => 'Культура'
    ];

    public function index()
    {
        return redirect('/news/category/1');
    }

    public function category($id)
    {
        $categoryName = '';

        if (!array_key_exists((int)$id, $this->categories)) {
            abort('404');
        }

        foreach ($this->categories as $key => $value) {
            if ($key === (int)$id) {
                $categoryName = $value;
            }
        }

        $news = '';
        foreach ($this->news as $value) {
            if ($value['category_id'] === (int)$id) {
                $news .= "
                <div class=\"col-md-4\">
                        <h2>{$value['title']}</h2>
                        <p>{$value['text_short']} </p>
                        <p><a class=\"btn btn-secondary\" href=\"/news/article/{$value['id']} \" role=\"button\">Подробнее &raquo;</a></p>
                      </div>
                ";
            }
        }
        return '
           <!doctype html>
            <html lang="ru">
              <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title> Новости: ' . $categoryName . '</title>
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
                      <li class="nav-item">
                        <a class="nav-link" href="/">Домой</a>
                      </li>
                      <li class="nav-item dropdown active">
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
                      <h1 class="display-3">' . $categoryName . '</h1>
                    </div>
                  </div>

                  <div class="container">
                    <!-- Example row of columns -->
                    <div class="row">
                     ' . $news . '
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

    public function article($id)
    {
        if (!array_key_exists((int)$id, $this->news)) {
            abort('404');
        }

        $article = null;

        foreach ($this->news as $value) {
            if ($value['id'] === (int)$id) {
                $article = $value;
            }
        }

        return '
        <!doctype html>
            <html lang="ru">
              <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title>' . $article['title'] . '</title>
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
                      <li class="nav-item">
                        <a class="nav-link" href="/">Домой</a>
                      </li>
                      <li class="nav-item dropdown active">
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
                      <h1 class="display-3">' . $article['title'] . '</h1>
                    </div>
                  </div>

                  <div class="container">
                    <p>' . $article['text_full']. '</p>

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

    public function articleCreate()
    {
        return '
           <!doctype html>
            <html lang="ru">
              <head>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
                <title> Новости: добавление</title>
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
                      <li class="nav-item">
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
                      <li class="nav-item active">
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
