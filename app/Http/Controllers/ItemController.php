<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemImage;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    public function index(Item $item)
    {
        $data = [
            'breadCrumbs' => 'Item Lists',
            'title' => 'Items Gallery',
            'items' => $item->latest()->paginate(20),
        ];
        return view('item.home')->with($data);
    }

    public function indexList(Item $item)
    {
        $data = [
            'breadCrumbs' => 'Item Lists',
            'titleList' => 'Items List',
            'list' => true
        ];
        return redirect()->route('items.home')->with($data);
    }

    public function create()
    {
        $data = [
            'breadCrumbs' => 'Create item',
            'title' => 'Please fill the input form below',
            'titleSecond' => "Item Info",
        ];
        return view('item.create')->with($data);
    }

    protected function validateHandler($request)
    {
        $request->validate([
            'name' => 'required',
            'quantity' => 'required|numeric',
            'price' => 'required',
            'sold' => 'numeric'
        ]);
    }


    /**
     * @param $request
     *
     * Reference: https://medium.com/@mactavish10101/how-to-upload-images-in-laravel-7-7a7f9982ebba
     */
    private function imageProcess($request)
    {
        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $extension = $request->image->extension();
                $fileName = join("-", explode(" ", $request->get('name'))) ?? $request->get("name");
                $name = $fileName . "-" . Carbon::now()->toDateString() . "." . $extension;
                $request->image->storeAs('/public/admin/items', $name);

                return $name;
            }
        }
    }

    public function store(Request $request)
    {
        try {
            $flashMsg = [
                'success' => true,
                'title' => 'Successfully saved!',
                'message' => 'Congratulation your item has been created!'
            ];
            $this->validateHandler($request);


            $item = Item::create($request->all());
            ItemImage::create([
                'item_id' => $item->id,
                'image' => $this->imageProcess($request)
            ]);
            return redirect()->route('items.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {

        }
    }

    public function edit($id)
    {
        try {
            $data = [
                'breadCrumbs' => 'Update item',
                'title' => 'Please fill the input form below',
                'titleSecond' => "Item Info",
                'item' => Item::with('itemImage')->where('id', $id)->first()
            ];
//            return response()->json($data);
            return view('item.edit')->with($data);
        } catch (ModelNotFoundException $e) {

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
            $this->validateHandler($request);
            $item = Item::find($id);
            $item->update($request->all());
            return redirect()->route('items.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {

        }
    }

    public function destroy($id)
    {
        $flashMsg = [
            'success' => true,
            'title' => 'Successfully deleted!',
            'message' => 'Congratulation your item has been deleted!'
        ];
        try {
            $item = Item::with('itemImage')->where('id', $id)->first();

            // remove image on folder
            if (isset($item->itemImage)) {
                $image = ItemImage::where('item_id', $id)->first();
                $imgFile = Storage::disk('admin_items');
                if ($imgFile->exists($image->image)) {
                    $imgFile->delete($image->image);
                }
                $image->delete();
            }

            $item->delete();
            return redirect()->route('items.home')->with($flashMsg);
        } catch (\Exception $e) {

        }
    }

    public function autocomplete(Request $request)
    {
        $data = Item::all();
        return response()->json($data);
    }

    public function autocompleteWithSpesification(Request $request)
    {
        $data = Item::with('itemTransaction.spesificationItem')->get();
        return response()->json($data);
    }
}
