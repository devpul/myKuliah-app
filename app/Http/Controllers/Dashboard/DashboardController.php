<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
    $user = auth()->user();
    $jadwal = [
        ['mata_kuliah' => 'Pemrograman Web', 'waktu' => 'Senin, 08:00-10:00', 'ruangan' => 'Lab Komputer 1'],
        // Tambah data dummy lainnya
    ];
    $tugas = [
        ['nama' => 'Tugas Algoritma', 'progress' => 75, 'deadline' => '2023-10-15'],
        // Tambah data dummy lainnya
    ];
    return view('Dashboard/dashboard', compact('user', 'jadwal', 'tugas'));
}

}
