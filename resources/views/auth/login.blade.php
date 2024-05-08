@extends('layouts.app')

@section('content')
    <div class="wrapper">
        <div class="logo">
            <img src="https://th.bing.com/th/id/OIP.Sq5G2zROVCJTtSdKGEdQ5wHaHa?rs=1&pid=ImgDetMain" alt="">
        </div>
        <div class="text-center mt-3 name">
            Welcome Back, Master
        </div>
        <form action="{{ route('login') }}" method="POST" class="p-3 mt-3">
            @csrf
            @if ($errors->any())
                <div class="alert alert-danger" role="alert">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="email" class="form-control" placeholder="Username">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password">
            </div>
            <button class="btn mt-2">Login</button>
        </form>
    </div>
@endsection
