<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\kelas;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;


class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kelas = kelas::latest()->paginate(5);
        return view('admin.kelas.index', compact('kelas'));
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
        $request->validate([
            'nama_kelas' => 'required',
            'kompetensi_keahlian' => 'required',
        ]);

        $kelas = new Kelas([
            'nama_kelas' => $request->get('nama_kelas'),
            'kompetensi_keahlian' => $request->get('kompetensi_keahlian'),
            'created' => Carbon::now()
        ]);

        $kelas->save();
        Alert::success('Berhasil', 'Berhasil Menambahkan Data');
        return Redirect::to("/admin/kelas")->withSuccess('Success message');
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kelas' => 'required|max:10',
            'kompetensi_keahlian' => 'required|max:50',
        ]);

        $kelas = Kelas::find($id);
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->kompetensi_keahlian = $request->kompetensi_keahlian;
        $kelas->save();
        Alert::success('Success', 'Success Mengedit Data');
        return redirect('/admin/kelas')->with('success', 'Kelas berhasil diupdate!');
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
