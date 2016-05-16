<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Donator
 *
 * @property string $name
 * @property float $amount
 * @mixin \Eloquent
 * @property integer $id
 * @property integer $editor
 * @property string $deleted_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Model\User $addBy
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Donator whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Donator whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Donator whereAmount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Donator whereEditor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Donator whereDeletedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Donator whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Donator whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Donator recent($limit = 20)
 */
class Donator extends Model
{
    //

    protected $fillable = [
        'name', 'amount'
    ];


    public function addBy()
    {
        return $this->belongsTo('App\Model\User', 'editor');
    }

    public function scopeRecent($query, $limit = 20)
    {
        return $query->orderBy('created_at', 'desc')->paginate($limit);
    }
}
