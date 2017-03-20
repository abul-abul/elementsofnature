<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoTour extends Model
{
    protected $table = 'phototour';

    protected $fillable = ['title', 'description','location','images'];
}
