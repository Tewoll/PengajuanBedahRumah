<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\DataDiri;
use App\Models\DataPengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DataPermohonanController extends Controller
{
    public function index()
    {
        $dataPengajuan      = DataPengajuan::where('status_data', 'Data Pengajuan Baru')
            ->where('admin_id', Auth::user()->id)
            ->orWhere('admin_id', NULL)->get();
        return view('pages.admin.permohonan.index', compact(
            'dataPengajuan'
        ));
    }
    public function show($id)
    {
        try {
            $dataPengajuan      = DataPengajuan::with(['user', 'detail'])
                ->where('id', $id)
                ->where('admin_id', Auth::user()->id)
                ->orWhere('admin_id', NULL)->firstOrFail();
            // dd($dataPengajuan);
            $dataDiri       = DataDiri::where('user_id', $dataPengajuan->user->id)->first();
            $ktp            = Attachment::where('user_id', $dataPengajuan->user->id)->where('type', 'ktp')->first();
            $kk             = Attachment::where('user_id', $dataPengajuan->user->id)->where('type', 'kk')->first();
            $sertifikat     = Attachment::where('user_id', $dataPengajuan->user->id)->where('type', 'sertifikat tanah')->first();
            $domisili       = Attachment::where('user_id', $dataPengajuan->user->id)->where('type', 'domisili')->first();
            $suratPengantar = Attachment::where('user_id', $dataPengajuan->user->id)->where('type', 'surat pengantar')->first();
            $skkm           = Attachment::where('user_id', $dataPengajuan->user->id)->where('type', 'skkm')->first();
            $rumah          = Attachment::where('user_id', $dataPengajuan->user->id)->where('type', 'foto rumah')->get();
            return view('pages.admin.permohonan.show', compact(
                'dataPengajuan',
                'dataDiri',
                'ktp',
                'kk',
                'sertifikat',
                'domisili',
                'suratPengantar',
                'skkm',
                'rumah'
            ));
        } catch (\Exception $e) {
            throw $e;
        }
    }
    public function konfirmasi(Request $request, $id)
    {
        try {
            $dataPengajuan = DataPengajuan::where('id', $id)
                ->where('status_data', 'Data Pengajuan Baru')
                ->where('admin_id', Auth::user()->id)
                ->orWhere('admin_id', NULL)
                ->firstOrFail();
            switch ($request->konfirmasi) {
                case 'tolak':
                    $dataPengajuan->status_data     = 'Data Ditolak'; // Menggunakan string
                    $dataPengajuan->admin_id        = Auth::user()->id;
                    $dataPengajuan->processed_at    = now();
                    $dataPengajuan->keterangan      = $request->alasan;
                    $dataPengajuan->update();
                    return response()->json(['message' => 'Aksi berhasil dilakukan']);
                    break;
                case 'perbaikan':
                    $dataPengajuan->status_data     = 'Data Perlu Perbaikan'; // Menggunakan string
                    $dataPengajuan->admin_id        = Auth::user()->id;
                    $dataPengajuan->processed_at    = now();
                    $dataPengajuan->keterangan      = $request->alasan;
                    $dataPengajuan->update();
                    return response()->json(['message' => 'Aksi berhasil dilakukan']);
                    break;
                case 'setuju':
                    $dataPengajuan->status_data     = 'Data Disetujui';
                    $dataPengajuan->admin_id        = Auth::user()->id;
                    $dataPengajuan->approved_at     = now();
                    $dataPengajuan->processed_at    = now();
                    $dataPengajuan->status_proses   = 'Verifikasi Lapangan';
                    $dataPengajuan->keterangan      = 'Data administrasi sudah di verifikasi dan di setuji oleh Admin. Mohon tunggu untuk proses selanjutnya.';
                    $dataPengajuan->update();
                    return response()->json(['message' => 'Aksi berhasil dilakukan']);
                    break;
                default:
                    break;
            }
        } catch (\Exception $e) {
            throw $e;
        }
    }
}
