@extends('layouts.dashboard')

@section('title', 'Kost | Beranda')

@section('content')
<section class="slice py-0 px-3 bg-section-secondary">
  <div class="container-fluid">
    <div class="row align-items-center mb-2"></div>
    <div class="row mx-n2">

      <div class="col-lg-3 col-sm-6 px-2">
        <div class="card">
          <div class="card-body text-center">
            <div class="mb-3">
              <h1 class="text-success font-weight-bold">4</h1>
            </div>
            <h5 class="h4 font-weight-bolder mb-1">Fasilitas</h5>
            <span class="d-block text-sm text-muted">Jumlah Fasilitas yang <br> tersedia di Kost.</span>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6 px-2">
        <div class="card">
          <div class="card-body text-center">
            <div class="mb-3">
              <h1 class="text-success font-weight-bold">4</h1>
            </div>
            <h5 class="h4 font-weight-bolder mb-1">Kamar</h5>
            <span class="d-block text-sm text-muted">Jumlah kamar yang <br> tersedia di Kost.</span>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6 px-2">
        <div class="card">
          <div class="card-body text-center">
            <div class="mb-3">
              <h1 class="text-success font-weight-bold">3</h1>
            </div>
            <h5 class="h4 font-weight-bolder mb-1">Penyewa</h5>
            <span class="d-block text-sm text-muted">Total Penyewa yang <br> ada didalam Kost.</span>
          </div>
        </div>
      </div>

      <div class="col-lg-3 col-sm-6 px-2">
        <div class="card">
          <div class="card-body text-center">
            <div class="mb-3">
              <h1 class="text-success font-weight-bold">3</h1>
            </div>
            <h5 class="h4 font-weight-bolder mb-1">Transaksi</h5>
            <span class="d-block text-sm text-muted">Total Transaksi yang <br> terjadi di Kost.</span>
          </div>
        </div>
      </div>

    </div>
  </div>
</section>
@endsection