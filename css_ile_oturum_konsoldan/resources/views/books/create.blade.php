@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-6">{{ 'Kitap Ekle' }}</div>
                            <div class="col-6 d-flex justify-content-end"><a href="{{ route('books.index') }}"
                                    class="btn btn-outline-success">Kitaplar</a></div>
                        </div>
                    </div>
                    <div class="card-body">
                        <h1>Kitap Ekle</h1>
                        <form action="{{ route('books.store') }}" method="POST">
                            @if ($errors->any())                  <!--Bu kod bloğu, Laravel uygulamalarında form gönderimleri sırasında doğrulama hatalarını işlemek ve kullanıcıya geri bildirim sağlamak için kullanılır. -->
                                <div class="alert alert-danger"> 
                                    <ul>
                                        @foreach ($errors->all() as $error) <!--Ne kadar hata varsa döngüyle hepsini yazdırır(ul ile -> sırasız liste) -->
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @csrf
                            <div class="form-group">
                                <label for="">Kitabın Adı</label>
                                <input type="text" name="name" class="form-control" placeholder="Kitabın Adı">
                                <!--Veritabanında kitabın adı name ile tutulduğu için name'ye name dedik -->
                            </div>
                            <div class="form-group">
                                <label for="">Kitabın Fiyatı</label>
                                <input type="text" name="price" class="form-control" placeholder="Kitabın Fiyatı">
                            </div>
                            <button type="submit" class="btn btn-outline-secondary mt-2">Ekle</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
