<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
        'login_id', 'name', 'chat', 'chatgroup_id'
    ];

    protected $guarded = [
        'create_at', 'update_at'
    ];

}
