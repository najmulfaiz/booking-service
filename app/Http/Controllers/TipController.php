<?php

namespace App\Http\Controllers;

use App\Models\Tip;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class TipController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $query = Tip::query();

            return DataTables::eloquent($query)
                                ->addColumn('img_tag', function (Tip $tip) {
                                    return '<img src="' . asset(Storage::url($tip->image)) . '" alt="Image" style="height: 64px" />';
                                })
                                ->addColumn('action', function (Tip $tip) {
                                    return '<a href="' . route('tips.edit', $tip->id) . '" class="btn btn-warning btn-sm"><i class="bx bx-edit"></i></a>
                                            <button class="btn btn-danger btn-sm btn_delete" data-id="' . $tip->id . '"><i class="bx bx-trash"></i></button>';
                                })
                                ->rawColumns(['img_tag', 'action'])
                                ->toJson();
        }

        return view('pages.tips.index');
    }

    public function create() {
        return view('pages.tips.create');
    }

    public function store(Request $request) {
        $request->validate([
            'title'   => 'required|string|max:255',
            'content' => 'required|string',
            'image'   => 'required|image|max:1024',
        ]);

        $tip = new Tip;
        $tip->title   = $request->title;
        $tip->content = $request->content;
        $tip->image   = $request->file('image')->store('public/images');

        if(!$tip->save()) {
            return redirect()->back()->withError('Tip gagal disimpan');
        }

        return redirect()->route('tips.index')->withSuccess('Tip berhasil disimpan');
    }

    public function edit(Tip $tip) {
        return view('pages.tips.create', compact('tip'));
    }

    public function update(Request $request, Tip $tip) {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        $tip->nama = $request->nama;

        if(!$tip->save()) {
            return redirect()->back()->withError('Tip gagal diubah');
        }

        return redirect()->route('tips.index')->withSuccess('Tip berhasil diubah');
    }

    public function destroy(Tip $tip)
    {
        if(!$tip->delete()) {
            return response()->json([
                'isError' => true,
                'message' => 'Tip gagal dihapus'
            ]);
        }

        return response()->json([
            'isError' => false,
            'message' => 'Tip gagal dihapus'
        ]);
    }
}
