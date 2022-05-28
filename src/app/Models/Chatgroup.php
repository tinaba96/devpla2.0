<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chatgroup extends Model
{
    protected $fillable = [
        'name',
    ];

    public function user_chatgroup(){
        return $this->hasMany('App\User_chatgroup', 'chatgroup_id', 'id');
    }
}
