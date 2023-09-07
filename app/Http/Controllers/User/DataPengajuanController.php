<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Attachment;
use App\Models\DataDiri;
use App\Models\DataPengajuan;
use App\Models\DataPengajuanDetail;
use App\Models\User;
use DateTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;
use Carbon\Carbon;



class DataPengajuanController extends Controller
{
    public function index()
    {
        $user               = User::find(Auth::user()->id);
        $isPersonalDataNull = $user->with('dataDiri')->where('id', Auth::user()->id)->first();
        $dataPengajuan      = DataPengajuan::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        // $submittedAtFormatted = \Carbon\Carbon::parse($dataPengajuan->submitted_at)->isoFormat('D MMMM Y, HH:mm');
        return view('pages.user.data-pengajuan.index', compact(
            'user',
            'isPersonalDataNull',
            'dataPengajuan'
            // 'submittedAtFormatted'
        ));
    }
    public function create()
    {
        $user                   = User::find(Auth::user()->id);
        $isPersonalDataNull     = $user->with('dataDiri')->where('id', Auth::user()->id)->first();
        $dataPengajuanLatest    = DataPengajuan::where('user_id', Auth::user()->id)->latest()->first();

        if ($dataPengajuanLatest) {
            $now = now();
            $submittedAt = \Carbon\Carbon::parse($dataPengajuanLatest->submitted_at); // Ubah string menjadi objek Carbon
            $monthsDiff = $submittedAt->diffInMonths($now);
            $nextAllowedYear = $submittedAt->copy()->addYears(10)->year;
            switch ($dataPengajuanLatest->status_pengajuan) {
                case 'Ditolak':
                    if ($monthsDiff < 1) {
                        return redirect()->back()->with('warning', 'Maaf, Anda hanya dapat mengajukan permohonan sekali dalam sebulan setelah pengajuan sebelumnya ditolak.');
                    }
                    break;
                case 'Disetujui':
                    if ($now->year < $nextAllowedYear) {
                        return redirect()->back()->with('warning', 'Maaf, Anda hanya dapat mengajukan permohonan lagi setelah 10 tahun sejak pengajuan Anda yang sebelumnya disetujui.');
                    }
                    break;
                default:
                    if ($dataPengajuanLatest->status_proses != 'Selesai') {
                        return redirect()->back()->with('warning', 'Maaf, Anda belum dapat mengajukan Permohonan lagi karena ada data pengajuan yang masih dalam proses. Harap tunggu proses data pengajuan Anda sebelumnya. Terima kasih.');
                    }
                    break;
            }
        } else {
            if ($isPersonalDataNull) {
                $dataDiri = $isPersonalDataNull->dataDiri;

                if ($dataDiri) {
                    $allColumnsFilled = collect($dataDiri->getAttributes())->every(function ($value, $key) {
                        return $value !== null;
                    });

                    if (!$allColumnsFilled) {
                        // Session::flash('notify', [
                        //     'type' => 'danger',
                        //     'message' => 'Lengkapi data diri terlebih dahulu sebelum melanjutkan untuk pengajuan!'
                        // ]);
                        return redirect()
                            ->route('data-diri.index')
                            ->with('warning', 'Lengkapi semua kolom data diri sebelum melanjutkan untuk pengajuan!');
                    } else {
                        $ktp = Attachment::where('user_id', Auth::user()->id)->where('type', 'ktp')->first();
                        $kk = Attachment::where('user_id', Auth::user()->id)->where('type', 'kk')->first();
                        $sertifikat = Attachment::where('user_id', Auth::user()->id)->where('type', 'sertifikat tanah')->first();
                        $domisili = Attachment::where('user_id', Auth::user()->id)->where('type', 'domisili')->first();
                        $suratPengantar = Attachment::where('user_id', Auth::user()->id)->where('type', 'surat pengantar')->first();
                        $skkm = Attachment::where('user_id', Auth::user()->id)->where('type', 'skkm')->first();
                        $rumah = Attachment::where('user_id', Auth::user()->id)->where('type', 'foto rumah')->get();
                        // flash()->addInfo('Lengkapi persyaratan sesuai dengan form yang sudah ditentukan!');
                        return view('pages.user.data-pengajuan.create', compact(
                            'ktp',
                            'kk',
                            'sertifikat',
                            'rumah',
                            'suratPengantar',
                            'domisili',
                            'skkm'
                        ));
                    }
                } else {
                    return redirect()
                        ->route('data-diri.index')
                        ->with('warning', 'Lengkapi data diri terlebih dahulu sebelum melanjutkan untuk pengajuan!');
                }
            }
        }
    }
    public function edit($id)
    {
        try {
            //code...
            $dataPengajuan  = DataPengajuan::where('id', $id)->firstOrFail();
            $user_id        = Auth::user()->id;
            $ktp            = Attachment::where('user_id', $user_id)->where('type', 'ktp')->first();
            $kk             = Attachment::where('user_id', $user_id)->where('type', 'kk')->first();
            $sertifikat     = Attachment::where('user_id', $user_id)->where('type', 'sertifikat tanah')->first();
            $domisili       = Attachment::where('user_id', $user_id)->where('type', 'domisili')->first();
            $suratPengantar = Attachment::where('user_id', $user_id)->where('type', 'surat pengantar')->first();
            $skkm           = Attachment::where('user_id', $user_id)->where('type', 'skkm')->first();
            $rumah          = Attachment::where('user_id', $user_id)->where('type', 'foto rumah')->get();
            // flash()->addInfo('Lengkapi persyaratan sesuai dengan form yang sudah ditentukan!');
            return view('pages.user.data-pengajuan.edit', compact(
                'dataPengajuan',
                'ktp',
                'kk',
                'sertifikat',
                'rumah',
                'suratPengantar',
                'domisili',
                'skkm'
            ));
        } catch (\Exception $th) {
            return redirect()->back()->withError('Data Pengajuan tidak ada di database!', $th->getMessage());
        }
    }
    public function update(Request $request, $id)
    {
        try {
            //code...
            $dataPengajuan          = DataPengajuan::where('id', $id)->firstOrFail();
            $user_id                = Auth::user()->id;
            $dataPengajuanDetail    = DataPengajuanDetail::where('data_pengajuan_id', $dataPengajuan->id)->first();
            $update = [
                'status_data'   => 'Data Pengajuan Baru',
                'keterangan'    => 'Revisi Data Permohonan sudah di lakukan.'
            ];
            $dataPengajuan->update($update);
            return redirect()->route('data-pengajuan.index')->with('success', 'Data Revisi Perbaikan berhasil dilakukan. Saat ini tim admin sedang melakukan verifikasi terhadap data yang Anda masukkan. Harap bersabar dan tunggu konfirmasi lebih lanjut.');
        } catch (\Exception $th) {
            return redirect()->back()->withError('Data Pengajuan tidak ada di database!', $th->getMessage());
        }
    }
    public function show($id)
    {
        try {
            $dataPengajuan      = DataPengajuan::with(['user', 'detail'])
                ->where('id', $id)
                ->firstOrFail();
            $user_id        = Auth::user()->id;
            $dataDiri       = DataDiri::where('user_id', $dataPengajuan->user->id)->first();
            $ktp            = Attachment::where('user_id', $dataPengajuan->user->id)->where('type', 'ktp')->first();
            $kk             = Attachment::where('user_id', $dataPengajuan->user->id)->where('type', 'kk')->first();
            $sertifikat     = Attachment::where('user_id', $dataPengajuan->user->id)->where('type', 'sertifikat tanah')->first();
            $domisili       = Attachment::where('user_id', $dataPengajuan->user->id)->where('type', 'domisili')->first();
            $suratPengantar = Attachment::where('user_id', $dataPengajuan->user->id)->where('type', 'surat pengantar')->first();
            $skkm           = Attachment::where('user_id', $dataPengajuan->user->id)->where('type', 'skkm')->first();
            $rumah          = Attachment::where('user_id', $dataPengajuan->user->id)->where('type', 'foto rumah')->get();
            return view('pages.user.data-pengajuan.show', compact(
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
    public function ktpStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ktp' => 'mimes:png,jpg|max:2000',
        ]);
        if ($validator->fails()) {
            flash()->addError('KTP Gagal Ditambahkan');
            return redirect()
                ->route('data-pengajuan.create')
                ->withErrors($validator);
        }
        if ($request->file('ktp')) {
            $checkData      = Attachment::where('user_id', Auth::user()->id)->where('type', 'ktp')->first();
            if ($checkData) {
                $fileDelete = storage_path('app/public/uploaded/' . $checkData->file);
                if (file_exists($fileDelete)) {
                    unlink($fileDelete);
                }
                $checkData->delete();
            }
            $image          = $request->file('ktp');
            $type           = 'ktp';
            $fileName       = Auth::user()->name . '-' . time() . '.' . 'jpg';
            $sourcePath     = $image->getRealPath();
            $targetPath     = storage_path('app/public/uploaded/ktp/' . $fileName);
            $quality        = 10;
            $this->compressImage($sourcePath, $targetPath, $quality);
        } else {
            flash()->addError('KTP Gagal Ditambahkan');
            return redirect()
                ->route('data-pengajuan.create');
        }

        $data = [
            'user_id'   => Auth::user()->id,
            'type'      => $type,
            'file'      => 'ktp/' . $fileName,
        ];

        try {
            Attachment::create($data);
        } catch (\Exception $e) {
            flash()->addError($e->getMessage());
            return redirect()->route('data-pengajuan.create');
        }

        flash()->addSuccess('KTP Berhasil Ditambahkan');
        return redirect()->route('data-pengajuan.create');
    }
    public function kkStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kk' => 'mimes:pdf|max:1000',
        ]);
        if ($validator->fails()) {
            flash()->addError('Kartu Keluarga Gagal Ditambahkan');
            return redirect()
                ->route('data-pengajuan.create')
                ->withErrors($validator);
        }
        if ($request->file('kk')) {
            $checkData      = Attachment::where('user_id', Auth::user()->id)->where('type', 'kk')->first();
            if ($checkData) {
                $fileDelete = storage_path('app/public/uploaded/' . $checkData->file);
                if (file_exists($fileDelete)) {
                    unlink($fileDelete);
                }
                $checkData->delete();
            }
            $pdf            = $request->file('kk');
            $type           = 'kk';
            $extension      = $pdf->getClientOriginalExtension();
            $fileName       = Auth::user()->name . '-' . time() . '.' . $extension;
            $pdf->storeAs('public/uploaded/kk/' . $fileName);
        } else {
            flash()->addError('Kartu Keluarga Gagal Ditambahkan');
            return redirect()
                ->route('data-pengajuan.create');
        }

        $data = [
            'user_id'   => Auth::user()->id,
            'type'      => $type,
            'file'      => 'kk/' . $fileName,
        ];

        try {
            Attachment::create($data);
        } catch (\Exception $e) {
            flash()->addError($e->getMessage());
            return redirect()->route('data-pengajuan.create');
        }

        flash()->addSuccess('Kartu Keluarga Berhasil Ditambahkan');
        return redirect()->route('data-pengajuan.create');
    }
    public function domisiliStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'SuratKeteranganDomisili' => 'mimes:pdf|max:1000',
        ]);
        if ($validator->fails()) {
            flash()->addError('Surat Keterangan Domisili Gagal Ditambahkan');
            return redirect()
                ->route('data-pengajuan.create')
                ->withErrors($validator);
        }
        if ($request->file('SuratKeteranganDomisili')) {
            $checkData      = Attachment::where('user_id', Auth::user()->id)->where('type', 'domisili')->first();
            if ($checkData) {
                $fileDelete = storage_path('app/public/uploaded/' . $checkData->file);
                if (file_exists($fileDelete)) {
                    unlink($fileDelete);
                }
                $checkData->delete();
            }
            $pdf            = $request->file('SuratKeteranganDomisili');
            $type           = 'domisili';
            $extension      = $pdf->getClientOriginalExtension();
            $fileName       = Auth::user()->name . '-' . time() . '.' . $extension;
            $pdf->storeAs('public/uploaded/domisili/' . $fileName);
        } else {
            flash()->addError('Surat Keterangan Domisili Gagal Ditambahkan');
            return redirect()
                ->route('data-pengajuan.create');
        }

        $data = [
            'user_id'   => Auth::user()->id,
            'type'      => $type,
            'file'      => 'domisili/' . $fileName,
        ];

        try {
            Attachment::create($data);
        } catch (\Exception $e) {
            flash()->addError($e->getMessage());
            return redirect()->route('data-pengajuan.create');
        }

        flash()->addSuccess('Surat Keterangan Domisili Berhasil Ditambahkan');
        return redirect()->route('data-pengajuan.create');
    }
    public function sertifikatStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'sertifikat' => 'mimes:pdf|max:1000',
        ]);
        if ($validator->fails()) {
            flash()->addError('Sertifikat tanah gagal ditambahkan');
            return redirect()
                ->route('data-pengajuan.create')
                ->withErrors($validator);
        }
        if ($request->file('sertifikat')) {
            $checkData      = Attachment::where('user_id', Auth::user()->id)->where('type', 'sertifikat tanah')->first();
            if ($checkData) {
                $fileDelete = storage_path('app/public/uploaded/' . $checkData->file);
                if (file_exists($fileDelete)) {
                    unlink($fileDelete);
                }
                $checkData->delete();
            }
            $pdf            = $request->file('sertifikat');
            $type           = 'sertifikat tanah';
            $extension      = $pdf->getClientOriginalExtension();
            $fileName       = Auth::user()->name . '-' . time() . '.' . $extension;
            $pdf->storeAs('public/uploaded/sertifikat-tanah/' . $fileName);
        } else {
            flash()->addError('Sertifikat tanah gagal ditambahkan');
            return redirect()
                ->route('data-pengajuan.create');
        }

        $data = [
            'user_id'   => Auth::user()->id,
            'type'      => $type,
            'file'      => 'sertifikat-tanah/' . $fileName,
        ];

        try {
            Attachment::create($data);
        } catch (\Exception $e) {
            flash()->addError($e->getMessage());
            return redirect()->route('data-pengajuan.create');
        }

        flash()->addSuccess('Sertifikat tanah berhasil ditambahkan');
        return redirect()->route('data-pengajuan.create');
    }
    public function skkmStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'SuratKeteranganKurangMampu' => 'mimes:pdf|max:1000',
        ]);
        if ($validator->fails()) {
            flash()->addError('Surat Keterangan Kurang Mampu Desa Gagal Ditambahkan');
            return redirect()
                ->route('data-pengajuan.create')
                ->withErrors($validator);
        }
        if ($request->file('SuratKeteranganKurangMampu')) {
            $checkData      = Attachment::where('user_id', Auth::user()->id)->where('type', 'skkm')->first();
            if ($checkData) {
                $fileDelete = storage_path('app/public/uploaded/' . $checkData->file);
                if (file_exists($fileDelete)) {
                    unlink($fileDelete);
                }
                $checkData->delete();
            }
            $pdf            = $request->file('SuratKeteranganKurangMampu');
            $type           = 'skkm';
            $extension      = $pdf->getClientOriginalExtension();
            $fileName       = Auth::user()->name . '-' . time() . '.' . $extension;
            $pdf->storeAs('public/uploaded/skkm/' . $fileName);
        } else {
            flash()->addError('Surat Keterangan Kurang Mampu Gagal Ditambahkan');
            return redirect()
                ->route('data-pengajuan.create');
        }

        $data = [
            'user_id'   => Auth::user()->id,
            'type'      => $type,
            'file'      => 'skkm/' . $fileName,
        ];

        try {
            Attachment::create($data);
        } catch (\Exception $e) {
            flash()->addError($e->getMessage());
            return redirect()->route('data-pengajuan.create');
        }

        flash()->addSuccess('Surat Keterangan Kurang Mampu Berhasil Ditambahkan');
        return redirect()->route('data-pengajuan.create');
    }
    public function suratPengantarStore(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'SuratPengantarKelurahan' => 'mimes:pdf|max:1000',
        ]);
        if ($validator->fails()) {
            flash()->addError('Surat Pengantar Kelurahan Kurang Mampu Desa Gagal Ditambahkan');
            return redirect()
                ->route('data-pengajuan.create')
                ->withErrors($validator);
        }
        if ($request->file('SuratPengantarKelurahan')) {
            $checkData      = Attachment::where('user_id', Auth::user()->id)->where('type', 'surat pengantar')->first();
            if ($checkData) {
                $fileDelete = storage_path('app/public/uploaded/' . $checkData->file);
                if (file_exists($fileDelete)) {
                    unlink($fileDelete);
                }
                $checkData->delete();
            }
            $pdf            = $request->file('SuratPengantarKelurahan');
            $type           = 'surat pengantar';
            $extension      = $pdf->getClientOriginalExtension();
            $fileName       = Auth::user()->name . '-' . time() . '.' . $extension;
            $pdf->storeAs('public/uploaded/surat-pengantar/' . $fileName);
        } else {
            flash()->addError('Surat Pengantar Kelurahan Gagal Ditambahkan');
            return redirect()
                ->route('data-pengajuan.create');
        }

        $data = [
            'user_id'   => Auth::user()->id,
            'type'      => $type,
            'file'      => 'surat-pengantar/' . $fileName,
        ];

        try {
            Attachment::create($data);
        } catch (\Exception $e) {
            flash()->addError($e->getMessage());
            return redirect()->route('data-pengajuan.create');
        }

        flash()->addSuccess('Surat Pengantar Kelurahan Berhasil Ditambahkan');
        return redirect()->route('data-pengajuan.create');
    }
    public function rumahStore(Request $request)
    {
        if ($request->hasFile('file')) {
            $images = $request->file('file');
            $type   = 'foto rumah'; // Ubah sesuai dengan tipe gambar yang sesuai
            // dd($images);
            for ($i = 0; $i < count($images); $i++) {
                $image = $images[$i];

                if ($image->isValid()) {
                    $fileName = Auth::user()->name . '-' . time() . '-' . $i . '.jpg';
                    $sourcePath = $image->getRealPath();
                    $targetPath = storage_path('app/public/uploaded/foto-rumah/' . $fileName);
                    $quality = 20;
                    $this->compressImage($sourcePath, $targetPath, $quality);

                    $data           = new Attachment();
                    $data->user_id  = Auth::user()->id;
                    $data->type     = $type;
                    $data->file     = 'foto-rumah/' . $fileName;
                    $data->save();
                } else {
                    continue; // Skip invalid images
                }
            }

            return back()->with('success', 'Files uploaded successfully');
        } else {
            return back()->with('error', 'No files uploaded');
        }
    }
    public function rumahDestroy($id)
    {
        $data = Attachment::find($id);
        $fileName = $data->file;
        $filePath = storage_path('app/public/uploaded/' . $fileName);
        // dd($filePath);

        if (file_exists($filePath)) {
            unlink($filePath);
            $data->delete();
            return back()->with('success', 'Files delete successfully');
        } else {
            $data->delete();
            // return back()->with('error', 'No files uploaded');
            return back()->with('success', 'Files delete successfully');
        }
    }
    public function store(Request $request)
    {
        $user               = User::find(Auth::user()->id);
        $isPersonalDataNull = $user->with('dataDiri')->where('id', Auth::user()->id)->first();
        if ($isPersonalDataNull) {
            $dataDiri = $isPersonalDataNull->dataDiri;

            if ($dataDiri) {
                $allColumnsFilled = collect($dataDiri->getAttributes())->every(function ($value, $key) {
                    return $value !== null;
                });

                if (!$allColumnsFilled) {
                    return redirect()
                        ->route('data-diri.index')
                        ->with('warning', 'Lengkapi semua kolom data diri sebelum melanjutkan untuk pengajuan!');
                } else {
                    $ktp = Attachment::where('user_id', Auth::user()->id)->where('type', 'ktp')->first();
                    $kk = Attachment::where('user_id', Auth::user()->id)->where('type', 'kk')->first();
                    $sertifikat = Attachment::where('user_id', Auth::user()->id)->where('type', 'sertifikat tanah')->first();
                    $domisili = Attachment::where('user_id', Auth::user()->id)->where('type', 'domisili')->first();
                    $skkm = Attachment::where('user_id', Auth::user()->id)->where('type', 'skkm')->first();
                    $suratPengantar = Attachment::where('user_id', Auth::user()->id)->where('type', 'surat pengantar')->first();
                    $rumah = Attachment::where('user_id', Auth::user()->id)->where('type', 'foto rumah')->get();

                    $attachments = [
                        'KTP' => $ktp,
                        'Kartu Keluarga' => $kk,
                        'Sertifikat Tanah' => $sertifikat,
                        'Domisili' => $domisili,
                        'Surat Keterangan Kurang Mampu' => $skkm,
                        'Foto Rumah' => $rumah,
                        'Surat Pengantar Keluruahan' => $suratPengantar,
                    ];

                    $incompleteAttachments = [];

                    foreach ($attachments as $type => $attachment) {
                        if (!$attachment) {
                            $incompleteAttachments[] = $type;
                        }
                    }

                    if (empty($incompleteAttachments)) {
                        // Semua attachment sudah lengkap, user dapat mengajukan permohonan
                        $dataPengajuan = [
                            'user_id' => Auth::user()->id,
                            'status_data' => 'Data Pengajuan Baru',
                            'status_proses' => 'Verifikasi Data',
                            'status_pengajuan' => NULL,
                            'keterangan' => 'Terima kasih telah mengajukan permohonan. Saat ini tim admin sedang melakukan verifikasi terhadap data yang Anda masukkan. Harap bersabar dan tunggu konfirmasi lebih lanjut.',
                            'submitted_at' => now(),
                        ];
                        // dd($dataPengajuan,$dataPengajuanDetail);
                        try {
                            $dataPengajuanModel = DataPengajuan::create($dataPengajuan);
                            $dataPengajuanDetail = $request->only([
                                'bersungguh_sungguh', 'belum_menerima_bantuan', 'upah_minimum',
                                'bekerja_berkelompok', 'data_confirmation'
                            ]);

                            $dataPengajuanDetail['data_pengajuan_id'] = $dataPengajuanModel->id;
                            DataPengajuanDetail::create($dataPengajuanDetail);

                            return redirect()->route('data-pengajuan.index')->with('success', 'Terima kasih telah mengajukan permohonan. Saat ini tim admin sedang melakukan verifikasi terhadap data yang Anda masukkan. Harap bersabar dan tunggu konfirmasi lebih lanjut.');
                        } catch (\Exception $th) {
                            return redirect()->back()->withError($th->getMessage(), 'Pengajuan Gagal. Cek kembali data anda.'); //throw $th;
                        }
                    } else {
                        // Tampilkan informasi attachment yang belum lengkap
                        return back()->with('error', 'Pengajuan Gagal. Cek kembali data anda. Anda belum dapat mengajukan permohonan karena attachment berikut belum lengkap: ' . implode(', ', $incompleteAttachments));
                    }
                }
            }
        }
    }
}
