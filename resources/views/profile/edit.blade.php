@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit Profile</h5>
            </div>
            <div class="card-block">
                <form action="/profile/{{ $user->username }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf

                    <div class="row">
                        <div class="col-sm-8">
                            <div class=" mb-3">
                                <label for="foto" class="form-label col-sm-2">Foto Profil</label>
                                <input type="hidden" name="oldImg" value="{{ $user->foto }}">
                                <div class="row">
                                    <div class="col sm-2">
                                        @if ($user->foto)
                                            <img src="{{ asset('storage/' . $user->foto) }}" alt="User Profile" class="img-preview img-fluid col-sm-3 mb-3">
                                        @else
                                            <img src="{{ asset('img/avatar.png') }}" alt="User Profile" class=" img-preview img-fluid col-sm-3 mb-3">
                                        @endif
                                    </div>
                                </div>
                                {{-- <div class=""> --}}
                                    <input class="form-control form-control-sm @error('foto') is-invalid @enderror" type="file" id="foto" name="foto" onchange="previewImage()">
        
                                    @error('foto')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="nama" class="form-label col-sm-2">Nama</label>
                        <div class="col-sm-6">
                            <input type="text" id="nama" name="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $user->nama) }}" autofocus>
    
                            @error('nama')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="username" class="form-label col-sm-2">Username</label>
                        <div class="col-sm-6">
                            <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username', $user->username) }}">
    
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-group row mb-3">
                        <label for="email" class="form-label col-sm-2">Email</label>
                        <div class="col-sm-6">
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email', $user->email) }}">
    
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    @if ($user->role == 'siswa')
                        <div class="form-group row mb-3">
                            <label for="asal_sekolah" class="form-label col-sm-2">Asal Sekolah</label>
                            <div class="col-sm-6">
                                <input type="text" id="asal_sekolah" name="asal_sekolah" class="form-control @error('asal_sekolah') is-invalid @enderror" value="{{ old('asal_sekolah', $siswa->asal_sekolah) }}">
        
                                @error('asal_sekolah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    @endif

                    <div class="form-group row mb-3">
                        <label for="no_hp" class="form-label col-sm-2">No.Hp</label>
                        <div class="col-sm-6">
                            <input type="text" id="no_hp" name="no_hp" class="form-control @error('no_hp') is-invalid @enderror" value="{{ old('no_hp', $user->no_hp) }}">
    
                            @error('no_hp')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <a href="/profile" class="btn btn-sm btn-danger"><i class="bi bi-x-circle"></i> Batal</a>
                    {{-- <input type="submit" class="btn btn-sm btn-success" value="Simpan"> --}}
                    <button type="submit" class="btn btn-sm btn-success"><i class="bi bi-save"></i> Simpan</button>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection