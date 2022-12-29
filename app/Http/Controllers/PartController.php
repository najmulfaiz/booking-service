<?php

namespace App\Http\Controllers;

use App\Models\Part;
use App\Models\PartCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class PartController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $query = Part::with('part_category');

            return DataTables::eloquent($query)
                                ->addColumn('img_tag', function (Part $part) {
                                    return '<img src="' . asset(Storage::url($part->image)) . '" alt="Image" style="height: 64px" />';
                                })
                                ->addColumn('action', function (Part $part) {
                                    return '<a href="' . route('part.edit', $part->id) . '" class="btn btn-warning btn-sm"><i class="bx bx-edit"></i></a>
                                            <button class="btn btn-danger btn-sm btn_delete" data-id="' . $part->id . '"><i class="bx bx-trash"></i></button>';
                                })
                                ->rawColumns(['img_tag', 'action'])
                                ->toJson();
        }

        return view('pages.part.index');
    }

    public function create() {
        $part_category = PartCategory::all();

        return view('pages.part.create', compact('part_category'));
    }

    public function store(Request $request) {
        $request->validate([
            'nama'             => 'required|string|max:255',
            'harga'            => 'required|string|max:255',
            'image'            => 'required|image|max:1024',
            'part_category_id' => 'required|string|exists:part_categories,id',
        ]);

        $part = new Part;
        $part->nama             = $request->nama;
        $part->harga            = $request->harga;
        $part->image            = $request->file('image')->store('public/images');
        $part->part_category_id = $request->part_category_id;

        if(!$part->save()) {
            return redirect()->back()->withError('Part gagal disimpan');
        }

        return redirect()->route('part.index')->withSuccess('Part berhasil disimpan');
    }

    public function edit(Part $part) {
        return view('pages.part.create', compact('part'));
    }

    public function update(Request $request, Part $part) {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        $part->nama = $request->nama;

        if(!$part->save()) {
            return redirect()->back()->withError('Part gagal diubah');
        }

        return redirect()->route('part.index')->withSuccess('Part berhasil diubah');
    }

    public function destroy(Part $part)
    {
        if(!$part->delete()) {
            return response()->json([
                'isError' => true,
                'message' => 'Part gagal dihapus'
            ]);
        }

        return response()->json([
            'isError' => false,
            'message' => 'Part gagal dihapus'
        ]);
    }
}
