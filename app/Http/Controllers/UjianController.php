<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Soal;
use App\Models\User;
use App\Models\Ujian;
use App\Models\Tentor;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Ujian';

        if (auth()->user()->role == 'tentor') {
            $user = User::where('id', auth()->user()->id)->first();
            $tentor = Tentor::where('username', $user->username)->first();
            $exam = Ujian::where('id_tentor', $tentor->id_tentor)->get();

            return view('ujian.index', compact('title', 'tentor', 'exam'));
        }

        if (auth()->user()->role == 'siswa') {

            // ambil data siswa sesuai user yang login
            $siswa = Siswa::where('username', auth()->user()->username)->first();
            // ambil data nilai yang sudah didapatkan siswa
            $exam = Nilai::where('id_siswa', $siswa->id_siswa)->get();

            // variabel kosong
            $sudah = [];

            // pecah tiap tiap nilai, ambil id_ujiannya lalu masukkan ke variabel sudah
            foreach ($exam as $key => $value) {
                $nilai = Nilai::where('id_ujian', $value->id_ujian)->first();
                if ($nilai) {
                    $sudah[] = $value->id_ujian;
                }
            }

            // ambil data ujian yang id_ujian tidak ada di variabel sudah
            $data = Ujian::with('tentor')->whereNotIn('id_ujian', $sudah)->get();

            return view('ujian.index', compact('title', 'data'));
        }

        $data = Ujian::with('tentor')->get();

        return view('ujian.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Ujian';
        $user = User::where('id', auth()->user()->id)->first();
        $tentor = Tentor::where('username', $user->username)->first();
        $data = Tentor::orderBy('nama', 'asc')->get();

        return view('ujian.create', compact('title', 'tentor', 'data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_tentor' => 'required',
            'nama_ujian' => 'required|min:2|unique:ujian',
            'token' => 'required|min:4',
            'waktu' => 'required',
        ]);

        Ujian::create([
            'id_tentor' => $request->id_tentor,
            'nama_ujian' => $request->nama_ujian,
            'slug' => Str::slug($request->nama_ujian),
            'token' => $request->token,
            'waktu' => $request->waktu,
        ]);

        return redirect(route('ujian.index'))->with('success', 'Ujian berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Ujian $ujian)
    {
        $title = $ujian->nama_ujian;
        $soal = Soal::where('id_ujian', $ujian->id_ujian)->get();

        return view('ujian.detail', compact('ujian', 'title', 'soal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Ujian $ujian)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ujian $ujian)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        // $ujian = Ujian::where('slug', $slug)->first();

        // Soal::where('id_ujian', $ujian->id_ujian)->delete();
        Ujian::where('slug', $slug)->delete();

        return redirect(route('ujian.index'))->with('success', 'Ujian berhasil dihapus!');
    }

    public function tambahSoal($slug)
    {
        $title = 'Tambah Soal';
        $ujian = Ujian::where('slug', $slug)->first();

        return view('ujian.tambahSoal', compact('title', 'ujian'));
    }

    public function insertSoal(Request $request)
    {
        $validatedData = $request->validate([
            'isi_soal' => 'string',
            'pil_a' => 'string',
            'pil_b' => 'string',
            'pil_c' => 'string',
            'pil_d' => 'string',
            'pil_e' => 'string',
            'gambar_soal' => 'image|file|max:2048',
            'gambar_pil_a' => 'image|file|max:2048',
            'gambar_pil_b' => 'image|file|max:2048',
            'gambar_pil_c' => 'image|file|max:2048',
            'gambar_pil_d' => 'image|file|max:2048',
            'gambar_pil_e' => 'image|file|max:2048',
            'kunci_jawaban' => 'required',
        ]);

        $validatedData['id_ujian'] = $request->id_ujian;

        if ($request->file('gambar_soal')) {
            $validatedData['gambar_soal'] = $request->file('gambar_soal')->store('soal');
        }

        if ($request->file('gambar_pil_a')) {
            $validatedData['gambar_pil_a'] = $request->file('gambar_pil_a')->store('jawaban');
        }

        if ($request->file('gambar_pil_b')) {
            $validatedData['gambar_pil_b'] = $request->file('gambar_pil_b')->store('jawaban');
        }

        if ($request->file('gambar_pil_c')) {
            $validatedData['gambar_pil_c'] = $request->file('gambar_pil_c')->store('jawaban');
        }

        if ($request->file('gambar_pil_d')) {
            $validatedData['gambar_pil_d'] = $request->file('gambar_pil_d')->store('jawaban');
        }

        if ($request->file('gambar_pil_e')) {
            $validatedData['gambar_pil_e'] = $request->file('gambar_pil_e')->store('jawaban');
        }

        Soal::create($validatedData);

        $ujian = Ujian::where('id_ujian', $request->id_ujian)->first();
        Ujian::where('id_ujian', $request->id_ujian)->update([
            'jumlah_soal' => $ujian->jumlah_soal + 1
        ]);

        return redirect(route('ujian.show', $ujian->slug))->with('success', 'Soal berhasil ditambahkan!');
    }

    public function editSoal($id)
    {
        $title = 'Edit Soal';
        $soal = Soal::where('id_soal', $id)->first();
        $ujian = Ujian::where('id_ujian', $soal->id_ujian)->first();

        return view('ujian.editSoal', compact('title', 'soal', 'ujian'));
    }

    public function updateSoal(Request $request, $id)
    {
        $request->validate([
            'isi_soal' => 'string',
            'pil_a' => 'string',
            'pil_b' => 'string',
            'pil_c' => 'string',
            'pil_d' => 'string',
            'pil_e' => 'string',
            'gambar_soal' => 'image|file|max:2048',
            'gambar_pil_a' => 'image|file|max:2048',
            'gambar_pil_b' => 'image|file|max:2048',
            'gambar_pil_c' => 'image|file|max:2048',
            'gambar_pil_d' => 'image|file|max:2048',
            'gambar_pil_e' => 'image|file|max:2048',
            'kunci_jawaban' => 'required',
        ]);

        Soal::where('id_soal', $id)->update([
            'isi_soal' => $request->isi_soal,
            'pil_a' => $request->pil_a,
            'pil_b' => $request->pil_b,
            'pil_c' => $request->pil_c,
            'pil_d' => $request->pil_d,
            'pil_e' => $request->pil_e,
            'kunci_jawaban' => $request->kunci_jawaban,
        ]);

        if ($request->file('gambar_soal')) {
            if ($request->old_gambar_soal) {
                Storage::delete($request->old_gambar_soal);
            }

            Soal::where('id_soal', $id)->update([
                'gambar_soal' => $request->file('gambar_soal')->store('soal')
            ]);
        }

        if ($request->file('gambar_pil_a')) {
            if ($request->old_gambar_pil_a) {
                Storage::delete($request->old_gambar_pil_a);
            }

            Soal::where('id_soal', $id)->update([
                'gambar_pil_a' => $request->file('gambar_pil_a')->store('jawaban')
            ]);
        }

        if ($request->file('gambar_pil_b')) {
            if ($request->old_gambar_pil_b) {
                Storage::delete($request->old_gambar_pil_b);
            }

            Soal::where('id_soal', $id)->update([
                'gambar_pil_b' => $request->file('gambar_pil_b')->store('jawaban')
            ]);
        }

        if ($request->file('gambar_pil_c')) {
            if ($request->old_gambar_pil_c) {
                Storage::delete($request->old_gambar_pil_c);
            }

            Soal::where('id_soal', $id)->update([
                'gambar_pil_c' => $request->file('gambar_pil_c')->store('jawaban')
            ]);
        }

        if ($request->file('gambar_pil_d')) {
            if ($request->old_gambar_pil_d) {
                Storage::delete($request->old_gambar_pil_d);
            }

            Soal::where('id_soal', $id)->update([
                'gambar_pil_d' => $request->file('gambar_pil_d')->store('jawaban')
            ]);
        }

        if ($request->file('gambar_pil_e')) {
            if ($request->old_gambar_pil_e) {
                Storage::delete($request->old_gambar_pil_e);
            }

            Soal::where('id_soal', $id)->update([
                'gambar_pil_e' => $request->file('gambar_pil_e')->store('jawaban')
            ]);
        }

        $ujian = Ujian::where('id_ujian', $request->id_ujian)->first();

        return redirect(route('ujian.show', $ujian->slug))->with('success', 'Soal berhasil diubah!');
    }

    public function deleteSoal($id)
    {
        Soal::where('id_soal', $id)->delete();

        return back()->with('success', 'Soal telah dihapus!');
    }

    public function token($slug)
    {
        $title = 'Token';
        $ujian = Ujian::where('slug', $slug)->first();

        return view('ujian.cekToken', compact('title', 'ujian'));
    }

    public function cekToken(Request $request)
    {
        $request->validate([
            'token' => 'required|min:4'
        ]);

        $ujian = Ujian::where('id_ujian', $request->id_ujian)->first();
        if ($request->token == $ujian->token) {
            return redirect(route('mulai', $ujian->slug))->with('info', 'Selamat mengerjakan!');
        } else {
            return back()->with('status', 'Token salah!');
        }
    }

    public function mulai(Ujian $ujian)
    {
        $title = $ujian->nama_ujian;
        // $data = Soal::where('id_ujian', $ujian->id_ujian)->paginate(1);
        $data = Soal::where('id_ujian', $ujian->id_ujian)->get();

        return view('ujian.mulai', compact('ujian', 'title', 'data'));
    }

    public function finish(Request $request)
    {
        $hasil = 0;
        $jumlah = 0;
        foreach ($request->soal as $key => $value) {
            $hasil = $hasil + $value;
            $jumlah++;
        }
        $hasil = $hasil / $jumlah * 100;
        $siswa = Siswa::where('username', Auth::user()->username)->first();
        $id_siswa = $siswa->id_siswa;
        Nilai::create([
            'id_ujian' => $request->id_ujian,
            'id_siswa' => $id_siswa,
            'nilai' => $hasil,
            'tanggal' => Carbon::now()
        ]);

        return redirect(route('ujian.index'))->with('success', 'Ujian telah selesai!');
    }
}
