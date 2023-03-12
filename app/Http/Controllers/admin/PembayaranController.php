<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\kelas;
use App\Models\pembayaran;
use App\Models\siswa;
use App\Models\spp;
use App\Models\User;
use Carbon\Carbon;
use Exception;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $pembayaran = pembayaran::latest()->paginate(5);
        // return view('admin.pembayaran.index', compact('pembayaran'));


        $siswa = siswa::latest()->get();
        $user = User::latest()->get();
        $spp = spp::latest()->get();
        $pembayaran = pembayaran::filter(request(['cari']))->paginate(5);
        return view(
            'admin.pembayaran.index',
            compact('siswa', 'user', 'spp', 'pembayaran')
        );
    }

    // public function filter(Request $request)
    // {
    //     $kelas = $request->kelas;
    //     $pembayaran = pembayaran::with('kelas')->whereHas('kelas', function ($query) use ($kelas) {
    //         $query->whereIn('nama_kelas', $kelas);
    //     })->get();

    //     return redirect('/admin/pembayaran', compact('pembayaran'));
    // }


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
        // dd($request->bulan);
        $request->validate([
            'bulan' => 'required',
        ]);

        $spp = spp::where('id', $request->spp_id)->First();
        if($request->jumlah_bayar >= $spp->nominal_perbulan){
            $status = 'lunas';
        }else{
            $status = 'belum lunas';
        }

        DB::beginTransaction();
        try {

            $pembayaran = pembayaran::create([
                'siswa_id' => $request->siswa_id,
                'spp_id' => $request->spp_id,
                'users_id' => Auth::user()->id,
                'bulan' => $request->bulan,
                'jumlah_bayar' => $request->jumlah_bayar,
                'status' => $status,
                'tgl_bayar' => Carbon::now()
            ]);

            // dd($pembayaran);
            $pembayaran->spp()->associate($request->spp_id);

            $P =$pembayaran->users()->associate(Auth::user()->id);
            // dd($P);

            DB::commit();
            Alert::success('Berhasil', 'Berhasil Menambah Data');
            return redirect(route('pembayaran.index'));
        } catch (Exception $e) {
            DB::rollBack();
            Alert::error('Error', 'Error Menambah Data');
            return redirect(route('pembayaran.index'));
        }

        // $request->validate([
        //     'siswa_id' => 'required',
        //     'spp_id' => 'required',
        //     'users_id' => 'required',
        //     'jumlah_bayar' => 'required',
        //     'status' => 'required',
        // ]);

        // $pembayaran = new pembayaran([
        //     'siswa_id' => $request->get('siswa_id'),
        //     'spp_id' => $request->get('spp_id'),
        //     'users_id' => $request->get('users_id'),
        //     'jumlah_bayar' => $request->get('jumlah_bayar'),
        //     'status' => $request->get('status'),
        //     'tgl_bayar' => Carbon::now()
        // ]);

        // $pembayaran->save();
        // Alert::success('Berhasil', 'Berhasil Menambahkan Data');
        // return redirect('/admin/pembayaran');
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
            'jumlah_bayar' => 'required',
        ]);
        // $spp = spp::where('id', $request->spp_id)->First();

        // dd($id);
        $pembayaran = pembayaran::find($id);
        $pembayaran->jumlah_bayar = $request->jumlah_bayar;
        $pembayaran->status = $request->jumlah_bayar >= $pembayaran->spp->nominal_perbulan ? 'lunas' : 'belum lunas';
        $pembayaran->save();
        Alert::success('Berhasil', 'Berhasil Mengedit Data');
        return redirect('/admin/pembayaran')->with('success', 'Pembayaran berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $pembayaran = pembayaran::find($id);
        $pembayaran->delete();
        Alert::success('Success', 'Success Menghapus Data');
        return redirect('/admin/pembayaran');
    }

    public function invoicedetails($id)
    {
        $siswa = siswa::latest();
        $user = User::latest()->get();
        $spp = spp::latest()->get();
        $pembayaran = pembayaran::where('id', $id)->get();
        return view(
            'admin.pembayaran.invoicedetails',
            compact('siswa', 'user', 'spp', 'pembayaran')
        );
    }
}
