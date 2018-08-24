<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Narrative extends Model
{
    protected $fillable = ['title', 'theme', 'kind_id', 'act_n', 'clue', 'content', 'user_id', 'status'];
}
