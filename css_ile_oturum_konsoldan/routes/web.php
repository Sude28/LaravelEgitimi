<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\TestController;
//use Illuminate\Support\Facades\Auth;
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

Route::prefix('admin')->middleware('auth')->group(function(){   // ->middleware('auth') sayesinde admin route'larına girmek için log in olunması gerekiyor 
    Route::get('/deneme',[ TestController::class,'ornek'])->name('test');
    Route::get('/detail',[ TestController::class,'detail'])->name('detail');

    Route::get('/kitaplar',[ BookController::class,'index'])->name('books.index');  //index fonksiyonundan index view'ine yönlendirme yapıcaz.
    Route::get('/kitaplar/ekle',[ BookController::class,'create'])->name('books.create');  //Bu fonksiyon ekleme sayfasına gitmeyi sağlayacak route işlemi
    Route::post('/kitaplar/ekle',[ BookController::class,'store'])->name('books.store');  //Ekle butonuna basınca verileri post ile controller'a göndericez
    Route::get('/kitaplar/{id}',[ BookController::class,'edit'])->name('books.edit');   ////Düzenle butonuna basınca viewe yönlendiren controller'ın içinde fonksiyon(edit) olucak. //Hangi kitabın güncellendiğini bilmek için idd parametresi ile gidiyor.
    Route::post('/kitaplar/{id}',[ BookController::class,'update'])->name('books.update'); //Bunu sayfayı incele ile değştirebiliyorum bu nedenle kullanıcı 
    Route::get('/kitaplar/sil/{id}',[ BookController::class,'delete'])->name('books.delete');

    //Farklı controller sınıfından olan route'ları bir arada tutmak için hepsini prefix ile birleştiriyoruz. Farklı controller sınıfları için farklı route'lar yazmaya gerek olmasın diye
});  




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
