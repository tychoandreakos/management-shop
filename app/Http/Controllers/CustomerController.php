<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Customer $customers)
    {
        return view('customer.home')->with('customers', $customers->take(10)->latest()->get());
    }

    public function store(Request $request): JsonResponse
    {
        try {
            Customer::create($request->all());
        } catch (ModelNotFoundException $e) {
            $error = [
                'msg' => "Please try again later",
                "status" => 500,
                'next' => false,
                'exception' => $e->getMessage()
            ];
            return response()->status(500)->json($error);
        }

        $success = [
            'msg' => 'Successfully created customer',
            'status' => 200,
            'next' => true
        ];
        return response()->json($success);
    }

    public function destroy($id): RedirectResponse
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customers.home');
    }

}
