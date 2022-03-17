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
    <div class="container-xl">
        <form class="mt-5" method="post" action="{{ route('addalbum.store') }}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Название</label>
                <input type="text" class="form-control" id="title" placeholder="Название" name="title" value="{{ old('title') }}">
            </div>
            <div class="mb-3">
                <label for="author" class="form-label">Автор</label>
                <input type="text" class="form-control" id="author" placeholder="Автор" name="author" value="{{ old('author') }}">
            </div>
            <div class="mb-3 mt-2">
                <label for="history" class="form-label">История альбома</label>
                <textarea class="form-control" id="history" name="history" placeholder="История" rows="5">{{ old('history') }}</textarea>
            </div>
            <label for="genre_id">Жанр альбома</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" id="genre_id" name="genre_id">
                <option>Выберите жанр</option>
                @if ($genres)
                    @foreach ($genres as $k => $v)
                        <option value="{{ $k }}" @if (old('genre_id') == $k) selected @endif>{{ $v }}</option>
                    @endforeach
                @endif
            </select>
            <div class="mb-3">
                <label for="photo" class="form-label">Фотография альбома</label>
                <input type="file" class="form-control file" id="photo" name="photo">
            </div>
            <div class="d-flex justify-content-center mt-4 col-md-4">
                <button type="submit" class="btn btn-primary text-black w-50">Добавить альбом</button>
            </div>

        </form>
    </div>
@endsection
