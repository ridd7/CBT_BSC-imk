@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Tambah Ujian</h5>
            </div>
            <div class="card-block">
                <form action="/ujian" method="POST">
                    @csrf

                    @if (auth()->user()->role == 'tentor')
                        <input type="hidden" name="id_tentor" value="{{ $tentor->id_tentor }}">
                    @endif

                    @if (auth()->user()->role == 'admin')
                    <div class="form-group row mb-3">
                        <div class="col-sm-6">
                            <label for="id_tentor">Nama Tentor</label>
                            <select name="id_tentor" id="id_tentor" class="form-select @error('id_tentor') is-invalid @enderror" autofocus>
                                @foreach ($data as $tentor)
                                    <option value="{{ $tentor->id_tentor }}">{{ $tentor->nama }}</option>
                                @endforeach
                            </select>

                            @error('id_tentor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong> 
                                </span>
                            @enderror
                        </div>
                    </div>
                    @endif

                    <div class="form-group row mb-3">
                        <div class="col-sm-6">
                            <label for="nama_ujian">Nama Ujian</label>
                            <input type="text" class="form-control @error('nama_ujian') is-invalid @enderror" id="nama_ujian" name="nama_ujian" value="{{ old('nama_ujian') }}" required>

                            @error('nama_ujian')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong> 
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-6">
                            <label for="token">Token</label>
                            <input type="text" class="form-control @error('token') is-invalid @enderror" id="token" name="token" value="{{ old('token') }}" required>

                            @error('token')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong> 
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-sm-6">
                            <label for="waktu">Waktu (menit)</label>
                            <input type="number" class="form-control @error('waktu') is-invalid @enderror" id="waktu" name="waktu" value="{{ old('waktu') }}" required>

                            @error('waktu')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong> 
                                </span>
                            @enderror
                        </div>
                    </div>
                    <a href="/ujian" class="btn btn-sm btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-plus-circle"></i> Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection