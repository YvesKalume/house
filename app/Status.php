<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    //status can be 'libre' or 'occupé'
    protected $fillable = ['name'];
}
