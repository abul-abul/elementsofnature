<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryCategoryImagesInnerTop extends Model
{
    protected $table = 'gallery_category_images_inner_top';

    protected $fillable = ['gallery_category_images_id','title','description','images','alt'];
}
