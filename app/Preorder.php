<?php

namespace App;

class Preorder extends Model
{
	public $timestamps = false;

	public function customer()
	{
		return $this->belongsTo('App\Customer');
	}

	public function item()
	{
		return $this->hasOne('App\Item');
	}

	public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("id", "LIKE","%$keyword%")
                    ->orWhere("item_id", "LIKE", "%$keyword%")
                    ->orWhere("customer_id", "LIKE", "%$keyword%")
                    ->orWhere("user_id", "LIKE", "%$keyword%")
                    ->orWhere("status", "LIKE", "%$keyword%")
                    ->orWhere("balance", "LIKE", "%$keyword%")
                    ->orWhere("dateCreated", "LIKE", "%$keyword%");
            });
        }

        return $query;
    }
}
