<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Report;
use App\User;

class Email extends Model
{
    //
    protected $fillable = ['sender_addr', 'subject', 'body','status'];

    public function user()
    {
    	return $this->belongsTo(User::class,'sender_addr', 'email');
    }

    public function report()
    {
    	return $this->hasMany(Report::class);
    }
}
