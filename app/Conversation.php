<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    //
    protected $fillable = [
        'user', 'friend', 'created_at', 'updated_at', 'last_msg'
    ];
}
