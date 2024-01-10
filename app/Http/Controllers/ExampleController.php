<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Common;
use App\Charts\MonthlyUsersChart;

class ExampleController extends Controller
{
    //
    use Common;

    public function index(MonthlyUsersChart $chart)
    {
        return view('charts', ['chart' => $chart->build()]);
    }

    public function test() {
        return view('login');
    }

    public function show_upload() {
        return view('upload');
    }

    public function upload(Request $request) {

//        $file_extension = $request->image->getClientOriginalExtension();
//        $file_name = time() . '.' . $file_extension;
//        $path = 'assets\images';
//        $request->image->move($path, $file_name);
        $fileName = $this->uploadFile(file: $request->image, path: 'assets\images');

        return $fileName;
    }

    public function place() {
        return view('place');
    }

    public function blog() {
        return view('blog');
    }

    public function blog2() {
        return view('blog2');
    }

    public function createSession() {
//        session_start();
        session()->put('test', 'First Laravel session');
        session()->forget('test');
        $data = session('test');
//        $data = $_SESSION['test'];
        return view('session', compact('data'));
    }
}

// database, view, routes
