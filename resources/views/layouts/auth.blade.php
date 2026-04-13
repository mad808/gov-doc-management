<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title') - GovConnect</title>

    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: #eef2f7;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
            font-family: 'Segoe UI', system-ui, sans-serif;
        }

        .auth-wrapper {
            display: flex;
            width: 100%;
            max-width: 860px;
            border-radius: 20px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.12);
        }

        /* ── Left panel ── */
        .auth-side {
            width: 230px;
            flex-shrink: 0;
            background: linear-gradient(160deg, #0d47a1 0%, #1565c0 100%);
            padding: 40px 24px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: space-between;
        }

        .auth-brand {
            text-align: center;
            color: #fff;
        }

        .brand-icon {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.15);
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 14px;
            font-size: 28px;
        }

        .auth-brand h2 {
            font-size: 20px;
            font-weight: 600;
            margin: 0;
        }

        .auth-brand p {
            font-size: 11px;
            opacity: 0.65;
            margin: 4px 0 0;
        }

        .auth-side-bottom {
            text-align: center;
        }

        .lang-switcher {
            display: flex;
            gap: 6px;
            justify-content: center;
            margin-bottom: 14px;
        }

        .lang-switcher a {
            font-size: 11px;
            color: rgba(255, 255, 255, 0.6);
            text-decoration: none;
            padding: 3px 8px;
            border-radius: 10px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all .15s;
        }

        .lang-switcher a:hover,
        .lang-switcher a.active {
            color: #fff;
            border-color: rgba(255, 255, 255, 0.7);
        }

        .github-link {
            display: flex;
            align-items: center;
            gap: 5px;
            color: rgba(255, 255, 255, 0.5);
            font-size: 10px;
            text-decoration: none;
            justify-content: center;
            transition: color .15s;
        }

        .github-link:hover {
            color: rgba(255, 255, 255, 0.9);
        }

        .github-link i {
            font-size: 13px;
        }

        /* ── Right panel ── */
        .auth-body {
            flex: 1;
            background: #fff;
            padding: 40px 36px;
            overflow-y: auto;
        }

        .auth-badge {
            display: inline-block;
            background: #e8f0fe;
            color: #1a56db;
            font-size: 10px;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-transform: uppercase;
            padding: 3px 10px;
            border-radius: 20px;
            margin-bottom: 14px;
        }

        .auth-body h3 {
            font-size: 22px;
            font-weight: 700;
            color: #111;
            margin: 0 0 4px;
        }

        .auth-subtitle {
            font-size: 13px;
            color: #6b7280;
            margin-bottom: 24px;
        }

        /* ── Form elements ── */
        .field-label {
            display: block;
            font-size: 11px;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: #6b7280;
            margin-bottom: 6px;
        }

        .input-icon-wrap {
            position: relative;
        }

        .input-icon-wrap .field-icon {
            position: absolute;
            left: 11px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            font-size: 14px;
            pointer-events: none;
        }

        .input-icon-wrap .form-control,
        .input-icon-wrap .form-select {
            padding-left: 34px;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            background: #f9fafb;
            font-size: 14px;
            height: 42px;
            transition: border-color .15s, background .15s;
        }

        .input-icon-wrap .form-control:focus,
        .input-icon-wrap .form-select:focus {
            border-color: #1565c0;
            background: #fff;
            box-shadow: 0 0 0 3px rgba(21, 101, 192, 0.08);
        }

        .btn-auth-primary {
            width: 100%;
            padding: 11px;
            background: #1565c0;
            color: #fff;
            border: none;
            border-radius: 8px;
            font-size: 14px;
            font-weight: 600;
            cursor: pointer;
            transition: background .15s;
            margin-top: 6px;
        }

        .btn-auth-primary:hover {
            background: #0d47a1;
        }

        .auth-divider {
            text-align: center;
            font-size: 12px;
            color: #9ca3af;
            margin: 16px 0 8px;
        }

        .auth-switch {
            text-align: center;
            font-size: 13px;
            color: #6b7280;
        }

        .auth-switch a {
            color: #1565c0;
            font-weight: 600;
            text-decoration: none;
        }

        /* ── Responsive ── */
        @media (max-width: 640px) {
            .auth-side {
                display: none;
            }

            .auth-wrapper {
                max-width: 420px;
            }

            .auth-body {
                padding: 32px 24px;
            }
        }
    </style>
</head>

<body>

    <div class="auth-wrapper animate__animated animate__fadeInUp animate__faster">

        {{-- Left brand panel --}}
        <div class="auth-side">
            <div class="auth-brand">
                <div class="brand-icon">
                    <i class="bi bi-shield-lock-fill text-white"></i>
                </div>
                <h2>GovConnect</h2>
                <p>Internal Document System</p>
            </div>

            <div class="auth-side-bottom">
                <div class="lang-switcher">
                    <a href="{{ url('lang/tk') }}" class="{{ app()->getLocale() == 'tk' ? 'active' : '' }}">TM</a>
                    <a href="{{ url('lang/ru') }}" class="{{ app()->getLocale() == 'ru' ? 'active' : '' }}">RU</a>
                    <a href="{{ url('lang/en') }}" class="{{ app()->getLocale() == 'en' ? 'active' : '' }}">EN</a>
                </div>
                <a href="https://mad808.github.io/" target="_blank" class="github-link">
                    <i class="bi bi-github"></i> mad808.github.io
                </a>
            </div>
        </div>

        {{-- Right form panel --}}
        <div class="auth-body">
            @yield('content')
        </div>

    </div>

    <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
