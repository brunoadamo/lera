<?php

namespace App;

use App\Narrative;
use App\Comment;
use App\Rate;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'folder', 'picture', 'alias', 'status',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function narratives()
    {
        return $this->hasMany(Narrative::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function rates($query)
    {
        return $this->hasMany(Rate::class);
    }
}
