<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class News extends Model
{

  /**
   * @var array
   */
  private static $news = [
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

  /**
   * @return array
   */
  public static function getNews()
  {
    return self::$news;
  }
}
