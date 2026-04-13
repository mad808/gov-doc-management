<header class="navbar navbar-expand-md navbar-light bg-white border-bottom py-2 px-4 sticky-top shadow-sm">
    <div class="container-fluid">

        <!-- LEFT SIDE: System Clock & Date Box -->
        <div class="d-none d-md-block">
            <div class="d-flex align-items-center bg-light px-3 py-1 rounded-pill border">
                <!-- Date -->
                <div class="d-flex align-items-center me-3">
                    <i class="bi bi-calendar-event text-primary me-2"></i>
                    <span class="text-dark small fw-bold" style="letter-spacing: 0.5px;">
                        {{ date('d.m.Y') }}
                    </span>
                </div>

                <!-- Vertical Divider -->
                <div class="vr text-muted opacity-25" style="height: 15px;"></div>

                <!-- Live Clock -->
                <div class="d-flex align-items-center ms-3">
                    <i
                        class="bi bi-clock-history text-primary me-2 animate__animated animate__pulse animate__infinite"></i>
                    <span id="live-clock" class="text-dark small fw-bold font-monospace" style="min-width: 70px;">
                        00:00:00
                    </span>
                </div>
            </div>
        </div>

        <!-- RIGHT SIDE: Actions & Profile -->
        <div class="ms-auto d-flex align-items-center">

            <!-- Language Selector -->
            <div class="dropdown me-3">
                <button
                    class="btn btn-sm btn-light border dropdown-toggle fw-bold text-uppercase d-flex align-items-center lang-btn"
                    type="button" data-bs-toggle="dropdown">
                    <i class="bi bi-globe2 text-primary me-2"></i> {{ app()->getLocale() }}
                </button>
                <ul
                    class="dropdown-menu dropdown-menu-end shadow border-0 mt-2 animate__animated animate__fadeInUp animate__faster">
                    <li>
                        <h6 class="dropdown-header small text-uppercase fw-bold">{{ __('Select Language') }}</h6>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center @if (app()->getLocale() == 'tk') active @endif"
                            href="{{ url('lang/tk') }}">
                            <span class="me-2">🇹🇲</span> Türkmençe</a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center @if (app()->getLocale() == 'ru') active @endif"
                            href="{{ url('lang/ru') }}">
                            <span class="me-2">🇷🇺</span> Русский</a>
                    </li>
                    <li><a class="dropdown-item d-flex align-items-center @if (app()->getLocale() == 'en') active @endif"
                            href="{{ url('lang/en') }}">
                            <span class="me-2">🇺🇸</span> English</a>
                    </li>
                </ul>
            </div>

            <!-- Profile Dropdown -->
            <div class="dropdown border-start ps-3">
                <a href="#" class="d-flex align-items-center text-decoration-none dropdown-toggle user-dropdown"
                    data-bs-toggle="dropdown">
                    <div class="text-end me-3 d-none d-sm-block">
                        <div class="fw-bold text-dark small lh-1">{{ auth()->user()->full_name }}</div>
                        <span class="text-muted" style="font-size: 0.65rem;">
                            {{ auth()->user()->department->name ?? __('Government Office') }}
                        </span>
                    </div>

                    <div class="position-relative">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center fw-bold shadow-sm"
                            style="width: 40px; height: 40px; border: 2px solid #fff;">
                            {{ substr(auth()->user()->full_name, 0, 1) }}
                        </div>
                        <span
                            class="position-absolute bottom-0 end-0 p-1 bg-success border border-white rounded-circle">
                            <span class="visually-hidden">Online</span>
                        </span>
                    </div>
                </a>

                <ul class="dropdown-menu dropdown-menu-end shadow border-0 mt-3 p-2 animate__animated animate__fadeInUp animate__faster"
                    style="min-width: 200px;">
                    <li>
                        <div class="dropdown-header text-center py-3">
                            <div class="fw-bold text-dark">{{ auth()->user()->full_name }}</div>
                            <div class="badge bg-primary-subtle text-primary border border-primary-subtle mt-1">
                                {{ strtoupper(auth()->user()->role_level) }}
                            </div>
                        </div>
                    </li>
                    <li>
                        <hr class="dropdown-divider opacity-50">
                    </li>
                    <li><a class="dropdown-item rounded-2 py-2" href="{{ route('profile') }}">
                            <i class="bi bi-person-bounding-box me-2 text-primary"></i> {{ __('Profile') }}</a>
                    </li>
                    <li><a class="dropdown-item rounded-2 py-2" href="#">
                            <i class="bi bi-shield-lock me-2 text-primary"></i> {{ __('Security') }}</a>
                    </li>
                    <li>
                        <hr class="dropdown-divider opacity-50">
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="dropdown-item text-danger fw-bold rounded-2 py-2">
                                <i class="bi bi-power me-2"></i> {{ __('Logout') }}
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</header>

<style>
    /* Premium Header Styles */
    .sticky-top {
        backdrop-filter: blur(10px);
        background-color: rgba(255, 255, 255, 0.95) !important;
    }

    .lang-btn:hover {
        background-color: #f8f9fa;
        border-color: #0d6efd !important;
        color: #0d6efd !important;
    }

    .user-dropdown {
        transition: all 0.2s ease;
        padding: 5px 10px;
        border-radius: 50px;
    }

    .user-dropdown:hover {
        background-color: #f8f9fa;
    }

    .dropdown-item {
        transition: all 0.2s ease;
    }

    .dropdown-item:hover {
        background-color: #f0f4f8;
        transform: translateX(3px);
    }

    .dropdown-item.active {
        background-color: #0d6efd !important;
    }

    .font-monospace {
        font-family: 'Courier New', Courier, monospace;
    }
</style>

<!-- JavaScript for Live Clock -->
<script>
    function updateClock() {
        const now = new Date();
        const hours = String(now.getHours()).padStart(2, '0');
        const minutes = String(now.getMinutes()).padStart(2, '0');
        const seconds = String(now.getSeconds()).padStart(2, '0');

        document.getElementById('live-clock').textContent = `${hours}:${minutes}:${seconds}`;
    }
    setInterval(updateClock, 1000);
    updateClock();
</script>
