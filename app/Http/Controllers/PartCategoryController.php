<?php

namespace App\Http\Controllers;

use App\Models\PartCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class PartCategoryController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $query = PartCategory::query();

            return DataTables::eloquent($query)
                                ->addColumn('action', function (PartCategory $part_category) {
                                    return '<a href="' . route('part_category.edit', $part_category->id) . '" class="btn btn-warning btn-sm"><i class="bx bx-edit"></i></a>
                                            <button class="btn btn-danger btn-sm btn_delete" data-id="' . $part_category->id . '"><i class="bx bx-trash"></i></button>';
                                })
                                ->rawColumns(['action'])
                                ->toJson();
        }

        return view('pages.part_category.index');
    }

    public function create() {
        return view('pages.part_category.create');
    }

    public function store(Request $request) {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        $part_category = new PartCategory;
        $part_category->nama = $request->nama;

        if(!$part_category->save()) {
            return redirect()->back()->withError('Part gagal disimpan');
        }

        return redirect()->route('part_category.index')->withSuccess('Part berhasil disimpan');
    }

    public function edit(PartCategory $part_category) {
        return view('pages.part_category.create', compact('part_category'));
    }

    public function update(Request $request, PartCategory $part_category) {
        $request->validate([
            'nama' => 'required|string|max:255'
        ]);

        $part_category->nama = $request->nama;

        if(!$part_category->save()) {
            return redirect()->back()->withError('Part gagal diubah');
        }

        return redirect()->route('part_category.index')->withSuccess('Part berhasil diubah');
    }

    public function destroy(PartCategory $part_category)
    {
        if(!$part_category->delete()) {
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
