<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginPetugasController extends Controller
{
    public function index()
    {
        if($petugas=Auth::user()){
            if($petugas->level=='admin'){
                return redirect()->route('dashboard.index');
            }elseif($petugas->level=='petugas'){
                return redirect()->route('dashboard.index');
            }
        } else if (session()->has('siswa')) {
            return redirect()->route('siswa.dashboard');
        }
        return view('auth.loginpetugas');
    }

    public function loginpetugas(Request $request)
    {
        $validate = $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        if(Auth::attempt($validate)){
            $petugas = Auth::user();

            if($petugas->level=='admin'){
                Alert::success('Berhasil', 'Berhasil Login');
                return redirect()->intended(route('dashboard.index'));
            }elseif($petugas->level=='petugas'){
                Alert::success('Berhasil', 'Berhasil Login');
                return redirect()->intended(route('dashboard.index'));
            }else{
                Alert::warning('Gagal', 'Coba cek kembali nisn atau password');
                return redirect()->intended('/');
            }
        }
        Alert::warning('Gagal', 'Coba cek kembali nisn atau password');
        return redirect()->route('login')->withInput()->withErrors(['status'=>'failed']);
    }

    public function logoutpetugas(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->flush();
        return redirect()->route('login');
    }
}
