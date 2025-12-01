<div>


    <section class="dashboard-section">
        <div class="content dashboard-content">
            <div class="container-fluid pt-4 dashboard-container">
                @include('backend.template.header')
                @include('backend.template.sidebar')

                @cannot('dashboard.view')
                    <div class="container my-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-10">

                                <div class="p-4 shadow-lg rounded-4 animate__animated animate__zoomIn">

                                    {{-- Top Section: Logo & Address --}}
                                    <div class="d-flex align-items-center justify-content-between flex-wrap mb-4">
                                        <div class="d-flex align-items-center">
                                            @if ($setting->logo)
                                                <img src="{{ asset('storage/' . $setting->logo) }}" alt="logo"
                                                    class="rounded-circle shadow-sm me-3 top-header-logo">
                                            @endif
                                            <div>
                                                <h5 class="text-dark fw-semibold mb-1">Organization Address</h5>
                                                <p class="mb-0 text-muted small">
                                                    {!! str_replace(',,', '<br>', e($setting->address)) !!}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Welcome Message --}}
                                    <div class="mb-4">
                                        <h2 class="fw-bold text-gradient mb-1"
                                            style="background: linear-gradient(to right, #00b09b, #96c93d); -webkit-background-clip: text; -webkit-text-fill-color: transparent;">
                                            Welcome, {{ $profile->name ?? 'Guest' }}!
                                        </h2>
                                        <p class="text-muted mb-0 fs-6">
                                            You’re successfully logged in. Here’s a quick overview of your profile.
                                        </p>
                                    </div>

                                    {{-- Profile Info --}}
                                    <div class="d-flex align-items-center p-3 rounded-3">

                                        @if ($profile && $profile->image && $profile->image !== $default)
                                            <img src="{{ asset('storage/' . $profile->image) }}" alt="avatar"
                                                class="rounded-circle me-3 shadow" width="65" height="65"
                                                style="object-fit: cover;">
                                        @else
                                            <img src="{{ asset('backend/images/avatar.jpg') }}" alt="default avatar"
                                                class="rounded-circle me-3 shadow" width="65" height="65">
                                        @endif

                                        <div>
                                            <h5 class="mb-1 fw-bold text-dark">{{ $profile->name }}</h5>
                                            <div class="d-flex flex-wrap">
                                                @foreach ($roles as $role)
                                                    <span class="btn btn-sm bg-success-light mr-2 shadow-sm"
                                                        style="font-size: 0.85rem;">
                                                        <i class="fas fa-user-shield"></i> {{ ucfirst($role) }}
                                                    </span>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>

                                </div> <!-- End Card -->
                            </div>
                        </div>
                    </div>
                @endcannot
                {{-- Today Balance Status --}}
                @can('dashboard.view')
                    <div class="row g-2 mb-2">
                        <div class="d-flex align-items-center mb-1">
                            <div class="icon-animate me-2">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <span class="fw-bold mb-0 me-2">Today Balance Status</span>
                            <div class="flex-grow-1 border-bottom border-1 dashboard-hr"></div>
                        </div>

                        {{-- Today Sales --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-sky-blue text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $todaySales }}</h2>
                                        <h5 class="fs-6 m-0">Today Sales</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/history-bills" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-sky-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{-- Today Profit --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $todayProfit }}</h2>
                                        <h5 class="fs-6 m-0">Today Sales Profit</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/history-bills" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        {{-- Today Expense --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia-orange text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $todayExpense }}</h2>
                                        <h5 class="fs-6 m-0">Today Expense</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/all-expenses" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity-orange text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        {{-- Today Profit --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-red text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $todayNetProfit }}</h2>
                                        <h5 class="fs-6 m-0">Today Profit</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/history-bills" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-red-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endcan

                {{-- This Month Balance Status --}}
                @can('dashboard.view')
                    <div class="row g-2 mb-2 mt-2">
                        <div class="d-flex align-items-center mb-1">
                            <div class=" me-2">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <span class="fw-bold mb-0 me-2">This Month Balance Status</span>
                            <div class="flex-grow-1 border-bottom border-1 dashboard-hr"></div>
                        </div>

                        {{-- This Month Sales --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $thisMonthSales }}</h2>
                                        <h5 class="fs-6 m-0">This Month Sales</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/history-bills" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{-- This Month Profit --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia-orange text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $thisMonthProfit }}</h2>
                                        <h5 class="fs-6 m-0">This Month Sales Profit</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/history-bills" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity-orange text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        {{-- This Month Expense --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-sky-blue text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $thisMonthExpense }}</h2>
                                        <h5 class="fs-6 m-0">This Month Expense</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/all-expenses" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-sky-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        {{-- This Month Profit --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia-rose text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $thisMonthNetProfit }}</h2>
                                        <h5 class="fs-6 m-0">This Month Profit</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/history-bills" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity-rose text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endcan

                {{-- Prev Month Balance Status --}}
                @can('dashboard.view')
                    <div class="row g-2 mb-2">
                        <div class="d-flex align-items-center mb-1">
                            <div class="me-2">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <span class="fw-bold mb-0 me-2">Prev Month Balance Status</span>
                            <div class="flex-grow-1 border-bottom border-1 dashboard-hr"></div>
                        </div>
                        {{-- Prev Month Sales --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia-orange text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $prevMonthSales }}</h2>
                                        <h5 class="fs-6 m-0">Prev Month Sales</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/history-bills" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity-orange text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{-- Prev Month Profit --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $prevMonthProfit }}</h2>
                                        <h5 class="fs-6 m-0">Prev Month Sales Profit</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/history-bills" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        {{-- Prev Month Expense --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-cyan text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $prevMonthExpense }}</h2>
                                        <h5 class="fs-6 m-0">Prev Month Expense</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/all-expenses" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-cyan-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        {{-- Prev Month Profit --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-green text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $prevMonthNetProfit }}</h2>
                                        <h5 class="fs-6 m-0">Prev Month Profit</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/history-bills" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-green-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endcan

                {{-- Total Balance Status --}}
                @can('dashboard.view')
                    <div class="row g-2 mb-2">
                        <div class="d-flex align-items-center mb-1">
                            <div class="me-2">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <span class="fw-bold mb-0 me-2">Total Hospital Balance Status</span>
                            <div class="flex-grow-1 border-bottom border-1 dashboard-hr"></div>
                        </div>
                        {{-- Total Hospital Sales --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-sky-blue text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $totalSales }}</h2>
                                        <h5 class="fs-6 m-0">Total Sales</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/history-bills" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-sky-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{-- Total Hospital Profit --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $totalProfit }}</h2>
                                        <h5 class="fs-6 m-0">Total Sales Profit</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/history-bills" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        {{-- Total Hospital Expense --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia-orange text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $totalExpense }}</h2>
                                        <h5 class="fs-6 m-0">Total Expense</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/all-expenses" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity-orange text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        {{-- Total Hospital Profit --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-sky-blue text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $totalNetProfit }}</h2>
                                        <h5 class="fs-6 m-0">Total Hospital Profit</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/history-bills" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-sky-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endcan

                {{-- Discount Status --}}
                @can('dashboard.view')
                    <div class="row g-2 mb-2">
                        <div class="d-flex align-items-center mb-1">
                            <div class="me-2">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <span class="fw-bold mb-0 me-2">Discount Status</span>
                            <div class="flex-grow-1 border-bottom border-1 dashboard-hr"></div>
                        </div>
                        {{-- Today Discount --}}
                        <div class="col-md-6 col-lg-4">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-sky-blue text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $todayDiscount }}</h2>
                                        <h5 class="fs-6 m-0">Today Discount</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/history-bills" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-sky-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{-- Weekly Discount --}}
                        <div class="col-md-6 col-lg-4">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $weeklyDiscount }}</h2>
                                        <h5 class="fs-6 m-0">Weekly Discount</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/history-bills" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        {{-- This Month Discount --}}
                        <div class="col-md-6 col-lg-4">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia-orange text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $thisMonthDiscount }}</h2>
                                        <h5 class="fs-6 m-0">This Month Discount</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/history-bills" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity-orange text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        {{-- Previous Month Discount --}}
                        <div class="col-md-6 col-lg-4">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-red text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $prevMonthDiscount }}</h2>
                                        <h5 class="fs-6 m-0">Previous Month Discount</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/history-bills" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-red-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{-- Yearly Discount --}}
                        <div class="col-md-6 col-lg-4">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-green text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $yearlyDiscount }}</h2>
                                        <h5 class="fs-6 m-0">Yearly Discount</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/history-bills" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-green-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{-- Total Discount --}}
                        <div class="col-md-6 col-lg-4">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-cyan text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $totalDiscount }}</h2>
                                        <h5 class="fs-6 m-0">Total Discount</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/history-bills" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-cyan-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endcan

                {{-- Other data calculation --}}
                @can('dashboard.view')
                    <div class="row g-2 mb-2">
                        <div class="d-flex align-items-center mb-1">
                            <div class="me-2">
                                <i class="fa-solid fa-chart-line"></i>
                            </div>
                            <span class="fw-bold mb-0 me-2">Other Information</span>
                            <div class="flex-grow-1 border-bottom border-1 dashboard-hr"></div>
                        </div>
                        {{-- Total Doctor --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-sky-blue text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $totalDoctor }}</h2>
                                        <h5 class="fs-6 m-0">Total Doctor</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/all-doctors" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-sky-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{-- Total Doctor Commision --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $totalDoctorCommission }}</h2>
                                        <h5 class="fs-6 m-0">Total Doctor Commision</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/doctor-commision" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        {{-- Total Marketing --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia-orange text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $totalMarketing }}</h2>
                                        <h5 class="fs-6 m-0">Total Marketing</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/all-marketings" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity-orange text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>

                        {{-- Total Marketing Commision --}}
                        <div class="col-md-6 col-lg-6">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-sky-blue text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $totalMarketingCommission }}</h2>
                                        <h5 class="fs-6 m-0">Total Mark.Commision</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/marketing-commision" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-sky-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                        {{-- Total Patient --}}
                        <div class="col-md-12">
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-sky-blue text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $totalPatient }}</h2>
                                        <h5 class="fs-6 m-0">Total Patients</h5>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-bangladeshi-taka-sign"></i>
                                    </h1>
                                </div>
                                <a href="/all-patients" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-sky-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                @endcan



                <div class="row g-4">
                    <!-- Card 1 -->
                    <div class="col-md-6 col-lg-4">
                        @can('blogs.view')
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $post }}</h2>
                                        <h2 class="fs-6 m-0">Total Posts</h2>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-folder"></i>
                                    </h1>
                                </div>
                                <a href="/all-blogs" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        @endcan
                    </div>

                    <!-- Card 2 -->
                    <div class="col-md-6 col-lg-4">
                        @can('notice.view')
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $notice }}</h2>
                                        <h2 class="fs-6 m-0">Total Notice</h2>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-folder"></i>
                                    </h1>
                                </div>
                                <a href="/all-notices" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        @endcan
                    </div>

                    <!-- Card 3 -->
                    <div class="col-md-6 col-lg-4">
                        @can('courses.view')
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia-orange text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $course }}</h2>
                                        <h2 class="fs-6 m-0">Total Courses</h2>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-folder"></i>
                                    </h1>
                                </div>
                                <a href="/all-courses" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity-orange text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        @endcan
                    </div>

                    <!-- Card 4 -->
                    <div class="col-md-6 col-lg-4">
                        @can('videos.view')
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia-rose text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $video }}</h2>
                                        <h2 class="fs-6 m-0">Total Videos</h2>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-folder"></i>
                                    </h1>
                                </div>
                                <a href="/all-videos" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity-rose text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        @endcan
                    </div>

                    <!-- Card 5 -->
                    <div class="col-md-6 col-lg-4">
                        @can('messages.view')
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia-rose text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $message }}</h2>
                                        <h2 class="fs-6 m-0">Total Message</h2>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-folder"></i>
                                    </h1>
                                </div>
                                <a href="/all-messages" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity-rose text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        @endcan
                    </div>

                    <!-- Card 6 -->
                    <div class="col-md-6 col-lg-4">
                        @can('teams.view')
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia-orange text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $team }}</h2>
                                        <h2 class="fs-6 m-0">Total Teams</h2>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-folder"></i>
                                    </h1>
                                </div>
                                <a href="/all-teams" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity-orange text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        @endcan
                    </div>

                    <!-- Card 7 -->
                    <div class="col-md-6 col-lg-4">
                        @can('users.view')
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-sky-blue text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $user }}</h2>
                                        <h2 class="fs-6 m-0">Total Users</h2>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-folder"></i>
                                    </h1>
                                </div>
                                <a href="/all-users" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-sky-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        @endcan
                    </div>

                    <!-- Card 8 -->
                    <div class="col-md-6 col-lg-4">
                        @can('noc.view')
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-sky-blue text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $noc }}</h2>
                                        <h2 class="fs-6 m-0">Total NOC</h2>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-folder"></i>
                                    </h1>
                                </div>
                                <a href="/noc-notices" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-sky-opacity text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        @endcan
                    </div>

                    <!-- Card 9 -->
                    <div class="col-md-6 col-lg-4">
                        @can('apa.view')
                            <div class="rounded overflow-hidden">
                                <div
                                    class="bg-fuchsia-orange text-white p-4 d-flex justify-content-between align-items-center hover-box">
                                    <div class="d-flex flex-column gap-2">
                                        <h2 class="h2 fw-semibold m-0">{{ $apa }}</h2>
                                        <h2 class="fs-6 m-0">Total APA</h2>
                                    </div>
                                    <h1 class="fs-1 opacity-50 m-0 icon-zoom">
                                        <i class="fa-solid fa-folder"></i>
                                    </h1>
                                </div>
                                <a href="/apa-notices" class="text-decoration-none" wire:navigate>
                                    <div
                                        class="bg-fuchsia-opacity-orange text-white p-2 d-flex justify-content-center align-items-center gap-2 small">
                                        <span>More Info</span>
                                        <span><i class="fa-solid fa-circle-right"></i></span>
                                    </div>
                                </a>
                            </div>
                        @endcan
                    </div>

                </div>
            </div>
        </div>
    </section>



</div>
