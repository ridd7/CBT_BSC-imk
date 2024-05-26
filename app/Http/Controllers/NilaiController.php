<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Ujian;
use App\Models\Tentor;
use App\Exports\NilaiExport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Daftar Nilai';

        if (auth()->user()->role == 'tentor') {
            $user = User::where('id', auth()->user()->id)->first();
            $tentor = Tentor::where('username', $user->username)->first();
            $exam = Ujian::where('id_tentor', $tentor->id_tentor)->get();

            return view('nilai.index', compact('title', 'tentor', 'exam'));
        }

        if (auth()->user()->role == 'siswa') {
            $user = User::where('id', auth()->user()->id)->first();
            $siswa = Siswa::where('username', $user->username)->first();
            $nilai = Nilai::where('id_siswa', $siswa->id_siswa)->get();

            return view('nilai.index', compact('title', 'siswa', 'nilai'));
        }

        $data = Ujian::withTrashed()->get();

        return view('nilai.index', compact('title', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $title = 'Daftar Nilai';
        $ujian = Ujian::where('slug', $slug)->withTrashed()->first();
        $nilai = Nilai::where('id_ujian', $ujian->id_ujian)->orderBy('nilai', 'desc')->with('siswa')->get();
        // SELECT nilai.*, siswa.username FROM nilai JOIN siswa ON nilai.id_siswa = siswa.id_siswa ORDER BY nilai.nilai DESC
        return view('nilai.show', compact('title', 'ujian', 'nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }



    public function export($slug)
    {
        $ujian = Ujian::where('slug', $slug)->first();
        $nilai = Nilai::where('id_ujian', $ujian->id_ujian)->orderBy('nilai', 'desc')->with('siswa')->get();
        return $nilai;

        return Excel::download(new NilaiExport($nilai), 'nilai.xlsx');
    }
}
