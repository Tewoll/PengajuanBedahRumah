<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\DataPengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $dataPengajuan = DataPengajuan::where('user_id', Auth::user()->id)->get();
        // dd($dataPengajuan);
        return view('pages.user.dashboard', compact('dataPengajuan'));
        // OR, if you want to redirect to another route
        // return redirect()->route('admin.another-route');
    }
}
