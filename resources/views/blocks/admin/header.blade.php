<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="{{ route('admin.home') }}">Thể Thao 24h</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
        <div class="input-group">
            <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..." aria-describedby="btnNavbarSearch" />
            <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
        </div>
    </form>
    <!-- Navbar-->
    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle d-flex align-items-center" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset(Auth::user()->img) }}" alt="" class="rounded-circle me-2" width="30" height="30">
                <span>{{ Auth::user()->name }}</span>
            </a>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" target="_blank" href="{{ route('home') }}">Xem Trang Web</a></li>
                <li>
                    <hr class="dropdown-divider" />
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>

            </ul>
        </li>
    </ul>
</nav>
<div id="layoutSidenav">
    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Tổng Hợp</div>
                    <a class="nav-link" href="{{ route('admin.home') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Trang Chủ ADMIN
                    </a>
                    <div class="sb-sidenav-menu-heading">Quản lý bài viết</div>
                    <a class="nav-link" href="{{ route('admin.danhmuc.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-folder"></i></div>
                        Danh Mục Loại Tin
                    </a>
                    <a class="nav-link" href="{{ route('admin.tintuc.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-newspaper"></i></div>
                        Bài Viết
                    </a>
                    <div class="sb-sidenav-menu-heading">Quản Lý Người Dùng</div>
                    <a class="nav-link" href="{{ route('admin.user.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-user"></i></div>
                        Người Dùng
                    </a>
                    <a class="nav-link" href="{{ route('admin.comment.index') }}">
                        <div class="sb-nav-link-icon"><i class="fa-solid fa-comment"></i></div>
                        Bình Luận
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
                <div class="small"></div>
                Start Bootstrap
            </div>
        </nav>
    </div>
    <div id="layoutSidenav_content">
        <main>