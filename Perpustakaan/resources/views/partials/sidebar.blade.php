<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="/" class="brand-link">
      <img src="{{ asset('admin/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Perpustakaan</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
          <div class="image"><i class="fas fa-user-circle fa-2x text-gray-light"></i></div>
          <div class="info">
            @auth<a href="#" class="d-block">{{ Auth::user()->name }}</a>@endauth
            @guest<a href="#" class="d-block">Pengunjung</a>@endguest
          </div>
        </div>
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
                <a href="/home" class="nav-link {{ request()->is('home') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-home"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="/books" class="nav-link {{ request()->is('books*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-swatchbook"></i>
                    <p>Buku</p>
                </a>
            </li>
            @auth
            <li class="nav-item">
                <a href="/category" class="nav-link {{ request()->is('category*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-sitemap"></i>
                    <p>Kategori</p>
                </a>
            </li>
            <li class="nav-item mt-3">
                <a class="nav-link bg-danger" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   <i class="nav-icon fas fa-sign-out-alt"></i>
                   <p>{{ __('Logout') }}</p>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            </li>
            @endauth
            @guest
            <li class="nav-item bg-primary">
                <a href="{{ route('login') }}" class="nav-link {{ request()->is('login') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-sign-in-alt"></i>
                    <p>Login</p>
                </a>
            </li>
            @endguest
          </ul>
        </nav>
    </div>
</aside>
