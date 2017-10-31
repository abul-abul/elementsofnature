<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkShop extends Model
{
    protected $table = 'workshop';

    protected $fillable = ['title', 'description','location','images','price'];
}
