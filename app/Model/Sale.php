<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Model\Sale
 *
 * @property integer $id
 * @property string $app_id
 * @property string $name
 * @property integer $discount
 * @property integer $price
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Sale whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Sale whereAppId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Sale whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Sale whereDiscount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Sale wherePrice($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Sale whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Sale whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Sale extends Model
{
    //
}
