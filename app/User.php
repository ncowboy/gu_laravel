<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property boolean $is_admin
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $social_network_id
 * @property string $auth_type
 * @property string $profile_pic
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereAuthType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereIsAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereProfilePic($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\User whereSocialNetworkId($value)
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'is_admin', 'password', 'social_network_id', 'auth_type', 'profile_pic'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * @return User[]|\Illuminate\Database\Eloquent\Collection
     */
    public static function getArrayUsers()
    {
        return self::all()->mapWithKeys(function ($item) {
            return [
                $item['id'] => $item['name']
            ];
        });
    }

    /**
     * @return array
     */
    public static function rules()
    {
        return [
            'name' => 'required|min:3|max:255',
            'email' => 'sometimes|required|email:rfc,dns|unique:users,email',
            'password' => 'sometimes|required|min:6'
        ];
    }

    /**
     * @return array
     */
    public static function attributeNames()
    {
        return [
            'name' => 'ФИО',
            'email' => 'Email',
            'password' => 'Пароль',
            'social_network_id' => 'ID в соцсети',
            'auth_type' => 'Соцсеть',
            'profile_pic' => 'Аватар'
        ];
    }
}
