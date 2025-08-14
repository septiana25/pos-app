<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="dark">
    <!--begin::Sidebar Brand-->
    <div class="sidebar-brand">
        <!--begin::Brand Link-->
        <a href="/dashboard" class="brand-link">
        <!--begin::Brand Image-->
        {{-- <img
            src="{{ asset('/') }}adminlte/assets/img/AdminLTELogo.png"
            alt="AdminLTE Logo"
            class="brand-image opacity-75 shadow"
        /> --}}
        <!--end::Brand Image-->
        <!--begin::Brand Text-->
        <span class="brand-text fw-light">{{ env('APP_NAME') }}</span>
        <!--end::Brand Text-->
        </a>
        <!--end::Brand Link-->
    </div>
    <!--end::Sidebar Brand-->
    <!--begin::Sidebar Wrapper-->
    <div class="sidebar-wrapper">
        <nav class="mt-2">
        <!--begin::Sidebar Menu-->
            <ul
                class="nav sidebar-menu flex-column"
                data-lte-toggle="treeview"
                role="navigation"
                aria-label="Main navigation"
                data-accordion="false"
                id="navigation"
            >
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}" class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        <i class="nav-icon bi bi-pc-display-horizontal"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                      <i class="nav-icon bi bi-database"></i>
                      <p>
                        Master Data
                        <i class="nav-arrow bi bi-chevron-right"></i>
                      </p>
                    </a>
                    <ul class="nav nav-treeview">
                      <li class="nav-item">
                        <a href="./widgets/small-box.html" class="nav-link">
                          <i class="nav-icon bi bi-circle"></i>
                          <p>Kategori</p>
                        </a>
                      </li>
                      <li class="nav-item">
                        <a href="./widgets/info-box.html" class="nav-link">
                          <i class="nav-icon bi bi-circle"></i>
                          <p>Produk</p>
                        </a>
                      </li>
                    </ul>
                </li>
            </ul>
        <!--end::Sidebar Menu-->
        </nav>
    </div>
    <!--end::Sidebar Wrapper-->
</aside>