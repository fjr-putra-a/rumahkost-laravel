@extends('layouts.report')

@section('title', 'Laporan | Penyewa Kost')

@section('content')
<div class="container my-4">

  <div id="judul" class="mb-5">
    <div class="text-center">
      <h2 class="font-weight-bolder">Laporan Penyewa Kost</h2>
    </div>
  </div>

  <table class="table table-bordered align-items-center border border-2">
    <thead class="thead-light">
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nama</th>
        <th scope="col">Nomor HP</th>
        <th scope="col">Kode Kamar</th>
        <th scope="col">Tanggal Sewa</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($penyewa as $p)
      <tr>
        <td scope="row">{{ $loop->iteration }}</td>
        <td>{{ $p->nama }}</td>
        <td>{{ $p->no_hp }}</td>
        <td>{{ $p->kode_kamar }}</td>
        <td><span>{{date('d-m-Y', strtotime($p->tanggal_masuk))}} -
            {{date('d-m-Y', strtotime($p->tanggal_keluar))}}</span></td>
      </tr>
      @endforeach
    </tbody>
  </table>

</div>
@endsection