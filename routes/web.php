<?php

use Illuminate\Support\Facades\Route;

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

Route::get('about', function () {
    return 'About page';
});

Route::get('contact-us', function () {
    return 'Contact US page';
});

Route::prefix('support')->group(function () {
   Route::get('/', function () {
       return 'Support Home page';
   });

   Route::get('chat', function () {
      return 'Chat page';
   });

    Route::get('call', function () {
        return 'Call page';
    });

    Route::get('ticket', function () {
        return 'Ticket page';
    });
});

Route::prefix('training')->group(function () {
    Route::get('/', function () {
        return 'Training Home page';
    });

    Route::get('ict', function () {
        return 'ICT page';
    });

    Route::get('hr', function () {
        return 'HR page';
    });

    Route::get('marketing', function () {
        return 'Marketing page';
    });

    Route::get('logistics', function () {
        return 'Logistics page';
    });
});

