<?php

namespace App\Http\Controllers;

use App\Models\SpesificationItem;
use Illuminate\Http\Request;

class SpesificationItemController extends Controller
{
    public function index(SpesificationItem $specificationItem)
    {
        $data = [
            'breadCrumbs' => 'Brand Lists',
            'title' => 'Brand Lists',
            'specifications' => $specificationItem->latest()->get(),
        ];
        return view('specification_item.home')->with($data);
    }

    public function create()
    {
        $data = [
            'breadCrumbs' => 'Create Specification Item',
            'title' => 'Please fill the input form below',
            'titleSecond' => "Specification Item Info"
        ];
        return view('specification_item.create')->with($data);
    }

    protected function validateHandler($request)
    {
        $request->validate([
            'property' => 'required',
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
            SpesificationItem::create($request->all());
            return redirect()->route('specifications.home')->with($flashMsg);
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
            $item = SpesificationItem::find($id);
            $item->delete();
            return redirect()->route('specifications.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {

        }
    }

    public function edit($id)
    {
        try {
            $data = [
                'breadCrumbs' => 'Update Specification Item',
                'title' => 'Please fill the input form below',
                'titleSecond' => "Specification Item Info",
                'specification' => SpesificationItem::find($id)
            ];
            return view('specification_item.edit')->with($data);
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
            $item = SpesificationItem::find($id);
            $item->update($request->all());
            return redirect()->route('specifications.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {

        }
    }
}
