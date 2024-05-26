<nav class="pcoded-navbar">
    <div class="sidebar_toggle"><a href="#"><i class="icon-close icons"></i></a></div>
    <div class="pcoded-inner-navbar main-menu">
        <ul class="pcoded-item pcoded-left-item mt-3">
            <li class="">
                <a href="/profile" class="waves-effect waves-dark">
                    <div class="row">
                        <div class="col-md-5">
                            @if (auth()->user()->foto)
                                <img src="{{ asset('storage/' . auth()->user()->foto) }}" class="img-radius" alt="User-Profile-Image" style="max-width: 100%">
                            @else
                                <img src="{{ asset('img/avatar.png') }}" class="img-radius" alt="User-Profile-Image" style="max-width: 100%">
                            @endif
                        </div>
                        <div class="col-md-7">
                            <div class="row mt-2">
                                <strong class="fs-6">{{ auth()->user()->nama }}</strong>
                            </div>
                            <div class="row">
                                <span>{{ auth()->user()->role }}</span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    
                </a>
            </li>

            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a href="/dashboard" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="bi bi-speedometer2"></i></span>
                    <span class="pcoded-mtext" data-i18n="nav.dash.main">Dashboard</span>
                    <span class="pcoded-mcaret"></span>
                </a>
            </li>

            @if ((auth()->user()->role == 'admin') || (auth()->user()->role == 'tentor'))
                <li class="ms-3 mt-3"><small>Ujian</small></li>
                <li class="{{ Request::is('ujian') ? 'active' : '' }}">
                    <a href="/ujian" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="bi bi-book"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Daftar Ujian</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            
                <li class="{{ Request::is('ujian/create') ? 'active' : '' }}">
                    <a href="/ujian/create" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="ti-plus"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Tambah Ujian</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->role == 'siswa')
                <li class="{{ Request::is('ujian*') ? 'active' : '' }}">
                    <a href="/ujian" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="bi bi-book"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Ujian</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="{{ Request::is('nilai') ? 'active' : '' }}">
                    <a href="/nilai" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="bi bi-file-earmark-text"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Riwayat</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            @endif

            {{-- <li class="pcoded-hasmenu {{ Request::is('ujian*') ? 'active' : '' }}">
                <a href="javascript:void(0)" class="waves-effect waves-dark">
                    <span class="pcoded-micon"><i class="bi bi-book"></i></span>
                    <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Ujian</span>
                    <span class="pcoded-mcaret"></span>
                </a>
                <ul class="pcoded-submenu">
                    <li class=" ">
                        <a href="/ujian" class="waves-effect waves-dark">
                            <span class="pcoded-micon"><i class="ti-harddrives"></i></span>
                            <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Daftar Ujian</span>
                            <span class="pcoded-mcaret"></span>
                        </a>
                    </li>
                    @if ((auth()->user()->role == 'admin') || (auth()->user()->role == 'tentor'))
                        <li class=" ">
                            <a href="/ujian/create" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-plus"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Tambah Ujian</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    @endif
                </ul>
            </li> --}}

            @if (auth()->user()->role == 'admin' || auth()->user()->role == 'tentor')
                <li class="ms-3 mt-3"><small>Nilai</small></li>
                <li class="{{ Request::is('nilai') ? 'active' : '' }}">
                    <a href="/nilai" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="bi bi-file-earmark-text"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Daftar Nilai</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            @endif

            {{-- @if (auth()->user()->role == 'siswa')
                <li class="ms-3"><small>Nilai</small></li>
                <li class="{{ Request::is('nilai') ? 'active' : '' }}">
                    <a href="/nilai" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="bi bi-file-earmark-text"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Nilai</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
            @endif --}}

            @if (auth()->user()->role == 'admin')
                <li class="ms-3 mt-3"><small>Data Akun</small></li>
                <li class="{{ Request::is('akun/admin*') ? 'active' : '' }}">
                    <a href="/akun/admin" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="bi bi-person-workspace"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Akun Admin</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="{{ Request::is('akun/tentor*') ? 'active' : '' }}">
                    <a href="/akun/tentor" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="bi bi-person-video3"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Akun Tentor</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>
                <li class="{{ Request::is('akun/siswa*') ? 'active' : '' }}">
                    <a href="/akun/siswa" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="bi bi-people"></i></span>
                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Akun Siswa</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                </li>

                {{-- <li class="pcoded-hasmenu {{ Request::is('akun*') ? 'active' : '' }}">
                    <a href="javascript:void(0)" class="waves-effect waves-dark">
                        <span class="pcoded-micon"><i class="bi bi-people"></i></span>
                        <span class="pcoded-mtext"  data-i18n="nav.basic-components.main">Data Akun</span>
                        <span class="pcoded-mcaret"></span>
                    </a>
                    <ul class="pcoded-submenu">
                        <li class=" ">
                            <a href="/akun/tentor" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-harddrives"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.alert">Akun Tentor</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                        <li class=" ">
                            <a href="/akun/siswa" class="waves-effect waves-dark">
                                <span class="pcoded-micon"><i class="ti-plus"></i></span>
                                <span class="pcoded-mtext" data-i18n="nav.basic-components.breadcrumbs">Akun Siswa</span>
                                <span class="pcoded-mcaret"></span>
                            </a>
                        </li>
                    </ul>
                </li> --}}
            @endif
        </ul>
    </div>
</nav>