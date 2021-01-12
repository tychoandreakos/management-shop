<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\CustomerLabel;
use App\Models\CustomerLabelTransaction;
use App\Models\CustomerTransaction;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Melihovv\Base64ImageDecoder\Base64ImageDecoder;

class CustomerController extends Controller
{

    private $allowedFormat = ['jpeg', 'png', 'jpg'];

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

    private function saveImage($image)
    {
        $imageName = "";
        try {
            $decoder = new Base64ImageDecoder($image, $this->allowedFormat);
            $imageName = uniqid() . "." . $decoder->getFormat();
            Storage::disk('admin_customers')->put($imageName, $decoder->getDecodedContent());
        } catch (\ErrorException $e) {

        }

        return $imageName;
    }

    public function store(Request $request): JsonResponse
    {
        try {
            $this->validateResponse($request);
            $tempChecker = $request->get("image");
            if (isset($tempChecker)) {
                $imageName = $this->saveImage($request->get('image'));
                $request['image'] = $imageName;
            }
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

            $customerLabel = CustomerLabelTransaction::where('customer_id', $id);

            if (isset($customerLabel)) {
                $customerLabel->delete();
            }

            foreach ($request->get("labels") as $label) {
                CustomerLabelTransaction::create([
                    'customer_id' => $id,
                    'customer_label_id' => $label
                ]);
            }

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
            'customer' => Customer::with('customerLabelTransaction.customerLabel')->where('id', $id)->first(),
            'breadCrumbs' => 'Customer Detail',
            'labels' => CustomerLabel::all()
        ];

        if (isset($data['customer']['image']))
            $data['customer']['image'] = Storage::disk('admin_customers')->url($data['customer']['image']);

        return view('customer.detail', $data);
    }


    public function destroy($id)
    {
        try {
            $customer = Customer::with(['customerLabelTransaction', 'customerTransaction'])->where('id', $id)->first();

            // delete customer file image in the local disk
            if (isset($customer->image)) {
                $imgFile = Storage::disk('admin_customers');
                if ($imgFile->exists($customer->image)) {
                    $imgFile->delete($customer->image);
                }
            }
            if (isset($customer->customerLabelTransaction))
                CustomerLabelTransaction::where('customer_id', $id)->delete();

            if (isset($customer->customerTransaction))
                CustomerTransaction::where('customer_id', $id)->delete();

            $customer->delete();
            return redirect()->route('customers.home');
        } catch (\Exception $e) {

        }
    }

    public function autocomplete(Request $request)
    {
        $data = Customer::all();
        return response()->json($data);
    }

}
