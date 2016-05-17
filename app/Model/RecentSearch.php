<?php

namespace App\Model;

use DB;
use Illuminate\Database\Eloquent\Model;

class RecentSearch extends Model
{
    //
    protected $table = "recent_searches";

    public function addRecentSearch($key)
    {
        $sql = "INSERT INTO recent_searches
                    (content , rate)
                    VALUES (?, ?)
                    ON DUPLICATE KEY
                    UPDATE
                    rate=rate+1
                    ";
        DB::insert($sql, [$key, 0]);
    }


    public function scopeFrequent($query, $limit=20)
    {
        return $query->orderBy('rate','desc')->paginate($limit);
    }
    public function scopeRecent($query, $limit=20)
    {
        return $query->orderBy('created_at','desc');
    }
}
