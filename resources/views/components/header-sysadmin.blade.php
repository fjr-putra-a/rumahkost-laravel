<ul class="navbar-nav">
  <li class="nav-item nav-item-spaced d-lg-block ml-6">
    <a class="nav-link {{ Request::is('_sysadmin') ? 'active' : '' }}" href={{ route('admin.beranda') }}>Beranda</a>
  </li>
  <li class="nav-item nav-item-spaced dropdown dropdown-animate ml-1" data-toggle=hover>
    <a class="nav-link {{ Request::is('*fasilitas') || Request::is('*kamar') || Request::is('*token') ? 'active' : '' }}"
      href=# role=button data-toggle=dropdown aria-haspopup=true aria-expanded=false>Master</a>
    <div class="dropdown-menu dropdown-menu-sm">
      <a href="" class="dropdown-item">Fasilitas</a>
      <a href="" class="dropdown-item">Kamar</a>
      <a href="" class="dropdown-item">Token</a>
    </div>
  </li>
  <li class="nav-item nav-item-spaced d-lg-block ml-1">
    <a class="nav-link {{ Request::is('*penyewa') ? 'active' : '' }}" href=>Penyewa</a>
  </li>
  <li class="nav-item nav-item-spaced dropdown dropdown-animate ml-1" data-toggle=hover>
    <a class="nav-link {{ Request::is('*kamar') || Request::is('*listrik') ? 'active' : '' }}" href=# role=button
      data-toggle=dropdown aria-haspopup=true aria-expanded=false>Transaksi</a>
    <div class="dropdown-menu dropdown-menu-sm">
      <a href="" class="dropdown-item">Kamar</a>
      <a href="" class="dropdown-item">Listrik</a>
    </div>
  </li>
  <li class="nav-item nav-item-spaced dropdown dropdown-animate ml-1" data-toggle=hover>
    <a class="nav-link {{ Request::is('*kamar') || Request::is('*listrik') ? 'active' : '' }}" href=# role=button
      data-toggle=dropdown aria-haspopup=true aria-expanded=false>Arsip</a>
    <div class="dropdown-menu dropdown-menu-sm">
      <a href="" class="dropdown-item">Kamar</a>
      <a href="" class="dropdown-item">Listrik</a>
    </div>
  </li>
  <li class="nav-item nav-item-spaced dropdown dropdown-animate ml-1" data-toggle=hover>
    <a class="nav-link {{ Request::is('*perusahaan') || Request::is('*lowongan') || Request::is('*pelamar') ? 'active' : '' }}"
      href=# role=button data-toggle=dropdown aria-haspopup=true aria-expanded=false>Print</a>
    <div class="dropdown-menu dropdown-menu-sm">
      <a target="_blank" href="" class="dropdown-item">Penyewa</a>
      <a target="_blank" href="" class="dropdown-item">T.Kamar</a>
      <a target="_blank" href="" class="dropdown-item">T.Listrik</a>
    </div>
  </li>
</ul>