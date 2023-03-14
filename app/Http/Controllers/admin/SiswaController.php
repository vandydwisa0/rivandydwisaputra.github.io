<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\kelas;
use App\Models\siswa;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


use function GuzzleHttp\Promise\all;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        // $siswa = Siswa::with('kelas')->get();
        // return view('admin.siswa.index', compact('siswa'));


        $siswa = Siswa::filter(request(['cari']))->paginate(5);
        $kelas = Kelas::latest()->get();
        return view('admin.siswa.index',
                compact('siswa','kelas',));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $params = $request->validate([
            'nisn' => 'required|max:10|unique:siswa',
            'nis' => 'required|max:8|unique:siswa',
            'nama' => 'required|max:35',
            'password' => 'required|',
            'kelas_id' => 'required',
            'no_telp' => 'required|max:13',
            'alamat' => 'required|',
        ]);

        DB::beginTransaction();
        try {
            $siswa = siswa::create($params);
            $siswa->kelas()->associate($params['kelas_id']);

            DB::commit();
            Alert::success('Berhasil', 'Berhasil Menambah Data');
            return redirect(route('siswa.index'));
        } catch (Exception $e) {
            DB::rollBack();
            Alert::error('Error', 'Error Menambah Data');
            return redirect(route('siswa.index'));
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        $validate = $request->validate([
            'nisn' => 'required',
            'nis' => 'required',
            'nama' => 'required',
            'password' => 'required',
            'kelas_id' => 'required',
            'no_telp' => 'required',
            'alamat' => 'required',
        ]);

        $siswa = siswa::find($id);
        if($siswa->pembayaran->count() > 0) {
            Alert::info('Tidak Bisa Diedit', 'Data sedang digunakan!');
            return back();
        }else{
        $siswa->update($validate);
        Alert::success('Success', 'Success Mengedit Data');
        return redirect('/admin/siswa');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $siswa = siswa::findOrFail($id);
        if ($siswa->pembayaran->count() > 0) {
            Alert::info('Tidak Bisa Diedit', 'Data sedang digunakan!');
            return back();
        } else {
            $siswa->delete();
            return redirect('/admin/siswa')->with('success', 'Siswa berhasil dihapus!');
        }
    }

    public function siswa()
    {
        return view('siswa.index');
    }
}
