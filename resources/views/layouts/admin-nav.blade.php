<div class="container-fluid">
  <div class="row flex-nowrap">
    <nav class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark min-vh-100 d-flex flex-column">
      <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">
        <!-- Admin Panel Brand -->
        <a href="{{ route('admin.dashboard') }}" class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
          <span class="fs-5 fw-bold">Admin Panel</span>
        </a>
        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100" id="menu">
          <!-- Dashboard Link -->
          <li class="nav-item w-100">
            <a href="{{ route('admin.dashboard') }}" class="nav-link text-white px-0 align-middle w-100">
              <i class="bi bi-speedometer2"></i>
              <span class="ms-1 d-none d-sm-inline">Dashboard</span>
            </a>
          </li>
          <!-- Tasks Main Menu -->
          <li class="nav-item w-100">
            <a href="{{ route('admin.tasks.index') }}" class="nav-link text-white px-0 align-middle w-100">
              <i class="bi bi-list-task"></i>
              <span class="ms-1 d-none d-sm-inline">Tasks</span>
            </a>
          </li>
          <!-- Settings with Users Submenu -->
          <li class="w-100">
            <a href="#submenu1" data-bs-toggle="collapse" class="nav-link text-white px-0 align-middle w-100" aria-expanded="false" aria-controls="submenu1">
              <i class="bi bi-gear"></i> <span class="ms-1 d-none d-sm-inline">Settings</span>
            </a>
            <ul class="collapse nav flex-column ms-1 w-100" id="submenu1" data-bs-parent="#menu">
              <li class="w-100">
                <a href="#usersSubmenu" data-bs-toggle="collapse" class="nav-link text-white px-0 w-100" aria-expanded="false" aria-controls="usersSubmenu">
                  <i class="bi bi-people"></i> <span class="d-none d-sm-inline">Users</span>
                </a>
                <ul class="collapse nav flex-column ms-2 w-100" id="usersSubmenu" data-bs-parent="#submenu1">
                  <li class="w-100">
                    <a href="{{ route('admin.users.index') }}" class="nav-link text-white px-0 w-100">
                      <i class="bi bi-list"></i> <span class="d-none d-sm-inline">All Users</span>
                    </a>
                  </li>
                  <li class="w-100">
                    <a href="{{ route('admin.admins.index') }}" class="nav-link text-white px-0 w-100">
                      <i class="bi bi-person-badge"></i> <span class="d-none d-sm-inline">All Admins</span>
                    </a>
                  </li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>
        <div class="w-100 px-3 pb-2 text-white small">
          @php $admin = Auth::guard('admin')->user(); @endphp
          @if($admin)
            <i class="bi bi-person-circle"></i> {{ $admin->name }} ({{ $admin->email }})
          @endif
        </div>
        <hr>
        <form action="{{ route('admin.logout') }}" method="POST" class="w-100 px-3 pb-3">
          @csrf
          <button type="submit" class="btn btn-outline-light w-100"><i class="bi bi-box-arrow-right"></i> Logout</button>
        </form>
      </div>
    </nav>
    <main class="col py-3">
      @yield('admin-content')
    </main>
  </div>
</div>
<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
