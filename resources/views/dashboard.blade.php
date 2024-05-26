@extends('layouts.app')

@section('content')
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <h5>Selamat Datang, {{ auth()->user()->nama }}</h5>
      </div>
      <div class="card-block">
        @if (auth()->user()->role == 'admin')
          <div class="row">
            <div class="col-sm-4">
              <div class="card text-center">
                <div class="card-header bg-success text-white">
                  <h6>Jumlah Ujian</h6>
                </div>
                <div class="card-body">
                  <h4 class="card-title">{{ $ujian->count() }}</h4>
                </div>
                <div class="card-footer">
                  <a href="/ujian" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> Lihat</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card text-center">
                <div class="card-header bg-info text-white">
                  <h6>Jumlah Tentor</h6>
                </div>
                <div class="card-body">
                  <h4 class="card-title">{{ $tentor->count() }}</h4>
                </div>
                <div class="card-footer">
                  <a href="/akun/tentor" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> Lihat</a>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="card text-center">
                <div class="card-header bg-dark text-white">
                  <h6>Jumlah Siswa</h6>
                </div>
                <div class="card-body">
                  <h4 class="card-title">{{ $siswa->count() }}</h4>
                </div>
                <div class="card-footer">
                  <a href="/akun/siswa" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> Lihat</a>
                </div>
              </div>
            </div>
          </div>
        @endif

        @if ((auth()->user()->role == 'tentor') || (auth()->user()->role == 'siswa'))
            <div class="card bg-primary">
              <div class="card-body">
                <div class="container px-5">
                  <h3 class="text-center mb-5">BINJAI SCIENCE COLLEGE</h3>
                  <div class="text-justify">
                    <p class="fs-6">
                      Selamat datang di Aplikasi Ujian Binjai Science College! Platform ini merupakan media yang dapat memfasilitasi proses ujian siswa di BSC secara daring.
                    </p>
                    <p class="fs-6">
                      Setiap pengguna diharapkan untuk segera mengubah <strong>KATA SANDI</strong> default saat pertama kali login untuk keamanan akun melalui menu <strong>Profile > Ubah Kata Sandi</strong>. Dan mohon untuk melengkapi data Anda pada menu <strong>Profile > Akun Saya > Edit</strong>
                    </p>
                    <p class="mt-5 text-center">Demikian Pengumuman ini dibuat, Terima Kasih</p>
                  </div>
                </div>
              </div>
            </div>
        @endif

        @if (auth()->user()->role == 'tentor')
            <div class="row">
              <div class="col-sm-4">
                <div class="card text-center">
                  <div class="card-header bg-success text-white">
                    <h6>Jumlah Ujian</h6>
                  </div>
                  <div class="card-body">
                    <h4 class="card-title">{{ $ujian->count() }}</h4>
                  </div>
                  <div class="card-footer">
                    <a href="/ujian" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i> Lihat</a>
                  </div>
                </div>
              </div>
            </div>
        @endif
      </div>
    </div>
  </div>
</div>
@endsection
