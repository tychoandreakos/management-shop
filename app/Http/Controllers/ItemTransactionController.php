<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class ItemTransactionController extends Controller
{
    public function create()
    {
        $data = [
            'breadCrumbs' => 'Create Item',
            'title' => 'Please fill the input form below',
            'titleSecond' => "Item Info",
            'categories' => Category::all(),
        ];
        return view('item_transaction.create')->with($data);
    }

    public function store(Request $request)
    {

    }
}
