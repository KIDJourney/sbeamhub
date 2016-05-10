<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Donator
 * @property string $name
 * @property float $amount
 * @mixin \Eloquent
 */
class Donator extends Model
{
    //

    public function scopeRecent($query, $limit=20)
    {
        return $query->orderBy('created_at','desc')->paginate($limit);
    }
}
