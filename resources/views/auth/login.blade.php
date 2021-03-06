@extends('layouts.auth')

@section('title', 'Kost | kami')

@section('content')
<section>
    <div class="container d-flex flex-column">
        <div class="row align-items-center justify-content-center min-vh-100">
            <div class="col-md-6 col-lg-5 col-xl-4 py-6 py-md-0 mb-5">
                <div>
                    <div class="mb-3 text-center">
                        <h6 class="h1 mb-1">Admin</h6>
                        <p class="text-muted mb-0">Masukkan email dan password <br> untuk melanjutkan.</p>
                    </div>
                    <span class="clearfix"></span>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group"><label class="form-control-label">Email</label>
                            <div class="input-group">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <div class="d-flex align-items-center justify-content-between">
                                <div><label class="form-control-label">Password</label></div>
                            </div>
                            <div class="input-group">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4"><button type="submit" class="btn btn-block btn-primary">Masuk</button></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection