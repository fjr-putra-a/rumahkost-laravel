@extends('layouts.dashboard-data')

@section('title', 'Kost | Kamar')
@section('icon', 'home')
@section('heading', 'Kamar')
@section('deskripsi', 'Kelola data kamar untuk digunakan pada inputan yang lain.')

@section('button')
<button type="button" data-toggle="modal" data-target="#input"
  class="btn btn-sm btn-primary btn-icon-only rounded-circle">
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
          <th scope="col">Kode Kamar</th>
          <th scope="col">Fasilitas</th>
          <th scope="col">Status</th>
          <th scope="col">Tarif</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kamar as $kamar)
        <tr>
          <td scope="row">{{ $loop->iteration }}</td>
          <td>{{ ucwords($kamar->kode_kamar) }}</td>
          <td>{{ ucwords($kamar->nama_fasilitas) }}</td>
          <td>
            @if ($kamar->status_kamar == 'Kosong')
            <span class="badge badge-success">{{$kamar->status_kamar}}</span>
            @elseif ($kamar->status_kamar == 'Terisi')
            <span class="badge badge-danger">{{$kamar->status_kamar}}</span>
            @endif
          </td>
          <td>Rp. <span class="">{{ucfirst($kamar->tarif)}}</span>,- <span class="p text-muted">/Bulan</span></td>
          <td class="text-right">
            <div class="actions ml-3">
              <span data-toggle="modal" data-target="#edit-{{ $kamar->id }}">
                <button href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Edit">
                  <i data-feather="edit"></i>
                </button>
              </span>
              <span data-toggle="modal" data-target="#hapus-{{ $kamar->id }}">
                <button href="#" class="action-item text-danger mr-2" data-toggle="tooltip" title=""
                  data-original-title="Hapus">
                  <i data-feather="trash"></i>
                </button>
              </span>
            </div>
          </td>
        </tr>

        @component('templates.modal')
        @slot('id_modal') edit-{{ $kamar->id }} @endslot
        @slot('modal_title', 'Edit Data')
        @slot('modal_submit', 'Edit')

        @slot('form_action')
        {{ route('admin.kamar.edit', $kamar->id) }}
        @endslot

        @csrf @method('patch')
        <div class="form-group">
          <label for="fasilitas">Pilih Fasilitas</label>
          <select name="id_fasilitas" id="fasilitas" class="form-control @error('id_fasilitas') is-invalid @enderror">
            <option selected disabled>Pilih Fasilitas</option>
            @foreach ($fasilitas as $f)
            <option {{ $kamar->id_fasilitas == $f->id ? 'selected' : '' }} value="{{$f->id}}">
              {{$f->nama_fasilitas}}</option>
            @endforeach
          </select>
        </div>
        <div class="form-group">
          <label>Tarif</label>
          <div class="input-group input-group-merge">
            <input type="text" name="tarif"
              class="form-control form-control-prepend @error('tarif') is-invalid @enderror" value="{{ $kamar->tarif }}"
              required placeholder="" aria-label="" aria-describedby="basic-addon1">
            <div class="input-group-prepend">
              <span class="input-group-text text-muted" id="basic-addon1">Rp.</span>
            </div>
            <div class="invalid-feedback">
              Tarif harus diisi
            </div>
          </div>
        </div>
        @endcomponent

        @component('templates.modal')
        @slot('id_modal') hapus-{{ $kamar->id }} @endslot
        @slot('modal_title', 'Hapus Data')
        @slot('modal_submit', 'Hapus')
        @slot('modal_color', 'danger')

        @slot('form_action')
        {{ route('admin.kamar.hapus', $kamar->id) }}
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
{{ route('admin.kamar.simpan') }}
@endslot

@csrf
<div class="form-group">
  <label for="fasilitas">Fasilitas</label>
  <select name="id_fasilitas" id="fasilitas" class="custom-select @error('id_fasilitas') is-invalid @enderror">
    <option selected disabled>Pilih Fasilitas</option>
    @foreach ($fasilitas as $fasilita)
    <option {{ old('fasilitas') == $fasilita->id ? 'selected' : '' }} value="{{$fasilita->id}}">
      {{$fasilita->nama_fasilitas}}</option>
    @endforeach
  </select>
  <div class="invalid-feedback">
    Fasilitas harus diisi
  </div>
</div>
<div class="form-group">
  <label for="fasilitas">Tarif</label>
  <div class="input-group input-group-merge">
    <input type="text" name="tarif" class="form-control form-control-prepend @error('tarif') is-invalid @enderror"
      required placeholder="" aria-label="" aria-describedby="basic-addon1">
    <div class="input-group-prepend">
      <span class="input-group-text text-muted" id="basic-addon1">Rp.</span>
    </div>
    <div class="invalid-feedback">
      Tarif harus diisi
    </div>
  </div>
</div>
@endcomponent

@endsection