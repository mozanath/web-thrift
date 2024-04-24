<?php

namespace App\Http\Controllers;

use App\Models\MetodePembayaran;
use Illuminate\Http\Request;

class MetodePembayaranController extends Controller
{
    public function index()
    {
        $metodePembayaran = MetodePembayaran::all();
        return view('metode_pembayaran.index', compact('MetodePembayaran'));
    }

    public function create()
    {
        // Tampilkan form untuk menambahkan metode pembayaran baru
        return view('metode_pembayaran.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'metode_pembayaran_user_id' => 'required',
            'metode_pembayaran_jenis' => 'required',
            'metode_pembayaran_nomor' => 'nullable', // Nomor pembayaran bisa kosong
        ]);

        // Buat metode pembayaran baru berdasarkan data yang diterima
        MetodePembayaran::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('metode_pembayaran.index')
                         ->with('success', 'Metode Pembayaran berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Menampilkan detail metode pembayaran berdasarkan ID
        $metodePembayaran = MetodePembayaran::find($id);
        return view('metode_pembayaran.show', compact('MetodePembayaran'));
    }

    public function edit($id)
    {
        // Tampilkan form untuk mengedit metode pembayaran berdasarkan ID
        $metodePembayaran = MetodePembayaran::find($id);
        return view('metode_pembayaran.edit', compact('MetodePembayaran'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'metode_pembayaran_user_id' => 'required',
            'metode_pembayaran_jenis' => 'required',
            'metode_pembayaran_nomor' => 'nullable', // Nomor pembayaran bisa kosong
        ]);

        // Update data metode pembayaran berdasarkan ID
        MetodePembayaran::find($id)->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('metode_pembayaran.index')
                         ->with('success', 'Metode Pembayaran berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data metode pembayaran berdasarkan ID
        MetodePembayaran::find($id)->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('metode_pembayaran.index')
                         ->with('success', 'Metode Pembayaran berhasil dihapus.');
    }
}
