@extends('layout.master')

@section('title', 'Tambah Prodi')

@section('content')
<div class="container mt-4">
    <h3>Tambah Program Studi</h3>

    <!-- Tampilkan error validasi jika ada -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('prodi.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="nama" class="form-label">Nama Prodi</label>
            <input type="text" class="form-control" name="nama" required>
        </div>

        <div class="mb-3">
            <label for="kode_prodi" class="form-label">Kode Prodi</label>
            <input type="text" class="form-control" name="kode_prodi" required>
        </div>

        <button type="submit" class="btn btn-success">Simpan</button>
    </form>
</div>
@endsection
