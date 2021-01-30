<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Customer;
use App\Models\CustomerTransaction;
use App\Models\Item;
use App\Models\Ordering;
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
            'customerTransactions' => ShipProviderTransaction::with('item', 'customer', 'shipProvider')->latest()->get(),
        ];

        return view('customer_transaction.home')->with($data);
    }

    public function create()
    {
        $data = [
            'breadCrumbs' => 'Create Ordering',
            'title' => 'Please fill the input form below',
            'titleSecond' => "Ordering Info",
            "shipProviders" => ShipProvider::all()
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

            $customer = Customer::find($request->get("customer_id"))->first();
            $item = Item::with(['itemTransaction.brand', 'itemTransaction.spesificationItem'])->where('id', $request->get('item_id'))->first();
            $shipProvider = ShipProvider::find($request->get("ship_provider_id"))->first();
            $ordering_number = $request->get("ordering_number"); // need automate the ordering number if it's empty
            $brand = $item->itemTransaction->brand;
            $specification = $item->itemTransaction->spesificationItem;
            $categories = $specification->categoryTransaction->map(function ($category) {
                return $category->category->name;
            });

            if (!is_null($customer) && !is_null($item) && !is_null($shipProvider)) {
                CustomerTransaction::create([
                    'customer_id' => $customer->id,
                    'item_id' => $item->id,
                ]);

                ShipProviderTransaction::create([
                    'ship_provider_id' => $shipProvider->id,
                    'item_id' => $item->id,
                    'customer_id' => $customer->id,
                    'ordering_number' => $ordering_number,
                    'qty_buy' => $request->get('qty_buy'),
                    'sending_status' => $request->get('sending_status')
                ]);
            }

            // update the stock / quantity item && sold
            $resultQuantity = $item->quantity - $request->get('qty_buy');
            $result = $resultQuantity < 0 ? 0 : $resultQuantity;

            $soldQuantity = $item->sold + $request->get('qty_buy');
            $soldQty = $soldQuantity < 0 ? 0 : $soldQuantity;

            $item->quantity = $result;
            $item->sold = $soldQty;
            $item->save();

            Ordering::create([
                // customers
                'customer_name' => $customer->name,
                'email' => $customer->email,
                'num_telp' => explode(" ", $customer->num_telp)[1] ?: $customer->num_telp,
                'suggestion' => $request->get("suggestion"),

                // item and item image
                'item_name' => $item->name,
                'price' => $item->price,
                'description' => $item->description,
                'quantity' => $result,
                // 'image' => '',

                // brand & specificationItem & Categories
                'brand_name' => $brand->name,
                'property' => $specification->property,
                'categories' => $categories,

                // shipProvider
                'ship_provider_name' => $shipProvider->name,
                'ordering_number' => $ordering_number,
                'qty_buy' => $request->get('qty_buy'),
                'service_type' => "EXPRESS",
                'sending_status' => "SEND!"
            ]);

            return redirect()->route('orderings.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {

        }
    }

    public function update()
    {
    }

    public function edit($id)
    {
    }

    public function destroy($id)
    {
        try {
            $flashMsg = [
                'success' => true,
                'title' => 'Successfully deleted!',
                'message' => 'Congratulation your item has been deleted!'
            ];

            $shipProvider = ShipProviderTransaction::find($id);
            $customerTransaction = CustomerTransaction::find($shipProvider->customer->customerTransaction->id);

            $customerTransaction->delete();
            $shipProvider->delete();

            return redirect()->route('orderings.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {
        }
    }
}
