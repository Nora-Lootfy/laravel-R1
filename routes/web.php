<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ExampleController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PlacesController;
use App\Http\Controllers\ContactUSController;
use App\Charts\MonthlyUsersChart;

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
Route::get('show-upload', [ExampleController::class, 'show_upload']);
Route::post('upload', [ExampleController::class, 'upload'])->name('upload');
Route::get('create-session', [ExampleController::class, 'createSession']);
//Route::get('place', [ExampleController::class, 'place']);
//Route::get('blog', [ExampleController::class, 'blog']);
//Route::get('blog2', [ExampleController::class, 'blog2']);
//Route::get('add-car', [CarController::class, 'add_car']);
//Route::post('car-added', [CarController::class, 'added'])->name('car-added');
//
//Route::get('car-added', fn() => redirect('add-car'));

//Route::get('add-car', [CarsController::class, 'create']);
//Route::post('car-added', [CarsController::class, 'store'])->name('car-added');
Route::get('car-index', [CarsController::class, 'index']);//->middleware('verified');
Route::get('edit-car/{id}', [CarsController::class, 'edit']);
Route::put('update-car/{id}', [CarsController::class, 'update'])->name('update-car');
Route::get('show-car/{id}', [CarsController::class, 'show']);
Route::get('delete-car/{id}', [CarsController::class, 'destroy']);
Route::get('trashed-car', [CarsController::class, 'getTrashed']);
Route::get('restore-car/{id}', [CarsController::class, 'restore']);
Route::get('delete-permanent-car/{id}', [CarsController::class, 'destroyPermanently']);

Route::get('news-index', [NewsController::class, 'index']);
Route::get('create-news', [NewsController::class, 'create']);
Route::post('store-news', [NewsController::class, 'store'])->name('store-news');
Route::get('edit-news/{id}', [NewsController::class, 'edit']);
Route::put('update-news/{id}', [NewsController::class, 'update'])->name('update-news');
Route::get('show-news/{id}', [NewsController::class, 'show']);
Route::get('delete-news/{id}', [NewsController::class, 'destroy']);
Route::get('trashed-news', [NewsController::class, 'getTrashed']);
Route::get('restore-news/{id}', [NewsController::class, 'restore']);
Route::get('delete-permanent-news/{id}', [NewsController::class, 'destroyPermanently']);


Route::get('place-index',[PlacesController::class, 'index']);
Route::get('create-place',[PlacesController::class, 'create']);
Route::post('store-place',[PlacesController::class, 'store'])->name('storePlace');
Route::get('show-place/{id}', [PlacesController::class, 'show'])->name('showPlace');
Route::get('delete-place/{id}', [PlacesController::class, 'destroy'])->name('deletePlace');
Route::get('trashed-places', [PlacesController::class, 'getTrashed']);
Route::get('restore-place/{id}', [PlacesController::class, 'restore'])->name('restorePlace');
Route::get('delete-permanent-place/{id}', [PlacesController::class, 'destroyPermanently'])->name('deletePlacePermanently');

Auth::routes(['verify'=>true]);
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function() {
    Route::get('create-contact-us',[ContactUSController::class, 'create']);
    Route::post('send-message',[ContactUSController::class, 'send'])->name('messageSent');

    Route::get('add-car', [CarsController::class, 'create']);
    Route::post('car-added', [CarsController::class, 'store'])->name('car-added');
});


Route::get('charts-test', [ExampleController::class, 'index']);

