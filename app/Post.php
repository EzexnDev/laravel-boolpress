<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = "posts";

    protected $fillable = ["title","author", "category_id"];

    public function hasInfo()
    {
    return $this->hasOne('App\PostInformation', 'post_id', 'id');
    }

    public function hasCategory()
    {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
}
