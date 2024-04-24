<?php

namespace App\Http\Controllers;

use App\Models\KategoriPakaian;
use Illuminate\Http\Request;

class KategoriPakaianController extends Controller
{
    public function index()
    {
        $kategoriPakaian = KategoriPakaian::all();
        return view('kategori_pakaian.index', compact('kategoriPakaian'));
    }

    public function create()
    {
        // Tampilkan form untuk menambahkan metode pembayaran baru
        return view('kategori_pakaian.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'kategori_pakaian_nama' => 'required',
        ]);

        // Buat metode pembayaran baru berdasarkan data yang diterima
        KategoriPakaian::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('kategori_pakaian.index')
                         ->with('success', 'Kategori Pakaian berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Menampilkan detail metode pembayaran berdasarkan ID
        $kategoriPakaian = KategoriPakaian::find($id);
        return view('kategori_pakaian.show', compact('KategoriPakaian'));
    }

    public function edit($id)
    {
        // Tampilkan form untuk mengedit metode pembayaran berdasarkan ID
        $kategoriPakaian = KategoriPakaian::find($id);
        return view('kategori_pakaian.edit', compact('KategoriPakaian'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'kategori_pakaian_nama' => 'required',
        ]);

        // Update data metode pembayaran berdasarkan ID
        KategoriPakaian::find($id)->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('kategori_pakaian.index')
                         ->with('success', 'Kategori Pakaian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data metode pembayaran berdasarkan ID
        KategoriPakaian::find($id)->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('kategori_pakaian.index')
                         ->with('success', 'Kategori Pakaian berhasil dihapus.');
    }
}
