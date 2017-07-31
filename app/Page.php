<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $table='page';
    protected $fillable=['page_name','page_image','page_description','meta_title','meta_description','meta_keywords','meta_tags'];
}
