<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryTransaction;
use App\Models\Item;
use App\Models\ItemTransaction;
use App\Models\SpesificationItem;
use Illuminate\Http\Request;

class ItemTransactionController extends Controller
{

    public function index()
    {
        $data = [
            'breadCrumbs' => 'Brand Lists',
            'title' => 'Brand Lists',
            'itemTransactions' => ItemTransaction::with(['item', 'brand', 'spesificationItem'])->get(),
        ];

        return view('item_transaction.home')->with($data);
    }

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
        try {
            $item = Item::find($request->get('id_items'));
            $brand = Brand::find($request->get('id_brands'));

            if (!is_null($item) && !is_null($brand)) {
                $sp = SpesificationItem::create([
                    'property' => $request->get('spec')
                ]);

                ItemTransaction::create([
                    'item_id' => $request->get('id_items'),
                    'brand_id' => $request->get('id_brands'),
                    'spesification_item_id' => $sp->id
                ]);

                foreach ($request->get('category') as $ct) {
                    CategoryTransaction::create([
                        'category_id' => $ct,
                        'spesification_item_id' => $sp->id
                    ]);
                }
            }
            return response()->json(['success' => true]);
        } catch (\ErrorException $e) {
            return response()->json(['success' => false, 'message' => $e]);
        }
    }

    public function update()
    {

    }

    public function edit()
    {

    }

    public function destroy()
    {
    }
}
