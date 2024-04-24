<?php

namespace App\Http\Controllers;

use App\Models\PembelianDetail;
use Illuminate\Http\Request;

class PembelianDetailController extends Controller
{
    public function index()
    {
        $pembelianDetails = PembelianDetail::all();
        return view('pembelian_detail.index', compact('pembelianDetails'));
    }

    public function create()
    {
        // Tampilkan form untuk menambahkan detail pembelian baru
        return view('pembelian_detail.create');
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'pembelian_detail_pembelian_id' => 'required',
            'pembelian_detail_pakaian_id' => 'required',
            'pembelian_detail_jumlah' => 'required',
            'pembelian_detail_total_harga' => 'required',
        ]);

        // Buat detail pembelian baru berdasarkan data yang diterima
        PembelianDetail::create($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pembelian_detail.index')
                         ->with('success', 'Detail Pembelian berhasil ditambahkan.');
    }

    public function show($id)
    {
        // Menampilkan detail pembelian berdasarkan ID
        $pembelianDetail = PembelianDetail::find($id);
        return view('pembelian_detail.show', compact('pembelianDetail'));
    }

    public function edit($id)
    {
        // Tampilkan form untuk mengedit detail pembelian berdasarkan ID
        $pembelianDetail = PembelianDetail::find($id);
        return view('pembelian_detail.edit', compact('pembelianDetail'));
    }

    public function update(Request $request, $id)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'pembelian_detail_pembelian_id' => 'required',
            'pembelian_detail_pakaian_id' => 'required',
            'pembelian_detail_jumlah' => 'required',
            'pembelian_detail_total_harga' => 'required',
        ]);

        // Update data detail pembelian berdasarkan ID
        PembelianDetail::find($id)->update($request->all());

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pembelian_detail.index')
                         ->with('success', 'Detail Pembelian berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Hapus data detail pembelian berdasarkan ID
        PembelianDetail::find($id)->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('pembelian_detail.index')
                         ->with('success', 'Detail Pembelian berhasil dihapus.');
    }
}
