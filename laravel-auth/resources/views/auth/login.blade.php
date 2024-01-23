<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Comatible" content="ie=edge">
    <title>Login Form</title>
</head>
<body>
    @if(session()->has('login'))             <!--Login değişkeni var mı diye kontrol ediyor if ile eğer varsa iki süslü tırnak olduğundan değerini yazdırıyor.Controller'da eğer giriş başarılıysa login değişkenine 'Giriş işlemi başarılı'stringini atadık değilse 'Giriş işlemi başarısız! stringi ... --> 
       {{session('login')}}  <!-- -->
    @endif  

    @if(session()->has('register'))            <! --Register değişkeni var mı diye kontrol ediyor if ile eğer varsa iki süslü tırnak olduğundan değerini yazdırıyor.Controller'da eğer kayıt başarılıysa register değişkenine 'Kayıt işlemi başarılı'stringini atadık. -->
       {{session('register')}}
    @endif

    @guest                        <!--Ziyaretçi geldiği zaman bu formu görecek guest endguest bunun için kullanılır -->
        <form action="{{route('login')}}" method="POST">
        @csrf
        <input type="email" name="email"  placeholder="Email" required><br ><br >
        <input type="password" name="password" placeholder="Password" required><br ><br >

        <button type="submit">Login</button>
    </form>
    @endguest 

    @auth    <!--Eğer giriş yapmışsa yani bir kullanıcı ise bunu görür. auth endauth bunun için kullanılır. -->
        <a href="{{route('logout')}}">Logout</a>
        
    @endauth

    
    
</body>   
</html>