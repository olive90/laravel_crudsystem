<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class headers extends Model
{
    protected $fillable = array('title','sub_title','image');
}
