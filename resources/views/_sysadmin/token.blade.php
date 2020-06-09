@extends('layouts.dashboard-data')

@section('title', 'Kost | Token')
@section('icon', 'zap')
@section('heading', 'Token')
@section('deskripsi', 'Kelola data token untuk digunakan pada inputan yang lain.')

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
          <th scope="col">Token</th>
          <th scope="col">Harga</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($token as $token)
        <tr>
          <td scope="row">{{ $loop->iteration }}</td>
          <td>{{ ucwords($token->token_listrik) }}</td>
          <td>Rp. <span class="">{{$token->jumlah_biaya}}</span>,-</td>
          <td class="text-right">
            <div class="actions ml-3">
              <span data-toggle="modal" data-target="#edit-{{ $token->id }}">
                <button href="#" class="action-item mr-2" data-toggle="tooltip" title="" data-original-title="Edit">
                  <i data-feather="edit"></i>
                </button>
              </span>
              <span data-toggle="modal" data-target="#hapus-{{ $token->id }}">
                <button href="#" class="action-item text-danger mr-2" data-toggle="tooltip" title=""
                  data-original-title="Hapus">
                  <i data-feather="trash"></i>
                </button>
              </span>
            </div>
          </td>
        </tr>

        @component('templates.modal')
        @slot('id_modal') edit-{{ $token->id }} @endslot
        @slot('modal_title', 'Edit Data')
        @slot('modal_submit', 'Edit')

        @slot('form_action')
        {{ route('admin.token.edit', $token->id) }}
        @endslot

        @csrf @method('patch')
        <div class="form-group">
          <label>Harga</label>
          <div class="input-group input-group-merge">
            <input type="text" name="jumlah_biaya"
              class="form-control form-control-prepend @error('jumlah_biaya') is-invalid @enderror"
              value="{{ $token->jumlah_biaya }}" required placeholder="" aria-label="" aria-describedby="basic-addon1">
            <div class="input-group-prepend">
              <span class="input-group-text text-muted" id="basic-addon1">Rp.</span>
            </div>
            <div class="invalid-feedback">
              Harga harus diisi
            </div>
          </div>
        </div>
        @endcomponent

        @component('templates.modal')
        @slot('id_modal') hapus-{{ $token->id }} @endslot
        @slot('modal_title', 'Hapus Data')
        @slot('modal_submit', 'Hapus')
        @slot('modal_color', 'danger')

        @slot('form_action')
        {{ route('admin.token.hapus', $token->id) }}
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
{{ route('admin.token.simpan') }}
@endslot

@csrf
<div class="form-group">
  <label>Token</label>
  <input type="text" name="token_listrik" class="form-control @error('token_listrik') is-invalid @enderror" required>
  <div class="invalid-feedback">
    Token harus diisi
  </div>
</div>
<div class="form-group">
  <label>Harga</label>
  <div class="input-group input-group-merge">
    <input type="text" name="jumlah_biaya"
      class="form-control form-control-prepend @error('jumlah_biaya') is-invalid @enderror" required placeholder=""
      aria-label="" aria-describedby="basic-addon1">
    <div class="input-group-prepend">
      <span class="input-group-text text-muted" id="basic-addon1">Rp.</span>
    </div>
    <div class="invalid-feedback">
      Harga harus diisi
    </div>
  </div>
</div>
@endcomponent

@endsection