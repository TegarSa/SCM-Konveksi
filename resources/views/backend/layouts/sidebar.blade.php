<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">

        <a class="sidebar-brand" href="#">
            <span class="align-middle sidebar-brand-text">Konveksi Jaya</span>
            <svg class="align-middle sidebar-brand-icon" width="32" height="32" viewBox="0 0 24 24" fill="none"
                stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="miter">
                <path d="M12 4L20 8L12 12L4 8L12 4Z"></path>
                <path d="M20 12L12 16L4 12"></path>
                <path d="M20 16L12 20L4 16"></path>
            </svg>
        </a>

        <div class="sidebar-user text-center my-3">
            <div class="dropdown">
                <a href="#" class="d-flex align-items-center text-decoration-none" id="dropdownUser" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="{{ auth()->user()->photo ?? asset('assets/img/Default.jpeg') }}" alt="User Avatar" class="rounded avatar img-fluid me-2">
                    <div class="text-start flex-fill">
                        <div class="d-flex align-items-center justify-content-start gap-2">
                            <span class="fw-semibold text-white">{{ auth()->user()->name }}</span>
                            <span class="dropdown-toggle text-white"></span>
                        </div>
                        <div class="text-secondary fs-6">{{ auth()->user()->institution }}</div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end mt-2">
                    <li><a class="dropdown-item" href="#">Profil</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            Logout
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="GET" class="d-none"></form>
                    </li>
                </ul>
            </div>
        </div>

        <ul class="sidebar-nav">

            <li class="sidebar-header">Menu</li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i data-feather="sliders"></i>
                    <span>Dashboards</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a href=" #" class="sidebar-link">
                    <i data-feather="user"></i>
                    <span>Profil</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#pelatihan" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i data-feather="layout"></i>
                    <span>Pelatihan</span>
                </a>
                <ul id="pelatihan" class="sidebar-dropdown list-unstyled collapse">
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Bootcamp 2 Hari</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Bootcamp 3 Hari</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Bootcamp Ramadhan</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Pelatihan Online</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Pelatihan 2022</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Pelatihan 2021</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#berita" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i data-feather="layout"></i>
                    <span>Berita</span>
                </a>
                <ul id="berita" class="sidebar-dropdown list-unstyled collapse">
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Video Tutorial</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Gallery</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">FAQ</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#unduh" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i data-feather="layout"></i>
                    <span>Unduh</span>
                </a>
                <ul id="unduh" class="sidebar-dropdown list-unstyled collapse">
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Kategori</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Dokumen</a></li>
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Records</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#profil" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i data-feather="layout"></i>
                    <span>Profil</span>
                </a>
                <ul id="profil" class="sidebar-dropdown list-unstyled collapse">
                    <li class="sidebar-item"><a class="sidebar-link" href="#">Narasumber</a></li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
