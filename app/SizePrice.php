<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SizePrice extends Model
{
    protected $table = 'size_price';

    protected $fillable = ['gallery_category_images_inner_id', 'size','price'];
}
