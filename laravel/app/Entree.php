<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entree extends Model
{
    /* Add the fillable property into the Entree Model */
    protected $fillable = ['recipe_id', 'chef_id', 'about'];
}
