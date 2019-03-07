<?php

namespace App\models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class Vendors extends Authenticatable
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $vendors ;
    protected $table = "vendor_profile";
    protected $fillable = ['name','user_id',	'org_name','address','parent_id'	,'image_name'	,'status'	,'created_at'	,'updated_at'
    ];

    public function vendorProfile()
  {
    return DB::table('vendor_profile')->get();
  }
  public static function getvendors()
  { 

    $vendors = DB::table('vendor_profile')
   										-> join('users', 'users.id','=','vendor_profile.user_id' )
   										 ->select('users.id', 'users.first_name', 'users.middle_name','users.last_name','users.email','users.contact_no','vendor_profile.status','vendor_profile.org_name','vendor_profile.address','vendor_profile.image_name')
   										->where('users.role_id','=','2')->get();

    return $vendors;
  }

  public static function getvendor($id)
  { 

     $vendor = DB::table('vendor_profile')
                                        -> join('users', 'users.id','=','vendor_profile.user_id' )
                                         ->select('users.id', 'users.first_name', 'users.middle_name','users.last_name','users.email','users.contact_no','vendor_profile.status','vendor_profile.org_name' ,'vendor_profile.address','users.password','vendor_profile.image_name')
                                        ->where('users.id','=',$id)->first();

    return $vendor;
  }

   public static function getSuppliers()
  { 

    $vendors = DB::table('vendor_profile')
                      -> join('users', 'users.id','=','vendor_profile.user_id' )
                       ->select('users.id', 'users.first_name', 'users.middle_name','users.last_name','users.email','users.contact_no','vendor_profile.status','vendor_profile.org_name','vendor_profile.address','vendor_profile.parent_id')
                       
                      ->where('users.role_id','=','3')->get();

    return $vendors;
  }

    public static function getSuppliersParentName($id)
  { 
$parent = DB::table('vendor_profile')
                      -> join('users', 'users.id','=','vendor_profile.parent_id' )
                     -> select('users.first_name','users.middle_name','users.last_name')
                      ->where('vendor_profile.user_id','=',$id)->get();
                      return $parent;
  }

   public static function getSupplier($id)
  { 

     $vendor = DB::table('vendor_profile')
                                        -> join('users', 'users.id','=','vendor_profile.user_id' )
                                         ->select('users.id', 'users.first_name', 'users.middle_name','users.last_name','users.email','users.contact_no','vendor_profile.status','vendor_profile.org_name' ,'vendor_profile.address','users.password','vendor_profile.parent_id')
                                        ->where('users.id','=',$id)->first();

    return $vendor;
  }
}
