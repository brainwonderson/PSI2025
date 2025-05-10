<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\WhatsAppController;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\UmkmController;
use App\Http\Controllers\LayananController;
use App\Http\Controllers\SurveyController;

Route::get('/', function () {
    return view('home');
});

Route::group(['prefix' => 'account'], function(){
    //guest middleware
   Route::group(['middleware' => 'guest'], function(){
    Route::get('login',[LoginController::class,'index'])->name('account.login');
    Route::get('register',[LoginController::class,'register'])->name('account.register');
    Route::post('process-register',[LoginController::class,'processRegister'])->name('account.processRegister');
    Route::post('authenticate',[LoginController::class,'authenticate'])->name('account.authenticate');

   });
   
   // Authenticated middleware
   Route::group(['middleware' => 'auth'], function(){
    Route::get('logout',[LoginController::class,'logout'])->name('account.logout');
    Route::get('dashboard',[DashboardController::class,'index'])->name('account.dashboard');
   });
   
});

Route::resource('/tickets', \App\Http\Controllers\TicketController::class);
// Route::get('meet', [Home::class, 'test'])->name('meet');

// Route::get('send-wa', function(){
//     $response = Http::withHeaders([
//         'Authorization' => 'sJKyRptUdnqLVpKCHHvF',
//     ])->post('https://api.fonnte.com/send' , [
//         'target' => '6282298630250',
//         'message' => 'https://us04web.zoom.us/j/77013509340?pwd=AG3L6fTR3WoyDdb2hBT9FJKlRysbih.1',
//     ]);
//     dd(json_decode($response, true));
// });

Route::post('meet', [Home::class, 'createMeeting'])->name('meet');
Route::get('meet', function () {
    return view('zoom.create'); // View untuk form
})->name('meet.form');

Route::post('meet', [Home::class, 'createMeeting'])->name('meet');

Route::get('send-wa', [WhatsAppController::class, 'showForm']);
Route::post('send-wa', [WhatsAppController::class, 'sendMessage'])->name('send-wa');

Route::get('/umkms/status/{id}/{status}', [UmkmController::class, 'updateStatus'])->name('umkms.updateStatus');
Route::resource('umkms', \App\Http\Controllers\UmkmController::class);
// web.php
Route::get('/layanans/create/{umkm}', [LayananController::class, 'create'])->name('layanans.create');
Route::post('/layanans/store', [LayananController::class, 'store'])->name('layanans.store');
Route::resource('layanan', LayananController::class);
Route::resource('surveys', \App\Http\Controllers\SurveyController::class);
Route::get('/survey/create/{layanan}', [SurveyController::class, 'create'])->name('survey.create');
Route::post('/generate-zoom', [App\Http\Controllers\Home::class, 'generateZoom'])->name('zoom.generate');
Route::post('/generate-zoom-link', [Home::class, 'generateZoomLink'])->name('generate.zoom.link');

Route::get('/surveys', [SurveyController::class, 'index'])->name('surveys.index');


