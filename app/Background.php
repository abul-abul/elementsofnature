<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    protected $table = 'background';

    protected $fillable = ['images', 'title','alt','description','role','page_id'];
}
