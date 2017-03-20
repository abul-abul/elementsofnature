<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $table = 'skill';

    protected $fillable = ['workshop_id', 'skill','role'];
}
