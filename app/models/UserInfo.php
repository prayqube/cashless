<?php

namespace App\models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserInfo extends Authenticatable
{

 protected $table='user_info';
 protected $fillable=[
 			'event_id','user_id','rfid','status'
 			];

}