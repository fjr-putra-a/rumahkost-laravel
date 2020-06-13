@extends('layouts.dashboard-profil')

@section('title', 'Kost | Penyewa')
@section('nama', ($penyewa->nama))
@section('email', ($penyewa->email))

@section('content')
<section class="pt-5 bg-section-secondary">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-9">
        <h6 class="mb-3">Profil Penyewa</h6>
        <div class="row">
          <div class="col-xl-6">
            <div class="card card-fluid">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-sm mb-0"><i class="fas fa-address-card mr-2"></i>Nomor KTP</h6>
                  </div>
                  <div class="col-auto"><span class="text-sm">{{ $penyewa->nomor_ktp }}</span></div>
                </div>
                <hr class="my-3">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-sm mb-0"><i class="fas fa-transgender ml-1 mr-2"></i>Jenis Kelamin</h6>
                  </div>
                  <div class="col-auto"><span class="text-sm">{{ $penyewa->jk }}</span></div>
                </div>
                <hr class="my-3">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-sm mb-0"><i class="fas fa-briefcase mr-2"></i>Pekerjaan</h6>
                  </div>
                  <div class="col-auto"><span class="text-sm">{{ $penyewa->pekerjaan }}</span></div>
                </div>
                <hr class="my-3">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-sm mb-0"><i class="fas fa-mobile-alt ml-1 mr-2"></i>Nomor HP</h6>
                  </div>
                  <div class="col-auto"><span class="text-sm">{{ $penyewa->no_hp }}</span></div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-6">
            <div class="card card-fluid">
              <div class="card-body">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-sm mb-0"><i class="fas fa-home mr-2"></i>Kode Kamar</h6>
                  </div>
                  <div class="col-auto"><span class="text-sm">{{ $penyewa->kode_kamar }}</span></div>
                </div>
                <hr class="my-3">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-sm mb-0"><i class="fas fa-calendar-check mr-2"></i>Tanggal Sewa</h6>
                  </div>
                  <div class="col-auto"><span
                      class="text-sm">{{date('d-m-Y', strtotime($penyewa->tanggal_masuk))}}</span>
                  </div>
                </div>
                <hr class="my-3">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-sm mb-0"><i class="fas fa-calendar-times mr-2"></i>Tanggal Selesai</h6>
                  </div>
                  <div class="col-auto"><span
                      class="text-sm">{{date('d-m-Y', strtotime($penyewa->tanggal_keluar))}}</span>
                  </div>
                </div>
                <hr class="my-3">
                <div class="row align-items-center">
                  <div class="col">
                    <h6 class="text-sm mb-0"><i class="fas fa-dollar-sign ml-1 mr-2"></i></i>Tarif</h6>
                  </div>
                  <div class="col-auto"><span class="text-sm">Rp. {{ $penyewa->tarif }}</span>-,
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection