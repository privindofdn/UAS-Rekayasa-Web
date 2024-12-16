<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    // Tentukan nama tabel jika berbeda dengan nama model dalam bentuk plural
    protected $table = 'dosen';  // Nama tabel sesuai dengan nama tabel di migration

    // Tentukan kolom yang bisa diisi melalui mass assignment
    protected $fillable = [
        'nama',     // Kolom nama dosen
        'nidn',     // Kolom NIDN dosen
        'mata_kuliah',  // Kolom jurusan dosen
    ];

    // Jika menggunakan guarded, bisa seperti ini (untuk melindungi kolom tertentu, misalnya id):
    // protected $guarded = ['id']; // id tidak bisa diisi lewat mass assignment
}

