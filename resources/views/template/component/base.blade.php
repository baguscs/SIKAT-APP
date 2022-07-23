<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <title>@stack('titlePages')</title>

    <link rel="icon" href="{{ asset('img/icon.png') }}">

    <!-- General CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

    @stack('css')
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
</head>
<body>
    <div id="app">
        {{-- navigation --}}
        <div class="navbar-bg"></div>
        <nav class="navbar navbar-expand-lg main-navbar">
            <form class="form-inline mr-auto">
            <ul class="navbar-nav mr-3">
                <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
            </ul>
            </form>
            <ul class="navbar-nav navbar-right">
            <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown" class="nav-link notification-toggle nav-link-lg beep"><i class="far fa-bell"></i></a>
                <div class="dropdown-menu dropdown-list dropdown-menu-right">
                <div class="dropdown-header">Notifications
                    <div class="float-right">
                    <a href="#">Mark All As Read</a>
                    </div>
                </div>
                <div class="dropdown-list-content dropdown-list-icons">
                    <a href="#" class="dropdown-item dropdown-item-unread">
                    <div class="dropdown-item-icon bg-primary text-white">
                        <i class="fas fa-code"></i>
                    </div>
                    <div class="dropdown-item-desc">
                        Template update is available now!
                        <div class="time text-primary">2 Min Ago</div>
                    </div>
                    </a>
                    <a href="#" class="dropdown-item">
                    <div class="dropdown-item-icon bg-info text-white">
                        <i class="far fa-user"></i>
                    </div>
                    <div class="dropdown-item-desc">
                        <b>You</b> and <b>Dedik Sugiharto</b> are now friends
                        <div class="time">10 Hours Ago</div>
                    </div>
                    </a>
                    <a href="#" class="dropdown-item">
                    <div class="dropdown-item-icon bg-success text-white">
                        <i class="fas fa-check"></i>
                    </div>
                    <div class="dropdown-item-desc">
                        <b>Kusnaedi</b> has moved task <b>Fix bug header</b> to <b>Done</b>
                        <div class="time">12 Hours Ago</div>
                    </div>
                    </a>
                    <a href="#" class="dropdown-item">
                    <div class="dropdown-item-icon bg-danger text-white">
                        <i class="fas fa-exclamation-triangle"></i>
                    </div>
                    <div class="dropdown-item-desc">
                        Low disk space. Let's clean it!
                        <div class="time">17 Hours Ago</div>
                    </div>
                    </a>
                    <a href="#" class="dropdown-item">
                    <div class="dropdown-item-icon bg-info text-white">
                        <i class="fas fa-bell"></i>
                    </div>
                    <div class="dropdown-item-desc">
                        Welcome to Stisla template!
                        <div class="time">Yesterday</div>
                    </div>
                    </a>
                </div>
                <div class="dropdown-footer text-center">
                    <a href="#">View All <i class="fas fa-chevron-right"></i></a>
                </div>
                </div>
            </li>
            <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->warga->nama_warga }}</div></a>
                <div class="dropdown-menu dropdown-menu-right">
                <a href="features-settings.html" class="dropdown-item has-icon">
                    <i class="fas fa-cog"></i> Ubah Password
                </a>
                <a href="" class="dropdown-item has-icon text-danger"  data-toggle="modal" data-target="#exampleModal">
                    <i class="fas fa-sign-out-alt"></i> Logout
                </a>
                </div>
            </li>
            </ul>
        </nav>

        {{-- sidebar --}}
        <div class="main-sidebar sidebar-style-2">
            <aside id="sidebar-wrapper">
                <div class="sidebar-brand">
                    <a href="{{ route('dashboard') }}"><img src="{{ asset('img/icon.png') }}" alt=""> SIKAT</a>
                </div>
                <div class="sidebar-brand sidebar-brand-sm">
                    <a href="{{ route('dashboard') }}"><img src="{{ asset('img/icon.png') }}" alt="" class="sideBar"></a>
                </div>
                <ul class="sidebar-menu">
                    <li class="menu-header">Dashboard</li>
                    <li class="menu @stack('dashboard')">
                        <a href="{{ route('dashboard') }}" class="nav-link"><i class="fas fa-home"></i><span>Dashboard</span></a>
                    </li>
                    <li class="menu-header">Menu</li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-calendar-alt"></i> <span>Agenda</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="features-activities.html">List Agenda</a></li>
                            <li><a class="nav-link" href="features-post-create.html">Tambah Agenda</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-alt"></i> <span>Aduan</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="features-activities.html">List Aduan</a></li>
                            <li><a class="nav-link" href="features-post-create.html">Tambah Aduan</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-wallet"></i> <span>Pendanaan</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="features-activities.html">List Pendanaan</a></li>
                            <li><a class="nav-link" href="features-post-create.html">Tambah Pendanaan</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-users"></i> <span>Data Warga</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="features-activities.html">List Warga</a></li>
                            <li><a class="nav-link" href="features-post-create.html">Tambah Warga</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="nav-link has-dropdown"><i class="fas fa-user"></i> <span>Data Pengguna</span></a>
                        <ul class="dropdown-menu">
                            <li><a class="nav-link" href="features-activities.html">List Pengguna</a></li>
                            <li><a class="nav-link" href="features-post-create.html">Tambah Pengguna</a></li>
                        </ul>
                    </li>
                </ul>
            </aside>
        </div>
        @yield('content')
        @include('template.component.footer')
    </div>

    {{-- modal logout --}}
    <div class="modal fade" tabindex="-1" role="dialog" id="exampleModal">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Anda Yakin?</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Apakah anda yakin ingin logout?</p>
            </div>
            <form action="{{ route('logoutSystem') }}" method="get">
                @csrf
                <div class="modal-footer bg-whitesmoke br">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                    <button type="submit" class="btn btn-danger">Logout</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    
    @stack('js')
    <!-- General JS Scripts -->
    <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/modules/popper.js') }}"></script>
    <script src="{{ asset('assets/modules/tooltip.js') }}"></script>
    <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
    <script src="{{ asset('assets/modules/moment.min.js') }}"></script>
    <script src="{{ asset('assets/js/stisla.js') }}"></script>
    
    <!-- Template JS File -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
</body>
</html>