<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryCategoryFrame extends Model
{
    protected $table = 'gallery_category_frame';

    protected $fillable = ['gallery_category_images_id','size','frame'];

}
