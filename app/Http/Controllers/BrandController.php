<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index(Brand $brands)
    {
        $data = [
            'breadCrumbs' => 'Brand Lists',
            'title' => 'Brand Lists',
            'brands' => $brands->latest()->get(),
						'titleHeader' => 'Brand',
        ];
        return view('brand.home')->with($data);
    }

    public function create()
    {
        $data = [
            'breadCrumbs' => 'Create Brand',
            'title' => 'Please fill the input form below',
            'titleSecond' => "Brand Info",
						'titleHeader' => 'Create Brand',
        ];
        return view('brand.create')->with($data);
    }

    protected function validateHandler($request)
    {
        $request->validate([
            'name' => 'required',
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
            Brand::create($request->all());
            return redirect()->route('brands.home')->with($flashMsg);
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
            $item = Brand::find($id);
            $item->delete();
            return redirect()->route('brands.home')->with($flashMsg);
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
                'brand' => Brand::find($id)
            ];
            return view('brand.edit')->with($data);
        } catch (ModelNotFoundException $e) {

        }
    }

    public function update(Request $request, $id) {
        try {
            $flashMsg = [
                'success' => true,
                'title' => 'Successfully updated!',
                'message' => 'Congratulation your item has been created!'
            ];
            $this->validateHandler($request);
            $item = Brand::find($id);
            $item->update($request->all());
            return redirect()->route('brands.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {

        }
    }

    public function autocomplete(Request $request)
    {
        $data = Brand::all();
        return response()->json($data);
    }
}
