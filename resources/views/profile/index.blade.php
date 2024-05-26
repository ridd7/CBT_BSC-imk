@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        {{-- @if (session('success'))
            <div class="alert alert-success text-white bg-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif --}}

        @if (session('error'))
            <div class="alert alert-danger text-white bg-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif

        <div class="card">
            <div class="card-header">
                <h5>Akun Saya</h5>
            </div>
            <div class="card-block">
                <div class="row justify-content-center">
                    <div class="col-sm-2 mb-3">
                        @if ($user->foto)
                            <img src="{{ asset('storage/' . $user->foto) }}" alt="Profile Picture" class="img-fluid">
                        @else
                            <img src="{{ asset('img/avatar.png') }}" alt="Profile Picture" class="img-fluid">
                        @endif
                    </div>
                </div>
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <td>Nama</td>
                            <td>:</td>
                            <td>{{ $user->nama }}</td>
                        </tr>
                        <tr>
                            <td>Username</td>
                            <td>:</td>
                            <td>{{ $user->username }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        @if ($user->role == 'siswa')
                            <tr>
                                <td>Asal Sekolah</td>
                                <td>:</td>
                                <td>{{ $siswa->asal_sekolah }}</td>
                            </tr>
                        @endif
                        <tr>
                            <td>No. Hp</td>
                            <td>:</td>
                            <td>{{ $user->no_hp }}</td>
                        </tr>
                    </tbody>
                </table>
                <a href="/dashboard" class="btn btn-sm btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
                <a href="/profile/{{ $user->username }}/edit" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
            </div>
        </div>

        {{-- Change password --}}
        <div class="card">
            <div class="card-header">
                <h5>Ubah Kata Sandi</h5>
            </div>
            <div class="card-block">
                <form action="/profile/password/{{ $user->username }}" method="POST">
                    @method('PUT')
                    @csrf
                    <div class="form-group row mb-3">
                        <label for="old-password" class="form-label col-sm-2">Kata sandi saat ini</label>
                        <div class="col-sm-6">
                            <input type="password" id="old-password" name="old_password" class="form-control @error('old_password') is-invalid @enderror" required>
    
                            @error('old_password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="password" class="form-label col-sm-2">Kata sandi baru</label>
                        <div class="col-sm-6">
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" required>
    
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <label for="password-confirm" class="form-label col-sm-2">Konfirmasi kata sandi baru</label>
                        <div class="col-sm-6">
                            <input type="password" id="password-confirm" name="password_confirmation" class="form-control @error('password-confirmation') is-invalid @enderror" required>
    
                            @error('password-confirmation')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <a href="/profile" class="btn btn-sm btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
                    {{-- <input type="submit" class="btn btn-sm btn-success" value="Ubah"> --}}
                    <button type="submit" class="btn btn-sm btn-success"><i class="bi bi-save"></i> Simpan</button>
                </form>
            </div>
        </div>
        {{-- End of change password --}}

    </div>
</div>
@endsection