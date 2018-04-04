<?php

namespace App;

class Ticket extends Model
{
    public $timestamps = false;

    public function customer()
	{
		return $this->belongsTo('App\Customer');
	}

	public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("id", "LIKE","%$keyword%")
                    ->orWhere("customer_id", "LIKE", "%$keyword%")
                    ->orWhere("user_id", "LIKE", "%$keyword%")
                    ->orWhere("dateSubmitted", "LIKE", "%$keyword%")
                    ->orWhere("comments", "LIKE", "%$keyword%")
                    ->orWhere("description", "LIKE", "%$keyword%")
                    ->orWhere("status", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
