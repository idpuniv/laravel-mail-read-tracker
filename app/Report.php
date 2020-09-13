<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \App\Email;

class Report extends Model
{
    
    // protected $fillable = ['track_code'];
    // protected $foreignKey = ['mail_id', 'receiver_addr'];
    // protected $timestamp = ['open_date'];
    // protected $attributes = ['clics']; 
    protected $fillable = ['track_code', 'email_id','receiver_addr','status','clics','open_date'];

public function receiverUser()
{
	return $this->belongsTo(User::class, 'receiver_addr', 'email');
}

public function email()
{
    return $this->belongsTo(Email::class);
}


}