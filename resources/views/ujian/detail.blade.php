@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-lg-3">
                        <h5>{{ $ujian->nama_ujian }}</h5>
                    </div>
                    <div class="col-lg-3">
                        <span>Waktu: {{ $ujian->waktu }} menit</span>
                    </div>
                    <div class="col-lg-3">
                        <span>Jumlah soal: {{ $ujian->jumlah_soal }}</span>
                    </div>
                    <div class="col-lg-3">
                        <a href="{{ route('tambahSoal', $ujian->slug) }}" class="btn btn-sm btn-primary pull-right"><i class="bi bi-plus-square"></i> Tambah Soal</a>
                    </div>
                </div>
            </div>
            <div class="card-block">
                @if (session()->has('status'))
                    <div class="alert alert-success text-white bg-success alert-dismissible fade show" role="alert">
                        {{ session('status') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                @foreach ($soal as $soal)
                    <div class="card">
                        <div class="card-body">
                            @if ($soal->gambar_soal)
                                <div class="row">
                                    <div class="col-lg-4">
                                        <img src="{{ asset('storage/' . $soal->gambar_soal) }}" alt="Gambar Soal" class="img-fluid" style="width: 200px">
                                    </div>
                                </div>
                            @endif
                            <p class="card-text">{!! $soal->isi_soal !!}</p>

                            <ol type="A">
                                <li class="mb-3">
                                    @if ($soal->gambar_pil_a)
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <img src="{{ asset('storage/' . $soal->gambar_pil_a) }}" alt="Gambar Soal" class="img-fluid" style="width: 200px">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $soal->pil_a !!}
                                </li>

                                <li class="mb-3">
                                    @if ($soal->gambar_pil_b)
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <img src="{{ asset('storage/' . $soal->gambar_pil_b) }}" alt="Gambar Soal" class="img-fluid" style="width: 200px">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $soal->pil_b !!}
                                </li>

                                <li class="mb-3">
                                    @if ($soal->gambar_pil_c)
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <img src="{{ asset('storage/' . $soal->gambar_pil_c) }}" alt="Gambar Soal" class="img-fluid" style="width: 200px">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $soal->pil_c !!}
                                </li>

                                <li class="mb-3">
                                    @if ($soal->gambar_pil_d)
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <img src="{{ asset('storage/' . $soal->gambar_pil_d) }}" alt="Gambar Soal" class="img-fluid" style="width: 200px">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $soal->pil_d !!}
                                </li>

                                <li class="mb-3">
                                    @if ($soal->gambar_pil_e)
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <img src="{{ asset('storage/' . $soal->gambar_pil_e) }}" alt="Gambar Soal" class="img-fluid" style="width: 200px">
                                            </div>
                                        </div>
                                    @endif
                                    {!! $soal->pil_e !!}
                                </li>
                            </ol>

                            <div class="row">
                                <div class="col-lg-2">
                                    <p class="bg-success text-white p-2">Kunci jawaban: {{ $soal->kunci_jawaban }}</p>
                                </div>
                            </div>
                            
                            <a href="{{ route('editSoal', $soal->id_soal) }}" class="btn btn-sm btn-secondary"><i class="bi bi-pencil-square"></i></a>
                            <form action="{{ route('deleteSoal', $soal->id_soal) }}" method="post" class="d-inline">
                                @csrf
                                @method('delete')
                                <button type="submit" onclick="return confirm('Apakah anda yakin?')" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></button>
                            </form>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>
</div>
@endsection