<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    // Menambahkan mata kuliah baru
    public function create(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|unique:makul,kode|max:10',
            'sks' => 'required|integer|min:1|max:6',
        ]);

        // Membuat mata kuliah baru
        $makul = Matkul::create([
            'nama' => $validated['nama'],
            'kode' => $validated['kode'],
            'sks' => $validated['sks'],
        ]);

        // Mengembalikan respons berhasil
        return response()->json([
            'message' => 'Mata Kuliah berhasil dibuat.',
            'data' => $makul
        ], 201);
    }

    // Mendapatkan semua mata kuliah
    public function read()
    {
        $makul = Matkul::all(); // Ambil semua mata kuliah

        return response()->json($makul);
    }

    // Mendapatkan mata kuliah berdasarkan ID
    public function show($id)
    {
        // Cari mata kuliah berdasarkan ID
        $makul = Matkul::find($id);

        if (!$makul) {
            return response()->json([
                'message' => 'Mata Kuliah tidak ditemukan.'
            ], 404);
        }

        return response()->json($makul);
    }

    // Mengupdate data mata kuliah berdasarkan ID
    public function update($id, Request $request)
    {
        // Cari mata kuliah berdasarkan ID
        $makul = Matkul::find($id);

        if (!$makul) {
            return response()->json([
                'message' => 'Mata Kuliah tidak ditemukan.'
            ], 404);
        }

        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'kode' => 'required|string|max:10|unique:makul,kode,' . $id,
            'sks' => 'required|integer|min:1|max:6',
        ]);

        // Update data mata kuliah
        $makul->update([
            'nama' => $validated['nama'],
            'kode' => $validated['kode'],
            'sks' => $validated['sks'],
        ]);

        return response()->json([
            'message' => 'Mata Kuliah berhasil diperbarui.',
            'data' => $makul
        ]);
    }

    // Menghapus mata kuliah berdasarkan ID
    public function delete($id)
    {
        // Cari mata kuliah berdasarkan ID
        $makul = Matkul::find($id);

        if (!$makul) {
            return response()->json([
                'message' => 'Mata Kuliah tidak ditemukan.'
            ], 404);
        }

        // Hapus mata kuliah
        $makul->delete();

        return response()->json([
            'message' => 'Mata Kuliah berhasil dihapus.'
        ]);
    }
}
