<?php

namespace App\Http\Controllers;

use App\Item;
use App\Customer;
use App\Invoice;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InvoicesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function create($id) 
    {   
        $customer = Customer::where('id', $id)->first();

        return view('pages.invoice.invoiceCreate', compact('customer'));
    }

    public function store(Request $request, $id)
    {
        $this->validate(request(), [
            'itemName' => 'required'
        ]);

        $itemName = $request->itemName;
        $item_id = Item::where('itemName', $itemName)->value('id');
        $balance = Item::where('itemName', $itemName)->value('price');

        $invoice = new Invoice;

        $invoice->customer_id = $id;
        $invoice->item_id = $item_id;
        $invoice->dateCreated = Carbon::now();
        $invoice->balance = $balance;
        $invoice->status = "Pending";

        $invoice->save();

        return redirect()->action(
            'CustomerController@view', ['id' => $id]
        );
    }

    public function delete($id)
    {
        $invoice = Invoice::find($id);

        $invoice->delete();

        return back();
    }

    public function complete($id)
    {
        $invoice = Invoice::find($id);

        $invoice->status = "Paid";

        $invoice->save();

        return back();
    }
}
