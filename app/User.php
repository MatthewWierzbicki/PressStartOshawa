<?php

namespace App;

use Illuminate\Notifications\Notifiable;
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
        'username', 'fullname', 'type', 'SIN', 'email', 'phonenumber', 'address', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'SIN'
    ];

    public function scopeSearchByKeyword($query, $keyword)
    {
        if ($keyword!='') {
            $query->where(function ($query) use ($keyword) {
                $query->where("id", "LIKE","%$keyword%")
                    ->orWhere("userName", "LIKE", "%$keyword%")
                    ->orWhere("fullName", "LIKE", "%$keyword%")
                    ->orWhere("type", "LIKE", "%$keyword%")
                    ->orWhere("SIN", "LIKE", "%$keyword%")
                    ->orWhere("email", "LIKE", "%$keyword%")
                    ->orWhere("phoneNumber", "LIKE", "%$keyword%")
                    ->orWhere("address", "LIKE", "%$keyword%");
            });
        }
        return $query;
    }
}
