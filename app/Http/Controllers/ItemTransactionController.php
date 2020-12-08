<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ItemTransactionController extends Controller
{
    public function create() {
        $data = [
            'breadCrumbs' => 'Create Item',
            'title' => 'Please fill the input form below',
            'titleSecond' => "Item Info"
        ];
        return view('item_transaction.create')->with($data);
    }
}
