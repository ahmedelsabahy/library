<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable=['title','desc','img'];
    protected $table = 'bookes';

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }

}
