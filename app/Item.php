<?php

namespace App;

class Item extends Model
{
    public $timestamps = false;

    protected $attributes = [
    	'image' => 'default'
    ];

    public function preorder()
    {
    	return $this->belongsTo('App\Preorder');
    }

    public function invoice()
    {
    	return $this->belongsTo('App\Invoice');
    }

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("itemName", "LIKE","%$keyword%")
                    ->orWhere("developer", "LIKE", "%$keyword%")
                    ->orWhere("releaseDate", "LIKE", "%$keyword%")
                    ->orWhere("description", "LIKE", "%$keyword%")
                    ->orWhere("id", "LIKE", "%$keyword%")
                    ->orWhere("price", "LIKE", "%$keyword%")
                    ->orWhere("condition", "LIKE", "%$keyword%")
                    ->orWhere("productType", "LIKE", "%$keyword%")
                    ->orWhere("console", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
