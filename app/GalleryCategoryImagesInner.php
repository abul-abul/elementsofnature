<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryCategoryImagesInner extends Model
{
    protected $table = 'gallery_category_images_inner';

    protected $fillable = ['gallery_category_images_id','title','description','images','size','frame_canvas','frame','price','alt'];
}
