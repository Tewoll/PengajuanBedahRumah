<?php

namespace App\Http\Controllers\verifikator;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\DataPengajuan;
use App\Models\DataVerifikasiLapangan;
use App\Models\DataVerifikasiLapanganChild;
use App\Models\DataVerifikasiLapanganChilds;
use App\Models\DetailSubKategoriVerifikasi;
use App\Models\KategoriVerifikasi;
use App\Models\SubKategoriVerifikasi;
use App\Models\VerifikasiLanjutan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class DataVerifikasiLapanganController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataVerifikasiLapangan = VerifikasiLanjutan::with('dataPengajuan')
            ->where('verifikator_id', Auth::user()->id)
            ->get();
        return view('pages.verifikator.verifikasi-lapangan.index', compact(
            'dataVerifikasiLapangan'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request, $id)
    {
        try {
            //code...
            $dataVerifikasiLapangan = VerifikasiLanjutan::where('id', $id)
                ->with('dataPengajuan')
                ->where('verifikator_id', Auth::user()->id)
                ->firstOrFail();
            $kategori = KategoriVerifikasi::all();
            $subKategori = SubKategoriVerifikasi::all();
            $detailSubKategori = DetailSubKategoriVerifikasi::all();
            if ($dataVerifikasiLapangan->status == 1) {
                return redirect()->back()->withError('Maaf, Data sudah di verifikasi');
            } else {
                return view('pages.verifikator.verifikasi-lapangan.create', compact(
                    'dataVerifikasiLapangan',
                    'kategori',
                    'subKategori',
                    'detailSubKategori'
                ));
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function compressImage($sourcePath, $targetPath, $quality = 50)
    {
        // Dapatkan informasi gambar asli
        list($width, $height, $type) = getimagesize($sourcePath);

        // Buat gambar baru dengan tipe JPEG
        $image = imagecreatetruecolor($width, $height);
        $imageType = image_type_to_mime_type($type);

        // Load gambar asli sesuai tipe yang sesuai
        switch ($imageType) {
            case 'image/jpeg':
                $sourceImage = imagecreatefromjpeg($sourcePath);
                break;
            case 'image/png':
                $sourceImage = imagecreatefrompng($sourcePath);
                break;
            case 'image/gif':
                $sourceImage = imagecreatefromgif($sourcePath);
                break;
                // Tambahkan tipe lain jika diperlukan
            default:
                return false;
        }

        // Salin gambar asli ke gambar baru dengan kualitas yang ditentukan
        imagecopyresampled($image, $sourceImage, 0, 0, 0, 0, $width, $height, $width, $height);

        // Ubah ekstensi file target menjadi .jpg
        $targetPath = pathinfo($targetPath, PATHINFO_DIRNAME) . '/' . pathinfo($targetPath, PATHINFO_FILENAME) . '.jpg';

        // Simpan gambar baru ke file target dengan kualitas yang ditentukan
        imagejpeg($image, $targetPath, $quality);

        // Hapus sumber gambar dari memori
        imagedestroy($image);
        imagedestroy($sourceImage);

        return true;
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $dataVerifikasiLapangan = VerifikasiLanjutan::where('verifikator_id', Auth::user()->id)
                ->where('id', $request->verifikasi_id)
                ->firstOrFail();
            $dataPengajuan = DataPengajuan::where('id', $request->id)->first();

            // DATA SUB KATEGORI
            // SKID 1
            $skid1 = [
                'data_pengajuan_id'     => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 1,
                'ket'                       => $request->skid_1,
                'det_ket'                   => NULL,
            ];
            // SKID 2
            $skid2 = [
                'data_pengajuan_id'     => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 2,
                'ket'                       => $request->skid_2,
                'det_ket'                   => NULL,
            ];
            // SKID 3
            if ($request->photo_3) {
                $photo_3            = $request->file('photo_3');
                $namephoto_3        = sha1($photo_3->getClientOriginalName());
                $file_name_photo_3  = date('d-m-Y') . '_' . $namephoto_3 . '.' . 'jpg';
                $sourcePath3         = $photo_3->getRealPath();
                $targetPath3         = storage_path('app/public/verifikasi/photo_3/' . $file_name_photo_3);
                $quality3            = 50;
                $this->compressImage($sourcePath3, $targetPath3, $quality3);
                $file_photo_3       = 'verifikasi/photo_3/' . $file_name_photo_3;
            } else {
                $file_photo_3      = NULL;
            }
            $skid3 = [
                'data_pengajuan_id'     => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 3,
                'ket'                       => $request->skid_3,
                'det_ket'                   => $file_photo_3,
            ];
            // SKID 4
            if ($request->photo_4) {
                $photo_4            = $request->file('photo_4');
                $namephoto_4        = sha1($photo_4->getClientOriginalName());
                $file_name_photo_4  = date('d-m-Y') . '_' . $namephoto_4 . '.' . 'jpg';
                $sourcePath4         = $photo_4->getRealPath();
                $targetPath4         = storage_path('app/public/verifikasi/photo_4/' . $file_name_photo_4);
                $quality4            = 50;
                $this->compressImage($sourcePath4, $targetPath4, $quality4);
                $file_photo_4       = 'verifikasi/photo_4/' . $file_name_photo_4;
            } else {
                $file_photo_4      = NULL;
            }
            $skid4 = [
                'data_pengajuan_id'     => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 4,
                'ket'                       => $request->skid_4,
                'det_ket'                   => $file_photo_4,
            ];
            // SKID 5
            if ($request->photo_5) {
                $photo_5            = $request->file('photo_5');
                $namephoto_5        = sha1($photo_5->getClientOriginalName());
                $file_name_photo_5  = date('d-m-Y') . '_' . $namephoto_5 . '.' . 'jpg';
                $sourcePath5         = $photo_5->getRealPath();
                $targetPath5         = storage_path('app/public/verifikasi/photo_5/' . $file_name_photo_5);
                $quality5            = 50;
                $this->compressImage($sourcePath5, $targetPath5, $quality5);
                $file_photo_5       = 'verifikasi/photo_5/' . $file_name_photo_5;
            } else {
                $file_photo_5      = NULL;
            }
            $skid5 = [
                'data_pengajuan_id'     => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 5,
                'ket'                       => $request->skid_5,
                'det_ket'                   => $file_photo_5,
            ];
            // SKID 6
            if ($request->photo_6) {
                $photo_6            = $request->file('photo_6');
                $namephoto_6        = sha1($photo_6->getClientOriginalName());
                $file_name_photo_6  = date('d-m-Y') . '_' . $namephoto_6 . '.' . 'jpg';
                $sourcePath6         = $photo_6->getRealPath();
                $targetPath6         = storage_path('app/public/verifikasi/photo_6/' . $file_name_photo_6);
                $quality6            = 50;
                $this->compressImage($sourcePath6, $targetPath6, $quality6);
                $file_photo_6       = 'verifikasi/photo_6/' . $file_name_photo_6;
            } else {
                $file_photo_6      = NULL;
            }
            $skid6 = [
                'data_pengajuan_id'     => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 6,
                'ket'                       => $request->skid_6,
                'det_ket'                   => $file_photo_6,
            ];
            // SKID 7
            if ($request->photo_7) {
                $photo_7            = $request->file('photo_7');
                $namephoto_7        = sha1($photo_7->getClientOriginalName());
                $file_name_photo_7  = date('d-m-Y') . '_' . $namephoto_7 . '.' . 'jpg';
                $sourcePath7         = $photo_7->getRealPath();
                $targetPath7         = storage_path('app/public/verifikasi/photo_7/' . $file_name_photo_7);
                $quality7            = 50;
                $this->compressImage($sourcePath7, $targetPath7, $quality7);
                $file_photo_7       = 'verifikasi/photo_7/' . $file_name_photo_7;
            } else {
                $file_photo_7      = NULL;
            }
            $skid7 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 7,
                'ket' => $request->skid_7,
                'det_ket' => $file_photo_7,
            ];
            // SKID 8
            $skid8 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 8,
                'ket' => $request->skid_8,
                'det_ket' => $request->det_skid_8,
            ];
            // SKID 9
            $skid9 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 9,
                'ket' => $request->skid_9,
                'det_ket' => $request->det_skid_9,
            ];
            // SKID 10
            $skid10 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 10,
                'ket' => $request->skid_10,
                'det_ket' => $request->det_skid_10,
            ];
            // SKID 11
            $skid11 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 11,
                'ket' => $request->skid_11,
                'det_ket' => $request->det_skid_11,
            ];
            // SKID 12
            $skid12 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 12,
                'ket' => $request->skid_12,
                'det_ket' => $request->det_skid_12,
            ];
            // SKID 13
            $skid13 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 13,
                'ket' => $request->skid_13,
                'det_ket' => $request->det_skid_13,
            ];
            // SKID 14
            $skid14 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 14,
                'ket' => $request->skid_14,
                'det_ket' => $request->det_skid_14,
            ];
            // SKID 15
            $skid15 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 15,
                'ket' => $request->skid_15,
                'det_ket' => $request->det_skid_15,
            ];
            // SKID 16
            $isianskid_16 = [$request->ukuran_skid_16, $request->luas_skid_16];
            $skid16 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 16,
                'ket' => json_encode($isianskid_16),
                'det_ket' => $request->det_skid_16,
            ];
            // SKID 17
            $skid17 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 17,
                'ket' => $request->skid_17,
                'det_ket' => $request->det_skid_17,
            ];
            // SKID 18
            $isianskid_18 = [$request->ukuran_skid_18, $request->luas_skid_18];
            $skid18 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 18,
                'ket' => json_encode($isianskid_18),
                'det_ket' => $request->det_skid_18,
            ];
            // SKID 19
            $skid19 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 19,
                'ket' => $request->skid_19,
                'det_ket' => $request->det_skid_19,
            ];
            // SKID 20
            $skid20 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 20,
                'ket' => $request->skid_20,
                'det_ket' => $request->det_skid_20,
            ];
            // SKID 21
            $skid21 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 21,
                'ket' => $request->skid_21,
                'det_ket' => $request->det_skid_21,
            ];
            // SKID 22
            if ($request->hasFile('photo_8')) {
                $photo_8_files = $request->file('photo_8');
                $file_photo_8_array = []; // Array to store file paths

                for ($i = 0; $i < count($photo_8_files); $i++) {
                    $photo_8 = $photo_8_files[$i];
                    $namephoto_8 = substr(sha1($photo_8->getClientOriginalName()), 0, 5);
                    $file_name_photo_8 = date('d-m-Y') . '_' . $namephoto_8 . '.' . 'jpg';
                    $sourcePath8 = $photo_8->getRealPath();
                    $targetPath8 = storage_path('app/public/verifikasi/dokumentasi/' . $file_name_photo_8);
                    $quality8 = 50;
                    $this->compressImage($sourcePath8, $targetPath8, $quality8);
                    $file_photo_8_array[] = 'verifikasi/dokumentasi/' . $file_name_photo_8;
                }
            } else {
                $file_photo_8_array = [];
            }
            $skid22 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'sub_kategori_id' => 22,
                'ket' => json_encode($file_photo_8_array), // Convert array to JSON for storage
            ];
            // DATA DETAIL SUB KATEGORI
            // DSKID 2-6
            $dskid2_6 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 6,
                'ket' => $request->dskid_2_6,
            ];
            // DSKID 2-7
            $dskid2_7 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 7,
                'ket' => $request->dskid_2_7,
            ];
            // DSKID 2-8
            $isian_2_8 = [$request->dskid_2_8_1, $request->dskid_2_8_2, $request->dskid_2_8_3];
            $dskid2_8 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 8,
                'ket' => json_encode($isian_2_8),
            ];
            // DSKID 2-9
            $dskid2_9 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 9,
                'ket' => $request->dskid_2_9,
            ];
            // DSKID 2-10
            $dskid2_10 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 10,
                'ket' => $request->dskid_2_10,
            ];
            // DSKID 2-11
            $dskid2_11 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 11,
                'ket' => $request->dskid_2_11,
            ];
            // DSKID 2-12
            $isian_2_12 = [$request->dskid_2_12_1, $request->dskid_2_12_2, $request->dskid_2_12_3];
            $dskid2_12 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 12,
                'ket' => json_encode($isian_2_12),
            ];
            // DSKID 2-13
            $dskid2_13 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 13,
                'ket' => $request->dskid_2_13,
            ];
            // DSKID 2-14
            $dskid2_14 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 14,
                'ket' => $request->dskid_2_14,
            ];
            // DSKID 2-15
            $dskid2_15 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 15,
                'ket' => $request->dskid_2_15,
            ];
            // DSKID 2-16
            $dskid2_16 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 16,
                'ket' => $request->dskid_2_16,
            ];
            // DSKID 2-17
            $isian_2_17 = [$request->dskid_2_17_1, $request->dskid_2_17_2, $request->dskid_2_17_3];
            $dskid2_17 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 17,
                'ket' => json_encode($isian_2_17),
            ];
            // DSKID 2-18
            $dskid2_18 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 18,
                'ket' => $request->dskid_2_18,
            ];
            // DSKID 2-19
            $dskid2_19 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 19,
                'ket' => $request->dskid_2_19,
            ];
            // DSKID 2-20
            $dskid2_20 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 20,
                'ket' => $request->dskid_2_20,
            ];
            // DSKID 2-21
            $dskid2_21 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 21,
                'ket' => $request->dskid_2_21,
            ];
            // DSKID 2-22
            $isian_2_22 = [$request->dskid_2_22_1, $request->dskid_2_22_2, $request->dskid_2_22_3];
            $dskid2_22 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 22,
                'ket' => json_encode($isian_2_22),
            ];
            // DSKID 2-23
            $dskid2_23 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 23,
                'ket' => $request->dskid_2_23,
            ];
            // DSKID 2-24
            $dskid2_24 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 24,
                'ket' => $request->dskid_2_24,
            ];
            // DSKID 2-28
            $dskid2_28 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 28,
                'ket' => $request->dskid_2_28,
            ];
            // DSKID 2-29
            $isian_2_29 = [$request->dskid_2_29_1, $request->dskid_2_29_2, $request->dskid_2_29_3];
            $dskid2_29 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 29,
                'ket' => json_encode($isian_2_29),
            ];
            // DSKID 2-30
            $dskid2_30 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 30,
                'ket' => $request->dskid_2_30,
            ];
            // DSKID 2-31
            $dskid2_31 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 31,
                'ket' => $request->dskid_2_31,
            ];
            // DSKID 2-32
            $dskid2_32 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 32,
                'ket' => $request->dskid_2_31,
            ];
            // DSKID 3-25
            $dskid3_25 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 25,
                'ket' => $request->dskid_3_25,
            ];
            // DSKID 23-26
            $dskid3_26 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 26,
                'ket' => $request->dskid_3_26,
            ];
            // DSKID 3-27
            $dskid3_27 = [
                'data_pengajuan_id' => $request->id,
                'verifikasi_lanjutan_id' => $request->verifikasi_id,
                'detail_sub_ktgr_id' => 27,
                'ket' => $request->dskid_3_27,
            ];

            // DataVerifikasiLapangan::firstOrCreate($skid1);
            // DataVerifikasiLapangan::firstOrCreate($skid2);
            // DataVerifikasiLapangan::firstOrCreate($skid3);
            // DataVerifikasiLapangan::firstOrCreate($skid4);
            // DataVerifikasiLapangan::firstOrCreate($skid5);
            // DataVerifikasiLapangan::firstOrCreate($skid6);
            // DataVerifikasiLapangan::firstOrCreate($skid7);
            // DataVerifikasiLapangan::firstOrCreate($skid8);
            // DataVerifikasiLapangan::firstOrCreate($skid9);
            // DataVerifikasiLapangan::firstOrCreate($skid10);
            // DataVerifikasiLapangan::firstOrCreate($skid11);
            // DataVerifikasiLapangan::firstOrCreate($skid12);
            // DataVerifikasiLapangan::firstOrCreate($skid13);
            // DataVerifikasiLapangan::firstOrCreate($skid14);
            // DataVerifikasiLapangan::firstOrCreate($skid15);
            // DataVerifikasiLapangan::firstOrCreate($skid16);
            // DataVerifikasiLapangan::firstOrCreate($skid17);
            // DataVerifikasiLapangan::firstOrCreate($skid18);
            // DataVerifikasiLapangan::firstOrCreate($skid19);
            // DataVerifikasiLapangan::firstOrCreate($skid20);
            // DataVerifikasiLapangan::firstOrCreate($skid21);

            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_6);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_7);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_8);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_9);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_10);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_11);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_12);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_13);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_14);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_15);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_16);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_17);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_18);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_19);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_20);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_21);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_22);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_23);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_24);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_28);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_29);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_30);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_31);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid2_32);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid3_25);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid3_26);
            // DataVerifikasiLapanganChilds::firstOrCreate($dskid3_27);

            $skids = [
                $skid1, $skid2, $skid3, $skid4, $skid5, $skid5, $skid6, $skid7, $skid8, $skid9, $skid10, $skid11,
                $skid12, $skid13, $skid14, $skid15, $skid16, $skid17, $skid18, $skid19, $skid20, $skid21, $skid22
            ];

            $dskids2 = [
                $dskid2_6, $dskid2_7, $dskid2_8, $dskid2_9, $dskid2_10, $dskid2_11, $dskid2_12, $dskid2_13, $dskid2_14,
                $dskid2_15, $dskid2_16, $dskid2_17, $dskid2_18, $dskid2_19, $dskid2_20, $dskid2_21, $dskid2_22, $dskid2_23,
                $dskid2_24, $dskid2_28, $dskid2_29, $dskid2_30, $dskid2_31, $dskid2_32
            ];

            $dskids3 = [
                $dskid3_25, $dskid3_26, $dskid3_27
            ];
            try {
                foreach ($skids as $skid) {
                    DataVerifikasiLapangan::firstOrCreate($skid);
                }

                foreach ($dskids2 as $dskid2) {
                    DataVerifikasiLapanganChilds::firstOrCreate($dskid2);
                }

                foreach ($dskids3 as $dskid3) {
                    DataVerifikasiLapanganChilds::firstOrCreate($dskid3);
                }

                $dataVerifikasiLapangan->status = 1;
                $dataVerifikasiLapangan->update();

                $dataPengajuan->status_proses   = 'Persetujuan';
                $dataPengajuan->keterangan      = 'Survei Kelapangan sudah di lakukan oleh Tim Verifikator dan data hasil sudah di inputkan ke dalam sistem. Mohon tunggu untuk proses persetujuan dari pihak Kepala Dinas.';
                $dataPengajuan->processed_at    = now();
                $dataPengajuan->update();
                return redirect()->route('verifikasi-lanjutan.index')->withSuccess('Data Berhasil di simpan');
            } catch (\Exception $e) {
                return redirect()->back()->withError('Terjadi kesalahan dalam penginputan data: ' . $e->getMessage());
            }
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {

            $roles = Auth::user()->roles;

            foreach ($roles as $role) {
                if ($role->name == 'Kepala Dinas') {
                    $dataVerifikasiLapangan = VerifikasiLanjutan::where('id', $id)->firstOrFail();
                    $pages = 'pages.dinas.verifikasi-lapangan.show';
                } elseif ($role->name == 'Verifikator Lapangan') {
                    $dataVerifikasiLapangan = VerifikasiLanjutan::where('verifikator_id', Auth::user()->id)
                        ->where('id', $id)->firstOrFail();
                    $pages = 'pages.verifikator.verifikasi-lapangan.show';
                }
            }
            $dataPengajuan          = DataPengajuan::where('id', $dataVerifikasiLapangan->data_pengajuan_id)->first();
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
            return view($pages, compact(
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
                'sertifikat'
            ));
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $roles = Auth::user()->roles;
            foreach ($roles as $role) {
                if ($role->name == 'Kepala Dinas') {
                    $dataPengajuan  = DataPengajuan::where('id', $id)->firstOrFail();
                    if ($request->status == 'Disetujui') {
                        $dataPengajuan->status_proses    = 'Selesai';
                        $dataPengajuan->status_pengajuan = $request->status;
                        $dataPengajuan->approved_at      = now();
                        $dataPengajuan->completed_at     = now();
                        $dataPengajuan->keterangan       = 'Pengajuan bantuan bedah rumah Anda telah disetujui. Tim kami akan menghubungi Anda untuk mengatur jadwal dan merinci langkah-langkah lebih lanjut.';
                        $dataPengajuan->update();
                    } elseif ($request->status == 'Ditolak') {
                        $dataPengajuan->status_proses    = 'Selesai';
                        $dataPengajuan->status_pengajuan = $request->status;
                        $dataPengajuan->approved_at      = now();
                        $dataPengajuan->completed_at     = now();
                        $dataPengajuan->keterangan       = $request->keterangan;
                        $dataPengajuan->update();
                    }
                    return redirect()->route('skoring.index')->withSuccess('Data Berhasil di konfirmasi');
                } else {
                    return redirect()->back()->withError('Sorry, You are not allowed to access this resource!');
                }
            }
        } catch (\Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
