<?php

namespace App\Http\Controllers;
use App\Models\Dosen;
use App\Models\Mahasiswa;
use App\Models\Mata_kuliah;
use Illuminate\Http\Request;


class HomeController extends Controller
{
    public function index()
    {
        $jumlah_dosen = Dosen::count();
        $jumlah_mahasiswa = Mahasiswa::count();
        $jumlah_matkul = Mata_kuliah::count();
        return view('Dashboard.dashboard', compact('jumlah_dosen', 'jumlah_mahasiswa', 'jumlah_matkul'));
    }
}
