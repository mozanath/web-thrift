<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        // Tampilkan form untuk menambahkan user baru
        return view('user.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'fullname' => 'required',
            'email' => 'required',
            'user_nohp' => 'required',
            'user_alamat' => 'required',
            'user_profile_url' => 'required',
            'user_level' => 'required',
        ]);

        // Buat user baru berdasarkan data yang diterima
        User::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('user.index')
                         ->with('success', 'user berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Menampilkan detail user berdasarkan ID
        $user = User::find($id);
        return view('user.show', compact('user'));
    }

    public function edit($id)
    {
        // Tampilkan form untuk mengedit pakaian berdasarkan ID
        $user = User::find($id);
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'fullname' => 'required',
            'email' => 'required',
            'user_nohp' => 'required',
            'user_alamat' => 'required',
            'user_profile_url' => 'required',
            'user_level' => 'required',
        ]);

        // Update data pakaian berdasarkan ID
        $user = User::find($id);
        $user->fill($request->all());
        $user->save();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('user.index')
                         ->with('success', 'User berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data pakaian berdasarkan ID
        User::find($id)->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('user.index')
                         ->with('success', 'User berhasil dihapus.');
    }
}

