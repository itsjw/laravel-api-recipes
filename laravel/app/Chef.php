<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Chef extends Model
{
    /* Add the fillable property into the Chef Model */
    protected $fillable = ['name', 'city', 'available', 'contact_info'];
}
