<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PhotoTourRequest extends Model
{
    protected $table = 'phototoure_request';

    protected $fillable = ['phototoure_id', 'name','lastname','message','email'];
}
