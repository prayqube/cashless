<?php

namespace App\models;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use DB;
class EventItems extends Authenticatable
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "event_items";
    protected $fillable = [
      	'event_id','item_name','item_price','item_decription'
    ];

      public static function getEventItems()
  { 

    $eventitems = DB::table('event_items')
    									->join('events','events.id','=','event_items.event_id')
									     ->select('events.name','event_items.event_id', DB::raw('count(*) as total'))
									    ->groupby ('event_items.event_id','events.id','events.name')
									    ->get();

    return $eventitems;
  }
   
}
