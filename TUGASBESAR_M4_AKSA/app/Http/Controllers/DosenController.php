<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function create()
    {
        return view('pengajuan.dosen');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_dosen' => 'required|string|max:255',
        ]);

        Dosen::create([
            'nama' => $request->nama_dosen,
            'nidn' => '-',
            'jabatan' => '-',
            'keahlian' => '-',
            'bidang_riset' => '-',
            'topik' => '-'
        ]);

        return redirect('/pengajuan/create')->with('success', 'Dosen pembimbing baru berhasil disimpan permanen ke database!');
    }

    public function edit($id)
    {
        $dosen = Dosen::findOrFail($id);
        return view('pengajuan.edit_dosen', compact('dosen'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_dosen' => 'required|string|max:255',
        ]);

        $dosen = Dosen::findOrFail($id);
        $dosen->update([
            'nama' => $request->nama_dosen
        ]);

        return redirect('/pengajuan/dosen')->with('success', 'Data dosen berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $dosen = Dosen::findOrFail($id);
        $dosen->delete();

        return redirect('/pengajuan/dosen')->with('success', 'Dosen berhasil dihapus dari database!');
    }
}
