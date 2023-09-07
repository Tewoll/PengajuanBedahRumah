<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DataDiri;
use App\Models\District;
use App\Models\Province;
use App\Models\Regency;
use App\Models\User;
use App\Models\Village;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class DataDiriController extends Controller
{
    public function index()
    {
        // if (!Auth::user()->hasRole('User')) {
        //     return redirect()->back()->withError('Sorry, you are not allowed to access this! You\'re not User!');
        // } else {
        $user               = User::find(Auth::user()->id);
        $isPersonalDataNull = $user->with('dataDiri')->where('id', Auth::user()->id)->first();
        $lib_prov           = Province::all();
        $kota               = Regency::all();
        $kecamatan          = District::all();
        $desa               = Village::all();
        return view('pages.user.data-diri.index', compact(
            'user',
            'kota',
            'kecamatan',
            'desa',
            'isPersonalDataNull',
            'lib_prov',
        ));
        // }
    }
    public function store(Request $request)
    {
        $address_domisili = $request->address_domisili;
        $postal_code_domisili = $request->postal_code_domisili;
        $nikKtp = str_replace(' ', '', $request->input('nik_ktp'));
        // dd($nikKtp);
        $validator = Validator::make(array_merge($request->all(), ['nik_ktp' => $nikKtp]), [
            'nama'                  => 'required|string|max:100',
            'nik_ktp'               => 'required|string|min:16|max:16',
            'tempat_lahir'          => 'required|string|max:30',
            'tanggal_lahir'         => 'required|date',
            'phone'                 => 'required|string|max:15',
            'whatsapp'              => 'required|string|max:15',
            'agama'                 => 'required|string|in:Islam,Kristen,Katholik,Hindu,Budha,Konghucu',
            'status_perkawinan'     => 'required|string|in:Kawin,Belum Kawin,Cerai Hidup,Cerai Mati',
            'jenis_kelamin'         => 'required|string|in:L,P',
            'alamat'                => 'required|string',
            'kelurahan'             => 'required|exists:villages,id',
            'rt'                    => 'required|string|max:3',
            'rw'                    => 'required|string|max:3',
            'kecamatan'             => 'required|exists:districts,id',
            'kabupaten'             => 'required|exists:regencies,id',
            'provinsi'              => 'required|exists:provinces,id',
            'Kewarganegaraan'       => 'required|string|max:30',
            'kode_pos'              => 'required|string|max:10',
            'pendidikan_terakhir'   => 'required|string|max:20',
            'pekerjaan'             => 'required|string|max:20',
        ]);

        if ($validator->fails()) {
            flash()->addError('Data Diri Gagal Disimpan');
            return redirect()
                ->back()
                ->withInput()
                ->withErrors($validator);
        }

        $data = [
            'user_id'               => Auth::user()->id,
            'nama'                  => $request->nama,
            'nik'                   => $nikKtp,
            'tempat_lahir'          => $request->tempat_lahir,
            'tanggal_lahir'         => Carbon::createFromFormat('d-m-Y', $request->tanggal_lahir)->format('Y-m-d'),
            'phone'                 => str_replace([' ', '_'], '', $request->input('phone')),
            'whatsapp'              => str_replace([' ', '_'], '', $request->input('whatsapp')),
            'agama'                 => $request->agama,
            'status_perkawinan'     => $request->status_perkawinan,
            'jenis_kelamin'         => $request->jenis_kelamin,
            'alamat'                => $request->alamat,
            'village_id'            => $request->kelurahan,
            'rt'                    => rtrim(str_replace(' ', '_', $request->input('rt')), '_'),
            'rw'                    => rtrim(str_replace(' ', '_', $request->input('rw')), '_'),
            'district_id'           => $request->kecamatan,
            'regency_id'            => $request->kabupaten,
            'province_id'           => $request->provinsi,
            'negara'                => $request->Kewarganegaraan,
            'kode_pos'              => $request->kode_pos,
            'pendidikan_terakhir'   => $request->pendidikan_terakhir,
            'pekerjaan'             => $request->pekerjaan,
        ];
        // dd($data);
        // $isComplete = validateTable::where('user_id', '=', Auth::user()->id)->first();

        // // dd($isComplete);
        // $validateTable = [
        //     'user_id' => Auth::user()->id,
        //     'data_diri' => 'true',
        //     'validate' => 1
        // ];

        // if ($isComplete) {
        //     $getValidate = validateTable::where('user_id', '=', Auth::user()->id)->first();
        //     $getNumber = $getValidate->validate + 1;
        //     if ($getValidate->data_diri == 'true') {
        //         validateTable::where('user_id', '=', Auth::user()->id)->update(['data_diri' => 'true']);
        //     } else {
        //         validateTable::where('user_id', '=', Auth::user()->id)->update(['data_diri' => 'true', 'validate' => $getNumber]);
        //     }
        // } else {
        //     validateTable::create($validateTable);
        // }

        try {
            DataDiri::create($data);
        } catch (\Exception $e) {
            flash()->addError($e->getMessage());
            return redirect()->route('data-diri.index');
        }
        flash()->addSuccess('Data Diri Berhasil Ditambahkan');
        return redirect()->back();
    }

    public function edit($id){
        $user               = User::find($id)->with('dataDiri');
        $isPersonalDataNull = $user->with('dataDiri')->where('id', Auth::user()->id)->first();
        $lib_prov           = Province::all();
        $kota               = Regency::all();
        $kecamatan          = District::all();
        $desa               = Village::all();
        return view('pages.user.data-diri.edit', compact(
            'user','isPersonalDataNull',
            'kota',
            'kecamatan',
            'desa',
            'lib_prov',
        ));
    }
    public function update(Request $request, $id){
        //
        flash()->addSuccess('Data Diri Berhasil Di ubah');
        return redirect()->route('data-diri.index');
    }
    public function getCities($provinsi)
    {
        $cities = Regency::where('province_id', $provinsi)->get();
        return response()->json($cities);
    }

    public function getDistricts($kabupaten)
    {
        $districts = District::where('regency_id', $kabupaten)->get();
        return response()->json($districts);
    }

    public function getVillages($kecamatan)
    {
        $villages = Village::where('district_id', $kecamatan)->get();
        return response()->json($villages);
    }

    public function delete($id)
    {
        dd($id);
    }
}
