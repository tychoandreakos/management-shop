<?php

namespace App\Http\Controllers;

use App\Models\CustomerLabel;
use Illuminate\Http\Request;

class CustomerLabelController extends Controller
{
    public function index(CustomerLabel $customerLabel)
    {
        $data = [
            'breadCrumbs' => 'Customer Label Lists',
            'title' => 'Customer Label Lists',
            'customerLabels' => $customerLabel->latest()->get(),
        ];
        return view('customer_label.home')->with($data);
    }

    public function create()
    {
        $data = [
            'breadCrumbs' => 'Create Customer Label',
            'title' => 'Please fill the input form below',
            'titleSecond' => "Customer Label Info"
        ];
        return view('customer_label.create')->with($data);
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
            CustomerLabel::create($request->all());
            return redirect()->route('customer-labels.home')->with($flashMsg);
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
            $item = CustomerLabel::find($id);
            $item->delete();
            return redirect()->route('customer-labels.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {

        }
    }

    public function edit($id)
    {
        try {
            $data = [
                'breadCrumbs' => 'Update Customer Label',
                'title' => 'Please fill the input form below',
                'titleSecond' => "Customer Label Info",
                'customerLabel' => CustomerLabel::find($id)
            ];
            return view('customer_label.edit')->with($data);
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
            $item = CustomerLabel::find($id);
            $item->update($request->all());
            return redirect()->route('customer-labels.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {

        }
    }
}
