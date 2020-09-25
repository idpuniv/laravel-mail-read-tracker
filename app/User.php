<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // public function getSentMail()
    // {
    //     return $this->Email::where('sender_addr', 'idpuniv@gmail.com')->where('status', 'sent')->get();
    // }
    public function sent()
    {
        return $this->hasMany(Email::class, 'sender_addr','email')->where('status','sent');
    }

    public function received()
    {
        return $this->hasMany(Email::class, 'sender_addr', 'email')->where('status', 'received');
    }


    public function drafts()
    {
        return $this->hasMany(Email::class, 'sender_addr', 'email')->where('status', 'drafts');
    }

    public function report()
    {
        return $this->hasMany(Report::class, 'sender_addr', 'email')->where('status', 'drafts');
    }

    public function contact()
    {
        return $this->hasMany(Contact::class);
    }

    // public function contactEmail()
    // {
    //     return Contact::select('email')->where('user_id', Auth()->user()->id)->get();
    // }
    public function sentCount()
    {
        $count = $this->hasMany(Email::class, 'sender_addr','email')->where('status','sent');
        $i = 0;
        foreach($count as $model)
         {
             $i++;
         }
         return $i;
    }


    
}
