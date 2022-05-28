<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User_chatgroup extends Model
{
    protected $fillable = [
        'user_id',
        'chatgroup_id',
    ];

    // public function users(){
    //     return $this->belongsTo('App\User', 'user_id');
    // }

    public function users(){
        return $this->belongsTo('App\User', 'user_id');
    }


    public function chatgroup(){
        return $this->belongsTo('App\User');
    }
}
