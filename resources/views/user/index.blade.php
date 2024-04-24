@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Daftar User</h1>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>Nama Lengkap</th>
                    <th>Email</th>
                    <th>No. HP</th>
                    <th>Alamat</th>
                    <th>Level</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->user_id }}</td>
                    <td>{{ $user->user_username }}</td>
                    <td>{{ $user->user_fullname }}</td>
                    <td>{{ $user->user_email }}</td>
                    <td>{{ $user->user_nohp }}</td>
                    <td>{{ $user->user_alamat }}</td>
                    <td>{{ $user->user_level }}</td>
                    <td>
                        <a href="{{ route('user.show', $user->user_id) }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('user.edit', $user->user_id) }}" class="btn btn-primary">Edit</a>
                        <form action="{{ route('user.destroy', $user->user_id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus user ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
