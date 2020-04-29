<?php


namespace App\Services;

use App\models\News;
use App\models\RssFeeds;
use Orchestra\Parser\Xml\Facade as XMLParser;

class NewsParseService
{
    public function addNewsFromRss($category_id, $author_id)
    {
        $data = $this->getRssNews($category_id);

        foreach ($data as $key => $channelNews) {
            $feed = RssFeeds::find($key)->first();
            foreach ($channelNews['news'] as $article) {
                if ($article['pubDate'] > $feed->feed_updated)
                    $model = new News();
                $model->fill([
                    'title' => $article['title'],
                    'author_id' => $author_id,
                    'category_id' => $category_id,
                    'text_short' => $article['title'],
                    'text_full' => "{$article['description']}
                     <br><a href='{$article['link']}'> Источник </a>"
                ]);
                $model->save();
            }
            $feed->setAttribute('feed_updated', date("Y-m-d H:i:s"));
            $feed->save();
        }
    }

    protected function getRssNews($category_id)
    {
        $data = [];

        $models = RssFeeds::query()->where(['category_id' => $category_id])->get();

        foreach ($models as $model) {
            $xml = XMLParser::load($model->url);
            $data[$model->id] = $xml->parse([
                'news' => [
                    'uses' => 'channel.item[title,link,guid,description,pubDate]'
                ],
            ]);
        }
        return $data;
    }


}
