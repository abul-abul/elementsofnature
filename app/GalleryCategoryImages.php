<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryCategoryImages extends Model
{
    protected $table = 'gallery_category_images';

    protected $fillable = ['gallery_category_id','favourite','images','title','description','alt'];
}
