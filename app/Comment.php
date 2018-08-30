<?php

namespace App;

use App\Narrative;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['content', 'narrative_id', 'user_id', 'status'];
    
    public function narrative()
    {
        return $this->belongsTo(Narrative::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
