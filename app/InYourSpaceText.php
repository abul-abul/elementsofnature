<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InYourSpaceText extends Model
{
    protected $table = 'inyourspacetext';

    protected $fillable = ['text','role'];
}
