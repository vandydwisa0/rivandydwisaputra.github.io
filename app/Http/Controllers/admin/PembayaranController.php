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
use Illuminate\Validation\Rule;

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

        $request->validate([
            'siswa_id' => 'required',
            'spp_id' => 'required',
            'bulan' => 'required',
            'jumlah_bayar' => 'required',
        ]);


        // Cek apakah siswa tersebut sudah melakukan pembayaran di bulan yang sama
        $pembayaran = pembayaran::where('siswa_id', $request->siswa_id)
        ->where('bulan', $request->bulan)
        ->first();

        if ($pembayaran) {
            Alert::warning('Warning', 'Pembayaran sudah dilakukan di bulan yang sama');
            return redirect()->back();
        }

        // Cek apakah status pembayaran siswa bulan_sebelumnya sudah lunas? kalo lunas bisa melakukan pembayaran bulan selanjutnya tapi jika belum maka akan di minta untuk melunasi dulu
        $bulan_sebelumnya = Carbon::parse($request->bulan)->subMonth()->format('F');
        $tagihan_sebelumnya = Pembayaran::where('siswa_id', $request->siswa_id)
        ->where('bulan', $bulan_sebelumnya)
        ->first();
        if ($tagihan_sebelumnya && $tagihan_sebelumnya->status != 'lunas') {
            Alert::info('Informasi', 'Anda belum melunasi tagihan pada bulan ' . Carbon::parse($bulan_sebelumnya)->format('F') . ' . Silakan lunasi terlebih dahulu.');
            return redirect()->back();
        }

        // untuk menentukan status "lunas" "belum lunas" sesuai nominal spp perbulannya
        $spp = spp::where('id', $request->spp_id)->first();

        $status = $request->jumlah_bayar >= $spp->nominal_perbulan ? 'lunas' : 'belum lunas';

        DB::beginTransaction();

        try {
            $pembayaran = pembayaran::create([
                'siswa_id' => $request->siswa_id,
                'spp_id' => $request->spp_id,
                'users_id' => Auth::user()->id,
                'bulan' => $request->bulan,
                'jumlah_bayar' => $request->jumlah_bayar,
                'status' => $status,
                'tgl_bayar' => Carbon::now(),
            ]);

            $pembayaran->spp()->associate($request->spp_id);

            // nama petugas saat melakukan pembayaran di sesuaikan dengan auth petugas yang login
            $pembayaran->users()->associate(Auth::user()->id);

            DB::commit();

            Alert::success('Berhasil', 'Berhasil Menambah Data');

            return redirect(route('pembayaran.index'));
        } catch (Exception $e) {
            DB::rollBack();

            Alert::error('Error', 'Error Menambah Data');
            return redirect(route('pembayaran.index'));
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
    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_bayar' => 'required',
        ]);

        $pembayaran = Pembayaran::find($id);
        $pembayaran->jumlah_bayar = $request->jumlah_bayar;
        $pembayaran->status = $request->jumlah_bayar >= $pembayaran->spp->nominal_perbulan ? 'lunas' : 'belum lunas';
        $pembayaran->save();

        DB::statement('CALL update_status_pembayaran(' . $pembayaran->spp_id . ')');

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
