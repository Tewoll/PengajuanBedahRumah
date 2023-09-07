<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\DataPengajuan;
use App\Models\DataVerifikasiLapangan;
use App\Models\DataVerifikasiLapanganChilds;
use App\Models\DetailSubKategoriVerifikasi;
use App\Models\KategoriVerifikasi;
use App\Models\SubKategoriVerifikasi;
use App\Models\VerifikasiLanjutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LaporanController extends Controller
{
    public function index()
    {
        $roles = Auth::user()->roles;

        foreach ($roles as $role) {
            if ($role->name == 'Kepala Dinas') {
                $dataPengajuan = DataPengajuan::where('status_proses', 'selesai')->get();
                $layouts = 'pages.dinas.layouts.main';
            } elseif ($role->name == 'Verifikator Lapangan') {
                $dataVerifikasiLapangan = VerifikasiLanjutan::where('verifikator_id', Auth::user()->id)->get();
                $dataPengajuanIds = $dataVerifikasiLapangan->pluck('data_pengajuan_id');
                $dataPengajuan = DataPengajuan::whereIn('id', $dataPengajuanIds)
                    ->where('status_proses', 'selesai')
                    ->get();
                $layouts = 'pages.verifikator.layouts.main';
            } elseif ($role->name == 'Admin') {
                $dataPengajuan = DataPengajuan::where('status_proses', 'selesai')->where('admin_id', Auth::user()->id)->get();
                $layouts = 'pages.admin.layouts.main';
            }
        }
        return view('pages.laporan.index', compact('dataPengajuan', 'roles', 'layouts'));
    }


    public function show(string $id)
    {
        try {

            $roles = Auth::user()->roles;

            foreach ($roles as $role) {
                if ($role->name == 'Kepala Dinas') {
                    $dataVerifikasiLapangan = VerifikasiLanjutan::where('id', $id)->firstOrFail();
                    $dataPengajuan          = DataPengajuan::where('id', $dataVerifikasiLapangan->data_pengajuan_id)->first();
                    $layouts = 'pages.dinas.layouts.main';
                } elseif ($role->name == 'Verifikator Lapangan') {
                    $dataVerifikasiLapangan = VerifikasiLanjutan::where('verifikator_id', Auth::user()->id)
                        ->where('id', $id)->firstOrFail();
                    $dataPengajuan          = DataPengajuan::where('id', $dataVerifikasiLapangan->data_pengajuan_id)->first();
                    $layouts = 'pages.verifikator.layouts.main';
                } elseif ($role->name == 'Admin') {
                    $dataVerifikasiLapangan = VerifikasiLanjutan::with(['dataPengajuan' => function ($query) {
                        $query->where('admin_id', Auth::user()->id);
                    }])
                        ->where('id', $id)->firstOrFail();
                    $dataPengajuan          = DataPengajuan::where('id', $dataVerifikasiLapangan->data_pengajuan_id)->first();
                    $layouts = 'pages.admin.layouts.main';
                }
            }
            $kategori               = KategoriVerifikasi::all();
            $subKategori            = SubKategoriVerifikasi::all();
            $detailSubKategori      = DetailSubKategoriVerifikasi::all();
            $hasilVerifikasi        = DataVerifikasiLapangan::where('data_pengajuan_id', $dataPengajuan->id)->get();
            $hasilVerifikasiChilds  = DataVerifikasiLapanganChilds::where('data_pengajuan_id', $dataPengajuan->id)
                ->get();
            $ktp                    = Attachment::where('user_id', $dataPengajuan->user_id)->where('type', 'ktp')->first();
            $kk                     = Attachment::where('user_id', $dataPengajuan->user_id)->where('type', 'kk')->first();
            $domisili               = Attachment::where('user_id', $dataPengajuan->user_id)->where('type', 'domisili')->first();
            $skkm                   = Attachment::where('user_id', $dataPengajuan->user_id)->where('type', 'skkm')->first();
            $surat_pengantar        = Attachment::where('user_id', $dataPengajuan->user_id)->where('type', 'surat pengantar')->first();
            $sertifikat             = Attachment::where('user_id', $dataPengajuan->user_id)->where('type', 'sertifikat tanah')->first();
            return view('pages.laporan.show', compact(
                'dataVerifikasiLapangan',
                'dataPengajuan',
                'kategori',
                'subKategori',
                'detailSubKategori',
                'hasilVerifikasi',
                'hasilVerifikasiChilds',
                'ktp',
                'kk',
                'domisili',
                'skkm',
                'surat_pengantar',
                'sertifikat',
                'layouts'
            ));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
