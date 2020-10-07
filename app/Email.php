<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Report;
use App\User;

class Email extends Model
{
    use softDeletes;
    //
    protected $fillable = ['sender_addr', 'subject', 'body'];

    public function user()
    {
    	return $this->belongsTo(User::class,'sender_addr', 'email');
    }

    public function report()
    {
    	return $this->hasMany(Report::class);
    }

    public function file(){
        return $this->hasMany(File::class);
    }
}
