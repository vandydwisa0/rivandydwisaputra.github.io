<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\siswa;
use Illuminate\Console\View\Components\Alert as ComponentsAlert;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        if (session()->has('siswa')) {
            return redirect()->back();
        }
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $login = $request->validate([
            'nisn' => 'required',
            'password' => 'required'
        ]);

        $siswa = siswa::where('nisn', $login['nisn'])->where('password', $login['password'])->first();

        if($siswa){
            $request->session()->put('siswa', $siswa);
            $request->session()->regenerate();
            Alert::success('Berhasil', 'Berhasil Login');

            return redirect()->route('siswa.dashboard');
        }else{
            Alert::warning('Gagal', 'Coba cek kembali nisn atau password');

            return redirect()->route('login.siswa');
        }
    }

    public function logoutsiswa(Request $request)
    {
        $request->session()->invalidate();
        $request->session()->forget('siswa');
        $request->session()->flush();
        return redirect('/');
    }
}
