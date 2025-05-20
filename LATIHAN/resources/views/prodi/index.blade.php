@extends('layout.master')

@section('title', 'Daftar Program Studi')

@section('content')
<div class="container mt-4">
    <h3>Daftar Program Studi</h3>
    <a href="{{ route('prodi.create') }}" class="btn btn-success mb-3">+ Tambah Prodi</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Prodi</th>
                <th>Kode Prodi</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($listprodi as $prodi)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $prodi->nama }}</td>
                <td>{{ $prodi->kode_prodi }}</td>
                <td>
                    <a href="{{ route('prodi.edit', $prodi->id) }}" class="btn btn-primary btn-sm">Edit</a>
                    <form action="{{ route('prodi.destroy', $prodi->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
