@extends('layouts.app') <!-- temel bir şablonu başka bir şablona eklemek-->

@section('content')    <!-- endsection ile kapanana kadar olan kısım oluşturur. Bu, içerik bölümünü belirtir ve genişletilen şablon dosyasındaki ilgili yerde içeriğin yerleştirileceği alanı tanımlar. -->
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
