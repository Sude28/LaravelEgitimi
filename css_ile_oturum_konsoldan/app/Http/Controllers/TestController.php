<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function ornek(){
        return view('test');
    }

    public function detail(){
        return view('detail');
    }
}
