<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\MatkulController;

// Public router untuk register
Route::post('/register', [AuthController::class, 'register']);

// Public Routes (Authentication)
Route::post('/login', [AuthController::class, 'login']);

// Protected Routes (CRUD dan Logout)
Route::middleware('auth:sanctum')->group(function () {
    // Mahasiswa CRUD
    Route::post('/mahasiswa/create', [MahasiswaController::class, 'create']);
    Route::get('/mahasiswa/read', [MahasiswaController::class, 'read']);
    Route::get('/mahasiswa/{id}', [MahasiswaController::class, 'show']); // Lihat Mahasiswa berdasarkan ID
    Route::put('/mahasiswa/update/{id}', [MahasiswaController::class, 'update']);
    Route::delete('/mahasiswa/delete/{id}', [MahasiswaController::class, 'delete']);

    // Dosen CRUD
    Route::post('/dosen/create', [DosenController::class, 'create']);
    Route::get('/dosen/read', [DosenController::class, 'read']);
    Route::get('/dosen/{id}', [DosenController::class, 'show']); // Lihat Dosen berdasarkan ID
    Route::put('/dosen/update/{id}', [DosenController::class, 'update']);
    Route::delete('/dosen/delete/{id}', [DosenController::class, 'delete']);

    // Makul CRUD
    Route::post('/makul/create', [MatkulController::class, 'create']);
    Route::get('/makul/read', [MatkulController::class, 'read']);
    Route::get('/makul/{id}', [MatkulController::class, 'show']); // Lihat Makul berdasarkan ID
    Route::put('/makul/update/{id}', [MatkulController::class, 'update']);
    Route::delete('/makul/delete/{id}', [MatkulController::class, 'delete']);

    // Logout
    Route::post('/logout', [AuthController::class, 'logout']);
});

?>
