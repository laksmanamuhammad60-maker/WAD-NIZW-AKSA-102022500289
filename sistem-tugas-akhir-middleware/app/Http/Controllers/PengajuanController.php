<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\Pengajuan;
use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    public function index()
    {
        $pengajuans = Pengajuan::all();
        return view('pengajuan.index', compact('pengajuans'));
    }

    public function create()
    {
        $daftar_dosen = Dosen::all(); 
        return view('pengajuan.create', compact('daftar_dosen'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_mahasiswa'   => 'required|string|max:255',
            'nim'              => 'required|string|max:50',
            'judul_ta'         => 'required|string',
            'dosen_pembimbing' => 'required|string',
        ]);

        Pengajuan::create([
            'nama_mhs'     => $request->nama_mahasiswa,
            'nim_mhs'      => $request->nim,
            'judul_ta'     => $request->judul_ta,
            'dosen_pilih'  => $request->dosen_pembimbing,
            'waktu_submit' => now()
        ]);

        return redirect('/pengajuan')->with('success', 'Berkas pengajuan pembimbing berhasil dikirim!');
    }

    public function dosen()
    {
        $daftar_dosen = Dosen::all();
        return view('pengajuan.dosen_list', compact('daftar_dosen'));
    }

    public function edit($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $daftar_dosen = Dosen::all();
        return view('pengajuan.edit', compact('pengajuan', 'daftar_dosen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mahasiswa'   => 'required|string|max:255',
            'nim'              => 'required|string|max:50',
            'judul_ta'         => 'required|string',
            'dosen_pembimbing' => 'required|string',
        ]);

        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->update([
            'nama_mhs'    => $request->nama_mahasiswa,
            'nim_mhs'     => $request->nim,
            'judul_ta'    => $request->judul_ta,
            'dosen_pilih' => $request->dosen_pembimbing,
        ]);

        return redirect('/pengajuan')->with('success', 'Data pengajuan berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $pengajuan = Pengajuan::findOrFail($id);
        $pengajuan->delete();

        return redirect('/pengajuan')->with('success', 'Berkas pengajuan berhasil dihapus!');
    }
}
