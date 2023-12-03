<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\Common;

class ExampleController extends Controller
{
    //
    use Common;
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
}

// database, view, routes
