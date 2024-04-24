<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pakaian;

class PakaianController extends Controller
{
    public function index()
    {
        $pakaian = Pakaian::all();
        return view('pakaian.index', compact('pakaian'));
    }

    public function create()
    {
        // Tampilkan form untuk menambahkan pakaian baru
        return view('pakaian.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'pakaian_kategori_pakaian_id' => 'required',
            'pakaian_nama' => 'required',
            'pakaian_harga' => 'required',
            'pakaian_stok' => 'required',
            'pakaian_gambar_url' => 'required',
        ]);

        // Buat pakaian baru berdasarkan data yang diterima
        Pakaian::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pakaian.index')
                         ->with('success', 'Pakaian berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Menampilkan detail pakaian berdasarkan ID
        $pakaian = Pakaian::find($id);
        return view('pakaian.show', compact('pakaian'));
    }

    public function edit($id)
    {
        // Tampilkan form untuk mengedit pakaian berdasarkan ID
        $pakaian = Pakaian::find($id);
        return view('pakaian.edit', compact('pakaian'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'pakaian_kategori_pakaian_id' => 'required',
            'pakaian_nama' => 'required',
            'pakaian_harga' => 'required',
            'pakaian_stok' => 'required',
            'pakaian_gambar_url' => 'required',
        ]);

        // Update data pakaian berdasarkan ID
        Pakaian::find($id)->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pakaian.index')
                         ->with('success', 'Pakaian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data pakaian berdasarkan ID
        Pakaian::find($id)->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pakaian.index')
                         ->with('success', 'Pakaian berhasil dihapus.');
    }
}
