<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\pembayaran;
use App\Models\spp;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spp = spp::latest()->paginate(10);
        return view('admin.spp.index', compact('spp'));
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
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        // $spp = new spp([
        //     'tahun' => $request->get('tahun'),
        //     'nominal' => $request->get('nominal'),
        // ]);

        // Mengambil nilai nominal dari request
        $nominal = $request->get('nominal');

        // Membagi nominal dengan 12
        $nominal_per_bulan = $nominal / 12;

        $spp = new spp;
        $spp->tahun = $request->get('tahun');
        $spp->nominal = $request->get('nominal');
        $spp->nominal_perbulan = $nominal_per_bulan;
        $spp->created = Carbon::now();

        $spp->save();
        Alert::success('Success', 'Success Menambah Data');
        return redirect('/admin/spp')->with('success', 'Spp created successfully.');
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
            'tahun' => 'required',
            'nominal' => 'required'
        ]);

        // Mengambil nilai nominal dari request
        $nominal = $request->get('nominal');

        // Membagi nominal dengan 12
        $nominal_per_bulan = $nominal / 12;

        $spp = Spp::findOrFail($id);
        $spp->tahun = $request->tahun;
        $spp->nominal = $request->nominal;
        $spp->nominal_perbulan = $nominal_per_bulan;

        if($spp->pembayaran->count() > 0) {
            Alert::info('Tidak Bisa Melakukan Edit', 'Data sedang digunakan!');
            return back();
        }else{
            $spp->save();
            Alert::success('Success', 'Success Mengedit Data');
            return redirect('/admin/spp');
        }

        // Update status pembayaran siswa
        // DB::select('CALL update_status_pembayaran(?)', [$id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $spp = Spp::findOrFail($id);
        if($spp->pembayaran->count() > 0) {
            Alert::info('Tidak Bisa Melakukan Hapus', 'Data sedang digunakan!');
            return back();
        }else{
            $spp->delete();
            Alert::success('Success', 'Success Menghapus Data');
            return redirect('/admin/spp')->with('success', 'SPP berhasil dihapus!');
        }


        // $spp = Spp::findOrFail($id);
        // $spp->delete();
        // Alert::success('Success', 'Success Menghapus Data');
        // return redirect('/admin/spp')->with('success', 'SPP berhasil dihapus!');

        // DB::beginTransaction();

        // try {
        //     // Hapus data SPP
        //     $spp = Spp::findOrFail($id);
        //     $spp->delete();

        //     // Proses pembayaran

        //     DB::commit();
        //     Alert::success('Success', 'Data SPP berhasil dihapus');
        //     return redirect()->route('/admin/spp')
        //     ->with('success', 'Data SPP berhasil dihapus dan pembayaran berhasil diproses');
        // } catch (\Exception $e) {
        //     DB::rollback();

        //     // Restore data SPP yang telah dihapus
        //     $spp->restore();
        //     Alert::warning('Warning', 'Terjadi kesalahan saat memproses pembayaran, data SPP telah dipulihkan');
        //     return redirect()->route('pembayaran.index')
        //     ->with('error', 'Terjadi kesalahan saat memproses pembayaran, data SPP telah dipulihkan');
        // }
    }
}
