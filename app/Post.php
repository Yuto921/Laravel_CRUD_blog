<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //MassAssignment エラーの対策
    protected $fillable = ['title', 'body'];

    public function comments()
    {
        return $this->hasMany('App\Comment');
    }
}
