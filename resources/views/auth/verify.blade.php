@extends('layouts.layout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Подтвердите вашу почту.') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('Свежая ссылка подтверждения почты отправлена на указанный вами почтовый ящик.') }}
                        </div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif

                    {{ __('Прежде чем продолжить, нужно подтвердить регистрацию.') }}
                    <br>
                    {{ __('Если вы не получили письмо: ') }}
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf

                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('нажмите здесь что-бы отправить снова.') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
