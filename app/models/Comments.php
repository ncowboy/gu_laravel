<?php

namespace App\models;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * App\models\Comments
 *
 * @property int $id
 * @property int $author_id
 * @property int $article_id
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Comments newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Comments newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Comments query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Comments whereArticleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Comments whereAuthorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Comments whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Comments whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Comments whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Comments whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Comments extends Model
{
    protected $fillable = ['comment', 'author_id', 'article_id'];

    public function author()
    {
        return $this->belongsTo(User::class, 'author_id')->first();
    }

    /**
     * @return Model|\Illuminate\Database\Eloquent\Relations\BelongsTo|object|null
     */
    public function article()
    {
        return $this->belongsTo(News::class, 'article_id')->first();
    }
}

