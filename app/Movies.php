<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movies extends Model
{
    public $table = "movies";
    
    protected $fillable = ['name_movie','desc','image'];
}
