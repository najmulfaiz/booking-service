<?php

namespace App\Http\Controllers\Api;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\JenisTransmisiResource;
use App\Models\JenisTransmisi;
use Illuminate\Http\Request;

class JenisTransmisiController extends Controller
{
    public function index(Request $request)
    {
        $data = JenisTransmisi::orderBy('nama', 'asc');

        if($request->has('jenis_transmisi_id') && $request->jenis_transmisi_id != '') {
            $data->where('id', $request->jenis_transmisi_id);
        }

        if($request->has('nama') && $request->nama != '') {
            $data->where('nama', 'like', '%' . $request->nama . '%');
        }

        return ResponseFormatter::success((JenisTransmisiResource::collection($data->get())), 'OK');
    }
}
