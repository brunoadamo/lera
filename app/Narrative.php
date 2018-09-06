<?php

namespace App;

use App\User;
use App\Kind;
use App\Rate;
use App\Comment;
use Illuminate\Database\Eloquent\Model;

class Narrative extends Model
{
    protected $fillable = ['title', 'theme', 'kind_id', 'act_n', 'clue', 'content', 'folder', 'picture', 'user_id', 'status'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($narrative) {
            if(is_null($narrative->user_id)) {
                $narrative->user_id = auth()->user()->id;
            }
        });

        static::deleting(function ($narrative) {
            $narrative->comments()->delete();
            $narrative->tags()->detach();
        });
    }

    public function kind()
    {
        return $this->belongsTo(Kind::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function rates()
    {
        return $this->hasMany(Rate::class);
    }
    public function acts()
    {
        return $this->hasMany(Act::class);
    }
}



// public function tags()
// {
//     return $this->belongsToMany(Tag::class)->withTimestamps();
// }
