<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Comatible" content="ie=edge">
    <title>Laravel 10 | Login & Register</title>
</head>
<body>
    <div>
       <p>
            @if(session()->has('login'))          <!--Login değişkeni var mı diye kontrol ediyor if ile eğer varsa iki süslü tırnak olduğundan değerini yazdırıyor.Controller'da eğer giriş başarılıysa login değişkenine 'Giriş işlemi başarılı'stringini atadık değilse 'Giriş işlemi başarısız! stringi ... -->   
               {{session('login')}}
            @endif
       </p>
       <p>
            <a href="{{route('login')}}">Login<a/>
       </p>
       <p>
            <a href="{{route('register')}}">Register<a/>
       </p> 

    </div>
</body>
</html>   
