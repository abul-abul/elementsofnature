<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model
{
    protected $table = 'gallery_category';

    protected $fillable = ['title','images','alt','favourite'];
}
