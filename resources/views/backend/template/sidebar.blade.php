<div class="sidebar" id="sidebar">
    <div id="scroll-arrow" class="scroll-arrow" title="Scroll down"> <i class="fas fa-circle-arrow-down fa-bounce"></i>
    </div>
    @can('dashboard.view')
        <a href="/dashboard" class="nav-link mt-3 {{ Request::is('dashboard') ? 'active' : '' }}" wire:navigate>
            <i class="fas fa-home"></i> <span>Dashboard</span>
        </a>
    @endcan

    @can('indoor.view')
        <div class="nav-item">
            <a href="#" class="nav-link"
                :class="{
                    'active': window.location.pathname === '/all-beds' ||
                        window.location.pathname === '/all-hospital-level' ||
                        window.location.pathname === '/all-admission-list' ||
                        window.location.pathname === '/all-consent' ||
                        window.location.pathname === '/all-beds'
                }"
                onclick="toggleDropdown('indoorMenu')" data-scroll-top>
                <i class="fa-solid fa-hospital"></i> <span>Indoor</span>
            </a>

            <div class="submenu"
                :class="{
                    'open': window.location.pathname === '/all-beds' ||
                        window.location.pathname === '/all-hospital-level' ||
                        window.location.pathname === '/all-admission-list' ||
                        window.location.pathname === '/all-consent' ||
                        window.location.pathname === '/all-beds'
                }"
                id="indoorMenu">

                <a href="/all-hospital-level" class="nav-link"
                    :class="{
                        'sactive': window.location.pathname === '/all-hospital-level'
                    }"
                    wire:navigate data-scroll-top>
                    <i class="fa-solid fa-user-doctor"></i> Hospital
                </a>

                <a href="/all-admission-list" class="nav-link"
                    :class="{
                        'sactive': window.location.pathname === '/all-admission-list'
                    }"
                    wire:navigate data-scroll-top>
                    <i class="fa-solid fa-user-doctor"></i> Admission List
                </a>

                <a href="/all-consent" class="nav-link"
                    :class="{
                        'sactive': window.location.pathname === '/all-consent'
                    }"
                    wire:navigate data-scroll-top>
                    <i class="fa-regular fa-file-lines"></i> All Consent
                </a>

                <a href="/all-beds" class="nav-link"
                    :class="{
                        'sactive': window.location.pathname === '/all-beds'
                    }"
                    wire:navigate data-scroll-top>
                    <i class="fas fa-bed"></i> Beds
                </a>
            </div>

            <strong class="dropdown-toggle sidebar-toggle"></strong>
        </div>
    @endcan

    @can('doctors.view')
        <div class="nav-item">
            <a href="#" class="nav-link"
                :class="{
                    'active': window.location.pathname === '/all-doctors' ||
                        window.location.pathname === '/doctor-commision' ||
                        window.location.pathname === '/doctor-commision-list' ||
                        window.location.pathname === '/add-doctor' ||
                        window.location.pathname.startsWith('/edit-doctor') || window.location.pathname.startsWith(
                            '/doctor-histor') || window.location
                        .pathname === '/all-doctors'
                }"
                onclick="toggleDropdown('doctorManagementMenu')" data-scroll-top>
                <i class="fa-solid fa-user-doctor"></i> <span>Doctors</span>
            </a>

            <div class="submenu"
                :class="{
                    'open': window.location.pathname === '/all-doctors' ||
                        window.location.pathname === '/doctor-commision' ||
                        window.location.pathname === '/doctor-commision-list' ||
                        window.location.pathname === '/add-doctor' ||
                        window.location.pathname.startsWith('/edit-doctor') || window.location.pathname.startsWith(
                            '/doctor-histor') || window.location
                        .pathname === '/all-doctors'
                }"
                id="doctorManagementMenu">

                <a href="/all-doctors" class="nav-link"
                    :class="{
                        'sactive': window.location.pathname === '/all-doctors' || window.location
                            .pathname === '/add-doctor' || window.location.pathname.startsWith('/edit-doctor') || window
                            .location.pathname.startsWith('/doctor-histor') || window
                            .location
                            .pathname === '/all-doctors'
                    }"
                    wire:navigate data-scroll-top>
                    <i class="fa-solid fa-user-doctor"></i> Doctors
                </a>
                <a href="/doctor-commision-list" class="nav-link"
                    :class="{
                        'sactive': window.location.pathname === '/doctor-commision-list'
                    }"
                    wire:navigate data-scroll-top>
                    <i class="fa-solid fa-user-doctor"></i> Doc Com List
                </a>

                @can('commisions.view')
                    <a href="/doctor-commision" class="nav-link"
                        :class="{
                            'sactive': window.location.pathname === '/doctor-commision'
                        }"
                        wire:navigate data-scroll-top>
                        <i class="fa-solid fa-money-bill-wave"></i> Commision
                    </a>
                @endcan
            </div>

            <strong class="dropdown-toggle sidebar-toggle"></strong>
        </div>
    @endcan

    @can('patients.view')
        <div class="nav-item"
            :class="{
                'open-bg': window.location.pathname === '/all-patients' ||
                    window.location.pathname === '/all-patients-reports' ||
                    window.location.pathname === '/add-patient' ||
                    window.location.pathname.startsWith('/edit-patient') ||
                    (window.location.pathname.startsWith('/patient/') && window.location.pathname.endsWith('/reports'))
            }">

            <a href="#" class="nav-link"
                :class="{
                    'active': window.location.pathname === '/all-patients' ||
                        window.location.pathname === '/all-patients-reports' ||
                        window.location.pathname === '/add-patient' ||
                        window.location.pathname.startsWith('/edit-patient') ||
                        (window.location.pathname.startsWith('/patient/') && window.location.pathname.endsWith(
                            '/reports'))
                }"
                onclick="toggleDropdown('patientManagementMenu')" data-scroll-top>
                <i class="fas fa-user-injured"></i> <span>Patients</span>
            </a>

            <div class="submenu"
                :class="{
                    'open': window.location.pathname === '/all-patients' ||
                        window.location.pathname === '/all-patients-reports' ||
                        window.location.pathname === '/add-patient' ||
                        window.location.pathname.startsWith('/edit-patient') ||
                        (window.location.pathname.startsWith('/patient/') && window.location.pathname.endsWith(
                            '/reports'))
                }"
                id="patientManagementMenu">

                <a href="/all-patients" class="nav-link"
                    :class="{
                        'sactive': window.location.pathname === '/all-patients' ||
                            window.location.pathname === '/add-patient' ||
                            window.location.pathname.startsWith('/edit-patient')
                    }"
                    wire:navigate data-scroll-top>
                    <i class="fas fa-user-injured"></i> Patients
                </a>

                <a href="/all-patients-reports" class="nav-link"
                    :class="{
                        'sactive': window.location.pathname === '/all-patients-reports' ||
                            (window.location.pathname.startsWith('/patient/') && window.location.pathname.endsWith(
                                '/reports'))
                    }"
                    wire:navigate data-scroll-top>
                    <i class="fas fa-book"></i> Patient Reports
                </a>
            </div>

            <strong class="dropdown-toggle sidebar-toggle"></strong>
        </div>
    @endcan
    @can('bill.view')
        <div class="nav-item"
            :class="{
                'open-bg': window.location.pathname.startsWith('/add-bill') ||
                    window.location.pathname.startsWith('/all-bill') ||
                    window.location.pathname.startsWith('/surgery-bill') ||
                    window.location.pathname.startsWith('/history-bills') ||
                    window.location.pathname.startsWith('/test-history') ||
                    window.location.pathname.startsWith('/bill/invoice')
            }">

            <a href="#" class="nav-link"
                :class="{
                    'active': window.location.pathname.startsWith('/add-bill') ||
                        window.location.pathname.startsWith('/all-bill') ||
                        window.location.pathname.startsWith('/surgery-bill') ||
                        window.location.pathname.startsWith('/history-bills') ||
                        window.location.pathname.startsWith('/test-history') ||
                        window.location.pathname.startsWith('/bill/invoice')
                }"
                onclick="toggleDropdown('billManagementMenu')" data-scroll-top>
                <i class="fa-solid fa-money-bill"></i> <span>Bill</span>
            </a>

            <div class="submenu"
                :class="{
                    'open': window.location.pathname.startsWith('/add-bill') ||
                        window.location.pathname.startsWith('/all-bill') ||
                        window.location.pathname.startsWith('/surgery-bill') ||
                        window.location.pathname.startsWith('/history-bills') ||
                        window.location.pathname.startsWith('/test-history') ||
                        window.location.pathname.startsWith('/bill/invoice')
                }"
                id="billManagementMenu">

                @can('bill.view')
                    <a href="/add-bill"
                        :class="{
                            'sactive': window.location.pathname.startsWith('/add-bill') ||
                                window.location.pathname.startsWith('/all-bill')
                        }"
                        class="nav-link" wire:navigate data-scroll-top>
                        <i class="fa-solid fa-money-bill"></i> Bill
                    </a>
                @endcan
                @can('indoor.view')
                    <a href="/surgery-bill"
                        :class="{
                            'sactive': window.location.pathname.startsWith('/surgery-bill') ||
                                window.location.pathname.startsWith('/surgery-bill')
                        }"
                        class="nav-link" wire:navigate data-scroll-top>
                        <i class="fa-solid fa-money-bill"></i> Operation Bill
                    </a>
                @endcan

                @can('bill_history.view')
                    <a href="/history-bills"
                        :class="{
                            'sactive': window.location.pathname.startsWith('/history-bills') ||
                                window.location.pathname.startsWith('/bill/invoice')
                        }"
                        class="nav-link" wire:navigate data-scroll-top>
                        <i class="fa-solid fa-clock-rotate-left"></i> Bill History
                    </a>
                @endcan

                @can('bill_history.view')
                    <a href="/test-history"
                        :class="{
                            'sactive': window.location.pathname.startsWith('/test-history')
                        }"
                        class="nav-link" wire:navigate data-scroll-top>
                        <i class="fa-solid fa-clock-rotate-left"></i> Test History
                    </a>
                @endcan
            </div>

            <strong class="dropdown-toggle sidebar-toggle"></strong>
        </div>

    @endcan

    @can('invoice.view')
        <a href="/bills"
            :class="{
                'active': window.location.pathname.startsWith('/bills') || window.location.pathname.startsWith(
                    '/bill/view') || window.location.pathname.startsWith(
                    '/bill/update') || window.location.pathname === '/bills'
            }"
            class="nav-link" wire:navigate data-scroll-top>
            <i class="fa-solid fa-file-invoice"></i> Invoice
        </a>
    @endcan

    @can('reports.view')
        <a href="/all-reports"
            :class="{
                'active': window.location.pathname.startsWith('/all-reports') || window.location.pathname.startsWith(
                    '/add-report') || window.location.pathname.startsWith('/edit-report')
            }"
            class="nav-link d-flex justify-content-between align-items-center" wire:navigate data-scroll-top>
            <div class="d-flex align-items-center">
                <i class="fa-regular fa-file-lines me-2"></i>
                <span>Report</span>
            </div>

            @if ($sidebarPendingCount > 0)
                <span class="badge bg-danger rounded-pill px-2 py-1">
                    {{ $sidebarPendingCount }}
                </span>
            @endif
        </a>
    @endcan

    @can('reports_delivery.view')
        <a href="/all-patients-reports"
            :class="{
                'active': window.location.pathname.startsWith('/all-patients-reports')
            }"
            class="nav-link" wire:navigate data-scroll-top>
            <i class="fa-regular fa-file-lines"></i> Report Delivery
        </a>
    @endcan

    @can('investigations.view')
        <div class="nav-item"
            :class="{
                'open-bg': window.location.pathname === '/all-investigations' ||
                    window.location.pathname === '/test-forms' ||
                    window.location.pathname === '/add-investigation' ||
                    window.location.pathname.startsWith('/edit-investigation') ||
                    window.location.pathname.startsWith('/edit-testform')
            }">

            @can('investigations.view')
                <a href="#" class="nav-link"
                    :class="{
                        'active': window.location.pathname === '/all-investigations' ||
                            window.location.pathname === '/test-forms' ||
                            window.location.pathname === '/add-investigation' ||
                            window.location.pathname.startsWith('/edit-investigation') ||
                            window.location.pathname.startsWith('/edit-testform')
                    }"
                    onclick="toggleDropdown('investigationManagementMenu')" data-scroll-top>
                    <i class="fas fa-vial"></i> <span>Investigation</span>
                </a>
            @endcan

            <div class="submenu"
                :class="{
                    'open': window.location.pathname === '/all-investigations' ||
                        window.location.pathname === '/test-forms' ||
                        window.location.pathname === '/add-investigation' ||
                        window.location.pathname.startsWith('/edit-investigation') ||
                        window.location.pathname.startsWith('/edit-testform')
                }"
                id="investigationManagementMenu">

                @can('investigations.view')
                    <a href="/all-investigations" class="nav-link"
                        :class="{
                            'sactive': window.location.pathname === '/all-investigations' ||
                                window.location.pathname === '/add-investigation' ||
                                window.location.pathname.startsWith('/edit-investigation')
                        }"
                        wire:navigate data-scroll-top>
                        <i class="fas fa-vial"></i> Investigation
                    </a>
                @endcan

                @can('investigation_form.view')
                    <a href="/test-forms" class="nav-link"
                        :class="{
                            'sactive': window.location.pathname === '/test-forms' ||
                                window.location.pathname.startsWith('/edit-testform')
                        }"
                        wire:navigate data-scroll-top>
                        <i class="fas fa-vial"></i> Investigation Form
                    </a>
                @endcan
            </div>

            <strong class="dropdown-toggle sidebar-toggle"></strong>
        </div>

    @endcan

    @can('employees.view')
        <a href="/all-employees" class="nav-link"
            :class="{
                'active': window.location.pathname === '/all-employees' ||
                    window.location.pathname === '/add-employee' ||
                    window.location.pathname.startsWith('/employee-history')
            }"
            wire:navigate data-scroll-top>
            <i class="fa-solid fa-user-tie"></i> Employees
        </a>
    @endcan

    @can('expenses.view')
        <div class="nav-item"
            :class="{
                'open-bg': window.location.pathname === '/all-expenses' ||
                    window.location.pathname === '/all-expenses-category'
            }">
            <a href="#" class="nav-link"
                :class="{
                    'active': window.location.pathname === '/all-expenses' ||
                        window.location.pathname === '/all-expenses-category' ||
                        window.location.pathname === '/add-expense' ||
                        window.location.pathname === '/history-expenses' ||
                        window.location.pathname.startsWith(
                            '/edit-expense') || window.location.pathname === '/all-expenses'
                }"
                onclick="toggleDropdown('expenseManagementMenu')" data-scroll-top>
                <i class="fa-solid fa-money-bill-wave"></i> <span>Expense</span>
            </a>

            <div class="submenu"
                :class="{
                    'open': window.location.pathname === '/all-expenses' ||
                        window.location.pathname === '/all-expenses-category' ||
                        window.location.pathname === '/add-expense' ||
                        window.location.pathname === '/history-expenses' ||
                        window.location.pathname.startsWith(
                            '/edit-expense') || window.location.pathname === '/all-expenses'
                }"
                id="expenseManagementMenu">

                @can('expenses.view')
                    <a href="/all-expenses" class="nav-link"
                        :class="{
                            'sactive': window.location.pathname === '/all-expenses' || window.location
                                .pathname === '/add-expense' || window.location.pathname.startsWith(
                                    '/edit-expense') || window.location.pathname === '/all-expenses'
                        }"
                        wire:navigate data-scroll-top>
                        <i class="fa-solid fa-money-bill-wave"></i> Expense
                    </a>
                @endcan

                @can('expenses.view')
                    <a href="/history-expenses" class="nav-link"
                        :class="{
                            'sactive': window.location.pathname === '/history-expenses'
                        }"
                        wire:navigate data-scroll-top>
                        <i class="fa-solid fa-money-bill-wave"></i> Expense History
                    </a>
                @endcan

                @can('expense_category.view')
                    <a href="/all-expenses-category" class="nav-link"
                        :class="{ 'sactive': window.location.pathname === '/all-expenses-category' }" wire:navigate
                        data-scroll-top>
                        <i class="fa-solid fa-money-bill-wave"></i> Category
                    </a>
                @endcan
            </div>

            <strong class="dropdown-toggle sidebar-toggle"></strong>
        </div>
    @endcan

    @can('marketings.view')
        <div class="nav-item"
            :class="{
                'open-bg': window.location.pathname === '/all-marketings' ||
                    window.location.pathname === '/marketing-commision' ||
                    window.location.pathname === '/marketing-commision-list' ||
            }">
            <a href="#" class="nav-link"
                :class="{
                    'active': window.location.pathname === '/all-marketings' ||
                        window.location.pathname === '/marketing-commision' ||
                        window.location.pathname === '/marketing-commision-list' ||
                        window.location.pathname === '/add-marketing' ||
                        window.location.pathname.startsWith(
                            '/edit-marketing') || window.location.pathname === '/all-marketings'
                }"
                onclick="toggleDropdown('marketingManagementMenu')" data-scroll-top>
                <i class="fa-solid fa-users"></i> <span>Marketings</span>
            </a>

            <div class="submenu"
                :class="{
                    'open': window.location.pathname === '/all-marketings' ||
                        window.location.pathname === '/add-marketing' ||
                        window.location.pathname === '/marketing-commision' ||
                        window.location.pathname === '/marketing-commision-list' ||
                        window.location.pathname.startsWith(
                            '/edit-marketing') || window.location.pathname === '/all-marketings'
                }"
                id="marketingManagementMenu">

                <a href="/all-marketings" class="nav-link"
                    :class="{
                        'sactive': window.location.pathname === '/all-marketings' || window.location
                            .pathname === '/add-marketing' || window.location.pathname.startsWith(
                                '/edit-marketing')
                    }"
                    wire:navigate data-scroll-top>
                    <i class="fa-solid fa-users"></i> <span>Marketings</span>
                </a>

                <a href="/marketing-commision-list" class="nav-link"
                    :class="{
                        'sactive': window.location.pathname === '/marketing-commision-list'
                    }"
                    wire:navigate data-scroll-top>
                    <i class="fa-solid fa-users"></i> <span>Mar Com List</span>
                </a>

                @can('commisions.view')
                    <a href="/marketing-commision" class="nav-link"
                        :class="{ 'sactive': window.location.pathname === '/marketing-commision' }" wire:navigate
                        data-scroll-top>
                        <i class="fa-solid fa-money-bill-wave"></i> Commision
                    </a>
                @endcan
            </div>

            <strong class="dropdown-toggle sidebar-toggle"></strong>
        </div>
    @endcan

    @if (auth()->check() && auth()->user()->email === 'shariful971@gmail.com')
        <a href="/all-payments" class="nav-link"
            :class="{
                'active': window.location.pathname.startsWith('/add-payment') ||
                    window.location.pathname.startsWith('/edit-payment') ||
                    window.location.pathname.startsWith('/payment-invoice') ||
                    window.location.pathname === '/all-payments'
            }"
            wire:navigate>
            <i class="fa-solid fa-money-bill"></i> <span>Payment</span>
        </a>
    @else
        @can('payment.view')
            <a href="/all-payments-list" class="nav-link"
                :class="{
                    'active': window.location.pathname.startsWith('/payment-invoice') ||
                        window.location.pathname === '/all-payments-list'
                }"
                wire:navigate>
                <i class="fa-solid fa-money-bill-wave"></i> <span>Payment</span>
            </a>
        @endcan
    @endif

    @can('pages.view')
        <a href="/all-pages" class="nav-link"
            :class="{
                'active': window.location.pathname.startsWith('/add-page') || window.location.pathname.startsWith(
                    '/edit-page') || window.location.pathname === '/all-pages'
            }"
            wire:navigate>
            <i class="fa-solid fa-pager"></i> <span>Pages</span>
        </a>
    @endcan
    @can('sliders.view')
        <a href="/all-sliders" class="nav-link"
            :class="{
                'active': window.location.pathname.startsWith('/add-slider') || window.location.pathname.startsWith(
                    '/edit-slider') || window.location.pathname === '/all-sliders'
            }"
            wire:navigate>
            <i class="fa-solid fa-images"></i> <span>Sliders</span>
        </a>
    @endcan
    @can('gallery.view')
        <a href="/all-galleries" class="nav-link"
            :class="{
                'active': window.location.pathname.startsWith('/add-gallery') || window.location.pathname
                    .startsWith(
                        '/edit-gallery') || window.location.pathname === '/all-galleries'
            }"
            wire:navigate>
            <i class="fa-solid fa-images"></i> <span>Gallery</span>
        </a>
    @endcan
    @can('blogs.view')

        <div class="nav-item">
            <a href="#" class="nav-link" onclick="toggleDropdown('blogMenu')" data-scroll-top>
                <i class="fas fa-blog"></i> <span>Blogs</span>
            </a>

            <div class="submenu" id="blogMenu">

                @can('expenses.view')
                    <a href="/all-blogs" class="nav-link"
                        :class="{
                            'active': window.location.pathname.startsWith('/add-blog') || window.location.pathname
                                .startsWith(
                                    '/edit-blog') || window.location.pathname === '/all-blogs'
                        }"
                        wire:navigate>
                        <i class="fas fa-blog"></i> <span>Blogs</span>
                    </a>
                @endcan

                @can('expense_category.view')
                    <a href="/all-blogs-category" class="nav-link"
                        :class="{ 'sactive': window.location.pathname === '/all-blogs-category' }" wire:navigate
                        data-scroll-top>
                        <i class="fa-solid fa-money-bill-wave"></i> Category
                    </a>
                @endcan
                @can('expense_category.view')
                    <a href="/all-departments" class="nav-link"
                        :class="{ 'sactive': window.location.pathname === '/all-departments' }" wire:navigate data-scroll-top>
                        <i class="fa-solid fa-money-bill-wave"></i> Departments
                    </a>
                @endcan
            </div>

            <strong class="dropdown-toggle sidebar-toggle"></strong>
        </div>




    @endcan
    @can('commanders.view')
        <a href="/all-commenders"
            class="nav-link":class="{
                                                                                                                                                                                                                                                                                                                                        'active': window.location.pathname.startsWith('/add-commender') || window.location.pathname.startsWith(
                                                                                                                                                                                                                                                                                                                                       '/edit-commender') || window.location.pathname === '/all-commenders'
                                                                                                                                                                                                                                                                                                                                     }"
            wire:navigate>
            <i class="fas fa-user-tie"></i> <span>Commanders</span>
        </a>
    @endcan
    @can('links.view')
        <a href="/all-links" class="nav-link"
            :class="{
                'active': window.location.pathname.startsWith('/add-link') || window.location
                    .pathname === '/all-links'
            }"
            wire:navigate>
            <i class="fa-solid fa-link"></i> <span>Links</span>
        </a>
    @endcan
    @can('teams.view')
        <a href="/all-teams" class="nav-link"
            :class="{
                'active': window.location.pathname.startsWith('/add-team') || window.location.pathname.startsWith(
                    '/edit-team') || window.location.pathname === '/all-teams'
            }"
            wire:navigate data-scroll-top>
            <i class="fa-solid fa-users"></i> <span>Teams</span>
        </a>
    @endcan
    @can('courses.view')
        <a href="/all-courses" class="nav-link"
            :class="{
                'active': window.location.pathname.startsWith('/add-course') || window.location.pathname.startsWith(
                    '/edit-course') || window.location.pathname === '/all-courses'
            }"
            wire:navigate data-scroll-top>
            <i class="fa-solid fa-book-open"></i> <span>Courses</span>
        </a>
    @endcan

    {{-- Notice Sidebar --}}
    @can('notices.view')
        <div class="nav-item">
            <a href="#" class="nav-link"
                :class="{
                    'active': window.location.pathname === '/all-notices' ||
                        window.location.pathname === '/noc-notices' ||
                        window.location.pathname === '/apa-notices' ||
                        window.location.pathname === '/add-notice' ||
                        window.location.pathname.startsWith('/edit-notice') || window.location
                        .pathname === '/all-notices'
                }"
                onclick="toggleDropdown('noticeMenu')" data-scroll-top>
                <i class="fa-solid fa-bullhorn"></i> <span>Notice</span>
            </a>

            <div class="submenu"
                :class="{
                    'open': window.location.pathname === '/all-notices' ||
                        window.location.pathname === '/noc-notices' ||
                        window.location.pathname === '/apa-notices' ||
                        window.location.pathname === '/add-notice' ||
                        window.location.pathname.startsWith('/edit-notice') || window.location
                        .pathname === '/all-notices'
                }"
                id="noticeMenu">
                <a href="/all-notices" class="nav-link"
                    :class="{
                        'sactive': window.location.pathname === '/all-notices' || window.location
                            .pathname === '/add-notice' || window.location.pathname.startsWith(
                                '/edit-notice')
                    }"
                    wire:navigate data-scroll-top>
                    <i class="fa-solid fa-bullhorn"></i> Notice
                </a>
                <a href="/noc-notices" class="nav-link"
                    :class="{ 'sactive': window.location.pathname === '/noc-notices' }" wire:navigate data-scroll-top>
                    <i class="fa-solid fa-bullhorn"></i> NOC
                </a>
                <a href="/apa-notices" class="nav-link"
                    :class="{ 'sactive': window.location.pathname === '/apa-notices' }" wire:navigate data-scroll-top>
                    <i class="fa-solid fa-bullhorn"></i> APA
                </a>
            </div>

            <strong class="dropdown-toggle sidebar-toggle"></strong>
        </div>
    @endcan
    {{-- Notice Sidebar --}}

    @can('videos.view')
        <a href="/all-videos" class="nav-link"
            :class="{
                'active': window.location.pathname.startsWith('/add-video') || window.location
                    .pathname === '/all-videos'
            }"
            wire:navigate data-scroll-top>
            <i class="fa-solid fa-tv"></i> <span> Videos</span>
        </a>
    @endcan
    @can('statement.view')
        <a href="/all-statement" class="nav-link"
            :class="{
                'active': window.location.pathname.startsWith('/edit-statement') || window.location
                    .pathname === '/all-statement'
            }"
            wire:navigate data-scroll-top>
            <i class="fa-solid fa-book-open"></i> <span> Statement</span>
        </a>
    @endcan
    @can('messages.view')
        <a href="/all-messages" class="nav-link d-flex align-items-center justify-content-between"
            :class="{
                'active': window.location.pathname.startsWith('/add-messages') || window.location
                    .pathname === '/all-messages'
            }"
            wire:navigate data-scroll-top>
            <div>
                <i class="fas fa-envelope"></i>
                <span> Messages</span>
            </div>

            {{-- Only No Reply Messages Count --}}
            <span class="badge bg-danger">
                {{ $noReplyMessageCount }}
            </span>
        </a>
    @endcan


    @can('users.view')
        <a href="/all-users" class="nav-link"
            :class="{
                'active': window.location.pathname.startsWith('/add-user') ||
                    window.location.pathname.startsWith('/edit-user') ||
                    window.location.pathname === '/all-users'
            }"
            wire:navigate data-scroll-top>
            <i class="fa-solid fa-users"></i> <span> Users</span>
        </a>
    @endcan
    {{-- Role Management --}}
    @can('role_management.view')
        <div class="nav-item">
            <a href="#" class="nav-link"
                :class="{
                    'active': window.location.pathname === '/all-roles' ||
                        window.location.pathname === '/all-permissions' ||
                        window.location.pathname === '/add-role' ||
                        window.location.pathname.startsWith('/edit-role') ||
                        window.location.pathname === '/all-roles'
                }"
                onclick="toggleDropdown('roleManagementMenu')" data-scroll-top>
                <i class="fa-solid fa-users"></i> <span>Role Management</span>
            </a>

            <div class="submenu"
                :class="{
                    'open': window.location.pathname === '/all-roles' ||
                        window.location.pathname === '/all-permissions' ||
                        window.location.pathname === '/add-role' ||
                        window.location.pathname.startsWith('/edit-role') ||
                        window.location.pathname === '/all-roles'
                }"
                id="roleManagementMenu">
                <a href="/all-roles" class="nav-link"
                    :class="{
                        'sactive': window.location.pathname === '/all-roles' ||
                            window.location.pathname === '/add-role' ||
                            window.location.pathname.startsWith('/edit-role') ||
                            window.location.pathname === '/all-roles'
                    }"
                    wire:navigate data-scroll-top>
                    <i class="fa-solid fa-user-shield"></i> Roles
                </a>
                <a href="/all-permissions" class="nav-link"
                    :class="{ 'sactive': window.location.pathname === '/all-permissions' }" wire:navigate data-scroll-top>
                    <i class="fa-solid fa-lock"></i> Permissions
                </a>
            </div>

            <strong class="dropdown-toggle sidebar-toggle"></strong>
        </div>
    @endcan
    {{-- Role Management --}}
    @can('application_settings.view')
        <a href="/setting-logo-identity"
            :class="{
                'active': window.location.pathname.startsWith('/setting-logo-identity') ||
                    window.location.pathname === '/setting-header' ||
                    window.location.pathname === '/setting-footer' ||
                    window.location.pathname === '/setting-sidebar' ||
                    window.location.pathname === '/setting-academic' ||
                    window.location.pathname === '/setting-profile' ||
                    window.location.pathname === '/setting-contact' ||
                    window.location.pathname === '/setting-smtp' ||
                    window.location.pathname === '/setting-logo-identity'
            }"
            class="nav-link" wire:navigate data-scroll-top>
            <i class="fas fa-cogs"></i> <span>Application Settings</span>
        </a>
    @endcan
    @can('application_settings.view')
        <livewire:backend.clear-cache />
    @endcan
    @can('activity.view')
        <a href="/all-activities" class="nav-link" data-scroll-top wire:navigate>
            <i class="fa-solid fa-shield-halved"></i> <span>Activity</span>
        </a>
    @endcan
    <a href="mailto:shariful971@gmail.com" class="nav-link" data-scroll-top>
        <i class="fa-brands fa-hire-a-helper"></i> <span>Help Center</span>
    </a>

</div>

<script>
    function scrollSidebarToElement(element) {
        const sidebar = document.getElementById('sidebar');
        if (!element || !sidebar) return;

        const sidebarRect = sidebar.getBoundingClientRect();
        const elementRect = element.getBoundingClientRect();

        const currentScroll = sidebar.scrollTop;

        const elementMiddle = elementRect.top - sidebarRect.top + currentScroll - (sidebar.clientHeight / 2) + (element
            .offsetHeight / 2);

        sidebar.scrollTo({
            top: elementMiddle,
            behavior: 'smooth'
        });
    }


    window.addEventListener('livewire:navigated', () => {
        const activeLink = document.querySelector('.sidebar .nav-link.active[data-scroll-top]');
        scrollSidebarToElement(activeLink);
    });


    document.querySelectorAll('.sidebar .nav-link[data-scroll-top]').forEach(link => {
        link.addEventListener('click', function() {
            scrollSidebarToElement(this);
        });
    });
</script>
