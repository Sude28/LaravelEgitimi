<?php

namespace App\Http\Controllers;


use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request) {
        if($request->method() == 'GET'){
            return view('auth.login');

        }
        else if($request->method() == 'POST'){
            $data = $request->only('email','password');
        if(Auth::attempt($data)) {    //attempt yöntemi verilen kimlik doğrulama bilgilerini veritabanındaki kullanıcı bilgileriyle karşılaştırır
            return redirect(route('home'))->with('login','Giriş işlemi başarılı.');  //redirect fonksiyonu ile belirtilen sayfaya yönlendirilir. route('home') ifadesi, ismi "home" olan bir rota yolu oluşturur.  //parametre ile gitmesi için with kullanılır. 'login' ifadesi, oturum verisinin anahtarını temsil eder(değişken). 'success' ifadesi, 'login' anahtarına atanacak olan değeri temsil eder (değişkene success atandı).
        }
        else {
            return redirect()->back()->with('login','Giriş işlemi başarısız!');  //back ile tekrar login sayfasına gelmesini sağlarız.
        }

        } 
    }

    public function register(Request $request) {
        if($request->method() == 'GET'){  //tarayıcının sonuna adresi yazarak giriş yapılmaya çalışılmışsa
            return view('auth.register');
        }      

        else if($request->method() == 'POST'){
            $data = $request->only('name','email','password');
            $data['password'] = bcrypt($data['password']);    //hash'lemek yani şifrelemek için bcrypt fonksiyonunu kullanırız
            
            User::create($data);

            return redirect(route('login'))->with('register','Kayıt işlemi başarılı');   //login sayfasına gidiyor kayıt işlemi başarılı mesajı ile birlikte


        }
} 
    public function logout(){ 
        auth()->logout();   //"auth()" fonksiyonu, kullanıcı kimlik doğrulama işlemlerini daha kolay ve okunabilir bir şekilde gerçekleştirmeye yardımcı olan Laravel'in sağladığı kullanışlı bir yapıdır.
        return redirect(route('login'))->with('login','Oturum başarıyla kapatıldı.');
    }        



}