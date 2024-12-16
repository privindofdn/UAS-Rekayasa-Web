<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    // Menambahkan dosen baru
    public function create(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nidn' => 'required|string|unique:dosen,nidn|max:20',
            'mata_kuliah' => 'required|string|max:255',
        ]);

        // Membuat dosen baru
        $dosen = Dosen::create([
            'nama' => $validated['nama'],
            'nidn' => $validated['nidn'],
            'mata_kuliah' => $validated['mata_kuliah'],
        ]);

        // Mengembalikan respons berhasil
        return response()->json([
            'message' => 'Dosen berhasil dibuat.',
            'data' => $dosen
        ], 201);
    }

    // Mendapatkan semua dosen
    public function read()
    {
        $dosen = Dosen::all(); // Ambil semua dosen

        return response()->json($dosen);
    }

    // Mendapatkan dosen berdasarkan ID
    public function show($id)
    {
        // Cari dosen berdasarkan ID
        $dosen = Dosen::find($id);

        if (!$dosen) {
            return response()->json([
                'message' => 'Dosen tidak ditemukan.'
            ], 404);
        }

        return response()->json($dosen);
    }

    // Mengupdate data dosen berdasarkan ID
    public function update($id, Request $request)
    {
        // Cari dosen berdasarkan ID
        $dosen = Dosen::find($id);

        if (!$dosen) {
            return response()->json([
                'message' => 'Dosen tidak ditemukan.'
            ], 404);
        }

        // Validasi input
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nidn' => 'required|string|max:20|unique:dosen,nidn,' . $id,
            'mata_kuliah' => 'required|string|max:255',
        ]);

        // Update data dosen
        $dosen->update([
            'nama' => $validated['nama'],
            'nidn' => $validated['nidn'],
            'mata_kuliah' => $validated['mata_kuliah'],
        ]);

        return response()->json([
            'message' => 'Dosen berhasil diperbarui.',
            'data' => $dosen
        ]);
    }

    // Menghapus dosen berdasarkan ID
    public function delete($id)
    {
        // Cari dosen berdasarkan ID
        $dosen = Dosen::find($id);

        if (!$dosen) {
            return response()->json([
                'message' => 'Dosen tidak ditemukan.'
            ], 404);
        }

        // Hapus dosen
        $dosen->delete();

        return response()->json([
            'message' => 'Dosen berhasil dihapus.'
        ]);
    }
}
