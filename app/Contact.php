<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillables = ['first_name','last_name', 'email'];
}
