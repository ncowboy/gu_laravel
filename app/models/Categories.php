<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\models\Categories
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property int $main
 * @property int $active
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Categories newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Categories newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Categories query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Categories whereActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Categories whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Categories whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Categories whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Categories whereMain($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Categories whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\models\Categories whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Categories extends Model
{
    /**
     * @return array
     */
    public static function getArrayCategories()
    {
        return self::all()->mapWithKeys(function ($item) {
            return [
                $item['id'] => $item['name']
            ];
        });
    }

}
