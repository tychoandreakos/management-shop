<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemImage;
use App\Models\ItemImageTransaction;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ItemController extends Controller
{

    private $size_latest = ["width" => 285, "height" => 355];
    private $size_orderings = ["width" => 150, "height" => 150,];

    public function index(Item $item)
    {
        $data = [
            'breadCrumbs' => 'Item Lists',
            'title' => 'Items Gallery',
            'items' => $item->with('itemImageTransaction.itemImage')->latest()->paginate(20),
        ];

//        return response()->json($data);
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

        $this->destroyImage();
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
     * @param $image
     * @param $path
     * @param $name
     * @param $size
     *
     * Reference: https://appdividend.com/2018/04/13/laravel-image-intervention-tutorial-with-example/
     * @throws \Exception
     */
    private function imageResize($image, $name, $size, $path)
    {
        try {
            $path = Storage::disk($path)->path($name);
            $thumbnailImage = Image::make($image)->resize($size["width"], $size["height"]);
            $thumbnailImage->save($path);
        } catch (\ErrorException $e) {
            throw new \Exception($e);
        }
    }


    /**
     * @param $request
     *
     * Reference: https://medium.com/@mactavish10101/how-to-upload-images-in-laravel-7-7a7f9982ebba
     * @throws \Exception
     */
    private function imageProcess($request)
    {
        if ($request->hasFile('file')) {
            // store image
            $image = $request->file('file');
            $path = "/public/admin/items";

            if ($image->isValid()) {
                $extension = $request->file->extension();
                $name = uniqid() . "-" . Carbon::now()->toISOString() . "." . $extension;
                $this->imageResize($image, $name, $this->size_latest, 'admin_item_thumbnail_latest');
                $this->imageResize($image, $name, $this->size_orderings, 'admin_item_thumbnail_ordering');
                $request->file->storeAs($path, $name);

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
            $itemImages = ItemImage::where('validation', "false")->get();
            if (isset($itemImages)) {
                foreach ($itemImages as $itemImage) { // processing image with validation = false
                    ItemImageTransaction::create([
                        'item_id' => $item->id,
                        'item_image_id' => $itemImage->id
                    ]);

                    $itemImage->validation = true;
                    $itemImage->update();
                }
            }

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
        } catch (\ErrorException $e) {

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
            $item = Item::with('itemImage')->where('id', $id)->first();

            // image processing
            if ($request->hasFile('image')) {
                $img = $item->itemImage->image;
                // delete image
                $fileStorage = Storage::disk('admin_items');
                $fileStorageThumbnailOrderings = Storage::disk('admin_item_thumbnail_ordering');
                $fileStorageThumbnailLatest = Storage::disk('admin_item_thumbnail_latest');

                if ($fileStorage->exists($img)) {
                    $fileStorage->delete($img);
                    $fileStorageThumbnailLatest->delete($img);
                    $fileStorageThumbnailOrderings->delete($img);
                }

                $filenameImg = $this->imageProcess($request);
                $image = ItemImage::where('item_id', $id)->first();
                $image->update([
                    'image' => $filenameImg
                ]);

            }

            unset($request['image']);
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
            $item = Item::with('itemImage')->where('id', $id)->first();

            // remove image on folder
            if (isset($item->itemImage)) {
                $image = ItemImage::where('item_id', $id)->first();
                $imgFile = Storage::disk('admin_items');
                $fileStorageThumbnailOrderings = Storage::disk('admin_item_thumbnail_orderings');
                $fileStorageThumbnailLatest = Storage::disk('admin_item_thumbnail_latest');

                if ($imgFile->exists($image->image)) {
                    $imgFile->delete($image->image);
                    $fileStorageThumbnailOrderings->delete($image->image);
                    $fileStorageThumbnailLatest->delete($image->image);
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
