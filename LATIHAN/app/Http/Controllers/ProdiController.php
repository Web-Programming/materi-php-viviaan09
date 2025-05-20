<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    public function create()
    {
        return view('prodi.create');
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'nama' => 'required',
            'kode_prodi' => 'required',
        ]);

        // Simpan ke database
        Prodi::create([
            'nama' => $request->nama,
            'kode_prodi' => $request->kode_prodi,
        ]);

        // Redirect ke index
        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil ditambahkan');
    }

    public function index()
    {
        $listprodi = Prodi::all();
        return view('prodi.index', compact('listprodi'));
    }

    // Method edit/update/destroy bisa ditambahkan sesuai kebutuhan
}
