<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Ujian;
use App\Models\Tentor;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $title = 'Dashboard';
        $tentor = User::where('role', 'tentor')->get();
        $siswa = User::where('role', 'siswa')->get();

        if (auth()->user()->role == 'tentor') {
            $user = Tentor::where('username', auth()->user()->username)->first();
            $ujian = Ujian::where('id_tentor', $user->id_tentor)->get();
            return view('dashboard', compact('title', 'tentor', 'siswa', 'ujian'));
        }

        $ujian = Ujian::all();

        return view('dashboard', compact('title', 'tentor', 'siswa', 'ujian'));
    }
}
