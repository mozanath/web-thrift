<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pembelian</title>
</head>
<body>
    <h1>Daftar Pembelian</h1>
    <a href="{{ route('pembelian.create') }}">Tambah Pembelian Baru</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>User ID</th>
                <th>Metode Pembayaran ID</th>
                <th>Tanggal</th>
                <th>Total Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembelians as $pembelian)
            <tr>
                <td>{{ $pembelian->id }}</td>
                <td>{{ $pembelian->pembelian_user_id }}</td>
                <td>{{ $pembelian->pembelian_metode_pembayaran_id }}</td>
                <td>{{ $pembelian->pembelian_tanggal }}</td>
                <td>{{ $pembelian->pembelian_total_harga }}</td>
                <td>
                    <a href="{{ route('pembelian.show', $pembelian->id) }}">Detail</a>
                    <a href="{{ route('pembelian.edit', $pembelian->id) }}">Edit</a>
                    <form action="{{ route('pembelian.destroy', $pembelian->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
