<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\kelas;
use App\Models\siswa;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;


class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $kelas = kelas::latest()->paginate(5);
        // return view('admin.kelas.index', compact('kelas'));

        $kelas = Kelas::latest()->filter(request(['cari']))->paginate(10);
        return view('admin.kelas.index',
            compact('kelas',)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
            'singkatan' => 'required'
        ]);

        $kelas = new Kelas;
        $kelas->nama_kelas = $request->get('nama_kelas');
        $kelas->kompetensi_keahlian = $request->get('kompetensi_keahlian');
        $kelas->singkatan = $request->singkatan;
        $kelas->created = Carbon::now();

        //  store procedure
        DB::select('CALL insert_kelas(?, ?, ?, ?)', [$kelas->nama_kelas, $kelas->kompetensi_keahlian, $kelas->singkatan, Carbon::now()]);
        Alert::success('Berhasil', 'Berhasil Menambahkan Data');
        return Redirect::to("/admin/kelas");
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|max:10',
            'kompetensi_keahlian' => 'required|max:50',
            'singkatan' => 'required|max:10',
        ]);

        $kelas = Kelas::find($id);
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->kompetensi_keahlian = $request->kompetensi_keahlian;
        $kelas->singkatan = $request->singkatan;

        if ($kelas->siswa->count() > 0) {
            Alert::info('Tidak Bisa Diedit', 'Data sedang digunakan!');
            return back();
        } else {
            $kelas->save();
            Alert::success('Success', 'Success Mengedit Data!');
            return redirect('/admin/kelas');
        }

        // $kelas->save();
        // Alert::success('Success', 'Success Mengedit Data!');
        // return redirect('/admin/kelas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kelas = kelas::findOrFail($id);
        if ($kelas->siswa->count() > 0) {
            return back();
        } else {
            $kelas->delete();
            Alert::success('Success', 'Success Menghapus Data');
            return redirect('/admin/kelas');
        }

        // $kelas = Kelas::find($id);
        // $kelas->delete();
        // Alert::success('Success', 'Success Menghapus Data');

        // return redirect('/admin/kelas')->with('success', 'Kelas berhasil dihapus!');
    }
}
