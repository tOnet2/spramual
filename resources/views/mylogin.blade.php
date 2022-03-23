@extends('layouts.layout')

@section('content')
    <div class="container-xl">
        <div class="container-xl d-flex justify-content-center">
            <form action="{{ route('login.send') }}" class="mt-4 col-md-6" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="email" class="form-label">Почта</label>
                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
                </div>
                <div class="mb-3">
                    <label for="password" class="form-label">Пароль</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>

                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary text-black w-50">Войти</button>
                </div>
            </form>
        </div>
    </div>
@endsection
