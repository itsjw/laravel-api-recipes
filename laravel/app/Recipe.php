<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    /* Add the fillable property into the Recipe Model */
    protected $fillable = ['name', 'description', 'hours_to_make'];
}
