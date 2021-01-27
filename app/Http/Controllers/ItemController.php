<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\ItemImage;
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
            'items' => $item->with('itemImage')->latest()->paginate(20),
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
        if ($request->hasFile('image')) {
            // store image
            $image = $request->file('image');
            $path = "/public/admin/items";

            if ($image->isValid()) {
                $extension = $request->image->extension();
                $fileName = join("-", explode(" ", strtolower($request->get('name')))) ?? strtolower($request->get("name"));
                $name = $fileName . "-" . Carbon::now()->toISOString() . "." . $extension;
                $this->imageResize($image, $name, $this->size_latest, 'admin_item_thumbnail_latest');
                $this->imageResize($image, $name, $this->size_orderings, 'admin_item_thumbnail_ordering');
                $request->image->storeAs($path, $name);

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
        } catch (ModelNotFoundException | \Exception $e) {
            dd($e);
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
                $fileStorageThumbnailOrderings = Storage::disk('admin_item_thumbnail_orderings');
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
