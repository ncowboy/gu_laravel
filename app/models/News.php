<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;
use App\models\Comments;
use App\User;
use Orchestra\Parser\Xml\Facade as XMLParser;

/**
 * Class News
 *
 * @package App\models
 * @property $comments \Illuminate\Database\Eloquent\Relations\HasMany
 * @property int $id
 * @property string $title
 * @property int $author_id
 * @property int $category_id
 * @property string $text_short
 * @property string $text_full
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\News newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\News newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\News query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\News whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\News whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\News whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\News whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\News whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\News whereTextFull($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\News whereTextShort($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\News whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\News whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property-read int|null $comments_count
 */
class News extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['category_id', 'title', 'text_short', 'text_full', 'active', 'author_id'];

    /**
     * @return array
     */
    public static function rules()
    {
        return [
            'title' => 'required|min:5|max:64|unique:news,title',
            'category_id' => 'required|exists:categories,id',
            'author_id' => 'required|exists:users,id',
            'text_short' => 'required|max:256',
            'text_full' => 'required|max:5120',
            'active' => 'boolean',
        ];
    }

    /**
     * @return array
     */
    public static function attributeNames()
    {
        return [
            'title' => 'Заголовок',
            'category_id' => 'Категория',
            'text_short' => 'Короткий текст',
            'text_full' => 'Полный текст',
            'active' => 'Активность',
        ];
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comments::class, 'article_id');
    }

    /**
     * @return int
     */
    public function count()
    {
        return $this->comments()->get()->count();
    }

    /**
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object|null
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'author_id')->first();
    }

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id')->first();
    }

    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getArrayNews()
    {
        return self::all()->mapWithKeys(function ($item) {
            return [
                $item['id'] => "{$item['id']}-{$item['title']}"
            ];
        });
    }

    /**
     * @param $category_id
     */
    public static function addNewsFromRss($category_id)
    {
        $data = self::getRssNews($category_id);

        foreach ($data as $key => $channelNews) {
            $feed = RssFeeds::find($key)->first();
            foreach ($channelNews['news'] as $article) {
                if($article['pubDate'] > $feed->feed_updated)
                $model = new News();
                $model->fill([
                    'title' => $article['title'],
                    'author_id' => \Auth::id(),
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

    /**
     * @param $category_id
     * @return array
     */
    public static function getRssNews($category_id) {
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
