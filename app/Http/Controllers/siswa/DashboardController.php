<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $siswa=session('siswa');
        return view('siswa.dashboard.index')->with('siswa',$siswa);
    }
}
