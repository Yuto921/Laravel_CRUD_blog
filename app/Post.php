<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //MassAssignment エラーの対策
    protected $fillable = ['title', 'body'];
}
