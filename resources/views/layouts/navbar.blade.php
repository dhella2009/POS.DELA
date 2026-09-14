<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid px-4 px-md-5">
    <a class="navbar-brand" href="#">Fashion</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse d-flex" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : ''}}" aria-current="page" href="{{ route('dashboard') }}">Dashboard</a>
        </li>

        @if(auth()->user()->role->name !== 'kasir')
        <li class="nav-item">
            <a class="nav-link {{ Request::is('admin/users') ? 'active' : ''}}" href="{{ route('admin.users') }}">Users</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('jenis*') ? 'active' : ''}}" href="{{ route('jenis.index') }}">Jenis</a>
        </li>
        @endif

        <li class="nav-item">
            <a class="nav-link {{ Request::is('produk') ? 'active' : ''}}" href="{{ route('produk.index') }}">Produk</a>
        </li>
         <li class="nav-item">
            <a class="nav-link {{ Request::is('penjualan') ? 'active' : ''}}" href="{{ route('penjualan.index') }}">Penjualan</a>
        </li>
        <li class="nav-item">
            <a class="nav-link {{ Request::is('about') ? 'active' : ''}}" href="{{ route('about') }}">About</a>
        </li>
      </ul>
      <form action="{{ route('logout') }}" method="POST" class="ms-3">
        @csrf
        <button type="submit" class="btn btn-danger me-2">Logout</button>
      </form>
    </div>
  </div>
</nav>