<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['title', 'author', 'category_id'];

    protected $table = 'posts';

    public function postToCategory() {
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }

    public function postToPostInformation() {
        return $this->hasOne('App\PostInformation', 'post_id', 'id');
    }

    public function postToTag() {
        return $this->belongsToMany('App\Tag', 'post_tag', 'post_id', 'tag_id');
    }
}
