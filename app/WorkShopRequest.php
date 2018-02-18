<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkShopRequest extends Model
{
    protected $table = 'workshop_request';

    protected $fillable = ['name', 'lastname','email','messsge','workshop_id'];
}
