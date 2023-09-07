<?php

namespace App\Http\Controllers\KepalaDinas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KepalaDinasController extends Controller
{
    public function index()
    {
        return view('pages.dinas.dashboard-dinas');
    }
}
