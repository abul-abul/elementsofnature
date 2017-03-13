<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryCategoryImagesInnerTop extends Model
{
    protected $table = 'gallery_category_images_inner_top';

    protected $fillable = ['gallery_category_images_inner_id','description','images1','alt1','images2','alt2'];
}
