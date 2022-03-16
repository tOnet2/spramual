<nav class="py-2 bg-light border-bottom">
    <div class="container-xl d-flex flex-wrap">
        <ul class="nav me-auto">
            <li class="nav-item"><a href="{{ route('home') }}" class="nav-link link-dark px-2 active" aria-current="page">Home</a></li>
        </ul>
        <ul class="nav">
            @auth
            <li class="nav-item"><a href="#" class="nav-link link-dark px-2">Добавить пластинку</a></li>
            <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link link-dark px-2">Выход</a></li>
            @endauth
            @guest
            <li class="nav-item"><a href="{{ route('login') }}" class="nav-link link-dark px-2">Войти</a></li>
            <li class="nav-item"><a href="{{ route('registration') }}" class="nav-link link-dark px-2">Регистрация</a></li>
            @endguest
        </ul>
    </div>
</nav>
<header class="py-3 mb-4 border-bottom">
    <div class="container-xl d-flex flex-wrap justify-content-center">
        @auth
        <div class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">
            <img src="{{ 'storage/' . auth()->user()->avatar }}" alt="Bootstrap" width="50" height="50">
            <span class="fs-4 mx-2">{{ auth()->user()->name }}</span>
        </div>
        @endauth
        <form class="col-12 col-lg-auto mb-3 mb-lg-0 d-flex">
            <input type="search" class="form-control" placeholder="Жанр" aria-label="Search">
            <button class="btn btn-outline-success ms-2" type="submit">Поиск</button>
        </form>
    </div>
</header>
<div class="container-xl">
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
</div>
