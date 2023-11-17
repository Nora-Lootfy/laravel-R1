<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CarController extends Controller
{
    public function add_car() {
        return view('addCar');
    }

    public function added(Request $request) {
        $data = $request->all();
        $data["published"] = isset($data["published"])? "Yes": "No";

        return view('carAdded', $data);
    }
}
