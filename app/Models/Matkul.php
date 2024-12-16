<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    // Tentukan nama tabel jika berbeda dengan nama model dalam bentuk plural
    protected $table = 'makul';  // Nama tabel sesuai dengan nama tabel di migration

    // Tentukan kolom yang bisa diisi melalui mass assignment
    protected $fillable = [
        'nama',  // Kolom nama mata kuliah
        'kode',  // Kolom kode mata kuliah
        'sks',   // Kolom SKS mata kuliah
    ];

    // Jika menggunakan guarded, bisa seperti ini (untuk melindungi kolom tertentu, misalnya id):
    // protected $guarded = ['id']; // id tidak bisa diisi lewat mass assignment
}
