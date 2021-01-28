<?php

namespace App\Http\Controllers;

use App\Models\CustomerTransaction;
use App\Models\Item;


class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'breadCrumbs' => "Dashboard",
            'productOverviews' => $this->product_overview(),
            'latestProduct' => Item::with('itemImageTransaction.itemImage')->latest()->first()
        ];

//        return response()->json($data);
        return view('dashboard.home')->with($data);
    }

    private function product_overview()
    {
        return CustomerTransaction::with('item.itemImage', 'customer')->latest()->limit(4)->get();
    }
}
