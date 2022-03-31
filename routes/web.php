<?php

use App\Http\Controllers\notify;
use App\Http\Controllers\notifyController;
use App\Http\Controllers\SmsController;
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

// notification routes
Route::get('/notify', [notifyController::class,'notifier']);
// sms notification route
Route::get('test_sms',[SmsController::class,'send_sms']);