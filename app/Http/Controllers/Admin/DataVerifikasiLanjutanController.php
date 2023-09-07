<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DataPengajuan;
use App\Models\User;
use App\Models\VerifikasiLanjutan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataVerifikasiLanjutanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataVerifikasiLanjutan      = DataPengajuan::where('status_data', 'Data Disetujui')
            ->where('status_proses', 'Verifikasi Lapangan')
            ->where('admin_id', Auth::user()->id)
            ->get();
        return view('pages.admin.verifikasi-lanjutan.index', compact(
            'dataVerifikasiLanjutan'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect()->back()->withError('No action is required!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return redirect()->back()->withError('No action is required!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $dataVerifikasiLanjutan  = DataPengajuan::with(['user', 'detail'])
                ->where('id', $id)
                ->where('admin_id', Auth::user()->id)
                ->firstOrFail();
            $verifikator = User::whereHas('roles', function ($q) {
                $q->where('name', 'Verifikator Lapangan');
            })->get();
            return view('pages.admin.verifikasi-lanjutan.edit', compact(
                'dataVerifikasiLanjutan',
                'verifikator'
            ));
        } catch (\Exception $th) {
            //throw $th;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Ambil data yang diperlukan dari request dan database
            $dataPengajuan  = DataPengajuan::with(['user', 'detail'])
                ->where('id', $id)
                ->where('admin_id', Auth::user()->id)
                ->firstOrFail();

            $data = [
                'data_pengajuan_id' => $dataPengajuan->id,
                'verifikator_id' => $request->verifikator,
                'jadwal_kunjungan' => Carbon::createFromFormat('d-m-Y', $request->tanggal)->format('Y-m-d')
            ];
            // dd($data);
            // Lakukan firstOrCreate untuk mencari atau membuat entri
            $verifikasiLanjutan = VerifikasiLanjutan::firstOrCreate($data);
            if ($verifikasiLanjutan->wasRecentlyCreated) {
                return response()->json(['message' => 'Data verifikasi berhasil disimpan.']);
            } else {
                // Lakukan sesuatu jika entri sudah ada sebelumnya
                return response()->json(['message' => 'Data verifikasi sudah ada sebelumnya.']);
            }
        } catch (\Throwable $th) {
            // Tangani error jika terjadi
            return response()->json(['error' => 'Terjadi kesalahan saat memproses data.']);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return redirect()->back()->withError('No action is required!');
    }
}
