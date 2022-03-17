@extends('layouts.layout')

@section('content')
    <div class="container-xl">
        @if ($albums)
            @foreach($albums as $album)
            <div class="p-4 p-md-5 mb-4 rounded bg-light position-relative">
                <div class="d-flex justify-content-between">
                    <div>
                        <h1 class="display-1 fst-italic">{{ $album->title }}</h1>
                        <h1 class="display-6">{{ $album->author }}</h1>
                        <h1 class="display-10 mt-4">{{ $album->genre->genre }}</h1>
                    </div>
                    <img src="{{ $album->photo ? "storage/" . $album->photo : "storage/images/no_image.jpg" }}" class="rounded float-end" alt="no_image" width="300" height="300">
                </div>
                <input type="checkbox" class="read-more-checker" id="read-more-checker">
                <div class="expand mb-4">
                    <p class="lead my-3">{{ $album->history }}</p>
                    <div class="btm"></div>
                </div>
                <label for="read-more-checker" class="read-more-button text-muted"></label>
                <div class="mt-2">
                    <small class="text-muted">
                        {{ $album->created_at->format('d-m-Y') . " UTC+3" }}
                    </small>
                    @auth
                        @if(auth()->user()->is_admin)
                        <a class="btn btn-primary btn-sm float-end" href="#" role="button">Удалить</a>
                        @endif
                    <a class="btn btn-primary btn-sm float-end mx-2" href="#" role="button">Редактировать</a>
                    @endauth
                </div>
            </div>
            @endforeach
            <div class="col-md-12 mt-5 d-flex justify-content-center">
                {{ $albums->oneachside(1)->links('vendor.pagination.bootstrap-4') }}
            </div>
        @endif
    </div>
@endsection
