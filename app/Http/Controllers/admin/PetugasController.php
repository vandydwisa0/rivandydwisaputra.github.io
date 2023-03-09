<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;


class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $petugas = User::latest()->paginate(5);
        return view('admin.petugas.index', compact('petugas'));
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
        $validateData = $request->validate([
            'username' => 'required|unique:users|max:25',
            'password' => 'required|min:8',
            'nama_petugas' => 'required|max:35',
            'level' => 'required'
        ]);

        $validateData['password'] = Hash::make($validateData['password']);
        User::create($validateData);
        Alert::success('Success', 'Success Menambah Data');
        return redirect('/admin/petugas');
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
    public function update(Request $request, User $id)
    {
        $rules = [
            'nama_petugas' => 'required|max:35',
            'level' => 'required'
        ];

        if($request->username !== $id->username) {
            $rules['username'] = 'required|unique:users|max:25';
        }

        $validateData = $request->validate($rules);
        User::find($id)->update($validateData);
        Alert::success('Success', 'Success Mengedit Data');
        return redirect('/admin/petugas');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $petugas = User::findOrFail($id);

        // dd($petugas->pembayaran->count());
        if ($petugas->pembayaran->count() > 0) {
            return back();
        } else {
            $petugas->destroy($id);
            Alert::success('Success', 'Success Menghapus Data');
            return redirect('/admin/petugas');
        }

        // $petugas = User::findOrFail($id);
        // if ($petugas->pembayaran->count() > 0) {
        //     return back();
        // } else {
        //     $petugas->delete();
        //     Alert::success('Success', 'Success Menghapus Data');
        //     return redirect('/admin/petugas');
        // }

        // User::destroy($petuga->id);
        // Alert::success('Success', 'Success Menghapus Data');
        // return redirect('/admin/petugas');
    }
}
