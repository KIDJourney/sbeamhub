<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Admin
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Admin whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Admin whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Admin whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Admin wherePassword($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Admin whereRememberToken($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Admin whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Admin whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Admin extends Model
{
    //
}
