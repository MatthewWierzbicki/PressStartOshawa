<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $items = DB::table('items')->paginate(15);

        return view('pages.item.item', ['items' => $items]);
    }

    public function create()
    {
    	return view('pages.item.itemCreate');
    }

    public function store(Request $request)
    {
        $this->validate(request(), [
            'itemName' => 'required',
            'releaseDate' => 'required|date',
            'developer' => 'required',
            'description' => 'required',
            'productType' => 'required',
            'price' => 'required|numeric|min:0',
            'condition' => 'required',
            'console' => 'required'
        ]);

        $item = new Item;

        $item->itemName = $request->itemName;
        $item->developer = $request->developer;
        $item->releaseDate = $request->releaseDate;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->condition = $request->condition;
        $item->console = $request->console;
        $item->productType = $request->productType;
        $item->quantity = '0';

        if ($item->productType == "Console")
        {
            $item->console = "N/A";
        }

        $item->save();

        return redirect('/item');
    }

    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'itemName' => 'required',
            'releaseDate' => 'required',
            'developer' => 'required',
            'description' => 'required',
            'productType' => 'required',
            'price' => 'required',
            'condition' => 'required',
            'console' => 'required',
            'quantity' => 'required'
        ]);

        $item = Item::find($id);

        $item->itemName = $request->itemName;
        $item->developer = $request->developer;
        $item->releaseDate = $request->releaseDate;
        $item->description = $request->description;
        $item->price = $request->price;
        $item->condition = $request->condition;
        $item->console = $request->console;
        $item->productType = $request->productType;
        $item->quantity = $request->quantity;

        $item->save();

        return redirect('/item');
    }

    public function view($id)
    {
        $item = DB::table('items')->where('id', $id)->first();

        return view('pages.item.itemView', compact('item'));
    }

    public function delete($id)
    {
        $item = Item::find($id);

        $item->delete();

        return redirect('/item');
    }

    public function search(Request $request)
    {
        $keyword = $request->search;

        $items = null;

        $items = Item::SearchByKeyword($keyword)->paginate(15);

        return view('pages.item.item', ['items' => $items]);
    }
}
