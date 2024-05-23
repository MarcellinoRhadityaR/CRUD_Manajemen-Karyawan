<?php

namespace App\Http\Controllers;

use App\Models\karyawan;
use Illuminate\Http\Request;

class karyawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = karyawan::all();
        return view('karyawan.index', compact('karyawans'))->with('title', 'Data Karyawan');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'jabatan' => 'required',
            'gaji' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $karyawan = new karyawan();
        $karyawan->nama = $request->nama;
        $karyawan->alamat = $request->alamat;
        $karyawan->no_telp = $request->no_telp;
        $karyawan->jabatan = $request->jabatan;
        $karyawan->gaji = $request->gaji;
        $karyawan->jenis_kelamin = $request->jenis_kelamin;
        $karyawan->save();
        return redirect()->back()->with('store', 'Data karyawan ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telp' => 'required',
            'jabatan' => 'required',
            'gaji' => 'required',
            'jenis_kelamin' => 'required',
        ]);

        $karyawan = karyawan::findOrFail($id);
        $karyawan->nama = $request->input('nama');
        $karyawan->alamat = $request->input('alamat');
        $karyawan->no_telp = $request->input('no_telp');
        $karyawan->jabatan = $request->input('jabatan');
        $karyawan->gaji = $request->input('gaji');
        $karyawan->jenis_kelamin = $request->input('jenis_kelamin');
        $karyawan->update();
        return redirect()->back()->with('update', 'Data karyawan Berhasil Di Update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $karyawan = Karyawan::findOrFail($id);
        $karyawan->delete();
        return redirect()->back()->with('destroy', 'Data karyawan di hapus');
    }
}
