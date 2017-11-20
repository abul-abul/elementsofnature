<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PayUser extends Model
{
    protected $table = 'pay_user';

    protected $fillable = ['firstname',
                           'lastname',
                           'email',
                           'phone',
                           'country',
                           'address',
                           'city_town',
                           'postalcode',
                           'info',
                           'status'
                           ];
}
