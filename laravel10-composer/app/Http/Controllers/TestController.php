<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;   //Request kütüphanesi get ve post işlemlerini yapabilmek için gerekli olan kütüphane tanımlanmış

class TestController extends Controller  //controller sınıfından türetilen testcontroller sınıfı
{
    public function ornek(){
        return view('test');
    }

    public function detail(){
        return view('detail');
    }
}
