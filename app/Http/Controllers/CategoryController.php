<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        $data = [
            'breadCrumbs' => 'Category Lists',
            'title' => 'Category Lists',
            'categories' => $category->latest()->get(),
						'titleHeader' => 'Category',
        ];
        return view('category.home')->with($data);
    }

    public function create()
    {
        $data = [
            'breadCrumbs' => 'Create Category',
            'title' => 'Please fill the input form below',
            'titleSecond' => "Category Info",
						'titleHeader' => 'Create Category',
        ];
        return view('category.create')->with($data);
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
            Category::create($request->all());
            return redirect()->route('categories.home')->with($flashMsg);
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
            $item = Category::find($id);
            $item->delete();
            return redirect()->route('categories.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {

        }
    }

    public function edit($id)
    {
        try {
            $data = [
                'breadCrumbs' => 'Update Category',
                'title' => 'Please fill the input form below',
                'titleSecond' => "Category Info",
                'category' => Category::find($id),
								'titleHeader' => 'Update Category',
            ];
            return view('category.edit')->with($data);
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
            $item = Category::find($id);
            $item->update($request->all());
            return redirect()->route('categories.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {

        }
    }
}
