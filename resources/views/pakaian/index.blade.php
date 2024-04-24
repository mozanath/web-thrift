<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pakaian</title>
</head>
<body>
    <h1>Daftar Pakaian</h1>
    <a href="{{ route('pakaian.create') }}">Tambah Pakaian Baru</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Kategori ID</th>
                <th>Nama</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Gambar URL</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pakaian as $item)
            <tr>
                <td>{{ $item->pakaian_id }}</td>
                <td>{{ $item->pakaian_kategori_pakaian_id }}</td>
                <td>{{ $item->pakaian_nama }}</td>
                <td>{{ $item->pakaian_harga }}</td>
                <td>{{ $item->pakaian_stok }}</td>
                <td>{{ $item->pakaian_gambar_url }}</td>
                <td>
                    <a href="{{ route('pakaian.show', $item->pakaian_id) }}">Detail</a>
                    <a href="{{ route('pakaian.edit', $item->pakaian_id) }}">Edit</a>
                    <form action="{{ route('pakaian.destroy', $item->pakaian_id) }}" method="POST">
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
