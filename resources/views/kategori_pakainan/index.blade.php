<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Kategori Pakaian</title>
</head>
<body>
    <h1>Daftar Kategori Pakaian</h1>
    <a href="{{ route('kategori_pakaian.create') }}">Tambah Kategori Pakaian Baru</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Kategori</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($kategoriPakaian as $kategori)
            <tr>
                <td>{{ $kategori->kategori_pakaian_id }}</td>
                <td>{{ $kategori->kategori_pakaian_nama }}</td>
                <td>
                    <a href="{{ route('kategori_pakaian.show', $kategori->kategori_pakaian_id) }}">Detail</a>
                    <a href="{{ route('kategori_pakaian.edit', $kategori->kategori_pakaian_id) }}">Edit</a>
                    <form action="{{ route('kategori_pakaian.destroy', $kategori->kategori_pakaian_id) }}" method="POST">
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
