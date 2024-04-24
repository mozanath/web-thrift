@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar Metode Pembayaran</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Jenis</th>
                    <th>Nomor</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($metodePembayaran as $metode)
                <tr>
                    <td>{{ $metode->metode_pembayaran_id }}</td>
                    <td>{{ $metode->metode_pembayaran_user_id }}</td>
                    <td>{{ $metode->metode_pembayaran_jenis }}</td>
                    <td>{{ $metode->metode_pembayaran_nomor }}</td>
                    <td>
                        <a href="{{ route('metode_pembayaran.show', $metode->metode_pembayaran_id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('metode_pembayaran.edit', $metode->metode_pembayaran_id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('metode_pembayaran.destroy', $metode->metode_pembayaran_id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus metode pembayaran ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
