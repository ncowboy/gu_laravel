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
     * @var array
     */
    protected $fillable = ['name', 'description', 'main', 'active'];

    /**
     * @return array
     */
    public static function rules()
    {
        return [
            'name' => 'required|min:5|max:50|unique:categories,name',
            'description' => 'required|max:1024',
            'main' => 'boolean',
            'active' => 'boolean',
        ];
    }

    /**
     * @return array
     */
    public static function attributeNames()
    {
        return [
            'name' => 'Название',
            'description' => 'Описание',
            'main' => 'На главной странице',
            'active' => 'активность',
        ];
    }


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
