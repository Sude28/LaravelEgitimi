<?php

use App\Http\Controllers\TestController;  //erişebilmek için
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

Route::get('/', function () {   //sadece / varsa anasayfaya yönleniyor.
    return view('welcome');
});

/*Route::controller(TestController::class)->group(function(){ //Controller üzerinden çalıştırıyoruz test adında views'i
    //Route::get('/test','ornek');
    Route::get('/test','ornek')->name('test');    //test adında sayfa,ornek adında views'i(kullanıcıya gözükendir) çalıştıran fonksiyon
    Route::get('/detail','detail')->name('detail');    //Route'lara isim verdik böylece dinamik hale geldi sayfanın url adresi değişse de routelerine verilen isimler ile erişebiliriz. 
});*/

Route::prefix('admin')->group(function(){
    Route::get('/deneme',[TestController::class,'ornek'])->name('test');
    Route::get('/detail',[TestController::class,'detail'])->name('detail');
    //Farklı controller sınıfından olan route'ları bir arada tutmak için hepsini prefix ile birleştiriyoruz. Farklı controller sınıfları için farklı route'lar yazmaya gerek olmasın diye
});

