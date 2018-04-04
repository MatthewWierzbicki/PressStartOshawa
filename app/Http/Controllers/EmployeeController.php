<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
	public function index()
	{
        $employees = DB::table('users')->paginate(15);

        return view('pages.employee.employee', ['employees' => $employees]);
	}

	public function view($id)
	{
		$employee = DB::table('users')->where('id', $id)->first();

		return view('pages.employee.employeeView', compact('employee'));
	}

	public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'userName' => 'required|unique:users,userName,'.$id,
            'fullName' => 'required|unique:users,fullName,'.$id,
            'type' => 'required',
            'SIN' => 'required|regex:/[0-9]{9}/|unique:users,SIN,'.$id,
            'email' => 'required|email|unique:users,email,'.$id,
            'phoneNumber' => 'required|regex:/^[0-9]{10}$/|unique:users,phonenumber,'.$id,
            'address' => 'required'
        ]);

        $employee = User::find($id);

        $employee->userName = $request->userName;
        $employee->fullName = $request->fullName;
        $employee->type = $request->type;
        $employee->SIN = $request->SIN;
        $employee->email = $request->email;
        $employee->phoneNumber = $request->phoneNumber;
        $employee->address = $request->address;

        $employee->save();

        return redirect('/employee');
    }

	public function delete($id)
	{
		$employee = User::find($id);

		$employee->delete();

		return redirect('/employee');
	}

    public function search(Request $request)
    {
        $keyword = $request->search;

        $employees = null;

        $employees = User::SearchByKeyword($keyword)->paginate(15);

        return view('pages.employee.employee', ['employees' => $employees]);
    }
}
