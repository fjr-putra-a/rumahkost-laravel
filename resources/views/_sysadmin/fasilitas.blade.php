@extends('layouts.dashboard-data')

@section('title', 'Kost | Fasilitas')
@section('icon', 'layers')
@section('heading', 'Fasilitas')
@section('deskripsi', 'Kelola data fasilitas untuk digunakan pada inputan yang lain.')

@section('button')
<button type="button" data-toggle="modal" data-target="#input"
  class="btn btn-sm btn-success btn-icon-only rounded-circle">
  <span class="btn-inner--icon"><i class="fas fa-plus"></i></span>
</button>
@endsection

@section('content')

@if(session('alert'))
<div class="alert alert-success alert-dismissible fade show shadow" role="alert">
  {{ session('alert') }}
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
@endif

<div class="bg-white p-3 rounded-lg shadow">
  <div class="table-responsive">
    <table class="table align-items-center" id="datatables">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Nama Fasilitas</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($fasilitas as $fasilitas)
        <tr>
          <td scope="row">{{ $loop->iteration }}</td>
          <td>{{ ucwords($fasilitas->nama_fasilitas) }}</td>
          <td class="text-right">
            <div class="actions ml-3">
              <span data-toggle="modal" data-target="#edit-{{ $fasilitas->id }}">
                <button href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Edit">
                  <i data-feather="edit"></i>
                </button>
              </span>
              <span data-toggle="modal" data-target="#hapus-{{ $fasilitas->id }}">
                <button href="#" class="action-item text-danger mr-2" data-toggle="tooltip" title=""
                  data-original-title="Hapus">
                  <i data-feather="trash"></i>
                </button>
              </span>
            </div>
          </td>
        </tr>

        @component('templates.modal')
        @slot('id_modal') edit-{{ $fasilitas->id }} @endslot
        @slot('modal_title', 'Edit Data')
        @slot('modal_submit', 'Edit')

        @slot('form_action')
        {{ route('admin.fasilitas.edit', $fasilitas->id) }}
        @endslot

        @csrf @method('patch')
        <div class="form-group">
          <label>Nama Fasilitas</label>
          <input type="text" name="nama_fasilitas" class="form-control @error('nama_fasilitas') is-invalid @enderror"
            value="{{ $fasilitas->nama_fasilitas }}" required>
          <div class="invalid-feedback">
            nama fasilitas harus diisi
          </div>
        </div>
        @endcomponent

        @component('templates.modal')
        @slot('id_modal') hapus-{{ $fasilitas->id }} @endslot
        @slot('modal_title', 'Hapus Data')
        @slot('modal_submit', 'Hapus')
        @slot('modal_color', 'danger')

        @slot('form_action')
        {{ route('admin.fasilitas.hapus', $fasilitas->id) }}
        @endslot

        @csrf @method('delete')
        <h5 class="text-center">Apakah Anda yakin akan menghapus data ini?</h5>
        @endcomponent

        @endforeach
      </tbody>
    </table>
  </div>
</div>

@component('templates.modal')
@slot('id_modal', 'input')
@slot('modal_title', 'Tambah Data')
@slot('modal_submit', 'Simpan')

@slot('form_action')
{{ route('admin.fasilitas.simpan') }}
@endslot

@csrf
<div class="form-group">
  <label>Nama Fasilitas</label>
  <input type="text" name="nama_fasilitas" class="form-control @error('nama_fasilitas') is-invalid @enderror" required>
  <div class="invalid-feedback">
    Nama kategori lowongan harus diisi
  </div>
</div>
@endcomponent

@endsection