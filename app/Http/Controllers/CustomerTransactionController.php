<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerTransaction;
use App\Models\Item;
use App\Models\ShipProvider;
use App\Models\ShipProviderTransaction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class CustomerTransactionController extends Controller
{
    public function index()
    {
        $data = [
            'breadCrumbs' => 'Ordering Lists',
            'title' => 'Ordering Lists',
            'CustomerTransaction' => CustomerTransaction::with('customer', 'item')->get(),
        ];

        return view('customer_transaction.home')->with($data);
    }

    public function create()
    {
        $data = [
            'breadCrumbs' => 'Create Ordering',
            'title' => 'Please fill the input form below',
            'titleSecond' => "Ordering Info",
        ];
        return view('customer_transaction.create')->with($data);
    }

    public function store(Request $request)
    {
        try {
            $flashMsg = [
                'success' => true,
                'title' => 'Successfully created',
                'message' => 'Congratulation your item has been created!'
            ];

            $customer = Customer::find($request->get("customer_id"));
            $item = Item::find($request->get('item_id'));
            $shipProvider = ShipProvider::find($request->get("ship_provider_id"));
            $ordering_number = $request->get("ordering_number"); // need automate the ordering number if it's empty

            if (!is_null($customer) && !is_null($item) && !is_null($shipProvider)) {
                CustomerTransaction::create([
                    'customer_id' => $request->get("customer_id"),
                    'item_id' => $request->get("item_id")
                ]);

                ShipProviderTransaction::create([
                    'ship_provider_id' => $request->get('ship_provider_id'),
                    'item_id' => $request->get('item_id'),
                    'customer_id' => $request->get("customer_id"),
                    'ordering_number' => $ordering_number,
                    'sending_status' => $request->get("sending_status")
                ]);
            }

            return redirect()->route('orderings.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {

        }
    }
}
