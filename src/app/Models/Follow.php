<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follow extends Model
{
    protected $fillable = [
        'user_id',
        'follow_id',
    ];

    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function followed(){
        return $this->belongsTo('App\User', 'follow_id');
    }

    public function followers(){
        return $this->belongsTo('App\User', 'user_id');
    }

}
