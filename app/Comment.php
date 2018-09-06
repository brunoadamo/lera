<?php

namespace App;

use App\Narrative;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'narrative_id', 'user_id', 'status'];
    
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($comment) {
            if(is_null($comment->user_id)) {
                $comment->user_id = auth()->user()->id;
            }
        });
    }

    public function narrative()
    {
        return $this->belongsTo(Narrative::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
