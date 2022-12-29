<?php

namespace App\Http\Controllers;

use App\Models\JenisTransmisi;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JenisTransmisiController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $query = JenisTransmisi::query();

            return DataTables::eloquent($query)
                                ->addColumn('action', function (JenisTransmisi $jenis_transmisi) {
                                    return '<a href="' . route('jenis_transmisi.edit', $jenis_transmisi->id) . '" class="btn btn-warning btn-sm"><i class="bx bx-edit"></i></a>
                                            <button class="btn btn-danger btn-sm btn_delete" data-id="' . $jenis_transmisi->id . '"><i class="bx bx-trash"></i></button>';
                                })
                                ->rawColumns(['action'])
                                ->toJson();
        }

        return view('pages.jenis_transmisi.index');
    }

    public function create() {
        return view('pages.jenis_transmisi.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        $jenis_transmisi = new JenisTransmisi;
        $jenis_transmisi->nama = $request->nama;

        if(!$jenis_transmisi->save()) {
            return redirect()->back()->withError('Jenis transmisi gagal disimpan');
        }

        return redirect()->route('jenis_transmisi.index')->withSuccess('Jenis transmisi berhasil disimpan');
    }

    public function edit(JenisTransmisi $jenis_transmisi) {
        return view('pages.jenis_transmisi.create', compact('jenis_transmisi'));
    }

    public function update(Request $request, JenisTransmisi $jenis_transmisi) {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        $jenis_transmisi->nama = $request->nama;

        if(!$jenis_transmisi->save()) {
            return redirect()->back()->withError('Jenis transmisi gagal diubah');
        }

        return redirect()->route('jenis_transmisi.index')->withSuccess('Jenis transmisi berhasil diubah');
    }

    public function destroy(JenisTransmisi $jenis_transmisi)
    {
        if(!$jenis_transmisi->delete()) {
            return response()->json([
                'isError' => true,
                'message' => 'Jenis transmisi gagal dihapus'
            ]);
        }

        return response()->json([
            'isError' => false,
            'message' => 'Jenis transmisi gagal dihapus'
        ]);
    }
}
