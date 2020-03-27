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

    $news = [];
    foreach ($this->news as $key => $value) {
      if ($value['category_id'] === (int)$id) {
        $news[$key] = $value;
      }
    }

    return view('news.category', [
      'categoryName' => $categoryName,
      'news' => $news
    ]);
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

    return view('news.article', ['article' => $article]);

  }

  public function articleCreate(Request $request)
  {
    if ($request->isMethod('post')) {
      return back()->with('success', 'Новость добавлена и ожидает модерации!');
    }
    return view('news.create');
  }
}
