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

    public function narratives()
    {
        return $this->hasMany(Narrative::class);
    }
}
