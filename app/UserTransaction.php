<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserTransaction extends Model
{
    protected $table = 'usertransaction';

    public function user()
    {
        return $this->belongsTo('App\User', 'userID');
    }
}
