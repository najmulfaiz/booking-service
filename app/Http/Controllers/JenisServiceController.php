<?php

namespace App\Http\Controllers;

use App\Models\JenisService;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class JenisServiceController extends Controller
{
    public function index(Request $request)
    {
        if($request->ajax()) {
            $query = JenisService::query();

            return DataTables::eloquent($query)
                                ->addColumn('action', function (JenisService $jenis_service) {
                                    return '<a href="' . route('jenis_service.edit', $jenis_service->id) . '" class="btn btn-warning btn-sm"><i class="bx bx-edit"></i></a>
                                            <button class="btn btn-danger btn-sm btn_delete" data-id="' . $jenis_service->id . '"><i class="bx bx-trash"></i></button>';
                                })
                                ->rawColumns(['action'])
                                ->toJson();
        }

        return view('pages.jenis_service.index');
    }
}
