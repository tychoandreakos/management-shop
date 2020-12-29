<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerLabel;
use App\Models\CustomerTransaction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class CustomerController extends Controller
{

    public function index(Customer $customers, CustomerLabel $customerLabel)
    {
        $data = [
            'customers' => $customers->latest()->paginate(10),
            "customerLabels" => CustomerLabel::withCount('customerLabelTransaction')->get(),
            'breadCrumbs' => "Customers",
            "allCustomers" => $customers->get()->count()
        ];
        return view('customer.home', $data);
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $this->validateResponse($request);
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

    public function update(Request $request, $id)
    {
        try {
            $this->validateResponse($request);
            $customer = Customer::find($id);
            $customer->update($request->all());
            return redirect()->route('customers.home');
        } catch (ModelNotFoundException $e) {

        }
    }

    public function search(Customer $customers, Request $request)
    {
        try {
            $search = $request->get('search');
            $data = [
                'customers' => $customers
                    ->where(function ($query) use ($search) {
                        $query->where('name', $search)
                            ->orWhere('email', $search)
                            ->orWhere('num_telp', $search);
                    })
                    ->get(),
                'breadCrumbs' => "Customers"
            ];
            return view('customer.home', $data);
        } catch (ModelNotFoundException $e) {

        }
    }

    private function validateResponse($request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'num_telp' => 'required|max:18',
        ]);
    }

    public function detail($id)
    {
        $data = [
            'customer' => Customer::find($id),
            'breadCrumbs' => 'Customer Detail'
        ];
        return view('customer.detail', $data);
    }


    public function destroy($id): RedirectResponse
    {
        $customer = Customer::find($id);
        $customer->delete();
        return redirect()->route('customers.home');
    }

    public function autocomplete(Request $request)
    {
        $data = Customer::all();
        return response()->json($data);
    }

}
