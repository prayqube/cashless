<?php

namespace App\models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class EventAttachment extends Authenticatable
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    //protected $table = "event_attachment";
    // protected $fillable = [
    //   	'name','description','event_start_date','event_end_date','event_duration','venue','address','city','state','pincode','fee','head_count','qr_code','event_type','user_id'
    // ];
    
}
