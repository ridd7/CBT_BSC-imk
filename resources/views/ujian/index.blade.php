@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        @if (session()->has('status'))
            <div class="alert alert-success text-white bg-success alert-dismissible fade show" role="alert">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        @endif
        <div class="card">
            <div class="card-header">
                <h5>Ujian</h5>
                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'tentor')
                    <a href="/ujian/create" class="btn btn-sm btn-primary pull-right"><i class="bi bi-plus-circle"></i> Tambah</a>
                @endif
            </div>
            <div class="card-block">
                @if (auth()->user()->role == 'admin' || auth()->user()->role == 'siswa')
                    <div class="row">
                        @if ($data->count())
                            @foreach ($data as $ujian)
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">{{ $ujian->nama_ujian }}</h5>
                                            <p class="card-subtitle mb-2 text-muted">{{ $ujian->tentor->nama }}</p>

                                            @if (auth()->user()->role == 'admin')
                                                <a href="{{ route('ujian.show', $ujian->slug) }}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                                <form action="{{ route('ujian.destroy', $ujian->slug) }}" method="POST" class="d-inline">
                                                    @method('delete')
                                                    @csrf
                                                    <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                                </form>
                                            @endif

                                            @if (auth()->user()->role == 'siswa')
                                                <a href="{{ route('token', $ujian->slug) }}" class="btn btn-sm btn-primary"><i class="bi bi-box-arrow-in-right"></i></a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div>
                                <i>Tidak ada ujian.</i> 
                                @if (auth()->user()->role == 'admin')
                                    <a href="{{ route('ujian.create') }}" class="text-dark">Tambah disini</a>
                                @endif
                            </div>
                        @endif
                    </div>
                @endif

                @if (auth()->user()->role == 'tentor')
                    <div class="row">
                        @if ($exam->count())
                            @foreach ($exam as $exam)
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">{{ $exam->nama_ujian }}</h5>
                                            <a href="{{ route('ujian.show', $exam->slug) }}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div>
                                <i>Tidak ada ujian.</i> <a href="{{ route('ujian.create') }}" class="text-dark">Tambah disini</a>
                            </div>
                        @endif
                    </div>
                @endif

                
            </div>
        </div>
    </div>
</div>
@endsection