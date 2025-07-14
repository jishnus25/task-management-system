<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="{{ route('user.dashboard') }}">User Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#userNavbar" aria-controls="userNavbar" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="userNavbar">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.dashboard') }}">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('user.tasks.index') }}">My Tasks</a>
        </li>
      </ul>
      <div class="d-flex align-items-center ms-auto me-3 text-white">
        @php $user = Auth::user(); @endphp
        @if($user)
          <span class="me-2"><i class="bi bi-person-circle"></i> {{ $user->name }} ({{ $user->email }})</span>
        @endif
      </div>
      <form action="{{ route('user.logout') }}" method="POST" class="d-flex">
        @csrf
        <button class="btn btn-outline-light" type="submit">Logout</button>
      </form>
    </div>
  </div>
</nav>
@section('user-nav')@show
