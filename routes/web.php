<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\NewsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('about', function () {
//    return 'About page';
//});
//
//Route::get('contact-us', function () {
//    return 'Contact US page';
//});
//
//Route::prefix('support')->group(function () {
//   Route::get('/', function () {
//       return 'Support Home page';
//   });
//
//   Route::get('chat', function () {
//      return 'Chat page';
//   });
//
//    Route::get('call', function () {
//        return 'Call page';
//    });
//
//    Route::get('ticket', function () {
//        return 'Ticket page';
//    });
//});
//
//Route::prefix('training')->group(function () {
//    Route::get('/', function () {
//        return 'Training Home page';
//    });
//
//    Route::get('ict', function () {
//        return 'ICT page';
//    });
//
//    Route::get('hr', function () {
//        return 'HR page';
//    });
//
//    Route::get('marketing', function () {
//        return 'Marketing page';
//    });
//
//    Route::get('logistics', function () {
//        return 'Logistics page';
//    });
//});

//Route::fallback(function () {
//   return redirect('/');
//});


Route::get('cv', function () {
   return view('cv');
});

Route::get('login', function () {
    return view('login');
});

Route::post('receive', function () {
    return "data received";
})->name('receive');

Route::get('test', [ExampleController::class, 'test']);

//Route::get('add-car', [CarController::class, 'add_car']);
//Route::post('car-added', [CarController::class, 'added'])->name('car-added');
//
//Route::get('car-added', fn() => redirect('add-car'));

Route::get('add-car', [CarsController::class, 'create']);
Route::post('car-added', [CarsController::class, 'store'])->name('car-added');
Route::get('car-index', [CarsController::class, 'index']);

Route::get('create-news', [NewsController::class, 'create']);
Route::post('store-news', [NewsController::class, 'store'])->name('store-news');

