@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5>Edit Soal</h5>
            </div>
            <div class="card-block">
                <form action="{{ route('updateSoal', $soal->id_soal) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="id_ujian" value="{{ $soal->id_ujian }}">
                    <div class="row">
                        <div class="col-lg-8">
                            {{-- Soal --}}
                            <div class="mb-3">
                                <label for="gambar_soal" class="form-label">Foto Soal</label>
                                <input type="hidden" name="old_gambar_soal" value="{{ $soal->gambar_soal }}">
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        @if ($soal->gambar_soal)
                                            <img src="{{ asset('storage/' . $soal->gambar_soal) }}" alt="Gambar Soal" class="soal-preview img-fluid">
                                        @endif
                                    </div>
                                </div>
                                <input class="form-control form-control-sm @error('gambar_soal') is-invalid @enderror" id="gambar_soal" name="gambar_soal" type="file" onchange="soal()">

                                @error('gambar_soal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> 
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="isi_soal" class="form-label">Soal</label>
                                <input id="isi_soal" type="hidden" name="isi_soal" value="{{ old('isi_soal', $soal->isi_soal) }}">
                                <trix-editor input="isi_soal"></trix-editor>

                                @error('isi_soal')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> 
                                    </span>
                                @enderror
                            </div>
                            {{-- Soal end --}}

                            {{-- Pilihan A --}}
                            <div class="mb-3">
                                <label for="gambar_pil_a" class="form-label">Foto Pilihan A</label>
                                <input type="hidden" name="old_gambar_pil_a" value="{{ $soal->gambar_pil_a }}">
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        @if ($soal->gambar_pil_a)
                                            <img src="{{ asset('storage/' . $soal->gambar_pil_a) }}" alt="Gambar pil a" class="pil-a-preview img-fluid">
                                        @endif
                                    </div>
                                </div>
                                <input class="form-control form-control-sm @error('gambar_pil_a') is-invalid @enderror" id="gambar_pil_a" name="gambar_pil_a" type="file" onchange="pilA()">

                                @error('gambar_pil_a')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> 
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pil_a" class="form-label">Pilihan A</label>
                                <input id="pil_a" type="hidden" name="pil_a" value="{{ old('pil_a', $soal->pil_a) }}">
                                <trix-editor input="pil_a"></trix-editor>

                                @error('pil_a')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> 
                                    </span>
                                @enderror
                            </div>
                            {{-- Pilihan A end --}}

                            {{-- Pilihan B --}}
                            <div class="mb-3">
                                <label for="gambar_pil_b" class="form-label">Foto Pilihan B</label>
                                <input type="hidden" name="old_gambar_pil_b" value="{{ $soal->gambar_pil_b }}">
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        @if ($soal->gambar_pil_b)
                                            <img src="{{ asset('storage/' . $soal->gambar_pil_b) }}" alt="Gambar pil b" class="pil-b-preview img-fluid">
                                        @endif
                                    </div>
                                </div>
                                <input class="form-control form-control-sm @error('gambar_pil_b') is-invalid @enderror" id="gambar_pil_b" name="gambar_pil_b" type="file" onchange="pilB()">

                                @error('gambar_pil_b')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> 
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pil_b" class="form-label">Pilihan B</label>
                                <input id="pil_b" type="hidden" name="pil_b" value="{{ old('pil_b', $soal->pil_b) }}">
                                <trix-editor input="pil_b"></trix-editor>

                                @error('pil_b')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> 
                                    </span>
                                @enderror
                            </div>
                            {{-- Pilihan B end --}}

                            {{-- Pilihan C --}}
                            <div class="mb-3">
                                <label for="gambar_pil_c" class="form-label">Foto Pilihan C</label>
                                <input type="hidden" name="old_gambar_pil_c" value="{{ $soal->gambar_pil_c }}">
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        @if ($soal->gambar_pil_c)
                                            <img src="{{ asset('storage/' . $soal->gambar_pil_c) }}" alt="Gambar pil c" class="pil-c-preview img-fluid">
                                        @endif
                                    </div>
                                </div>
                                <input class="form-control form-control-sm @error('gambar_pil_c') is-invalid @enderror" id="gambar_pil_c" name="gambar_pil_c" type="file" onchange="pilC()">

                                @error('gambar_pil_c')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> 
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pil_c" class="form-label">Pilihan C</label>
                                <input id="pil_c" type="hidden" name="pil_c" value="{{ old('pil_c', $soal->pil_c) }}">
                                <trix-editor input="pil_c"></trix-editor>

                                @error('pil_c')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> 
                                    </span>
                                @enderror
                            </div>
                            {{-- Pilihan C end --}}

                            {{-- Pilihan D --}}
                            <div class="mb-3">
                                <label for="gambar_pil_d" class="form-label">Foto Pilihan D</label>
                                <input type="hidden" name="old_gambar_pil_d" value="{{ $soal->gambar_pil_d }}">
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        @if ($soal->gambar_pil_c)
                                            <img src="{{ asset('storage/' . $soal->gambar_pil_d) }}" alt="Gambar pil d" class="pil-d-preview img-fluid">
                                        @endif
                                    </div>
                                </div>
                                <input class="form-control form-control-sm @error('gambar_pil_d') is-invalid @enderror" id="gambar_pil_d" name="gambar_pil_d" type="file" onchange="pilD()">

                                @error('gambar_pil_d')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> 
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pil_d" class="form-label">Pilihan D</label>
                                <input id="pil_d" type="hidden" name="pil_d" value="{{ old('pil_d', $soal->pil_d) }}">
                                <trix-editor input="pil_d"></trix-editor>

                                @error('pil_d')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> 
                                    </span>
                                @enderror
                            </div>
                            {{-- Pilihan D end --}}

                            {{-- Pilihan E --}}
                            <div class="mb-3">
                                <label for="gambar_pil_e" class="form-label">Foto Pilihan E</label>
                                <input type="hidden" name="old_gambar_pil_e" value="{{ $soal->gambar_pil_e }}">
                                <div class="row mb-3">
                                    <div class="col-lg-4">
                                        @if ($soal->gambar_pil_e)
                                            <img src="{{ asset('storage/' . $soal->gambar_pil_e) }}" alt="Gambar pil e" class="pil-e-preview img-fluid">
                                        @endif
                                    </div>
                                </div>
                                <input class="form-control form-control-sm @error('gambar_pil_e') is-invalid @enderror" id="gambar_pil_e" name="gambar_pil_e" type="file" onchange="pilE()">

                                @error('gambar_pil_e')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> 
                                    </span>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="pil_e" class="form-label">Pilihan E</label>
                                <input id="pil_e" type="hidden" name="pil_e" value="{{ old('pil_e', $soal->pil_e) }}">
                                <trix-editor input="pil_e"></trix-editor>

                                @error('pil_e')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> 
                                    </span>
                                @enderror
                            </div>
                            {{-- Pilihan E end --}}

                            {{-- Kunci Jawaban --}}
                            <div class="mb-3">
                                <label for="kunci_jawaban" class="form-label">Kunci Jawaban</label>
                                <select id="kunci_jawaban" name="kunci_jawaban" class="form-select form-select-sm">
                                    <option value="A" {{ $soal->kunci_jawaban == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ $soal->kunci_jawaban == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="C" {{ $soal->kunci_jawaban == 'C' ? 'selected' : '' }}>C</option>
                                    <option value="D" {{ $soal->kunci_jawaban == 'D' ? 'selected' : '' }}>D</option>
                                    <option value="E" {{ $soal->kunci_jawaban == 'E' ? 'selected' : '' }}>E</option>
                                </select>

                                @error('kunci_jawaban')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong> 
                                    </span>
                                @enderror
                            </div>
                            {{-- Kunci jawaban end --}}
                        </div>
                    </div>

                    <a href="{{ route('ujian.show', $ujian->slug) }}" class="btn btn-sm btn-danger"><i class="bi bi-x-circle"></i> Batal</a>
                    <button type="reset" class="btn btn-sm btn-primary"><i class="bi bi-arrow-repeat"></i> Reset</button>
                    <button type="submit" class="btn btn-sm btn-success"><i class="bi bi-save"></i> Simpan</button>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection