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
            "graphStats" => collect([
                [
                    "period" => '2010',
                    "Customers" => 50,
                    "Orderings" => 150,
                ],
                [
                    "period" => '2011',
                    "Customers" => 200,
                    "Orderings" => 100,
                ],
                [
                    "period" => '2012',
                    "Customers" => 240,
                    "Orderings" => 120,
                ],
                [
                    "period" => '2013',
                    "Customers" => 200,
                    "Orderings" => 212,
                ],
                [
                    "period" => '2014',
                    "Customers" => 42,
                    "Orderings" => 302,
                ],
                [
                    "period" => '2015',
                    "Customers" => 50,
                    "Orderings" => 122,
                ],
            ])->toJson(),
        ];

       // return response()->json($data);
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
