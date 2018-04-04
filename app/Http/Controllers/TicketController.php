<?php

namespace App\Http\Controllers;

use App\Ticket;
use App\Customer;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TicketController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth');
	}

	public function index()
	{
		$tickets = DB::table('tickets')->paginate(15);

		return view('pages.ticket.ticket', ['tickets' => $tickets]);
	}

	public function create()
	{
		return view('pages.ticket.ticketCreate');
	}

	public function store(Request $request)
	{
		$this->validate(request(), [
			'description' => 'required',
			'customerID' => 'required'
		]);


		if (Customer::where('id', '=', $request->customerID)->exists())
		{
			$ticket = new Ticket;

			$ticket->description = $request->description;
			$ticket->customer_id = $request->customerID;
			$ticket->status = 'Open';
			$ticket->dateSubmitted = Carbon::now();
			$ticket->comments = null;
			$ticket->user_id = $request->user()->id;

			$ticket->save();

			return redirect('/ticket');
		}
		else
		{
			return back()->withErrors(['Customer does not exist.']);
		}
	}

	public function update(Request $request, $id)
	{
		$ticket = Ticket::find($id);

		$ticket->comments = $request->comments;
		$ticket->status = $request->status;

		$ticket->save();

		return redirect('/ticket');
	}

	public function view($id)
	{
		$ticket = DB::table('tickets')->where('id', $id)->first();

		return view('pages.ticket.ticketView', compact('ticket'));
	}

	public function search(Request $request)
	{
		$keyword = $request->search;

		$tickets = null;

		$tickets = Ticket::SearchByKeyword($keyword)->paginate(15);

		return view('pages.ticket.ticket', ['tickets' => $tickets]);
	}
}
