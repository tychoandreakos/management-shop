<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\CategoryTransaction;
use App\Models\Item;
use App\Models\ItemTransaction;
use App\Models\SpesificationItem;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ItemTransactionController extends Controller
{

    public function index()
    {
        $data = [
            'breadCrumbs' => 'Product Lists',
            'title' => 'Product Lists',
            'itemTransactions' => ItemTransaction::with(['item', 'brand', 'spesificationItem'])->get(),
        ];

        return view('item_transaction.home')->with($data);
    }

    public function create()
    {
        $data = [
            'breadCrumbs' => 'Create Product',
            'title' => 'Please fill the input form below',
            'titleSecond' => "Product Info",
            'categories' => Category::all(),
        ];
        return view('item_transaction.create')->with($data);
    }

    public function store(Request $request)
    {
        try {
            $flashMsg = [
                'success' => true,
                'title' => 'Successfully created',
                'message' => 'Congratulation your item has been created!'
            ];

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
            return redirect()->route('products.home')->with($flashMsg);
        } catch (\ErrorException $e) {
            return response()->json(['success' => false, 'message' => $e]);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $flashMsg = [
                'success' => true,
                'title' => 'Successfully updated!',
                'message' => 'Congratulation your item has been created!'
            ];

            $itemTransaction = ItemTransaction::find($id);
            $item = Item::find($request->get('id_items'));
            $brand = Brand::find($request->get('id_brands'));
            $sp = SpesificationItem::find($request->get('id_specs'));
            $sp_id = "";

            if (!is_null($item) && !is_null($brand)) {
                if (is_null($sp)) {
                    $sp_id = SpesificationItem::create([
                        'property' => $request->get('spec')
                    ])->id;
                } else {
                    $sp->update([
                        'property' => $request->get('spec')
                    ]);
                }

                $sp_checker_id = strlen($sp_id) > 0 ? $sp_id : $sp->id;

                $itemTransaction->update([
                    'item_id' => $request->get('id_items'),
                    'brand_id' => $request->get('id_brands'),
                    'spesification_item_id' => $sp_checker_id,
                ]);


                //first delete all category transacion
                $sp->categoryTransaction()->delete();

                // insert category transaction
                foreach ($request->get('category') as $ct) {
                    CategoryTransaction::create([
                        'category_id' => $ct,
                        'spesification_item_id' => $sp_checker_id
                    ]);
                }
            }

            return redirect()->route('products.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {
        }
    }

    public function edit($id)
    {
        try {
            $data = [
                'breadCrumbs' => 'Update Product',
                'title' => 'Please fill the input form below',
                'titleSecond' => "Product Info",
                'itemTransaction' => ItemTransaction::with(['item', 'brand', 'spesificationItem'])->where('id', '=', $id)->get()[0],
                'categories' => Category::all()
            ];
//            return response()->json($data['itemTransaction']);
            return view('item_transaction.edit')->with($data);
        } catch (ModelNotFoundException $e) {

        }
    }

    public function destroy($id)
    {
        try {
            $flashMsg = [
                'success' => true,
                'title' => 'Successfully deleted!',
                'message' => 'Congratulation your item has been deleted!'
            ];
            $itemTransaction = ItemTransaction::find($id);
            $specificationItem = SpesificationItem::find($itemTransaction->spesification_item_id);

            $itemTransaction->delete();
            $specificationItem->delete();

            return redirect()->route('products.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {
        }
    }
}
