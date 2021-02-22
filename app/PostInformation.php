<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostInformation extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = ['description', 'post_id', 'slug'];

    
    protected $table = 'posts_information';

    public function postInformation() {
        return $this->belongsTo('App\Post', 'id', 'post_id');
    }
}
