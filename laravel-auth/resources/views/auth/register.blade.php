<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Comatible" content="ie=edge">
    <title>Register Form</title>
</head>
<body>
    @if(session()->has('login') && session('login') == 'fail')
       Login işlemi hatalı
    @endif  
    <form action="{{route('register')}}" method="POST">
        @csrf
        <input type="text" name="name"  placeholder="Name" required><br ><br >
        <input type="email" name="email"  placeholder="Email" required><br ><br >
        <input type="password" name="password" placeholder="Password" required><br ><br >

        <button type="submit">Register</button>
    </form>
    
</body>   
</html>