<?php

use App\Mail\welcomeMil;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// mailing
Route::get('/email', function () {
    Mail::to('oladayoahmod112@gmail.com')->send(new welcomeMil());
    return new welcomeMil();
});
Route::group(['middleware'=> ['ageAuth']],function(){
    // Route::view('check{age}', 'check');
    Route::get('check/{age}', function () {
        $details = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp'
        ];
        Mail::to('oladayoahmod112@gmail.com')->send(new welcomeMil($details));
        // Mail::to('oladayoahmod112@gmail.com')->send(new welcomeMil());
        return 'new welcomeMil()';
    });
});
