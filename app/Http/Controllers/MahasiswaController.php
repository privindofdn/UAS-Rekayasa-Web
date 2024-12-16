<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Menambahkan mahasiswa baru
    public function create(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|unique:mahasiswa,nim|max:20',
            'prodi' => 'required|string|max:255',
        ]);

        // Membuat mahasiswa baru
        $mahasiswa = Mahasiswa::create([
            'nama' => $validated['nama'],
            'nim' => $validated['nim'],
            'prodi' => $validated['prodi'],
        ]);

        // Mengembalikan respons berhasil
        return response()->json([
            'message' => 'Mahasiswa berhasil dibuat.',
            'data' => $mahasiswa
        ], 201);
    }

    // Mendapatkan semua mahasiswa
    public function read()
    {
        $mahasiswa = Mahasiswa::all(); // Ambil semua mahasiswa

        return response()->json($mahasiswa);
    }

    // Mendapatkan mahasiswa berdasarkan ID
    public function show($id)
    {
        // Cari mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json([
                'message' => 'Mahasiswa tidak ditemukan.'
            ], 404);
        }

        return response()->json($mahasiswa);
    }

    // Mengupdate data mahasiswa berdasarkan ID
    public function update($id, Request $request)
    {
        // Cari mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json([
                'message' => 'Mahasiswa tidak ditemukan.'
            ], 404);
        }

        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:20|unique:mahasiswa,nim,' . $id,
            'prodi' => 'required|string|max:255',
        ]);

        // Update data mahasiswa
        $mahasiswa->update([
            'nama' => $validated['nama'],
            'nim' => $validated['nim'],
            'prodi' => $validated['prodi'],
        ]);

        return response()->json([
            'message' => 'Mahasiswa berhasil diperbarui.',
            'data' => $mahasiswa
        ]);
    }

    // Menghapus mahasiswa berdasarkan ID
    public function delete($id)
    {
        // Cari mahasiswa berdasarkan ID
        $mahasiswa = Mahasiswa::find($id);

        if (!$mahasiswa) {
            return response()->json([
                'message' => 'Mahasiswa tidak ditemukan.'
            ], 404);
        }

        // Hapus mahasiswa
        $mahasiswa->delete();

        return response()->json([
            'message' => 'Mahasiswa berhasil dihapus.'
        ]);
    }
}
