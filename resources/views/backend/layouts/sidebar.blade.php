<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">

        {{-- Brand --}}
        <a class="sidebar-brand" href="#">
            <span class="align-middle sidebar-brand-text">Konveksi Jaya</span>
            <svg class="align-middle sidebar-brand-icon" width="32" height="32"
                viewBox="0 0 24 24" fill="none"
                stroke="#FFFFFF" stroke-width="1.5"
                stroke-linecap="square" stroke-linejoin="miter">
                <path d="M12 4L20 8L12 12L4 8L12 4Z"></path>
                <path d="M20 12L12 16L4 12"></path>
                <path d="M20 16L12 20L4 16"></path>
            </svg>
        </a>

        {{-- User --}}
        <div class="sidebar-user text-center my-3">
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none"
                   id="dropdownUser" data-bs-toggle="dropdown">
                    <img src="{{ auth()->user()->photo ?? asset('assets/img/Default.jpeg') }}"
                         class="rounded avatar img-fluid me-2">
                    <div class="text-start flex-fill">
                        <div class="fw-semibold text-white">
                            {{ auth()->user()->name }}
                        </div>
                        <div class="text-secondary fs-6">
                            {{ auth()->user()->institution }}
                        </div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end mt-2">
                    <li><a class="dropdown-item" href="#">Profil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                           onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}"
                              method="GET" class="d-none"></form>
                    </li>
                </ul>
            </div>
        </div>

        <ul class="sidebar-nav">

            <li class="sidebar-header">Menu</li>

            {{-- Dashboard --}}
            <li class="sidebar-item">
                <a href="{{ route('dashboard') }}" class="sidebar-link">
                    <i data-feather="home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            {{-- Profil --}}
            <li class="sidebar-item">
                <a href="{{ route('profile') }}" class="sidebar-link">
                    <i data-feather="user"></i>
                    <span>Profil</span>
                </a>
            </li>

            <li class="sidebar-header">Pengelolaan</li>

            {{-- Persediaan --}}
            <li class="sidebar-item">
                <a data-bs-toggle="collapse" data-bs-target="#menu-persediaan"
                   class="sidebar-link collapsed">
                    <i data-feather="archive"></i>
                    <span>Manajemen Persediaan</span>
                </a>
                <ul id="menu-persediaan" class="sidebar-dropdown list-unstyled collapse">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('persediaan.index') }}">
                            Data Persediaan
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Pengadaan --}}
            <li class="sidebar-item">
                <a data-bs-toggle="collapse" data-bs-target="#menu-pengadaan"
                   class="sidebar-link collapsed">
                    <i data-feather="shopping-cart"></i>
                    <span>Pengadaan / Pembelian</span>
                </a>
                <ul id="menu-pengadaan" class="sidebar-dropdown list-unstyled collapse">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('supplier.index') }}">
                            Data Pemasok
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('po.index') }}">
                            Purchase Order
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Gudang --}}
            <li class="sidebar-item">
                <a data-bs-toggle="collapse" data-bs-target="#menu-gudang"
                   class="sidebar-link collapsed">
                    <i data-feather="box"></i>
                    <span>Manajemen Gudang</span>
                </a>
                <ul id="menu-gudang" class="sidebar-dropdown list-unstyled collapse">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="#">
                            Laporan Stok
                        </a>
                    </li>
                </ul>
            </li>

            {{-- Logistik --}}
            <li class="sidebar-item">
                <a data-bs-toggle="collapse" data-bs-target="#menu-logistik"
                    class="sidebar-link collapsed">
                    <i data-feather="truck"></i>
                    <span>Logistik & Distribusi</span>
                </a>
                <ul id="menu-logistik" class="sidebar-dropdown list-unstyled collapse">
                    <li class="sidebar-item">
                        <a class="sidebar-link" href="{{ route('shipments.index') }}">
                            Shipment
                        </a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</nav>
