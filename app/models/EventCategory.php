<?php

namespace App\models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class EventCategory extends Authenticatable
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = "event_categories";
    protected $fillable = [
        'event_category','category_description'
    ];
}
