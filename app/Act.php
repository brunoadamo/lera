<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Act extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'narrative_id', 'user_id', 'status',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($act) {
            if(is_null($act->user_id)) {
                $act->user_id = auth()->user()->id;
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
