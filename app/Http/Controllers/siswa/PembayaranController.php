<?php

namespace App\Http\Controllers\siswa;

use App\Http\Controllers\Controller;
use App\Models\kelas;
use App\Models\pembayaran;
use App\Models\siswa;
use App\Models\spp;
use App\Models\User;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        // $pembayaran = pembayaran::latest()->paginate(5);
        // return view('admin.pembayaran.index', compact('pembayaran'));

        $siswa = siswa::latest();
        $user = User::latest()->get();
        $spp = spp::latest()->get();
        $get_current_siswa = session('siswa.id');
        $pembayaranPagination = pembayaran::where('siswa_id', $get_current_siswa)->latest()->paginate(5);
        return view(
            'siswa.pembayaran.index',
            [
                'pembayaran' => pembayaran::where('siswa_id', $get_current_siswa)->latest()->filter(request(['search']))->get(),
                'siswa' => $siswa->get(),
                'user' => $user,
                'spp' => $spp,
                'kelas' => kelas::all(),
                'pembayaranPagination' => $pembayaranPagination
            ]
        );
    }//
}
