<?php

namespace App;

class Invoice extends Model
{
	public $timestamps = false;

    public function customer()
   	{
   		$this->belongsTo('App\Customer');
   	}

   	public function item()
   	{
   		$this->hasOne('App\Item');
   	}
}
