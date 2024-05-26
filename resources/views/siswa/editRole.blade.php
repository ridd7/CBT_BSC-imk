@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Update Role</h5>
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
                <form action="{{ route('siswa.upRole', $user->username) }}" method="POST">
                    @csrf
                    @method('PUT')
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
                                <td>Asal Sekolah</td>
                                <td>:</td>
                                <td>{{ $siswa->asal_sekolah }}</td>
                            </tr>
                            <tr>
                                <td>No. Hp</td>
                                <td>:</td>
                                <td>{{ $user->no_hp }}</td>
                            </tr>
                            <tr>
                                <td>Role</td>
                                <td>:</td>
                                <td>
                                    <select name="role" id="role" class="form-select form-control-sm col-md-3" autofocus>
                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                        <option value="tentor" {{ $user->role == 'tentor' ? 'selected' : '' }}>Tentor</option>
                                        <option value="siswa" {{ $user->role == 'siswa' ? 'selected' : '' }}>Siswa</option>
                                    </select> 
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    <a href="{{ route('siswa.show', $user->username) }}" class="btn btn-sm btn-danger"><i class="bi bi-x-circle"></i> Batal</a>
                    <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-success"><i class="bi bi-person-check"></i> Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection