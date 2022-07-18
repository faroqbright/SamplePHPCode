<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = [
        'receiver_id', 'sender_id', 'message', 'created_at', 'updated_at', 'conversation_id', 'message_file'
    ];
}
