<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');  //Web uygulamalarında yaygın olarak kullanılan middleware, istekleri filtreleme, kimlik doğrulama, oturum yönetimi, güvenlik kontrolleri, loglama gibi işlemleri gerçekleştirmek için kullanılır.
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
}
