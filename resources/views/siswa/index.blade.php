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
                <h5>Data Akun Siswa</h5>
                <a href="{{ route('siswa.create') }}" class="btn btn-sm btn-primary pull-right"><i class="bi bi-plus-circle"></i> Tambah</a>
            </div>
            <div class="card-block">
                
                <table class="table table-hover table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Asal Sekolah</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $student->nama }}</td>
                                <td>{{ $student->asal_sekolah }}</td>
                                <td>
                                    <a href="{{ route('siswa.show', $student->username) }}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('siswa.edit', $student->username) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('siswa.destroy', $student->username) }}" method="POST" class="d-inline">
                                        @method('delete')
                                        @csrf
                                        <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection