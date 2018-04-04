<?php

namespace App;

class Customer extends Model
{
    public $timestamps = false;

    public function preorders()
	{
		return $this->hasMany('App\Preorder');
	}

	public function invoices()
	{
		return $this->hasMany('App\Invoice');
	}

	public function tickets()
	{
		return $this->hasMany('App\Ticket');
	}

	public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("id", "LIKE","%$keyword%")
                    ->orWhere("firstName", "LIKE", "%$keyword%")
                    ->orWhere("lastName", "LIKE", "%$keyword%")
                    ->orWhere("phoneNumber", "LIKE", "%$keyword%")
                    ->orWhere("email", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
