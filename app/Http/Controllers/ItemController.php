<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemImage;
use App\Models\ItemImageTransaction;
use App\Models\Settings;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Traits\ItemImage as ItemImageTrait;

class ItemController extends Controller
{

    use ItemImageTrait;

    public function index(Item $item)
    {
        $setting = Settings::first();
        if (!isset($setting)) {
            Settings::create([]);
        }

        $data = [
            'breadCrumbs' => 'Item Lists',
            'title' => 'Items Gallery',
            'items' => $item->with('itemImageTransaction.itemImage')->latest()->paginate(20),
            'list_type' => $setting->list_type ?? 'grid'
        ];

        return view('item.home')->with($data);
    }

    public function create()
    {
        $data = [
            'breadCrumbs' => 'Create item',
            'title' => 'Please fill the input form below',
            'titleSecond' => "Item Info",
        ];

        $this->destroyImage();
        return view('item.create')->with($data);
    }

    public function list()
    {
        $setting = Settings::first();
        $setting->update([
            'list_type' => 'list'
        ]);


        return redirect()->route('items.home')->with(['list_type' => $setting->list_type]);
    }

    public function grid()
    {
        $setting = Settings::first();
        $setting->update([
            'list_type' => 'grid'
        ]);

        return redirect()->route('items.home')->with(['list_type' => $setting->list_type]);
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
            $this->imageCheckerAndUpdate($item->id);

            return redirect()->route('items.home')->with($flashMsg);
        } catch (ModelNotFoundException | \Exception $e) {

        }
    }

    public function storeImage(Request $request)
    {
        try {
            ItemImage::create([
                'image' => $this->imageProcess($request)
            ]);

            return response()->json([
                'success' => 200,
                'message' => 'Image has been created!'
            ]);
        } catch (\ErrorException | \Exception $e) {

        }
    }

    public function edit($id)
    {
        try {
            $data = [
                'breadCrumbs' => 'Update item',
                'title' => 'Please fill the input form below',
                'titleSecond' => "Item Info",
                'item' => Item::with('itemImageTransaction.itemImage')->where('id', $id)->first()
            ];

            $this->destroyImage();
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
            $this->imageCheckerAndUpdate($id);

            $item->update($request->all());
            return redirect()->route('items.home')->with($flashMsg);
        } catch (\Exception $e) {

        }
    }

    private function destroyImage()
    {
        $images = ItemImage::where('validation', 'false')->get();
        if (isset($images)) {
            foreach ($images as $img) {
                $fileStorage = Storage::disk('admin_items');
                $fileStorageThumbnailOrderings = Storage::disk('admin_item_thumbnail_ordering');
                $fileStorageThumbnailLatest = Storage::disk('admin_item_thumbnail_latest');

                if ($fileStorage->exists($img->image)) {
                    $fileStorage->delete($img->image);
                    $fileStorageThumbnailLatest->delete($img->image);
                    $fileStorageThumbnailOrderings->delete($img->image);
                }

                $img->delete();
            }
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
            $item = Item::find($id);

            // remove image on folder

            $imageModel = ItemImageTransaction::where('item_id', $id)->get();
            if (isset($imageModel)) {
                foreach ($imageModel as $imageL) {
                    $image = $imageL->itemImage;
                    $imgFile = Storage::disk('admin_items');
                    $fileStorageThumbnailOrderings = Storage::disk('admin_item_thumbnail_ordering');
                    $fileStorageThumbnailLatest = Storage::disk('admin_item_thumbnail_latest');

                    if ($imgFile->exists($image->image)) {
                        $imgFile->delete($image->image);
                        $fileStorageThumbnailOrderings->delete($image->image);
                        $fileStorageThumbnailLatest->delete($image->image);
                    }

                    ItemImage::find($imageL->item_image_id)->delete();
                    $image->delete();
                }
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
