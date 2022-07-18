<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RakeComment extends Model
{
    //
     protected $fillable = [
        'rake_id', 'user_id', 'comment'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
