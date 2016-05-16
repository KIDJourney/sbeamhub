<?php

namespace App\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

/**
 * App\User
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property bool $isadmin
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereUpdatedAt($value)
 * @mixin \Eloquent
 * @property string $steam_id
 * @property string $img_url
 * @property boolean $is_verified
 * @property boolean $is_admin
 * @property boolean $is_banned
 * @property string $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Model\Liar[] $reportedLiar
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereSteamId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereImgUrl($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereIsVerified($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereIsAdmin($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereIsBanned($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\User whereDeletedAt($value)
 */
class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'email', 'password', 'img_url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function isAdmin()
    {
        return $this->is_admin == '1';
    }

    public function reportedLiar()
    {
        return $this->hasMany('App\Model\Liar','editor');
    }
}
