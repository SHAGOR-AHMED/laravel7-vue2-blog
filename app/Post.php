<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public function category(){

        $this->belongsTo(Category::class,'category_id','id');
    }
}
