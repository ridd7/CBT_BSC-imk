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
                <h5>Data Akun Tentor</h5>
                <a href="{{ route('tentor.create') }}" class="btn btn-sm btn-primary pull-right"><i class="bi bi-plus-circle"></i> Tambah</a>
            </div>
            <div class="card-block">
                
                <table class="table table-hover table-bordered" id="dataTable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Nama</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->iteration }}.</td>
                                <td>{{ $user->nama }}</td>
                                <td>
                                    <a href="{{ route('tentor.show', $user->username) }}" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a>
                                    <a href="{{ route('tentor.edit', $user->username) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                                    <form action="{{ route('tentor.destroy', $user->username) }}" method="POST" class="d-inline">
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