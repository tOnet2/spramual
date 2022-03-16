@extends('layouts.layout')

@section('content')
    <div class="container-xl mt-5">
        @if ($errors->any())
            <div class="alert alert-danger ">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>
    <div class="container-xl d-flex justify-content-center">
        <form action="{{ route('registration.store') }}" class="mt-4 col-md-6" method="post" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="name" class="form-label">Ваше имя</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Почта</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Пароль</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Повторите пароль</label>
                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
            </div>
            <div class="mb-3">
                <label for="avatar" class="form-label">Аватар (фотография/изображение профиля)</label>
                <input type="file" class="form-control file" id="avatar" name="avatar">
            </div>
            <div class="d-flex justify-content-center">
                <button type="submit" class="btn btn-primary text-black w-50">Зарегистрироваться</button>
            </div>
        </form>
    </div>
@endsection
