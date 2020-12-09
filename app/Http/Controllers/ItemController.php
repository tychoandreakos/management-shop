<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ShipProvider;
use Dotenv\Exception\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Item $item)
    {
        $data = [
            'breadCrumbs' => 'Item Lists',
            'title' => 'Items Gallery',
            'items' => $item->latest()->paginate(20),
        ];
        return view('item.home')->with($data);
    }

    public function indexList(Item $item)
    {
        $data = [
            'breadCrumbs' => 'Item Lists',
            'titleList' => 'Items List',
            'list' => true
        ];
        return redirect()->route('items.home')->with($data);
    }

    public function create()
    {
        $data = [
            'breadCrumbs' => 'Create item',
            'title' => 'Please fill the input form below',
            'titleSecond' => "Item Info",
        ];
        return view('item.create')->with($data);
    }

    protected function validateHandler($request)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required',
            'sold' => 'numeric'
        ]);
    }


    public function store(Request $request)
    {
        try {
            $flashMsg = [
                'success' => true,
                'title' => 'Successfully saved!',
                'message' => 'Congratulation your item has been created!'
            ];
            $this->validateHandler($request);
            Item::create($request->all());
            return redirect()->route('items.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {

        }
    }

    public function edit($id)
    {
        try {
            $data = [
                'breadCrumbs' => 'Update item',
                'title' => 'Please fill the input form below',
                'titleSecond' => "Item Info",
                'item' => Item::find($id)
            ];
            return view('item.edit')->with($data);
        } catch (ModelNotFoundException $e) {

        }
    }

    public function update(Request $request, $id)
    {
        try {
            $flashMsg = [
                'success' => true,
                'title' => 'Successfully updated!',
                'message' => 'Congratulation your item has been created!'
            ];
            $this->validateHandler($request);
            $item = Item::find($id);
            $item->update($request->all());
            return redirect()->route('items.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {

        }
    }

    public function destroy($id)
    {
        $flashMsg = [
            'success' => true,
            'title' => 'Successfully deleted!',
            'message' => 'Congratulation your item has been deleted!'
        ];
        try {
            $item = Item::find($id);
            $item->delete();
            return redirect()->route('items.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {

        }
    }

    public function autocomplete(Request $request)
    {
        $data = Item::all();
        return response()->json($data);
    }
}
