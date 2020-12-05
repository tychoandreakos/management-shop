<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Customer $customers) {
        return view('customer.home')->with('customers', $customers->take(10)->get());
    }
}
