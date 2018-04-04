<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
    	return view('pages.register');
    }

    public function store(Request $request)
    {
    	$this->validate(request(), [
    		'username' => 'required|unique:users',
    		'fullname' => 'required|unique:users',
    		'type' => 'required',
            'SIN' => 'required|regex:/^[0-9]{9}$/|unique:users',
            'email' => 'required|email|unique:users',
            'phonenumber' => 'required|regex:/^[0-9]{10}$/|unique:users',
    		'address' => 'required',
    		'password' => 'required|confirmed'
    	]);

        /*if (User::where('email', '=', $request->email)->exists())
        {
            return back()->withErrors(['Employee with this email already exists.']);
        }
        elseif (User::where('phonenumber', '=', $request->phonenumber)->exists())
        {
            return back()->withErrors(['Employee with this phone number already exists.']);
        }
        elseif (User::where('SIN', '=', $request->SIN)->exists())
        {
            return back()->withErrors(['Employee with this SIN already exists.']);   
        }
        else
        {*/
            $user = User::create([
                'username' => request('username'),
                'fullname' => request('fullname'),
                'type' => request('type'),
                'SIN' => request('SIN'),
                'email' => request('email'),
                'phonenumber' => request('phonenumber'),
                'address' => request('address'),
                'password' => bcrypt(request('password'))
            ]);

            return redirect('/employee');
        //}
    }
}
