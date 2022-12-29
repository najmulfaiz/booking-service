<?php

namespace App\Http\Controllers;

use App\Models\JenisKendaraan;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JenisKendaraanController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $query = JenisKendaraan::query();

            return DataTables::eloquent($query)
                                ->addColumn('action', function (JenisKendaraan $jenis_kendaraan) {
                                    return '<a href="' . route('jenis_kendaraan.edit', $jenis_kendaraan->id) . '" class="btn btn-warning btn-sm"><i class="bx bx-edit"></i></a>
                                            <button class="btn btn-danger btn-sm btn_delete" data-id="' . $jenis_kendaraan->id . '"><i class="bx bx-trash"></i></button>';
                                })
                                ->rawColumns(['action'])
                                ->toJson();
        }

        return view('pages.jenis_kendaraan.index');
    }

    public function create() {
        return view('pages.jenis_kendaraan.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        $jenis_kendaraan = new JenisKendaraan;
        $jenis_kendaraan->nama = $request->nama;

        if(!$jenis_kendaraan->save()) {
            return redirect()->back()->withError('Jenis kendaraan gagal disimpan');
        }

        return redirect()->route('jenis_kendaraan.index')->withSuccess('Jenis kendaraan berhasil disimpan');
    }

    public function edit(JenisKendaraan $jenis_kendaraan) {
        return view('pages.jenis_kendaraan.create', compact('jenis_kendaraan'));
    }

    public function update(Request $request, JenisKendaraan $jenis_kendaraan) {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        $jenis_kendaraan->nama = $request->nama;

        if(!$jenis_kendaraan->save()) {
            return redirect()->back()->withError('Jenis kendaraan gagal diubah');
        }

        return redirect()->route('jenis_kendaraan.index')->withSuccess('Jenis kendaraan berhasil diubah');
    }

    public function destroy(JenisKendaraan $jenis_kendaraan)
    {
        if(!$jenis_kendaraan->delete()) {
            return response()->json([
                'isError' => true,
                'message' => 'Jenis kendaraan gagal dihapus'
            ]);
        }

        return response()->json([
            'isError' => false,
            'message' => 'Jenis kendaraan gagal dihapus'
        ]);
    }
}
