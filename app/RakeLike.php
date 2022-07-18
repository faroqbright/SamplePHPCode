<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class RakeLike extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'rake_id', 'user_id'
    ];
}
