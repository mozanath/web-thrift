<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::all();
        return view('pembelian.index', compact('pembelian'));
    }

    public function create()
    {
        // Tampilkan form untuk menambahkan user baru
        return view('pembelian.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'pembelian_user_id' => 'required',
            'pembelian_metode_pembayaran_id' => 'required',
            'pembelian_tanggal' => 'required',
            'pembelian_total_harga' => 'required',
        ]);

        // Buat user baru berdasarkan data yang diterima
        Pembelian::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pembelian.index')
                         ->with('success', 'pembelian berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Menampilkan detail user berdasarkan ID
        $pembelian = Pembelian::find($id);
        return view('pembelian.show', compact('pembelian'));
    }

    public function edit($id)
    {
        // Tampilkan form untuk mengedit pakaian berdasarkan ID
        $pembelian = Pembelian::find($id);
        return view('pembelian.edit', compact('pembelian'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'pembelian_user_id' => 'required',
            'pembelian_metode_pembayaran_id' => 'required',
            'pembelian_tanggal' => 'required',
            'pembelian_total_harga' => 'required',
        ]);

        // Update data pakaian berdasarkan ID
        Pembelian::find($id)->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pembelian.index')
                         ->with('success', 'pembelian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data pakaian berdasarkan ID
        Pembelian::find($id)->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pembelian.index')
                         ->with('success', 'pembelian berhasil dihapus.');
    }
}



