<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NewsGallery extends Model
{
    protected $table = 'news_gallery';

    protected $fillable = ['news_id', 'images'];
    
}
