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
        ];
        return view('brand.home')->with($data);
    }

    public function create()
    {
        $data = [
            'breadCrumbs' => 'Create Brand',
            'title' => 'Please fill the input form below',
            'titleSecond' => "Brand Info"
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
            return redirect()->route('brand.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {

        }
    }

    public function destroy()
    {
    }

    public function edit()
    {
    }
}
