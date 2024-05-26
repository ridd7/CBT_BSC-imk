<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Akun Saya';
        $user = User::where('username', auth()->user()->username)->first();
        $siswa = Siswa::where('username', auth()->user()->username)->first();

        return view('profile.index', compact('title', 'user', 'siswa'));
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
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $title = 'Edit Profile';
        $user = User::where('username', $username)->first();
        $siswa = Siswa::where('username', $username)->first();

        return view('profile.edit', compact('title', 'user', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $username)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'no_hp' => 'required|numeric|min:10',
            'foto' => 'image|file|max:2048'
        ]);

        if (auth()->user()->role == 'siswa') {
            $request->validate([
                'asal_sekolah' => 'required|max:255',
            ]);
        }

        if ($request->username != auth()->user()->username) {
            $request->validate([
                'username' => 'required|min:4|max:255|unique:users',
            ]);
        }

        if ($request->email != auth()->user()->email) {
            $request->validate([
                'email' => 'required|email|unique:users'
            ]);
        }

        User::where('username', $username)->update([
            'nama' => $request->nama,
            'username' => $request->username,
            'no_hp' => $request->no_hp,
            'email' => $request->email,

        ]);

        if (auth()->user()->role == 'siswa') {
            Siswa::where('username', $username)->update([
                'asal_sekolah' => $request->asal_sekolah,
            ]);
        }

        if ($request->file('foto')) {
            if ($request->oldImg) {
                Storage::delete($request->oldImg);
            }

            User::where('username', $username)->update([
                'foto' => $request->file('foto')->store('profile_img')
            ]);
        }

        return redirect('/profile')->with('success', 'Data anda telah disimpan!');
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

    public function changePass(Request $request, $id)
    {
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|string|min:8|confirmed'
        ]);

        $currentPassword = auth()->user()->password;
        $oldPassword = $request->old_password;

        if (Hash::check($oldPassword, $currentPassword)) {
            auth()->user()->update([
                'password' => Hash::make($request->password)
            ]);

            return redirect(route('profile.index'))->with('success', 'Kata sandi anda telah berhasil diubah!');
        } else {
            return redirect(route('profile.index'))
                ->withErrors(['old_password' => 'Kata sandi anda salah.'])
                ->with('warning', 'Gagal mengubah kata sandi! Kata sandi anda salah');
        }
    }
}
