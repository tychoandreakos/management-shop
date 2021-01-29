<?php

namespace App\Http\Traits;

use App\Models\ItemImageTransaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

trait ItemImage {
    private $size_latest = ["width" => 285, "height" => 355];
    private $size_orderings = ["width" => 150, "height" => 150,];

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

    private function imageCheckerAndUpdate($id)
    {
        $itemImages = \App\Models\ItemImage::where('validation', "false")->get();
        if (isset($itemImages)) {
            foreach ($itemImages as $itemImage) { // processing image with validation = false
                ItemImageTransaction::create([
                    'item_id' => $id,
                    'item_image_id' => $itemImage->id
                ]);

                $itemImage->validation = true;
                $itemImage->update();
            }
        }
    }

    public function destroyImageWithName(Request $request)
    {
        try {
            $image = \App\Models\ItemImage::where('image', $request->name)->first();
            if (isset($image)) {
                $imgFile = Storage::disk('admin_items');
                $fileStorageThumbnailOrderings = Storage::disk('admin_item_thumbnail_ordering');
                $fileStorageThumbnailLatest = Storage::disk('admin_item_thumbnail_latest');

                if ($imgFile->exists($image->image)) {
                    $imgFile->delete($image->image);
                    $fileStorageThumbnailOrderings->delete($image->image);
                    $fileStorageThumbnailLatest->delete($image->image);
                }

                $itemImageTransaction = ItemImageTransaction::where('item_image_id', $image->id)->first();
                if (isset($itemImageTransaction)) $itemImageTransaction->delete();
                $image->delete();
            }
        } catch (\ErrorException $e) {
        }
    }
}
