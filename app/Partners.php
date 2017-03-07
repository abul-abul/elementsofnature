<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partners extends Model
{
    protected $table = 'partners';

    protected $fillable = ['link', 'images'];
}
