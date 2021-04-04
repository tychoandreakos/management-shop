<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ShipProviderTransaction;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            "breadCrumbs" => "Dashboard",
            "productOverviews" => $this->product_overview(),
            "latestProduct" => Item::with("itemImageTransaction.itemImage")
                ->latest()
                ->first(),
            "orderStats" => $this->orderStats(),
            "titleHeader" => "Dashboard",
        ];
				
				//return response()->json($data);
        return view("dashboard.home")->with($data);
    }

    private function orderStats(): array
    {
        $data = [
            "pending" => ShipProviderTransaction::where(
                "sending_status",
                "pending"
            )
                ->get()
                ->count(),
            "delivered" => ShipProviderTransaction::where(
                "sending_status",
                "send"
            )
                ->get()
                ->count(),
            "orders" => ShipProviderTransaction::all()->count(),
        ];

        return $data;
    }

    private function product_overview()
    {
        return ShipProviderTransaction::with(
            "customer",
            "item.itemImageTransaction.itemImage"
        )->get();
    }
}
