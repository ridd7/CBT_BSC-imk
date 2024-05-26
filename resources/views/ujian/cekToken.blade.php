@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        @if (session()->has('status'))
            <div class="alert alert-success text-white bg-danger alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h5>{{ $ujian->nama_ujian }}</h5>
            </div>
            <div class="card-block">
                <form action="{{ route('cekToken') }}" method="POST">
                    @csrf
                    <input type="hidden" name="id_ujian" value="{{ $ujian->id_ujian }}">
                    <div class="form-group row mb-3">
                        <div class="col-sm-6">
                            <label for="token">Token</label>
                            <input type="text" class="form-control @error('token') is-invalid @enderror" id="token" name="token" value="{{ old('token') }}" placeholder="Masukkan token untuk memulai ujian" autofocus required>

                            @error('token')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong> 
                                </span>
                            @enderror
                        </div>
                    </div>
                    
                    <a href="/ujian" class="btn btn-sm btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
                    <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-send"></i> Mulai</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection