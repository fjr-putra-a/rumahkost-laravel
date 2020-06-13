@extends('layouts.dashboard-data')

@section('title', 'Kost | Penyewa')
@section('icon', 'users')
@section('heading', 'Penyewa')
@section('deskripsi', 'Tambah penyewa atau kelola data peyewa yang telah bergabung.')

@section('style')
<link rel=stylesheet href={{ asset('libs/bootstrap-daterangepicker/daterangepicker.css')}}>
@endsection

@section('script')
<script src="{{ asset('libs/jquery-mask-plugin/dist/jquery.mask.min.js')}}"></script>
<script src={{ asset('libs/moment.js/moment.min.js')}}> </script>
<script src={{ asset('libs/bootstrap-daterangepicker/daterangepicker.js')}}> </script>
<script src={{ asset('js/datepicker_sett.js')}}> </script>
<script type="text/javascript">
  $(function() {
    let start = moment();
    let end = moment().add(30,'days');
  
    $('input[id="start"]').val(start.format('YYYY-MM-DD'));
    $('input[id="end"]').val(end.format('YYYY-MM-DD'));
    
    $('input[id="daterange"]').daterangepicker({
      startDate: start,
      endDate: end,
      opens: 'left'
    }, function(start, end, label) {
      $('input[id="start"]').val(start.format('YYYY-MM-DD'));
      $('input[id="end"]').val(end.format('YYYY-MM-DD'));
    });
  });
</script>
@endsection

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
          <th scope="col">Nama</th>
          <th scope="col">Pekerjaan</th>
          <th scope="col">Kontak</th>
          <th scope="col">Kamar</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @foreach ($penyewa as $penyewa)
        <tr>
          <td scope="row">{{ $loop->iteration }}</td>
          <td>
            <div class="avatar-parent-child mr-3"><img alt="Image placeholder"
                src="{{asset('img/profile')}}/{{ $penyewa->foto }}" class="avatar rounded-circle">
            </div>
            {{ ucwords($penyewa->nama) }}
          </td>
          <td>{{ ucwords($penyewa->pekerjaan) }}</td>
          <td>{{ ucwords($penyewa->email) }} <br> {{ ucwords($penyewa->no_hp) }}</td>
          <td>
            {{$penyewa->kode_kamar}} <br>
            <span>{{date('d-m-Y', strtotime($penyewa->tanggal_masuk))}} -
              {{date('d-m-Y', strtotime($penyewa->tanggal_keluar))}}</span>
          </td>
          <td class="text-right">
            <div class="actions ml-3">
              <span class="mr-3">
                <a href="{{ route('admin.penyewa.profil',$penyewa->id) }}" data-toggle="tooltip"
                  data-original-title="Profil">
                  <i class="text-muted" data-feather="eye"></i>
                </a>
              </span>
              <span data-toggle="modal" data-target="#edit-{{ $penyewa->id }}">
                <button href="#" class="action-item text-muted mr-2" data-toggle="tooltip" title=""
                  data-original-title="Edit">
                  <i data-feather="edit"></i>
                </button>
              </span>
              <span data-toggle="modal" data-target="#hapus-{{ $penyewa->id }}">
                <button href="#" class="action-item text-danger mr-2" data-toggle="tooltip" title=""
                  data-original-title="Hapus">
                  <i data-feather="trash"></i>
                </button>
              </span>
            </div>
          </td>
        </tr>

        @component('templates.modal')
        @slot('id_modal') edit-{{ $penyewa->id }} @endslot
        @slot('modal_title', 'Edit Data')
        @slot('modal_submit', 'Edit')

        @slot('form_action')
        {{ route('admin.penyewa.edit', $penyewa->id) }}
        @endslot

        @csrf @method('patch')
        <div class="form-group">
          <label>Email</label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
            value="{{ $penyewa->email }}" required>
        </div>
        <div class="form-group">
          <label>Pekerjaan</label>
          <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror"
            value="{{ $penyewa->pekerjaan }}" required>
          <div class="invalid-feedback">
            Pekerjaan harus diisi
          </div>
        </div>
        <div class="form-group">
          <label class="form-control-label">Nomor HP</label>
          <input type="text" name="no_hp" class="form-control input-mask @error('no_hp') is-invalid @enderror"
            value="{{ $penyewa->no_hp }}" required data-mask="0000-0000-0000">
        </div>
        <div class="form-group">
          <label>Foto</label>
          <input type="file" name="foto" id="foto-{{ $penyewa->id}}" class="custom-input-file" />
          <label for="foto-{{ $penyewa->id}}">
            <i data-feather="upload" class="mr-2"></i>
            <span>Ubah Foto Penyewa</span>
          </label>
          <small class="text-danger">kosongkan jika tak ingin mengubah</small>
        </div>
        @endcomponent

        @component('templates.modal')
        @slot('id_modal') hapus-{{ $penyewa->id }} @endslot
        @slot('modal_title', 'Hapus Data')
        @slot('modal_submit', 'Hapus')
        @slot('modal_color', 'danger')

        @slot('form_action')
        {{ route('admin.penyewa.hapus', $penyewa->id) }}
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
{{ route('admin.penyewa.simpan') }}
@endslot

@csrf
<div class="form-group">
  <label>Nama</label>
  <input type="text" name="nama" class="form-control @error('nama') is-invalid @enderror" required>
  <div class="invalid-feedback">
    Nama harus diisi
  </div>
</div>
<div class="form-group">
  <label>Email</label>
  <input type="email" name="email" class="form-control @error('email') is-invalid @enderror">
  <div class="invalid-feedback">
    email harus diisi
  </div>
</div>
<div class="form-group">
  <label>Nomor KTP</label>
  <input type="number" name="nomor_ktp" class="form-control @error('nomor_ktp') is-invalid @enderror" required>
  <div class="invalid-feedback">
    Nomor KTP harus diisi
  </div>
</div>
<div class="form-group">
  <label>Jenis Kelamin</label>
  <br>
  <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" id="customRadio1" name="jk" class="custom-control-input @error('jk') is-invalid @enderror"
      value="Laki-laki" required>
    <label class="custom-control-label" for="customRadio1">Laki-laki</label>
  </div>
  <div class="custom-control custom-radio custom-control-inline">
    <input type="radio" id="customRadio2" name="jk" class="custom-control-input @error('jk') is-invalid @enderror"
      value="Perempuan" required>
    <label class="custom-control-label" for="customRadio2">Perempuan</label>
  </div>
  <div class="invalid-feedback">
    Jenis Kelamin harus dipilih
  </div>
</div>
<div class="form-group">
  <label>Pekerjaan</label>
  <input type="text" name="pekerjaan" class="form-control @error('pekerjaan') is-invalid @enderror" required>
  <div class="invalid-feedback">
    Pekerjaan harus diisi
  </div>
</div>
<div class="form-group">
  <label class="form-control-label">Nomor HP</label>
  <input type="text" name="no_hp" class="form-control input-mask @error('no_hp') is-invalid @enderror"
    data-mask="0000-0000-0000" required>
  <div class="invalid-feedback">
    Nomor HP harus diisi
  </div>
</div>
<div class="form-group">
  <label>Tanggal Sewa</label>
  <input type="text" id="daterange" class="datepicker form-control @error('daterange') is-invalid @enderror" required>
  <input type="text" id="start" name="tanggal_masuk" hidden>
  <input type="text" id="end" name="tanggal_keluar" hidden>
  <div class="invalid-feedback">
    Tanggal Sewa harus diisi
  </div>
</div>
<div class="form-group">
  <label for="kamar">Kamar</label>
  <select name="id_kamar" id="kamar" class="custom-select @error('id_kamar') is-invalid @enderror">
    <option selected disabled>Pilih kamar</option>
    @foreach ($kamar as $kmr)
    <option {{ old('kmr') == $kmr->id ? 'selected' : '' }} value="{{$kmr->id}}">
      {{$kmr->kode_kamar}} - {{$kmr->nama_fasilitas}}</option>
    @endforeach
  </select>
  <div class="invalid-feedback">
    kamar harus diisi
  </div>
</div>
<div class="form-group">
  <label>Foto</label>
  <input type="file" name="foto" id="foto" class="custom-input-file" />
  <label for="foto">
    <i data-feather="upload" class="mr-2"></i>
    <span>Unggah Foto</span>
  </label>
</div>
@endcomponent

@endsection