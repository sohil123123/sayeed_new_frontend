<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBalance extends Model
{
    //
    protected $table = 'userbalance';

    public function user()
    {
        return $this->belongsTo('App\User', 'userID');
    }
}
