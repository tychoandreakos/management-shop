<?php

namespace App\Http\Controllers;

use App\Models\ShipProvider;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ShipProviderController extends Controller
{
    public function index(ShipProvider $shipProvider)
    {
        $data = [
            'breadCrumbs' => 'Shipping Provider Lists',
            'title' => 'Shipping Provider Lists',
            'shippingProviders' => $shipProvider->latest()->get(),
						'titleHeader' => "Shipping Provider",
        ];
        return view('shipping_provider.home')->with($data);
    }

    public function create()
    {
        $data = [
            'breadCrumbs' => 'Create Shipping Provider',
            'title' => 'Please fill the input form below',
            'titleSecond' => "Shipping Provider Info",
            'titleHeader' => 'Create Shipping Provider',
        ];
        return view('shipping_provider.create')->with($data);
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
            ShipProvider::create($request->all());
            return redirect()->route('shipping-providers.home')->with($flashMsg);
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
            $item = ShipProvider::find($id);
            $item->delete();
            return redirect()->route('shipping-providers.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {

        }
    }

    public function edit($id)
    {
        try {
            $data = [
                'breadCrumbs' => 'Update Shipping Provider',
                'title' => 'Please fill the input form below',
                'titleSecond' => "Shipping Provider Info",
                'shippingProvider' => ShipProvider::find($id),
                'titleHeader' => 'Update Shipping Provider',
            ];
            return view('shipping_provider.edit')->with($data);
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
            $item = ShipProvider::find($id);
            $item->update($request->all());
            return redirect()->route('shipping-providers.home')->with($flashMsg);
        } catch (ModelNotFoundException $e) {

        }
    }
}
