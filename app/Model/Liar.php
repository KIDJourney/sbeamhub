<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use DB;

/**
 * App\Model\Liar
 *
 * @property integer $id
 * @property string $tiebaid
 * @property string $steamnick
 * @property string $steamid
 * @property string $taobaoid
 * @property string $alipayaccount
 * @property string $reason
 * @property integer $editor
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Liar whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Liar whereTiebaid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Liar whereSteamnick($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Liar whereSteamid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Liar whereTaobaoid($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Liar whereAlipayaccount($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Liar whereReason($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Liar whereEditor($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Liar whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Model\Liar whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Liar extends Model
{
    //

    public function searchByInfo($info,$limit=20)
    {
        $result = DB::table("liars")->where("tiebaid", "like", "%$info%")
            ->orWhere("tiebaid", "like", "%$info%")
            ->orWhere("steamnick", "like", "%$info%")
            ->orWhere("steamid", "like", "%$info%")
            ->orWhere("taobaoid", "like", "%$info%")
            ->orWhere("alipayaccount", "like", "%$info%")
            ->orWhere("reason", "like", "%$info%")->paginate($limit);

        return $result;
    }
}
