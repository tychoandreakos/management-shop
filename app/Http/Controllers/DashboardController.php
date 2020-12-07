<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $data = [
            'breadCrumbs' => "Dashboard"
        ];
        return view('dashboard.home')->with($data);
    }

}
