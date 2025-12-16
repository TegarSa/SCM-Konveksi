<nav id="sidebar" class="sidebar js-sidebar">
    <div class="sidebar-content js-simplebar">
        <a class='sidebar-brand' href='/'>
            <span class="align-middle sidebar-brand-text">
                BLUD
                {{-- <sup><small class="badge bg-primary text-uppercase">Pro</small></sup> --}}
            </span>
            <svg class="align-middle sidebar-brand-icon" width="32px" height="32px" viewBox="0 0 24 24" fill="none"
                stroke="#FFFFFF" stroke-width="1.5" stroke-linecap="square" stroke-linejoin="miter" color="#FFFFFF"
                style="margin-left: -3px">
                <path d="M12 4L20 8.00004L12 12L4 8.00004L12 4Z"></path>
                <path d="M20 12L12 16L4 12"></path>
                <path d="M20 16L12 20L4 16"></path>
            </svg>
        </a>
        <ul class="sidebar-nav">
            <li class="sidebar-header">
                Menu
            </li>
            <li class="sidebar-item">
                <a href="{{ route('dashboard') }}" class="sidebar-link">
                    <i class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboards</span>
                </a>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#pelatihan" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Pelatihan</span>
                </a>
                <ul id="pelatihan" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    {{-- <li class="sidebar-item"><a class='sidebar-link' href='/pages-settings'>Pelatihan 2023</a></li> --}}
                    <li class="sidebar-item"><a class='sidebar-link' href='{{ route('bootcamp2.index') }}'>Bootcamp 2
                            Hari </a></li>
                    <li class="sidebar-item"><a class='sidebar-link' href='{{ route('bootcamp3.index') }}'>Bootcamp 3
                            Hari </a></li>
                    <li class="sidebar-item"><a class='sidebar-link' href='{{ route('bootramadan.index') }}'>Bootcamp
                            Ramadhan </a></li>
                    <li class="sidebar-item"><a class='sidebar-link' href='{{ route('bootonline.index') }}'>Pelatihan
                            Online </a></li>
                    <li class="sidebar-item"><a class='sidebar-link' href='/pages-chat'>Pelatihan 2022 </a></li>
                    <li class="sidebar-item"><a class='sidebar-link' href='/pages-blank'>Pelatihan 2021</a></li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#berita" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Berita</span>
                </a>
                <ul id="berita" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    {{-- <li class="sidebar-item"><a class='sidebar-link' href='/pages-settings'>Pelatihan 2023</a></li> --}}
                    <li class="sidebar-item"><a class='sidebar-link' href='{{ route('tutorial.index') }}'>Video
                            Tutorial</a>
                    </li>
                    <li class="sidebar-item"><a class='sidebar-link' href='{{ route('gallery.index') }}'>Gallery </a>
                    </li>
                    <li class="sidebar-item"><a class='sidebar-link' href='{{ route('faq.index') }}'>Faq </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#unduh" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Unduh</span>
                </a>
                <ul id="unduh" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    {{-- <li class="sidebar-item"><a class='sidebar-link' href='/pages-settings'>Pelatihan 2023</a></li> --}}
                    <li class="sidebar-item"><a class='sidebar-link' href='{{ route('category.index') }}'>Kategori</a>
                    </li>
                    <li class="sidebar-item"><a class='sidebar-link' href='{{ route('document.index') }}'>Dokumen </a>
                    </li>
                    <li class="sidebar-item"><a class='sidebar-link' href='{{ route('download.records') }}'>Records
                        </a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-item">
                <a data-bs-target="#profil" data-bs-toggle="collapse" class="sidebar-link collapsed">
                    <i class="align-middle" data-feather="layout"></i> <span class="align-middle">Profil</span>
                </a>
                <ul id="profil" class="sidebar-dropdown list-unstyled collapse " data-bs-parent="#sidebar">
                    <li class="sidebar-item"><a class='sidebar-link'
                            href='{{ route('narasumber.index') }}'>Narasumber</a>
                    </li>
                </ul>
            </li>

            <li class="sidebar-header">
                Seminar
            </li>
            <li class="sidebar-item">
                <a class='sidebar-link' href="{{ route('training.narasumber.index') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Narasumber</span>
                </a>
                <a class='sidebar-link' href="{{ route('training.index') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Seminar</span>
                </a>
                <a class='sidebar-link' href="{{ route('training.webinar.index') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Webinar</span>
                </a>
                <a class='sidebar-link' href="{{ route('training.member.index') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Member</span>
                </a>
            </li>

            <li class="sidebar-header">
                Merchandise
            </li>
            <li class="sidebar-item">
                <a class='sidebar-link' href="{{ route('categorymerch.index') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Kategori</span>
                </a>
                <a class='sidebar-link' href="{{ route('merch.index') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Produk</span>
                </a>
            </li>

            <li class="sidebar-header">
                Setting
            </li>
            {{-- <li class="sidebar-item">
                <a class='sidebar-link' href='{{ route('banner.index') }}'>
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Banner</span>
                </a>
            </li> --}}
            <li class="sidebar-item">
                <a class='sidebar-link' href='{{ route('testimonial.index') }}'>
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Testimonial</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a class='sidebar-link' href='{{ route('youtube.index') }}'>
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Youtube</span>
                </a>
            </li>

            <li class="sidebar-header">
                User
            </li>
            <li class="sidebar-item">
                <a class='sidebar-link' href="{{ route('subscriber') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Subscriber</span>
                </a>
                {{-- <a class='sidebar-link' href="{{ route('merch.index') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Produk</span>
                </a> --}}
            </li>

            <li class="sidebar-header">
                Artikel
            </li>
            <li class="sidebar-item">
                <a class='sidebar-link' href="{{ route('categorypost.index') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Kategori</span>
                </a>
                <a class='sidebar-link' href="{{ route('tags.index') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Tag</span>
                </a>
                <a class='sidebar-link' href="{{ route('post.index') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Post</span>
                </a>
            </li>

            <li class="sidebar-header">
                E-BULETIN
            </li>
            <li class="sidebar-item">
                <a class='sidebar-link' href="{{ route('backend.buletin.index') }}">
                    <i class="align-middle" data-feather="list"></i> <span class="align-middle">Daftar Buletin</span>
                </a>
            </li>
        </ul>
    </div>
</nav>
