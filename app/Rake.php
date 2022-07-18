<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

class Rake extends Model
{
    protected $guarded = [];

    protected $appends = ['auth_user_liked'];

    public function getAuthUserLikedAttribute()
    {
        $like = RakeLike::where('rake_id', $this->id)->where('user_id', Auth::id())->first();

        return $like ? true : false;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function likes()
    {
        return $this->hasMany(RakeLike::class, 'rake_id', 'id');
    }

    public function comments()
    {
        return $this->hasMany(RakeComment::class, 'rake_id', 'id');
    }
}
