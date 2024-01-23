@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">{{ __('Kitaplar ') }}</div>
                            <div class="col-6 d-flex justify-content-end"><a href="{{route('books.create')}}" class="btn btn-outline-warning">Kitap Ekle</a></div>
                        </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Kullanıcı</th>
                                    <th scope="col">Kitabın Adı</th>
                                    <th scope="col">Fiyatı</th>
                                    <th scope="col"></th>   <!--İlk satırdaki Beyaz arka plan uzasın diye ekledim -->
                                    <th scope="col"></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($books as $book )  <!-- book veritabanındaki tüm books'ları alıyor döngü ile-->
                                <tr>
                                    <th scope="row">{{$book->id}}</th>
                                    <td>{{$book->user->name}}</td>
                                    <td>{{$book->name}}</td>   <!--Bire bir ilişki olduğundan bir kitabı bir kullanıcı ekler.-->
                                    <td>{{$book->price}} TL</td>
                                    <td><a href="{{route('books.edit',$book->id)}}" class="btn btn-outline-dark">Düzenle</a></td> 
                                    <td><a href="{{route('books.delete',$book->id)}}" class="btn btn-outline-dark">Sil</a></td>
                                    
                                </tr>
                                    
                                @endforeach
                                
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
