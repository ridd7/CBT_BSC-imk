@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Siswa</h5>
            </div>
            <div class="card-block">
                <form action="/akun/siswa" method="POST">
                    @csrf
                    <div class="form-group row mb-3">
                        <div class="col-sm-6">
                            <label for="username">Username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" autofocus>

                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong> 
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-6">
                            <label for="password">Kata Sandi</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="{{ old('password') }}">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong> 
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <a href="/akun/siswa" class="btn btn-sm btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i> Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection