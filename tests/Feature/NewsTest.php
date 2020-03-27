<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\News;


class NewsTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testNews()
    {
        $news = News::getNews();

        $this->assertIsArray($news);

        foreach ($news as $key => $article) {

          $this->assertIsArray($article);

          $this->assertArrayHasKey('id',$article);
          $this->assertArrayHasKey('category_id', $article);
          $this->assertArrayHasKey('title', $article);
          $this->assertArrayHasKey('text_short', $article);
          $this->assertArrayHasKey('text_full', $article);

          $this->assertNotEmpty($key);
          $this->assertIsInt($key);
          $this->assertNotEquals(0, $key);

          $this->assertIsInt($article['id']);
          $this->assertNotEquals(0, $article['id']);
          $this->assertIsInt($article['category_id']);
          $this->assertNotEquals(0, $article['category_id']);
          $this->assertNotEmpty($article['category_id']);
          $this->assertIsString($article['title']);
          $this->assertIsString($article['text_short']);
          $this->assertIsString($article['text_full']);
          $this->assertArrayHasKey('id',$article);
          $this->assertArrayHasKey('category_id', $article);
          $this->assertArrayHasKey('title', $article);
          $this->assertArrayHasKey('text_short', $article);
          $this->assertArrayHasKey('text_full', $article);
        }
    }
}
