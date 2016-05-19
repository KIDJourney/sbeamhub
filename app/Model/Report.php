<?php

namespace App\App\Model;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    public function author()
    {
        return $this->belongsTo('App\Model\User','user_id');
    }
    
    public function operator()
    {
        return $this->belongsTo('App\Model\User','admin_id');
    }
}
