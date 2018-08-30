<?php

namespace App;

use App\Narrative;
use Illuminate\Database\Eloquent\Model;

class Kind extends Model
{
    protected $fillable = ['title', 'status'];
    
    public function narratives()
    {
        return $this->hasMany(Narrative::class);
    }
}
