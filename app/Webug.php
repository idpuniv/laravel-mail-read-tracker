<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Webug extends Model
{
    protected $fillable = ['fullpath', 'filename', 'ip', 'agent']
}
