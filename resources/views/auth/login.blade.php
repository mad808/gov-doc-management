@extends('layouts.auth')

@section('title', __('login_title'))

@section('content')

    <span class="auth-badge">{{ __('secure_access') }}</span>
    <h3>{{ __('welcome_back') }}</h3>
    <p class="auth-subtitle">{{ __('login_subtitle') }}</p>

    @if ($errors->any())
        <div class="alert alert-danger py-2 mb-3 small">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="field-label">{{ __('username') }}</label>
            <div class="input-icon-wrap">
                <i class="bi bi-person field-icon"></i>
                <input type="text" name="username" class="form-control"
                    placeholder="{{ __('username_placeholder') }}" value="{{ old('username') }}" required autofocus>
            </div>
        </div>

        <div class="mb-3">
            <label class="field-label">{{ __('password') }}</label>
            <div class="input-icon-wrap">
                <i class="bi bi-lock field-icon"></i>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" name="remember" class="form-check-input" id="remember">
            <label class="form-check-label small text-muted" for="remember">
                {{ __('remember_me') }}
            </label>
        </div>

        <button type="submit" class="btn-auth-primary">{{ __('sign_in') }}</button>

        <p class="auth-divider">{{ __('no_account') }}</p>
        <p class="auth-switch">
            <a href="{{ route('register') }}">{{ __('create_one') }} →</a>
        </p>
    </form>

@endsection
