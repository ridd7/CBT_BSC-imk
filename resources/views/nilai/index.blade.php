@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                @if ((auth()->user()->role == 'admin') || (auth()->user()->role == 'tentor'))
                    <h5>Daftar Nilai</h5>
                @endif
                @if (auth()->user()->role == 'siswa')
                    <h5>Riwayat Ujian</h5>
                @endif
            </div>
            <div class="card-block">
                @if (auth()->user()->role == 'admin')
                    <div class="row">
                        @if ($data->count())
                            @foreach ($data as $ujian)
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">{{ $ujian->nama_ujian }}</h5>
                                            {{-- <p class="card-subtitle mb-2 text-muted">{{ $ujian->tentor->nama }}</p> --}}
                                            <a href="{{ route('nilai.show', $ujian->slug) }}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
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

                @if (auth()->user()->role == 'tentor')
                    <div class="row">
                        @if ($exam->count())
                            @foreach ($exam as $exam)
                                <div class="col-sm-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title mb-3">{{ $exam->nama_ujian }}</h5>
                                            {{-- <p class="card-subtitle mb-2 text-muted">{{ $ujian->tentor->nama }}</p> --}}
                                            <a href="{{ route('nilai.show', $exam->slug) }}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
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

                @if (auth()->user()->role == 'siswa')
                <table class="table table-hover table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama Ujian</th>
                            <th>Tanggal</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilai as $nilai)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $nilai->ujian->nama_ujian }}</td>
                                <td>{{ date('d-m-Y', strtotime($nilai->tanggal)) }}</td>
                                <td>{{ $nilai->nilai }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection