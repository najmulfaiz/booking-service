<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\JenisKendaraanResource;
use App\Models\JenisKendaraan;
use Illuminate\Http\Request;

class JenisKendaraanController extends Controller
{
    public function index(Request $request)
    {
        $data = JenisKendaraan::orderBy('nama', 'asc');

        if($request->has('jenis_kendaraan_id') && $request->jenis_kendaraan_id != '') {
            $data->where('id', $request->jenis_kendaraan_id);
        }

        if($request->has('nama') && $request->nama != '') {
            $data->where('nama', 'like', '%' . $request->nama . '%');
        }

        return ResponseFormatter::success((JenisKendaraanResource::collection($data->get())), 'OK');
    }
}
