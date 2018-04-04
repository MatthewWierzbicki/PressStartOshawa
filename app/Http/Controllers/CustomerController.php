<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $customers = DB::table('customers')->paginate(10);

        return view('pages.customer.customer', ['customers' => $customers]);
    }

    public function view($id)
    {
        $customer = Customer::where('id', $id)->first();

        return view('pages.customer.customerView', compact('customer'));
    }

    public function create() 
    {
        return view('pages.customer.customerCreate');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required|regex:/^[0-9]{10}$/|unique:customers',
            'email' => 'required|email|unique:customers'
        ]);
    
        $customer = new Customer;

        $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;
        $customer->phoneNumber = $request->phoneNumber;
        $customer->email = $request->email;

        $customer->save();

        return redirect('/customer');
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required|regex:/^[0-9]{10}$/|unique:customers,phoneNumber,'.$id,
            'email' => 'required|email|unique:customers,email,'.$id
        ]);

        $customer = Customer::find($id);

        $customer->firstName = $request->firstName;
        $customer->lastName = $request->lastName;
        $customer->phoneNumber = $request->phoneNumber;
        $customer->email = $request->email;

        $customer->save();

        return redirect('/customer');
    }

    public function delete($id)
    {
        $customer = Customer::find($id);

        $customer->delete();

        return redirect('/customer');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;

        $customers = null;

        $customers = Customer::SearchByKeyword($keyword)->paginate(15);

        return view('pages.customer.customer', ['customers' => $customers]);
    }
}
