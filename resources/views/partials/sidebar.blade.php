<div id="sidebar" class="text-white shadow-lg d-flex flex-column"
    style="background: #1a1d21; border-right: 1px solid #2d3238;">

    <!-- Branding Header -->
    <div class="p-4 text-center" style="background: linear-gradient(180deg, #212529 0%, #1a1d21 100%);">
        <div class="mb-2">
            <div class="d-inline-block p-2 rounded-3 bg-primary bg-opacity-10 mb-2">
                <i class="bi bi-shield-check text-primary fs-3"></i>
            </div>
            <h4 class="fw-bold mb-0 tracking-tighter text-uppercase" style="letter-spacing: 2px;">
                Gov<span class="text-primary">Doc</span>
            </h4>
        </div>
        <div class="small opacity-50 fw-bold" style="font-size: 0.7rem;">
            <i class="bi bi-circle-fill text-success me-1" style="font-size: 0.5rem;"></i>
            {{ auth()->user()->department->name ?? 'CENTRAL UNIT' }}
        </div>
    </div>

    <!-- Navigation Area -->
    <div class="flex-grow-1 overflow-auto py-3 custom-scrollbar">
        <nav class="nav flex-column px-3">

            <!-- Category Title -->
            <div class="ps-3 mb-2 small text-uppercase text-secondary fw-bold"
                style="font-size: 0.65rem; letter-spacing: 1px;">
                {{ __('Main Menu') }}
            </div>

            <a href="{{ route('dashboard') }}"
                class="nav-link side-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="bi bi-grid-1x2"></i> <span>{{ __('Dashboard') }}</span>
            </a>

            <a href="{{ route('docs.index') }}"
                class="nav-link side-link {{ request()->routeIs('docs.*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-lock"></i> <span>{{ __('Documents') }}</span>
            </a>

            <a href="{{ route('chat.index') }}"
                class="nav-link side-link {{ request()->routeIs('chat.*') ? 'active' : '' }}">
                <i class="bi bi-chat-dots"></i> <span>{{ __('Messaging') }}</span>
                <span class="badge bg-primary ms-auto rounded-pill" style="font-size: 0.6rem;">New</span>
            </a>

            <!-- Admin Section -->
            @if (auth()->user()->role_level === 'admin')
                <div class="ps-3 mt-4 mb-2 small text-uppercase text-secondary fw-bold"
                    style="font-size: 0.65rem; letter-spacing: 1px;">
                    {{ __('Control Panel') }}
                </div>

                <a href="{{ route('admin.users.index') }}"
                    class="nav-link side-link {{ request()->routeIs('admin.users.*') ? 'active' : '' }}">
                    <i class="bi bi-people"></i> <span>{{ __('User Management') }}</span>
                </a>

                <a href="{{ route('admin.departments.index') }}"
                    class="nav-link side-link {{ request()->routeIs('admin.departments.*') ? 'active' : '' }}">
                    <i class="bi bi-building"></i> <span>{{ __('Departments') }}</span>
                </a>

                <a href="{{ route('admin.logs') }}"
                    class="nav-link side-link {{ request()->routeIs('admin.logs') ? 'active' : '' }}">
                    <i class="bi bi-shield-shaded"></i> <span>{{ __('System Logs') }}</span>
                </a>
            @endif
        </nav>
    </div>

    <!-- Developer Signature Footer -->
    <div class="p-3 mt-auto">
        <div class="rounded-3 p-3 text-center"
            style="background: rgba(255,255,255,0.03); border: 1px solid rgba(255,255,255,0.05);">
            <a href="https://mad808.github.io/" target="_blank" class="text-white text-decoration-none d-block">
                <div class="dev-signature fw-bold small mb-1">
                    <i class="bi bi-cpu text-primary me-1"></i> mad808
                </div>
                <div class="text-muted" style="font-size: 0.6rem;">{{ __('System Architect') }}</div>
            </a>
        </div>
    </div>
</div>

<style>
    /* Premium Sidebar Styles */
    .side-link {
        color: rgba(255, 255, 255, 0.6) !important;
        border-radius: 8px !important;
        margin-bottom: 5px;
        transition: all 0.2s ease;
        display: flex;
        align-items: center;
        font-size: 0.9rem;
        border-left: 3px solid transparent;
    }

    .side-link i {
        font-size: 1.1rem;
        width: 25px;
        margin-right: 12px;
        transition: transform 0.2s ease;
    }

    .side-link:hover {
        background: rgba(255, 255, 255, 0.05);
        color: #fff !important;
        transform: translateX(5px);
    }

    .side-link:hover i {
        color: #0d6efd;
        transform: scale(1.1);
    }

    .side-link.active {
        background: rgba(13, 110, 253, 0.15) !important;
        color: #fff !important;
        border-left: 3px solid #0d6efd;
        font-weight: 600;
    }

    .side-link.active i {
        color: #0d6efd;
    }

    .custom-scrollbar::-webkit-scrollbar {
        width: 4px;
    }

    .custom-scrollbar::-webkit-scrollbar-thumb {
        background: rgba(255, 255, 255, 0.1);
        border-radius: 10px;
    }
</style>
