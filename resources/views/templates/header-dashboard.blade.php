<header class="sticky-top bg-section-secondary" id=header-main>
  <nav class="navbar navbar-main navbar-expand-lg navbar-light" id=navbar-main>
    <div class=container-fluid>

      <button class="navbar-toggler order-lg-2 ml-n3 ml-lg-0" type=button data-toggle=collapse
        data-target=#navbar-main-collapse aria-controls=navbar-main-collapse aria-expanded=false
        aria-label="Toggle navigation"><span class=navbar-toggler-icon></span></button>

      <a class="navbar-brand">
        <span class="text-decoration-none text-dark">
          <img alt="Image placeholder" src="{{ asset('img/brand/favicon1.png') }}" id="navbar-logo">
          <span class="font-weight-bolder ml-2">Kost</span>
        </span>
      </a>

      <div class="collapse navbar-collapse navbar-collapse-overlay order-lg-3" id=navbar-main-collapse>
        <div class=position-relative>
          <button class=navbar-toggler type=button data-toggle=collapse data-target=#navbar-main-collapse
            aria-controls=navbar-main-collapse aria-expanded=false aria-label="Toggle navigation">
            <i data-feather=x></i>
          </button>
        </div>

        @include('components.header-sysadmin')

        <ul class="navbar-nav align-items-lg-center d-none d-lg-flex ml-lg-auto mr-4">
          <li class=nav-item>
            <a href="#" data-action="" data-target="" class="nav-link nav-link-icon px-2" data-placement="bottom"
              title="Cari">
              <i data-feather=search class=""></i>
            </a>
          </li>
          <li class="nav-item dropdown dropdown-animate">
            <a class="nav-link nav-link-icon px-2" href="#" role=button data-toggle="modal" data-placement="bottom"
              title="Pemberitahuan">
              <i data-feather=bell></i>
            </a>
          </li>
          <li class="nav-item dropdown dropdown-animate">
            <a href={{ route('logout') }} class="nav-link nav-link-icon px-2"
              onclick="event.preventDefault();document.getElementById('logout-form').submit();" data-placement="bottom"
              title="Keluar">
              <i data-feather=log-out></i>
            </a>
          </li>
        </ul>
      </div>

      <div class="order-lg-4 ml-lg-3">
        <a class="" href=#modal-profile role=button data-toggle=modal>
          <li class="nav-item dropdown dropdown-animate">
            <a class="nav-link nav-link-icon px-2" href="#" role=button data-toggle=dropdown aria-haspopup=true
              aria-expanded=false>
              <span class="avatar-content text-body font-weight-900 mr-5">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right dropdown-menu-arrow p-3">
              <h6 class="dropdown-header px-0 mb-2 text-success">Hi, {{ Auth::user()->name }}</h6>
              <div class=dropdown-divider></div>
              <a href="#" class=dropdown-item>
                <i data-feather=settings></i>
                <span>Pengaturan</span>
              </a>
              <a href={{ route('logout') }} class=dropdown-item
                onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i data-feather=log-out></i>
                <span>Keluar</span>
              </a>
            </div>
          </li>
          <span class="avatar rounded-circle border">
            <img alt="Image placeholder" src="{{asset('img/profile')}}/{{ Auth::user()->foto }}">
          </span>
        </a>
      </div>

    </div>
  </nav>
</header>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
  @csrf
</form>