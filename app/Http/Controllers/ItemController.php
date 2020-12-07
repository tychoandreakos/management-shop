<?php

namespace App\Http\Controllers;

use App\Models\Item;
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
            'items' => $item->latest()->paginate(20)
        ];
        return view('item.home')->with($data);
    }

    public function create()
    {
        $data = [
            'breadCrumbs' => 'Create item',
            'title' => 'Please fill the input form below',
            'titleSecond' => "Item Info"
        ];
        return view('item.create')->with($data);
    }

    protected function validateHandler($request): array
    {
        $validator = $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required',
            'sold' => 'numeric'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
    }


    public function store(Request $request)
    {
        try {
            $flashMsg = [
                'success' => true,
                'message' => 'Sucessfully saved!'
            ];
            $this->validateHandler($request);
            Item::create($request->all());
            return view('items.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {

        }
    }
}
