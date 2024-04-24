<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Detail Pembelian</title>
</head>
<body>
    <h1>Daftar Detail Pembelian</h1>
    <a href="{{ route('pembelian_detail.create') }}">Tambah Detail Pembelian Baru</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Pembelian ID</th>
                <th>Pakaian ID</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pembelianDetails as $detail)
            <tr>
                <td>{{ $detail->id }}</td>
                <td>{{ $detail->pembelian_detail_pembelian_id }}</td>
                <td>{{ $detail->pembelian_detail_pakaian_id }}</td>
                <td>{{ $detail->pembelian_detail_jumlah }}</td>
                <td>{{ $detail->pembelian_detail_total_harga }}</td>
                <td>
                    <a href="{{ route('pembelian_detail.show', $detail->id) }}">Detail</a>
                    <a href="{{ route('pembelian_detail.edit', $detail->id) }}">Edit</a>
                    <form action="{{ route('pembelian_detail.destroy', $detail->id) }}" method="POST">
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
