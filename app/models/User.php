<?php

namespace App\models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','middle_name', 'email','contact_no', 'password','role_id','remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];


    public static function validate_user($user_name)
   {
       //return static::where(['email'=>$user_name,'status'=>self::STATUS_ACTIVE])->first();
       return static :: where(function($q) use ($user_name) {
       $q->where('email', $user_name);
        if($user_name != '')
        {
        $q->orWhere('id', $user_name);
        }
        })->first();//->where('status', self::STATUS_ACTIVE)
       
   }

    public static function validate_user_reg($user_name,$contact_no)
   {
       //return static::where(['email'=>$user_name,'status'=>self::STATUS_ACTIVE])->first();
       return static :: where(function($q) use ($user_name,$contact_no) {
       $q->where('email', $user_name);
        if($user_name != '')
        {
        $q->orWhere('id', $user_name);
        }
        $q->orwhere('contact_no',$contact_no); 
        })->first();//->where('status', self::STATUS_ACTIVE)
       
   }

   public static function validate_user_token($user_id, $token)
   {
       //return static::where(['id'=>$user_id,'status'=>self::STATUS_ACTIVE,'remember_token'=>$token])->first();

       return static :: where(function($q) use ($user_id) {
           if($user_id > 0)
               $q->where('id', $user_id);

       })->first();
   }
}
