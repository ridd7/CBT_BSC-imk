<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Admin;
use App\Models\Siswa;
use App\Models\Tentor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Akun Admin';
        $users = Admin::orderBy('nama', 'asc')->get();

        return view('admin.index', compact('title', 'users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = 'Tambah Admin';

        return view('admin.create', compact('title'));
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
            'username' => 'required|string|min:4|max:255|unique:users',
            'password' => 'required|min:8',
        ]);

        User::create([
            'username' => $request->username,
            'nama' => $request->username,
            'password' => Hash::make($request->password),
            'email' => 'example@email.com',
            'role' => 'admin'
        ]);

        Admin::create([
            'username' => $request->username,
            'nama' => $request->username,
        ]);

        return redirect(route('admin.index'))->with('success', 'Berhasil menambahkan admin!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($username)
    {
        $title = 'Detail Akun';
        $user = User::where('username', $username)->first();

        return view('admin.detail', compact('title', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($username)
    {
        $title = 'Edit Akun';
        $user = User::where('username', $username)->first();
        $admin = Admin::where('username', $username)->first();

        return view('admin.edit', compact('title', 'user', 'admin'));
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

        $user = User::where('username', $username)->first();

        if ($request->username != $user->username) {
            $request->validate([
                'username' => 'required|min:4|max:255|unique:users',
            ]);
        }

        if ($request->email != $user->email) {
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

        Admin::where('username', $username)->update([
            'nama' => $request->nama,
            'username' => $request->username,
        ]);

        if ($request->file('foto')) {
            if ($request->oldImg) {
                Storage::delete($request->oldImg);
            }

            User::where('username', $username)->update([
                'foto' => $request->file('foto')->store('profile_img')
            ]);
        }

        return redirect(route('admin.index'))->with('success', 'Data telah disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($username)
    {
        if (auth()->user()->username == $username) {
            return redirect(route('admin.index'))->with('warning', 'Anda tidak dapat menghapus akun sendiri!');
        }

        User::where('username', $username)->delete();
        Admin::where('username', $username)->delete();

        return redirect(route('admin.index'))->with('success', 'Akun berhasil dihapus!');
    }

    public function editRole($username)
    {
        $title = 'Update Role';
        $user = User::where('username', $username)->first();
        $admin = Admin::where('username', $username)->first();

        return view('admin.editRole', compact('title', 'user', 'admin'));
    }

    public function updateRole(Request $request, $username)
    {
        $request->validate([
            'role' => 'required',
        ]);

        $user = User::where('username', $username)->first();

        if ($request->role == 'tentor') {
            Admin::where('username', $username)->delete();

            User::where('username', $username)->update([
                'role' => 'tentor',
            ]);

            Tentor::create([
                'nama' => $user->nama,
                'username' => $user->username,
            ]);

            return redirect(route('tentor.index'))->with('success', 'Berhasil!');
        } else if ($request->role == 'siswa') {
            Admin::where('username', $username)->delete();

            User::where('username', $username)->update([
                'role' => 'siswa',
            ]);

            Siswa::create([
                'nama' => $user->nama,
                'username' => $user->username,
            ]);

            return redirect(route('siswa.index'))->with('success', 'Berhasil!');
        } else {
            return redirect(route('admin.show', $username))->with('success', 'Tersimpan!');
        }
    }
}
