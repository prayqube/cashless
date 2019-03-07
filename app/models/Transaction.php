<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
	protected $table='transaction';
    protected $fillable = [
      'transaction_id',
      'event_id',
      'user_id',
      'product',
      'amount',
      'type',
      'sender_id',
      'receiver_id',
      'transaction_ref_no',
      'bank_reference_no',
      'remark',
      'status',
      'created_at'
    ];
}