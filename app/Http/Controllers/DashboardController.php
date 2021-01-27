<?php

namespace App\Http\Controllers;

use App\Models\CustomerTransaction;
use App\Models\ItemTransaction;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'breadCrumbs' => "Dashboard",
            'product_overview' => $this->product_overview()
        ];

        return response()->json($data);
        return view('dashboard.home')->with($data);
    }

    private function product_overview()
    {
        return CustomerTransaction::with('item')->latest()->limit(5)->get();
    }
}
