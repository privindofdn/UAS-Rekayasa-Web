<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

     protected $table = 'mahasiswa';

    // Menambahkan field yang boleh diisi secara massal
    protected $fillable = [
        'nama',
        'nim',
        'prodi',
    ];
}
