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

        <ul class="sidebar-nav">

            <li class="sidebar-header">Menu</li>

            <li class="sidebar-item">
                <a href="#" class="sidebar-link">
                    <i data-feather="sliders"></i>
                    <span>Dashboards</span>
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

            <li class="sidebar-header">Seminar</li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="#"><i data-feather="list"></i><span>Narasumber</span></a>
                <a class="sidebar-link" href="#"><i data-feather="list"></i><span>Seminar</span></a>
                <a class="sidebar-link" href="#"><i data-feather="list"></i><span>Webinar</span></a>
                <a class="sidebar-link" href="#"><i data-feather="list"></i><span>Member</span></a>
            </li>

            <li class="sidebar-header">Merchandise</li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="#"><i data-feather="list"></i><span>Kategori</span></a>
                <a class="sidebar-link" href="#"><i data-feather="list"></i><span>Produk</span></a>
            </li>

            <li class="sidebar-header">Setting</li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="#"><i data-feather="list"></i><span>Testimonial</span></a>
                <a class="sidebar-link" href="#"><i data-feather="list"></i><span>Youtube</span></a>
            </li>

            <li class="sidebar-header">User</li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="#"><i data-feather="list"></i><span>Subscriber</span></a>
            </li>

            <li class="sidebar-header">Artikel</li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="#"><i data-feather="list"></i><span>Kategori</span></a>
                <a class="sidebar-link" href="#"><i data-feather="list"></i><span>Tag</span></a>
                <a class="sidebar-link" href="#"><i data-feather="list"></i><span>Post</span></a>
            </li>

            <li class="sidebar-header">E-BULETIN</li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="#"><i data-feather="list"></i><span>Daftar Buletin</span></a>
            </li>

            <li class="sidebar-header">Manajemen Persediaan</li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('persediaan.index') }}">
                    <i data-feather="list"></i>
                    <span>Data Persediaan</span>
                </a>
            </li>

            <li class="sidebar-header">Daftar Pengiriman</li>

            <li class="sidebar-item">
                <a class="sidebar-link" href="{{ route('shipments.index') }}">
                    <i data-feather="list"></i>
                    <span>Data Pengiriman</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
