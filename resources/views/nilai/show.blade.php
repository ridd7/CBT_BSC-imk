@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Daftar Nilai {{ $ujian->nama_ujian }}</h5>
                {{-- <a href="{{ route('export.nilai', $ujian->id_ujian) }}" class="btn btn-sm btn-success pull-right"><i class="bi bi-file-earmark-spreadsheet"></i> Export</a> --}}
            </div>
            <div class="card-block">
                <table class="table table-hover table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Asal Sekolah</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($nilai as $nilai)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $nilai->siswa->nama }}</td>
                                <td>{{ $nilai->siswa->asal_sekolah }}</td>
                                <td>{{ $nilai->nilai }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection