<?php

namespace App\Http\Controllers\KepalaDinas;

use App\Http\Controllers\Controller;
use App\Models\DataPengajuan;
use Illuminate\Http\Request;

class SkoringController extends Controller
{
    public function index()
    {
        $dataPengajuan = DataPengajuan::where('status_proses', 'persetujuan')->get();
        // dd($dataPengajuan);
        return view('pages.dinas.skoring.index', compact('dataPengajuan'));
    }
}
