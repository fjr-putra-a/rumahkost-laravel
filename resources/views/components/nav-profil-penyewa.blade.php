<section class="pt-5 bg-section-secondary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <div class="row align-items-center">
          <div class="col-auto"><img alt="Image placeholder" src="{{ asset('img/profile') }}/{{ $penyewa->foto }}"
              class="avatar avatar-xl rounded-circle rounded border"></div>
          <div class="col ml-n3 ml-md-n2">
            <h2 class="mb-0">@yield('nama')</h2><span class="text-muted d-block">@yield('email')</span>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>