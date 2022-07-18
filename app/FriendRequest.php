<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FriendRequest extends Model
{
    //
    protected $fillable = [
        'sender_id', 'receiver_id'
    ];
}
