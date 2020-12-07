<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index(Item $item)
    {
        $data = [
            'breadCrumbs' => 'Item Lists',
            'title' => 'Items Gallery',
            'items' => $item->latest()->paginate(10)
        ];
        return view('item.home')->with($data);
    }
}
