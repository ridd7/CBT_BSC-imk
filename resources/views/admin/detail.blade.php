@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Detail Akun</h5>
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
                        <tr>
                            <td>No. Hp</td>
                            <td>:</td>
                            <td>{{ $user->no_hp }}</td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td>:</td>
                            <td>{{ $user->role }}</td>
                        </tr>
                    </tbody>
                </table>
                {{-- <a href="/profile/{{ $user->username }}/edit" class="btn btn-sm btn-primary" >Ubah</a> --}}
                <a href="{{ route('admin.index') }}" class="btn btn-sm btn-secondary"><i class="bi bi-arrow-left-circle"></i> Kembali</a>
                <a href="{{ route('admin.edit', $user->username) }}" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i> Edit</a>
                {{-- <a href="{{ route('admin.role', $user->username) }}" class="btn btn-sm btn-success"><i class="bi bi-person-plus"></i> Update Role</a> --}}
            </div>
        </div>
    </div>
</div>
@endsection