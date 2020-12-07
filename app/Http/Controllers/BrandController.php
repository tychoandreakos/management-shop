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
    }

    public function destroy()
    {
    }

    public function edit()
    {
    }
}
