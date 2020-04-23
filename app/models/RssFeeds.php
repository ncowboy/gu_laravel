<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\RssFeeds
 *
 * @property int $id
 * @property string $url
 * @property int $category_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\RssFeeds newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\RssFeeds newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\RssFeeds query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\RssFeeds whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\RssFeeds whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\RssFeeds whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\RssFeeds whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\RssFeeds whereUrl($value)
 * @mixin \Eloquent
 */
class RssFeeds extends Model
{
    protected $fillable = ['category_id', 'url'];

    /**
     * @return array
     */
    public static function rules()
    {
        return [
            'category_id' => 'required|exists:categories,id',
            'url' => 'required|max:64',
        ];
    }

    /**
     * @return array
     */
    public static function attributeNames()
    {
        return [
            'category_id' => 'Категория',
            'url' => 'URL',
        ];
    }

    /**
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object|null
     */
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id')->first();
    }
}
